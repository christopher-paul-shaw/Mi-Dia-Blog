<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/

bar("$sitename -> Register");


if ( confdata(userreg) != '1' )
{
message( "Register Disabled","The Admin or Owner has disabled the Regsiter System");
}
else
{
$name = $_POST['regname']; 
$name = safe($name);
$email = $_POST['regemail']; 
$email = safe($email);
$newpass = rand(10000,99999999999999999999999);
$newpassword = md5($newpass);
$ip=$_SERVER['REMOTE_ADDR']; 
$ip = mysql_real_escape_string($ip);
$submitted = $_POST['Submit'];

if ( $submitted )
{
if ( !$name ){stopa('No First Name Supplied');}
if ( !$email ){stopa('No Email Supplied');}
if ( !$newpass ){stopa('Password Generation Error');}
}


if ( $name && $email && $newpassword && $ip) 
{
$nmsql = mysql_query("SELECT * FROM ".$dbmast.".accounts WHERE name LIKE '$name'"); $nmck = mysql_fetch_row($emsql);
if ($nmck) { stop('System Message','That Name is in use'); die(); }
$emsql = mysql_query("SELECT * FROM ".$dbmast.".accounts WHERE email LIKE '$email'"); $emck = mysql_fetch_row($emsql);
if ($emck) { stop('System Message','That Email Address is in use'); die(); }
if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
    stop('System Message','The email you supplied is invalid');
die();}


$ip=$_SERVER['REMOTE_ADDR']; 
$ipch = mysql_real_escape_string($ip);

$ipsql = mysql_query("SELECT * FROM ".$dbmast.".accounts WHERE ip = '$ip'");
 $ipck = mysql_fetch_row($ipsql);
if ($ipck) { stop('System Message','There is already an account registered to this IP '.$ip.''); die(); }




$result = mysql_query("INSERT INTO ".$dbmast.".accounts (name, email, password, ip , joined) 
VALUES ('$name', '$email' , '$newpassword', '$ip' , '$clock')");
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
if ( $result )
{

$message = "Hello $name,\nThank you for taking the time to register at $sitename ($siteaddress). Please find your password bellow\n\nPassword: $newpass\n\nPlease log into your account and change your password";


email ( $email , 'Your New Account', $message);
obslog( "$name ( $email ) Registered" , "Register" , '0' );



message('Registered','Your New Password has been sent to your email address'); 
}





}
else
{



$Template     = "register.tpl";
$Parser = new Parser();
$pageout = $Parser->ParseTags($Template, $ParseArray);
print $pageout;

}
}
 
?>







