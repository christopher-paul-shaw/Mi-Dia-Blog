<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
function bb ($str) {
global $siteaddress;
        $str = htmlspecialchars($str);

        $simple_search = array(
                                '/\[b\](.*?)\[\/b\]/is',                                
                                '/\[i\](.*?)\[\/i\]/is',                                
                                '/\[u\](.*?)\[\/u\]/is',
                                '/\[img\](.*?)\[\/img\]/is',
				'/\[line\]/is',
				'#\[url=(.*?)\](.*?)\[/url\]#i', 
				'#\[size=([1-9]|1[0-9]|20)\](.*?)\[/size\]#is', 
				'#\[color=\#?([A-F0-9]{3}|[A-F0-9]{6})\](.*?)\[/color\]#is', 
				'#\n#si'
                                );
        $simple_replace = array(
                                '<strong>$1</strong>',
                                '<em>$1</em>',
                                '<u>$1</u>',
				'<img src="$1" border="0" alt="" />',	
				'<hr>',
				'<a href="$1" target="_blank">$2</a>',
				'<span style="font-size: $1px;">$2</span>',
				'<span style="color: #$1;">$2</span>',
				'<br />'
				);
$str = preg_replace ($simple_search, $simple_replace, $str);
$str = stripslashes($str);
        return $str; 
}






?>
