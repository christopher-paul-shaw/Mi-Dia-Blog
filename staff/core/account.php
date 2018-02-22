<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/

if(isset($HTTP_POST_VARS['user']))
{
$user = (isset($_POST['user'])) ? $_POST['user'] : ''; 
header ("Location: ?s=account&a=$user"); 
}


	$a = ( isset($HTTP_GET_VARS['a']) ) ? $HTTP_GET_VARS['a'] : $HTTP_POST_VARS['a'];
	$a = htmlspecialchars($a);

if ( $a )
{


$pullaccsql = mysql_query("SELECT * FROM ".$dbmast.".accounts WHERE id = '$a'");
$eaccount = mysql_fetch_array($pullaccsql);
$elv = $eaccount['level'];




/// New Info
$name = $_POST['regname']; 
$name = mysql_real_escape_string($name);
$sfrozen= $_POST['sfrozen']; 
$sfrozen= mysql_real_escape_string($sfrozen);
$email = $_POST['regemail']; 
$email = mysql_real_escape_string($email);
$notes = $_POST['notes']; 
$notes = mysql_real_escape_string($notes);
$newpass = $_POST['regpass']; 
$newpass = mysql_real_escape_string($newpass);
$newlevel = $_POST['reglevel']; 
$newlevel = mysql_real_escape_string($newlevel);
$newpassword = md5($newpass);
$spass = $eaccount['password'];
if ( $newpass != '' ){ $psc = $newpassword; } else { $psc = $spass; }
$submitted = $_POST['Submit'];






if ( $submitted )
{



if ( $name && $email ) 
{

/// Name Check
$nmsql = mysql_query("SELECT * FROM ".$dbmast.".accounts WHERE name LIKE '$name'"); $nmck = mysql_fetch_row($emsql);
if ($nmck) { stop('System Message','That Name is in use'); die(); }


/// Email Exist Check
$emsql = mysql_query("SELECT * FROM ".$dbmast.".accounts WHERE email LIKE '$email' AND id != '$a'"); $emck = mysql_fetch_row($emsql);
if ($emck) { stop('System Message','That Email Address is in use'); die(); }

/// Email Format Check
if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
    stop('System Message','The email you supplied is invalid');
die();}

$result = mysql_query("UPDATE ".$dbmast.".accounts SET name = '$name', email = '$email', level = '$newlevel', password = '$psc' , frozen = '$sfrozen', notes = '$notes' WHERE id = '$a'");

if ( $result )
{
    message('System Message','The Account has been updated');
}





}


}
else
{







$userlv = $eaccount['level'];
if ( $userlv == 2 ){ $lad = 'selected'; } else if ( $userlv == 1 ){ $lsf = 'selected'; }else{$lus = 'selected';}
if ( $eaccount['frozen'] == 1 ){ $frozen = 'selected'; }else{$active = 'selected';}




$ParseArray = array(
"ACCOUNTID"     => $eaccount['id'], 
"NOTES"     => $eaccount['notes'], 
"ACCOUNTNAME"     => $eaccount['name'], 
"ACCOUNTEMAIL" => $eaccount['email'],
"ACCOUNTIP" => $eaccount['ip'],
"FROZEN" => $frozen,
"ACTIVE" => $active,
"STAFF" => $lsf,
"USER" => $lus
);

$Template     = "staff/account_edit.tpl";
$Parser = new Parser();
$content = $Parser->ParseTags($Template, $ParseArray);
print $content;

}	
}
else 
	{
$masql = mysql_query("SELECT * FROM ".$dbmast.".accounts");
		$acc_select_box = '<option value="0">Select Account</option>';
		while( $macc = mysql_fetch_object($masql) )
		{
			$acc_name = $macc->name;
			$acc_email = $macc->email;
$acco = "$acc_name ( $acc_email )";
			$acc_id = $macc->id;
			
		;
			$acc_select_box .= '<option value="' . $acc_id . '">' . $acco . '</option>';
		}


$ParseArray = array(
"ACCSELECT"     => $acc_select_box
);

$Template     = "staff/account_select.tpl";
$Parser = new Parser();
$content = $Parser->ParseTags($Template, $ParseArray);
print $content;

	}
?>

















 





