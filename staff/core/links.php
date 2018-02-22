<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/

if ( confdata(blocklinks) == 1 ){ 
message("Links Disabled","The Links Block is set to Hide, and due to this you can not access this page. Please set the Links block to show in settings.");}
else{



$d = mysql_real_escape_string($_GET['d']);
$e = mysql_real_escape_string($_GET['e']);

if ( $e ){
$postsql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_links WHERE id = '$e' ") or die(mysql_error());
$row = mysql_fetch_array( $postsql );
if ($row){
if ( $_POST['Submit'] ){
$name = mysql_real_escape_string($_POST['name']);
$url = mysql_real_escape_string($_POST['url']);
$post = mysql_query("UPDATE " . $dbslave. "." . $prefix . "_links SET name = '$name', url='$url' WHERE id = '$e'")or die(mysql_error());
header("Location: ./?s=links");}
$EPArray = array(
"ID"     => $e,
"NAME" => $row['name'],
"LINK" => $row['url']
);
$Tem     = "staff/edit_link.tpl";
$Parser = new Parser();
$con = $Parser->ParseTags($Tem, $EPArray);
print $con;}}
else
{


if ( $_POST['Submit'] ){
$name = mysql_real_escape_string($_POST['name']);
$url = mysql_real_escape_string($_POST['url']);
$post = mysql_query("INSERT INTO " . $dbslave. "." . $prefix . "_links (name, url)
VALUES ('$name','$url')")or die(mysql_error());
header("Location: ./?s=links");}


if ( $d && $account['level'] > '0' ){
$del = mysql_query("DELETE FROM ".$dbslave."." . $prefix . "_links WHERE id = '$d'");
header("Location: ./?s=links");}


$PArray = array("SECTION"     => 'Categories');
$Tem     = "staff/staff_list_top.tpl";
$Parser = new Parser();
$con = $Parser->ParseTags($Tem, $PArray);
print $con;

$postsql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_links ORDER BY id ") or die(mysql_error());
while( $row = mysql_fetch_array( $postsql )){
$del= '<a href="./?s=links&d='.$row['id'].'" class="normfont">Delete</a>';
$edit= '<a href="./?s=links&e='.$row['id'].'" class="normfont">Edit</a>';
$PA = array(
"POSTID" => $row['id'],
"POSTTITLE" => $row['name'],
"POSTDELETE" => $del,
"POSTEDIT" => $edit

);

$Tem     = "staff/staff_list_row.tpl";
$Parser = new Parser();
$con = $Parser->ParseTags($Tem, $PA);
print $con;


}

$Tem     = "staff/staff_list_bot.tpl";
$Parser = new Parser();
$con = $Parser->ParseTags($Tem, $PArray);
print $con;

$Tem     = "staff/post_link.tpl";
$Parser = new Parser();
$con = $Parser->ParseTags($Tem, $PArray);
print $con;
}
}
?>