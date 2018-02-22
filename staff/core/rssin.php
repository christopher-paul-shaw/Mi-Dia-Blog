<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
$archck = mysql_query("SELECT * FROM " . $dbslave. "." . $prefix . "_archive WHERE value = '$archivedate' ")or die(mysql_error());
if ( !$row = mysql_fetch_array( $archck) ){$archive = mysql_query("INSERT INTO " . $dbslave. "." . $prefix . "_archive SET value = '$archivedate' ")or die(mysql_error());}

$rssfeed = $_POST['rssfeed'];
if ( $_POST['submit'] )
{

$xml = simplexml_load_file("$rssfeed");
$output = "";
foreach ($xml->channel->item as $item)
{
$title = mysql_real_escape_string($item->title);
$url = $item->link;
$text = mysql_real_escape_string($item->description);



$sql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_entry WHERE title = '$title'") or die(mysql_error());
$row = mysql_fetch_array( $sql );

if (!$row)
{
$message = "This entry was posted automatically by RSS Feed In, to view the full article visit \[url=$url\]$url\[\/url\]";

if ( strlen($text) > '140' )
{
$snippet = "This entry has no snippet, please click the view link to see the entry";
$message="$text \n\n $message";
}
else
{
$snippet = $text;
}
$category= mysql_real_escape_string($_POST['category']);
$tags= mysql_real_escape_string($_POST['tags']);
$author= mysql_real_escape_string($_POST['author']);
$post = mysql_query("INSERT INTO " . $dbslave. "." . $prefix . "_entry (author_id,title,snippet,text,date,tag,cat_id,archive)
VALUES ('$author','$title','$snippet','$message','$clock','$tags','$category','$archivedate')")or die(mysql_error());
$out= "($title) posted on blog <br>";
$output = "$output $out";
}



}
$out= "RSS Input Completed";
$output = "$output $out";
message("RSS Input","$output");
//var_dump($xml)
}
else
{

$masql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_cats");
while( $macc = mysql_fetch_array($masql) ){$cat_sel .= '<option value="' . $macc['id'] . '" '.$chk.'>' . $macc['name'] . '</option>';}
$uasql = mysql_query("SELECT * FROM ".$dbmast.".accounts");
while( $uacc = mysql_fetch_array($uasql) ){$acc_sel .= '<option value="' . $uacc['id'] . '" '.$chk.'>' . $uacc['name'] . '( '.$uacc['email'].' )</option>';}

$PPA = array("CATS" => $cat_sel, "ACC" => $acc_sel);
$Tem = "staff/rssinput.tpl";$Parser = new Parser();
$con = $Parser->ParseTags($Tem, $PPA);
print $con;




}
?> 