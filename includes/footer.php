<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
$ParseArray = array("URL"     => $siteaddress , "VERSION" => confdata(version));

$Template     = "footer.tpl";
$Parser = new Parser();
$ht = $Parser->ParseTags($Template, $ParseArray);
print $ht;
?>
