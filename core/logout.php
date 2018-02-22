<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
session_destroy();
obslog( "Logged Out" , "Login" , '0' );
header("Location: $siteaddress");
?>
