<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/

session_start();
require("connect.php");require("bbcode.php");
require("function.php"); require("function-blog.php"); require("parser.php");
$clock = date(DATE_RSS);$clockup = date("YmdHis", time() - date("Z")) ;$archivedate = date("F o");
$configsql = mysql_query("SELECT * FROM ".$dbmast.".config WHERE id = '$dbsiteid'")or die('Please Run Installer <a href="install.php">Click Here</a>');
$config = mysql_fetch_array($configsql);
if ( !$config ){ if (file_exists("./install.php")) {header("Location: ./install.php");} }
$su = $config['siteurl'];$confpath = $config['path'];$template = $config['template'];

if ( $confpath ){$siteaddress = "$su/$confpath/";}else{$siteaddress = "$su/";}


$sitename = stripslashes($config['sitename']);
$safe_sitename = mysql_real_escape_string($config['sitename']);$doc = $_SERVER['DOCUMENT_ROOT'];$root = "$doc/$confpath";
$email = $_SESSION['email'];$lplipin  = $_SESSION['lpip'];
$accountsql = mysql_query("SELECT * FROM ".$dbmast.".accounts WHERE email = '$email' AND lpip = '$lplipin'");
$account = mysql_fetch_array($accountsql);
$accid = $account['id'];
$tpath = "$root/template/$template/";
if ( $accid ){
$beginout = "<!--";
$endout = "-->";
$beginin = "";
$endin = "";
if ( $account['level'] > '0' ){
$beginstaff = "";
$endstaff = "";
$stafflevel='';
}else{
$beginstaff = "<!--";
$endstaff = "-->";
}}else{
$beginin = "<!--";
$endin = "-->";
$beginout = "";
$endout = "";
$beginstaff = "<!--";
$endstaff = "-->";}
$ParseArray = array("SITENAME"     => $sitename, "METAINFO" => confdata("meta_info"), "METAKEYWORDS" => confdata("meta_keywords"),"USERNAME"     => $account['name'], "URL" => $siteaddress, "BEGININ"     => $beginin,"ENDIN"     => $endin,"BEGINOUT"     => $beginout,"ENDOUT"     => $endout,
"BEGINSTAFF"     => $beginstaff,"ENDSTAFF"     => $endstaff);
$Template     = "header.tpl";
$Parser = new Parser();
$headout = $Parser->ParseTags($Template, $ParseArray);
print $headout;
if ( confdata(siteclosed) == '1' ){
$login = "$siteaddress?s=login";
if ( PageUrl() != $login ){
if ( $account['level'] == '1' ){message("Site Closed","Only Staff can access website");}
else { message("Site Closed","The owner of this site has set it to closed. During this time only members of staff can login and use the website.");
$ParseArray = array("URL"     => $siteaddress );
require("footer.php");die();}}}
if ( $account['frozen'] == '1' ){
$notes = $account['notes'];
message("Account Frozen","You account has been frozen by the management of this blog.  The following notes are attatched to your account and may give reason for it being frozen.
<br><br>$notes <br><br>
You will now be automatically logged out");
session_destroy();
require("footer.php");die();}
$limit = '60';
$sid = session_id();
$timelimit = $clockup - 10;
$ckonline = mysql_query("SELECT * FROM ".$dbmast.".online WHERE session = '$sid';") 
or die(mysql_error());
$onlinerow = mysql_fetch_array( $ckonline );
if ($account['id']){$perum = $account['id'];}else{$perum='0';}
if ( !$onlinerow ){
$mkonline = mysql_query("INSERT INTO ".$dbmast.".online ( time, account_id , session , site ) VALUES  (unix_timestamp(), '$perum' , '$sid' , '$safe_sitename' );") 
or die(mysql_error());
}else{
$mkonline = mysql_query("UPDATE ".$dbmast.".online SET account_id = '$perum', site = '$safe_sitename',  time = unix_timestamp() WHERE session = '$sid'") 
or die(mysql_error());}
$endonline = mysql_query("DELETE FROM ".$dbmast.".online WHERE time < unix_timestamp()-120;") 
or die(mysql_error());
?>
