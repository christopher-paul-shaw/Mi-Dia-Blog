<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
bar("$sitename -> Lost Password");
$email = $_POST['email']; 
$email = safe($email);


if ( $email )  
{  
$emsql = mysql_query("SELECT * FROM ".$dbmast.".accounts WHERE email = '$email'");
$emck = mysql_fetch_row($emsql);
if ($emck) {









$npas = rand(1,1000000);
$npassword = md5($npas);




$result = mysql_query("UPDATE ".$dbmast.".accounts SET password = '$npassword' WHERE email = '$email'");
if ( $result )
{

$message = "A request for the password for this account has been made. The new password for this account is $npas . Please log in and change your password.";
email ( $email , 'Your New Password', $message);

obslog( "New Password for $email sent" , "Lost Password" , '0' );



 message('Lost Password','Your New Password has been sent to your email address');
}
else
{

 message('Lost Password','Could not retive your password'); 
obslog( "Could not Generate Password for $email" , "Lost Password" , '0' );
} 
}else{message('Lost Password','Email Not Found');
obslog( "Could not find account for $email" , "Lost Password" , '0' );} 

} 
else
{

$Template     = "lostpassword.tpl";
$Parser = new Parser();
$pageout = $Parser->ParseTags($Template, $ParseArray);
print $pageout;
}
?>


