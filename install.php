<html>
<head>
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Mi-Dia Blog Installer</title>
</head>
<body bgcolor="#CCCCCC">

<div align="center">
  <center>
  <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse" bordercolor="#666666" width="80%" bgcolor="#FFFFFF">
    <tr>
      <td width="100%" bordercolor="#FFFFFF">

<?php

$s = htmlspecialchars($_GET['s']);
if ( $s == 'step2'){

?>
<table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="100%"><font face="Tahoma" size="2"><b>Step 2 - Database</b><br>
    Now that the config.php file has been made, the installer will install the database.<br>
    Please click continue</font><p align="center"><b>
    <font face="Tahoma" size="2">
    <a href="install.php?s=step3" style="text-decoration: none">Continue</a></font></b></td>
  </tr>
</table>
<?php

}else if ( $s == 'step3' ){
require("includes/connect.php");
$config = mysql_query("CREATE TABLE IF NOT EXISTS " . $dbmast. ".config (
  id int(10) NOT NULL auto_increment,
  sitename varchar(100) NOT NULL,
  siteurl varchar(100) NOT NULL,
  path varchar(255) NOT NULL,
  template varchar(255) NOT NULL,
  welcome text NOT NULL,
  PRIMARY KEY  (`id`)
)")or die(mysql_error());


$accounts = mysql_query("CREATE TABLE IF NOT EXISTS " . $dbmast. ".accounts (
 id int(100) NOT NULL auto_increment,
  name varchar(50) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(100) NOT NULL,
  level int(10) NOT NULL default '0',
  ip varchar(100) NOT NULL default '0',
  joined varchar(100) NOT NULL,
  lpip int(255) NOT NULL,
  frozen varchar(1) NOT NULL default '0',
  notes text NOT NULL,
  emailme int(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
)")or die(mysql_error());


$confdata = mysql_query("CREATE TABLE " . $dbslave. ".".$prefix."_confdata (
 id int(100) NOT NULL auto_increment,
  name varchar(100) NOT NULL,
  value varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
)")or die(mysql_error());


$categories = mysql_query("CREATE TABLE " . $dbslave. "." . $prefix. "_cats (
  id int(100) NOT NULL auto_increment,
  name varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
)")or die(mysql_error());

$links = mysql_query("CREATE TABLE " . $dbslave. "." . $prefix. "_links (
  id int(100) NOT NULL auto_increment,
  name varchar(100) NOT NULL,
  url varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
)")or die(mysql_error());

$comments = mysql_query("CREATE TABLE " . $dbslave. "." . $prefix. "_comment (
  id int(100) NOT NULL auto_increment,
  post int(100) NOT NULL,
  text text NOT NULL,
  date varchar(100) NOT NULL,
  author_id int(100) NOT NULL,
  PRIMARY KEY  (`id`)
)")or die(mysql_error());


$entry = mysql_query("CREATE TABLE " . $dbslave. "." . $prefix. "_entry (
  id int(100) NOT NULL auto_increment,
  author_id int(100) NOT NULL,
  title varchar(100) NOT NULL,
  snippet text NOT NULL,
  text text NOT NULL,
  date varchar(100) NOT NULL,
  tag varchar(100) NOT NULL,
  cat_id int(100) NOT NULL default '1',
  archive varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
)")or die(mysql_error());

$logs = mysql_query("CREATE TABLE " . $dbslave. "." . $prefix. "_logs (
  id int(100) NOT NULL auto_increment,
  user_id int(100) NOT NULL,
  action varchar(1000) NOT NULL,
  area varchar(100) NOT NULL,
  staff int(10) NOT NULL,
  date varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
)")or die(mysql_error());

$online = mysql_query("CREATE TABLE " . $dbmast. ".online (
id int(200) NOT NULL auto_increment,
  time int(200) NOT NULL,
  account_id int(250) NOT NULL,
  session varchar(100) NOT NULL,
  site varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
)")or die(mysql_error());

$archive = mysql_query("CREATE TABLE " . $dbslave. "." . $prefix. "_archive (
  id int(100) NOT NULL auto_increment,
  value varchar(1000) NOT NULL,
  PRIMARY KEY  (`id`)
)")or die(mysql_error());

?>
<table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
   <form method="POST" action="install.php?s=step4" name="post"><tr>
    <td width="100%" colspan="3"><font face="Tahoma" size="2"><b>Step 3 - Site 
    Config</b><br>
    Your database is now fully made, but your site still needs to be configured 
    before it can work. Fill out the form bellow.</font></td>
  </tr>
  <tr>
    <td width="10%"><font face="Tahoma" size="2">Site Name:</font></td>
    <td width="14%"><font face="Tahoma">
         <input type="text" name="name" size="20"></font></td>
    <td width="76%"><i><font face="Tahoma" size="2">The name of your blog</font></i></td>
  </tr>
  <tr>
    <td width="10%"><font face="Tahoma" size="2">Site Url:</font></td>
    <td width="14%"><font face="Tahoma">
         <input type="text" name="url" size="20"></font></td>
    <td width="76%"><i><font face="Tahoma" size="2">The full address of your 
    website, example http://www.mi-dia.co.uk</font></i></td>
  </tr>
  <tr>
    <td width="10%"><font face="Tahoma" size="2">Site Path:</font></td>
    <td width="14%"><font face="Tahoma">
         <input type="text" name="path" size="20"></font></td>
    <td width="76%"><i><font face="Tahoma" size="2">If not installed on your 
    domain directory, set path. Example for http://www.mi-dia.co.uk/blog the 
    path needs to be set to blog.</font></i></td>
  </tr>
  <tr>
    <td width="10%"><font face="Tahoma" size="2">Site Template:</font></td>
    <td width="14%"><font face="Tahoma">
         <input type="text" name="template" size="20" value="default"></font></td>
    <td width="76%"><i><font face="Tahoma" size="2">Leave unchanged unless you 
    are using a different template from the default</font></i></td>
  </tr>
  <tr>
    <td width="100%" colspan="3">
    <p align="center"><input type="submit" value="Submit" name="Submit"></td>
  </tr></form>
</table>
<?php
}else if ( $s == 'step4' ){
require("includes/connect.php");
$sitename = $_POST['name'];
$siteurl = $_POST['url'];
$sitepath = $_POST['path'];
$sitetemplate = $_POST['template'];



$configenter = mysql_query("INSERT INTO " . $dbmast. ".config (id,sitename,siteurl,path,template,welcome)
VALUES ('$dbsiteid','$sitename','$siteurl','$sitepath','$sitetemplate','This message can be changed in the Config Section of the Staff Panel')")or die(mysql_error());

?><table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
   <form method="POST" action="install.php?s=step5" name="post"><tr>
    <td width="100%" colspan="3"><font face="Tahoma" size="2"><b>Step 4 - Admin 
    Account</b><br>
    The site configuration is now complete, now we need to make the Admin 
    Account.</font></td>
  </tr>
  <tr>
    <td width="10%"><font face="Tahoma" size="2">Username:</font></td>
    <td width="14%"><font face="Tahoma">
         <input type="text" name="username" size="20"></font></td>
    <td width="76%"><i><font face="Tahoma" size="2">The username of the Admin 
    Account</font></i></td>
  </tr>
  <tr>
    <td width="10%"><font face="Tahoma" size="2">Email:</font></td>
    <td width="14%"><font face="Tahoma">
         <input type="text" name="email" size="20"></font></td>
    <td width="76%"><i><font face="Tahoma" size="2">The full email address, 
    email is used for logging in.</font></i></td>
  </tr>
  <tr>
    <td width="10%"><font face="Tahoma" size="2">Password:</font></td>
    <td width="14%"><font face="Tahoma">
         <input type="text" name="password" size="20"></font></td>
    <td width="76%"><i><font face="Tahoma" size="2">The password for the account</font></i></td>
  </tr>
  <tr>
    <td width="100%" colspan="3">
    <p align="center"><input type="submit" value="Submit" name="Submit"></td>
  </tr></form>
</table>
<?php
}else if ( $s == 'step5' ){
require("includes/connect.php");
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];

$sysenter = mysql_query("INSERT INTO " . $dbmast. ".accounts (`id`, `name` , `email`) VALUES
(1, 'System','none')")or die(mysql_error());
$userenter = mysql_query("INSERT INTO " . $dbmast. ".accounts ( `name`, `email`, `password`, `level`) VALUES
('$username', '$email', '$password', 1)")or die(mysql_error());


$confdata = mysql_query("INSERT INTO " . $dbslave. ".".$prefix."_confdata (`id`, `name`, `value`) VALUES
(1, 'userreg', '1'),
(2, 'userpost', '0'),
(3, 'siteclosed', '0'),
(4, 'version', '1.0.4'),
(5, 'blocklogin', '0'),
(6, 'blockstats', '0'),
(7, 'blockcats', '0'),
(8, 'blockonline', '0'),
(9, 'blockarchive', '0'),
(10, 'blocklinks', '0'),
(11, 'meta_info', 'Blog powered by Mi-Dia Blog'),
(12, 'meta_keywords', 'Mi-Dia'),
(13, 'rss_info', 'RSS Feed'),
(14, 'rss_status', '1')
")or die(mysql_error());


$defaultcat = mysql_query("INSERT INTO " . $dbslave. ".".$prefix."_cats (`id`, `name`) VALUES
(1, 'Uncategorised')")or die(mysql_error());



$defaultentry = mysql_query("INSERT INTO " . $dbslave. ".".$prefix."_entry (`id`, `author_id`,`snippet`, `title`, `text`, `date`, `tag`, `cat_id`) VALUES
(1, 1, 'Installation Complete', 'Mi-Dia Blog is now installed','If you are viewing this message, then the installation of Mi-Dia Blog is complete. \r\n\r\nEnjoy your new website.', ' 2009/09/04 8:27 pm', 'Install, Blog, Complete', 1)")or die(mysql_error());




?>
<table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="100%"><font face="Tahoma" size="2"><b>Step 5 - Complete</b><br>
    By now your installation should be complete and your site running fine. 
    Remember to delete this installer.</font></td>
  </tr>
</table>
<?


}else{


?>

<table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="100%"><font face="Tahoma" size="2"><b>Step 1 - Config File</b><br>
   This step has been removed from the installer due to some hosts not offering the required php settings.<br>
Please locate the config.php located it ./includes/ and fill out the values.
    If you have already done this then click continue</font><p align="center"><b>
    <font face="Tahoma" size="2">
    <a href="install.php?s=step3" style="text-decoration: none">Continue</a></font></b></td>
  </tr>
</table>



<?php

}


?>

      
      </td>
    </tr>
  </table>
  </center>
</div>

</body>

</html>
