<?php
/***********************
Name: Mi-Dia Blog
Version: v1.0.1 ( September 2009 )
Author: Christopher Shaw

This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. 
************************/
require("../includes/header.php"); 
require("../includes/display_top.php"); 

$s = htmlspecialchars($_GET['s']);
if ( $account['level'] == '1'){
$Template     = "staff/nav.tpl";$Parser = new Parser();
$content = $Parser->ParseTags($Template, $ParseArray);print $content;
if ( $s == 'config' ){include("./core/config.php"); }
else if ( $s == 'account' ){include("./core/account.php"); }
else if ( $s == 'cats' ){include("./core/cats.php"); }
else if ( $s == 'rssinput' ){include("./core/rssin.php"); }
else if ( $s == 'settings' ){include("./core/settings.php"); }
else if ( $s == 'links' ){include("./core/links.php"); }
else{include("./core/home.php"); }
}else{message("Permission Denied","You do not have permission to access this feature");}

require("../includes/display_bottom.php"); 
require("../includes/footer.php"); 
?>