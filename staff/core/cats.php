<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
$d = mysql_real_escape_string($_GET['d']);
$e = mysql_real_escape_string($_GET['e']);

if ( $e ){
$postsql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_cats WHERE id = '$e' ") or die(mysql_error());
$row = mysql_fetch_array( $postsql );
if ($row){
if ( $_POST['Submit'] ){
$name = mysql_real_escape_string($_POST['name']);
$post = mysql_query("UPDATE " . $dbslave. "." . $prefix . "_cats SET name = '$name' WHERE id = '$e'")or die(mysql_error());
header("Location: ./?s=cats");}
$EPArray = array(
"ID"     => $e,
"NAME" => $row['name']
);
$Tem     = "staff/edit_cat.tpl";
$Parser = new Parser();
$con = $Parser->ParseTags($Tem, $EPArray);
print $con;}}
else
{


if ( $_POST['Submit'] ){
$name = mysql_real_escape_string($_POST['name']);
$post = mysql_query("INSERT INTO " . $dbslave. "." . $prefix . "_cats (name)
VALUES ('$name')")or die(mysql_error());
header("Location: ./?s=cats");}


if ( $d && $account['level'] > '0' ){
$del = mysql_query("DELETE FROM ".$dbslave."." . $prefix . "_cats WHERE id = '$d'");
header("Location: ./?s=cats");}


$PArray = array("SECTION"     => 'Categories');
$Tem     = "staff/staff_list_top.tpl";
$Parser = new Parser();
$con = $Parser->ParseTags($Tem, $PArray);
print $con;

$postsql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_cats ORDER BY id ") or die(mysql_error());
while( $row = mysql_fetch_array( $postsql )){
$del= '<a href="./?s=cats&d='.$row['id'].'" class="normfont">Delete</a>';
$edit= '<a href="./?s=cats&e='.$row['id'].'" class="normfont">Edit</a>';
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

$Tem     = "staff/post_cat.tpl";
$Parser = new Parser();
$con = $Parser->ParseTags($Tem, $PArray);
print $con;
}
?>