<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
if(isset($HTTP_POST_VARS['searchtag'])){$st = (isset($_POST['searchtag'])) ? $_POST['searchtag'] : ''; obslog( "Searched for tag $st" , "Blog" , '0' ); header ("Location: ?s=search&tags=$st"); }
$d = $_GET['d'];
$e = $_GET['e'];
if ( $d && $account['level'] > '0' ){
$del = mysql_query("DELETE FROM ".$dbslave."." . $prefix . "_entry WHERE id = '$d'");
$delcom = mysql_query("DELETE FROM ".$dbslave."." . $prefix . "_comment WHERE post = '$d'");
obslog( "Deleted Entry $d" , "Blog" , '0' );
header("Location: ./");}

if ( confdata(userpost) == '1' && $account['id'] || $account['level'] > '0')
{
if ( $_POST['Submit'] ){
$title = mysql_real_escape_string($_POST['title']);
$snippet = mysql_real_escape_string($_POST['snippet']);
$message = mysql_real_escape_string($_POST['message']);
$tags = mysql_real_escape_string($_POST['tags']);
$cat = mysql_real_escape_string($_POST['category']);
if ( $title && $tags && $snippet && $message ){

$post = mysql_query("INSERT INTO " . $dbslave. "." . $prefix . "_entry (author_id,title,snippet,text,date,tag,cat_id,archive)
VALUES ('$accid','$title','$snippet','$message','$clock','$tags','$cat','$archivedate')")or die(mysql_error());
$archck = mysql_query("SELECT * FROM " . $dbslave. "." . $prefix . "_archive WHERE value = '$archivedate' ")or die(mysql_error());
if ( !$row = mysql_fetch_array( $archck) ){$archive = mysql_query("INSERT INTO " . $dbslave. "." . $prefix . "_archive SET value = '$archivedate' ")or die(mysql_error());}
obslog( "Posted Entry $title" , "Blog" , '0' ); 
if ( $account['level'] > '0' )
{



$authsql = mysql_query("SELECT email FROM ".$dbmaster.".accounts WHERE emailme='1'") or die(mysql_error());
while ( $erow = mysql_fetch_array( $authsql ))
{

$email = $erow['email'];
$subject = "A new entry has been made";
$message = "A new entry by the name of $title has been added to $sitename.\n \n If you wish to not receive these notifications then please login and change your email settings.";
email( $email , $subject ,$message );}


}
header("Location: ./");}}}
if ( confdata(userpost) == '1' && $account['id'] || $account['level'] > '0'){
if ( $e ){
$id = mysql_real_escape_string($e);
$title = mysql_real_escape_string($_POST['title']);
$snippet = mysql_real_escape_string($_POST['snippet']);
$message = mysql_real_escape_string($_POST['message']);
$tags = mysql_real_escape_string($_POST['tags']);
$cats = mysql_real_escape_string($_POST['category']);
if ( $title && $tags && $message && $snippet ){
$post = mysql_query("UPDATE " . $dbslave. "." . $prefix . "_entry 
SET title = '$title', snippet = '$snippet',text = '$message', tag = '$tags', cat_id = '$cats' WHERE id = '$id'")or die(mysql_error()); 
obslog( "Edited Entry $title ( $e )" , "Home" , '0' );
header("Location: ./?s=view&v=$e");}}}
$msg = bb($config['welcome']);
message("Welcome","$msg");
$sql = "SELECT * FROM ".$dbslave."." . $prefix . "_entry";
if(isset($_GET['page'])){$page = $_GET['page'];}else{$page = 1;}
if($page != 1){$start = ($page-1)*5;}else{$start = 0;}
$relay = "?s=list";$pagestext = pagnate("$sql","5","$relay");
$postsql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_entry ORDER BY id DESC LIMIT $start, 5;") 
or die(mysql_error());
if ($postsql){bar("$pagestext");}
while ($row = mysql_fetch_array( $postsql )) {
$listtags = $row['tag'];
$listtags = str_replace(",", " ", "$listtags");
$tags = explode(" ", $listtags);
$newArray=array_unique($tags);
foreach($newArray as $strItem){
$tag = taglink($strItem);
$listtagsout = "$listtagsout $tag";}
if ( $account['level'] > '0' ){$del = '<a href="'.$siteaddress.'?s=list&amp;d='.$row['id'].'" class="normfont">[ Delete ]</a>';}else{ $del = ''; }
$Tem     = "view_entry.tpl";
$Parser = new Parser();
$PA = array(
"TITLE" => stripslashes(htmlspecialchars($row['title'])),"DATE" => $row['date'],"DELETE" => $del,"SNIPPET" => bb($row['snippet']),"MESSAGE" => view($row['id']),"TAG" => $listtagsout,"RSS" => rss($row['cat_id']),"COM" => comment($row['id']),"AUTHOR" => username($row['author_id']),"CAT" => category($row['cat_id']));
$con = $Parser->ParseTags($Tem, $PA);
print $con;$listtagsout = '';}
if ($postsql){bar("$pagestext");}
if ( confdata(userpost) == '1' && $account['id'] || $account['level'] > '0'){
$masql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_cats");
while( $macc = mysql_fetch_array($masql) ){$cat_sel .= '<option value="' . $macc['id'] . '" '.$chk.'>' . $macc['name'] . '</option>';}
$PPA = array("CATS" => $cat_sel);
$Tem = "post_entry.tpl";$Parser = new Parser();
$con = $Parser->ParseTags($Tem, $PPA);
print $con;}?>