<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/


$namea = mysql_real_escape_string(stripslashes($_POST['name']));
$urla = mysql_real_escape_string($_POST['url']);
$templatea = mysql_real_escape_string($_POST['template']);
$patha = mysql_real_escape_string($_POST['path']);
$msga = mysql_real_escape_string(stripslashes($_POST['msg']));
$Submitted = $_POST['Submit']; 
$path = "../template/";
$dir_handle = @opendir($path) or die("Unable to open $path");
$tpl = $config['template'];


while($file = readdir($dir_handle))
		{			
if($file!="index.php" && $file!="." && $file!="..")
{
if ( $file == $tpl ){ $slc='selected';} else { $slc = ''; }
			$tem_box .= '<option '.$slc.' value="' . $file . '">' . $file . '</option>';
}
		}

closedir($dir_handle);


if ( $Submitted ){if ( $namea && $urla && $templatea ){
$result = mysql_query("UPDATE ".$dbmast.".config SET sitename='$namea', welcome='$msga', siteurl = '$urla', template = '$templatea', path = '$patha' WHERE id = '$siteid'");
if ( $result ){message('Updated','The site has been updated');}
else{
echo mysql_error();
message('Could not Update','System failed to update');} 
}else{message('Could not Update','Some of the required fields were missing');}}
else{
$PArray = array(
"SITET"     => $tem_box,
"SITEP"     => $config['path'],
"SITEU"     => $config['siteurl'],
"SITEN"     => $config['sitename'],
"SITEM"     => $config['welcome']);
$Tem     = "staff/config.tpl";
$Parser = new Parser();
$con = $Parser->ParseTags($Tem, $PArray);
print $con;}
 
?>



      