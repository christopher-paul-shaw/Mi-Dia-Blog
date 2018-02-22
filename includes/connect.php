<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
require("config.php");
mysql_connect("$dbhost", "$dbuser", "$dbpassword"); mysql_select_db("$dbmaster");mysql_select_db("$dbslave");
$siteid = "$dbsiteid";$prefix = "$dbprefix";$dbmast = "$dbmaster";$dbslave = "$dbslave"; 
?>