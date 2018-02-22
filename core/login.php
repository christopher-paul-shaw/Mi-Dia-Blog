<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
bar("$sitename -> Login");
$referrer=$HTTP_SERVER_VARS['HTTP_REFERER'];
$email = $_POST['email']; 
$ref = $_POST['ref']; 
$ref = safe($ref);
$email = safe($email);
$pass = $_POST['pass']; 
$pass = safe($pass);

$cpass = md5($pass);
if ( $email )  
{  
   
  $login = mysql_query("SELECT * FROM ".$dbmast.".`accounts` WHERE `email` = '$email' AND `password` = '$cpass'"); //selects info from our table if the row has the same user and pass that our form does
  if(!mysql_num_rows($login)) //if the username and pass are wrong
  {
    stopa("The Login details you gave were incorrect");
  }
  else
  {

session_register('email');
$_SESSION['email'] = "$email";
$lpip = rand(500,20000);
session_register('lpip');
$_SESSION['lpip'] = "$lpip";


$pipu = mysql_query("UPDATE ".$dbmast.".`accounts` SET lpip = '$lpip' WHERE `email` = '$email' AND `password` = '$cpass'");
if (!$pipu) {die('Invalid query: ' . mysql_error());}
obslog( "$email logged in" , "Login" , '0' );
header("Location: $referrer");

  }


}

$Template     = "login.tpl";
$Parser = new Parser();
$pageout = $Parser->ParseTags($Template, $ParseArray);
print $pageout;
 
?>

