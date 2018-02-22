<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
$v = htmlspecialchars($_GET['v']);
$d = htmlspecialchars($_GET['d']);
if ( $v ){

$postsql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_entry WHERE id='$v' ORDER BY id") or die(mysql_error());

if ( $row = mysql_fetch_array( $postsql )){

if ( $_POST['Submit'] ){
$message = mysql_real_escape_string($_POST['message']);
if ( $message && $account['id'] ){
$post = mysql_query("INSERT INTO " . $dbslave. "." . $prefix . "_comment (author_id,post,text,date)
VALUES ('$accid','$v','$message','$clock')")or die(mysql_error()); 
obslog( "Posted a Comment on $v" , "Blog" , '0' );

$auth = $row['author_id'];
$authsql = mysql_query("SELECT email,emailme FROM ".$dbmaster.".accounts WHERE id='$auth'") or die(mysql_error());
$erow = mysql_fetch_array( $authsql );

if ( $erow['emailme'] == '1' ){
$email = $erow['email'];
$etitle = $row['title'];
$subject = "You have a comment";
$message = "A user has commented on your entry $etitle.\n $siteaddress?s=view&v=$v";
email( $email , $subject ,$message );}

header("Location: ./?s=view&v=$v");}}
if ( $d && $account['level'] > 0 ){
$del = mysql_query("DELETE FROM ".$dbslave."." . $prefix . "_comment WHERE id = '$d'");
obslog( "Deleted Comment $d" , "Blog" , '1' );
header("Location: ./?s=view&v=$v");}

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
$PA = array("TITLE" => stripslashes(htmlspecialchars($row['title'])),"DATE" => $row['date'],"DELETE" => $del,"SNIPPET" => bb($row['snippet']),"MESSAGE" => bb($row['text']),"TAG" => $listtagsout,"RSS" => rss($row['cat_id']),"COM" => comment($row['id']),"AUTHOR" => username($row['author_id']),"CAT" => category($row['cat_id']));
$con = $Parser->ParseTags($Tem, $PA);
print $con;
if ( confdata(userpost) == '1' && $account['id'] == $row['author_id'] || $account['level'] > '0'){
$masql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_cats");
while( $macc = mysql_fetch_array($masql) ){
if ( $row['cat_id'] == $macc['id'] ){$chk='selected';}else{$chk='';}
$cat_sel .= '<option value="' . $macc['id'] . '" '.$chk.'>' . $macc['name'] . '</option>';}
$Tem = "edit_entry.tpl";
$Parser = new Parser();
$PA = array("TITLE" => stripslashes($row['title']),"MESSAGE" => stripslashes($row['text']),"SNIPPET" => stripslashes($row['snippet']),"TAGS" => $row['tag'],"V" => $v,"CATS" => $cat_sel);
$con = $Parser->ParseTags($Tem, $PA);
print $con;}
$sql = "SELECT * FROM ".$dbslave."." . $prefix . "_comment WHERE post = '$v'";
$relay = "?s=view&amp;v=$v";
if(isset($_GET['page'])){$page = $_GET['page'];}else{$page = 1;}
if($page != 1){$start = ($page-1)*5;}else{$start = 0;}
$pagestext = pagnate("$sql","5","$relay");
$postsql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_comment WHERE post = '$v' ORDER BY id DESC LIMIT $start, 5;") 
or die(mysql_error());
if ($postsql){bar("$pagestext");}
while ($row = mysql_fetch_array( $postsql )) {
if ( $account['level'] > '0' ){$del = '<a href="'.$siteaddress.'?s=view&amp;v='.$v.'&amp;d='.$row['id'].'" class="normfont">[ Delete ]</a>';}else{ $del = ''; }
$Tem     = "view_comment.tpl";$Parser = new Parser();
$title = '#'.$row['id'].' Comment';
$PA = array("TITLE" => stripslashes(htmlspecialchars($title)),"DELETE" => $del,"DATE" => $row['date'],"MESSAGE" => bb($row['text']),"AUTHOR" => username($row['author_id']),"CAT" => category($row['cat_id']));
$con = $Parser->ParseTags($Tem, $PA);
print $con;}
if ( $account['id'] ){
$Tem  = "post_comment.tpl";
$PA = array("V" => $v);
$Parser = new Parser();$con = $Parser->ParseTags($Tem, $PA);print $con;}
if ($postsql){bar("$pagestext");}
}else{message("Not Found","The Entry does not exist");}}else{message("Not Found","No Entry ID Found");}
?>