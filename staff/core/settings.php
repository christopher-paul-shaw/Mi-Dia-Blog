<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/

$post = mysql_real_escape_string($_POST['pvalue']);
$reg = mysql_real_escape_string($_POST['rvalue']);
$status = mysql_real_escape_string($_POST['status']);
$version = mysql_real_escape_string($_POST['version']);

$login = mysql_real_escape_string($_POST['login']);
$online = mysql_real_escape_string($_POST['online']);
$stats = mysql_real_escape_string($_POST['stats']);
$archive = mysql_real_escape_string($_POST['archive']);
$category = mysql_real_escape_string($_POST['category']);
$links = mysql_real_escape_string($_POST['links']);

$metainfo = mysql_real_escape_string($_POST['metainfo']);
$metakeywords = mysql_real_escape_string($_POST['metakeywords']);

$rssinfo = mysql_real_escape_string($_POST['rssinfo']);
$rssstatus = mysql_real_escape_string($_POST['rssstatus']);

if ( $_POST['submit']){
$userpost = mysql_query("UPDATE ".$dbslave.".".$prefix."_confdata SET value='$post' WHERE name = 'userpost'");
$userreg = mysql_query("UPDATE ".$dbslave.".".$prefix."_confdata SET value='$reg' WHERE name = 'userreg'");
$siteclosed = mysql_query("UPDATE ".$dbslave.".".$prefix."_confdata SET value='$status' WHERE name = 'siteclosed'");
$version = mysql_query("UPDATE ".$dbslave.".".$prefix."_confdata SET value='$version' WHERE name = 'version'");

$login = mysql_query("UPDATE ".$dbslave.".".$prefix."_confdata SET value='$login' WHERE name = 'blocklogin'");
$online = mysql_query("UPDATE ".$dbslave.".".$prefix."_confdata SET value='$online' WHERE name = 'blockonline'");
$stats = mysql_query("UPDATE ".$dbslave.".".$prefix."_confdata SET value='$stats' WHERE name = 'blockstats'");
$archive = mysql_query("UPDATE ".$dbslave.".".$prefix."_confdata SET value='$archive' WHERE name = 'blockarchive'");
$category = mysql_query("UPDATE ".$dbslave.".".$prefix."_confdata SET value='$category' WHERE name = 'blockcats'");
$links = mysql_query("UPDATE ".$dbslave.".".$prefix."_confdata SET value='$links' WHERE name = 'blocklinks'");

$minfo= mysql_query("UPDATE ".$dbslave.".".$prefix."_confdata SET value='$metainfo' WHERE name = 'meta_info'");
$mkey = mysql_query("UPDATE ".$dbslave.".".$prefix."_confdata SET value='$metakeywords' WHERE name = 'meta_keywords'");

$rssinfo= mysql_query("UPDATE ".$dbslave.".".$prefix."_confdata SET value='$rssinfo' WHERE name = 'rss_info'");
$rssstatus = mysql_query("UPDATE ".$dbslave.".".$prefix."_confdata SET value='$rssstatus' WHERE name = 'rss_status'");

message("Settings Updated","The settings have been updated");}



if ( confdata(userpost) == '1' ) { $pyes = 'selected'; $pno = '';}else{ $pno = 'selected'; $pyes = '';}
if ( confdata(userreg) == '1' ) { $ryes = 'selected'; $rno = '';}else{ $rno = 'selected'; $ryes = '';}
if ( confdata(siteclosed) == '1' ) { $syes = 'selected'; $sno = '';}else{ $sno = 'selected'; $syes = '';}
if ( confdata(blocklogin) == '1' ) { $loginyes = 'selected'; $loginno = '';}else{ $loginno = 'selected'; $loginyes = '';}
if ( confdata(blockonline) == '1' ) { $onlineyes = 'selected'; $onlineno = '';}else{ $onlineno = 'selected'; $onlineyes = '';}
if ( confdata(blockstats) == '1' ) { $statsyes = 'selected'; $statsno = '';}else{ $statsno = 'selected'; $statsyes = '';}
if ( confdata(blockarchive) == '1' ) { $archiveyes = 'selected'; $archiveno = '';}else{ $archiveno = 'selected'; $archiveyes = '';}
if ( confdata(blockcats) == '1' ) { $categoryyes = 'selected'; $categoryno = '';}else{ $categoryno = 'selected'; $categoryyes = '';}
if ( confdata(rss_status) == '1' ) { $rssyes = 'selected'; $rssno = '';}else{ $rssno = 'selected'; $rssyes = '';}
if ( confdata(blocklinks) == '1' ) { $linksyes = 'selected'; $linksno = '';}else{ $linksno = 'selected'; $linksyes = '';}
$PArray = array(
"LOGINYES"     => $loginyes,
"LOGINNO"     => $loginno,
"LINKSYES"     => $linksyes,
"LINKSNO"     => $linksno,
"ONLINEYES"     => $onlineyes,
"ONLINENO"     => $onlineno,
"STATSYES"     => $statsyes,
"STATSNO"     => $statsno,
"ARCHIVEYES"     => $archiveyes,
"ARCHIVENO"     => $archiveno,
"CATEGORYYES"     => $categoryyes,
"CATEGORYNO"     => $categoryno,
"PYES"     => $pyes,
"PNO"     => $pno,
"RYES"     => $ryes,
"RNO"     => $rno,
"RSSYES"     => $rssyes,
"RSSNO"     => $rssno,
"RSSINFO" => confdata(rss_info),
"SYES"     => $syes,
"SNO"     => $sno,
"METAINFO" => confdata(meta_info),
"METAKEYWORDS" => confdata(meta_keywords),
"VERSION" => confdata(version));
$Tem     = "staff/settings.tpl";
$Parser = new Parser();
$con = $Parser->ParseTags($Tem, $PArray);
print $con;
 
?>



      