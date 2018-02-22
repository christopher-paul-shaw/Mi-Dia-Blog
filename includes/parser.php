<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
class Parser{
function ParseTags($Temp, $ParseTags){
global $account, $tpath, $siteaddress, $config;
$tempname = $config['template'];
$Template = file_get_contents("$siteaddress/template/$tempname/$Temp");
foreach($ParseTags as $UnParsed => $Parsed){$Template = str_replace("{".$UnParsed."}", $Parsed, $Template);}
return $Template;}}  
?> 