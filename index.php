<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
require("./includes/header.php"); 
require("./includes/display_top.php"); 

$s = htmlspecialchars($_GET['s']);
if ( $s == 'login' && !$accid ){include("./core/login.php");}
else if ( $s == 'logout' && $accid ){include("./core/logout.php");}
else if ( $s == 'list' ){include("./core/home.php");}
else if ( $s == 'cat' ){include("./core/cat.php");}
else if ( $s == 'view' ){include("./core/view.php");}
else if ( $s == 'search' ){include("./core/search.php");}
else if ( $s == 'authsearch' ){include("./core/searchauth.php");}
else if ( $s == 'archive' ){include("./core/archive.php");}
else if ( $s == 'register' && !$accid ){include("./core/register.php");}
else if ( $s == 'lostpassword' && !$accid ){include("./core/lostpassword.php");}
else if ( $s == 'account' && $accid ){include("./core/account.php");}
else{include("./core/home.php");}

require("./includes/display_bottom.php"); 
require("./includes/footer.php"); 
?>