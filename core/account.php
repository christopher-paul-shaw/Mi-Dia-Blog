<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
bar("$sitename -> Account");
$accid = $account['id'];
$sname = $account['name'];
$semail = $account['email'];
$spass = $account['password'];
$submitted = $_POST['Submit'];
if ( $submitted ){
$name = safe($_POST['name']);
$email = safe( $_POST['email']);
$emailme = safe( $_POST['emailme']);
$pass = safe($_POST['pass']);
$newpass = safe($_POST['newpass']);
$currentpass = md5($pass);
$newpassword = md5($newpass);
if ( $newpass != '' ){ $psc = $newpassword; } else { $psc = $spass; }
if ( $name && $email && $spass ){
if ( $currentpass == $spass ){
$result = mysql_query("UPDATE ".$dbmast.".accounts SET name='$name', email = '$email', password = '$psc', emailme = '$emailme' WHERE id='$accid'");
if ( $result ){
message('Account Updated','Your account has been updated');
obslog( "Updated Account Details" , "Account" , '0' );}
else{
message('Account Not Updated','Failed to update your account');
obslog( "FAILED Updating Account Details" , "Account" , '0' );} 
}else{
obslog( "Supplied Wrong Password" , "Account" , '0' );
message('Account Not Updated','You supplied the wrong password');}}}else{
if ( $account['emailme'] == '1' ) { $pyes = 'selected'; $pno = '';}else{ $pno = 'selected'; $pyes = '';}
$ParseArray = array("NAME"     => $sname, "EMAIL" => $semail,
"EMAILYES"     => $pyes, "EMAILNO" => $pno);
$Template     = "account.tpl";
$Parser = new Parser();
$pageout = $Parser->ParseTags($Template, $ParseArray);
print $pageout;} 
?>
