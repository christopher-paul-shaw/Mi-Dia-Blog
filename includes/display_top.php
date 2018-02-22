<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
$PA = array("URL"     => $siteaddress);
$Tem = "display_top.tpl";$Parser = new Parser();$con = $Parser->ParseTags($Tem,$PA);print $con;
?>