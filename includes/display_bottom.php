<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
$catsql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_cats ORDER BY name ") or die(mysql_error());$listcats = '';
while( $row = mysql_fetch_array( $catsql )){
$cid = $row['id'];$csql = mysql_query("SELECT id FROM ".$dbmast.".".$prefix."_entry WHERE cat_id = '$cid'");$cnum=mysql_num_rows($csql);
$cat = category($cid);
$listcats = ''.$listcats.''. $cat.'<font class="normfont">('.$cnum.') </font><a href="'.$siteaddress.'rss.php?c='.$cid.'" class="normfont">[RSS]</a><br />';}
$linksql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_links ORDER BY name ") or die(mysql_error());
$listlinks = '';
while( $row = mysql_fetch_array( $linksql )){$listlinks = ''.$listlinks.'<a href="'.$row['url'].'" class="normfont" target="_blank">'.$row['name'].'</a><br />';}
$archsql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_archive ORDER BY id DESC LIMIT 12 ") or die(mysql_error());$listarch = "";
while( $rowa = mysql_fetch_array( $archsql )){
$value = $rowa['value'];$arsql = mysql_query("SELECT id FROM ".$dbmast.".".$prefix."_entry WHERE archive = '$value'");$arnum=mysql_num_rows($arsql);
if ( $listarch != '') {$br='<br />';}
$arch = '<a href="?s=archive&amp;l='.$rowa['id'].'" class="normfont">'.$rowa['value'].'</a><font class="normfont"> ('.$arnum.')</font><br />';
$listarch = "$listarch $arch";}
$csql = mysql_query("SELECT id FROM ".$dbslave."." . $prefix . "_comment");$cnum=mysql_num_rows($csql);
$psql = mysql_query("SELECT id FROM ".$dbslave."." . $prefix . "_entry");$pnum=mysql_num_rows($psql);
$asql = mysql_query("SELECT id FROM ".$dbmast.".accounts");$anum=mysql_num_rows($asql);
$usql = mysql_query("SELECT id FROM ".$dbmast.".online WHERE account_id != '0'");$unum=mysql_num_rows($usql);
$gsql = mysql_query("SELECT id FROM ".$dbmast.".online WHERE account_id = '0'");$gnum=mysql_num_rows($gsql);
if ( confdata(blocklogin) == 1 ){ $beginlogin = "<!--"; $endlogin = "-->";}else{ if ( !$account['id'] ){$beginlogin=''; $endlogin='';}else{$beginlogin = "<!--"; $endlogin = "-->";}}
if ( confdata(blockstats) == 1 ){ $beginstats = "<!--"; $endstats = "-->";}else{ $beginstats=''; $endstats='';}
if ( confdata(blockonline) == 1 ){ $beginonline = "<!--"; $endonline = "-->";}else{ $beginonline=''; $endonline='';}
if ( confdata(blockcats) == 1 ){ $begincats = "<!--"; $endcats = "-->";}else{ $begincats=''; $endcats='';}
if ( confdata(blockarchive) == 1 ){ $beginarch= "<!--"; $endarch = "-->";}else{ $beginarch=''; $endarch='';}
if ( confdata(blocklinks) == 1 ){ $beginlinks= "<!--"; $endlinks = "-->";}else{ $beginlinks=''; $endalinks='';}
$PA = array("CATS"     => $listcats,"ARCH" => $listarch, "BEGINLINKS" => $beginlinks, "ENDLINKS" => $endlinks, "BEGINOUT" => $beginout, "ENDOUT" => $endout, "URL" => $siteaddress, "COMMENTS" => $cnum, "ENTRIES" => $pnum, "USERS" => $anum, "USERCOUNT" => $unum,"GUESTCOUNT" => $gnum, "BEGINSTATS" => $beginstats,"ENDSTATS" => $endstats, "BEGINLOGIN" => $beginlogin,"ENDLOGIN" => $endlogin,"BEGINONLINE" => $beginonline,"ENDONLINE" => $endonline,"BEGINCATS" => $begincats,"ENDCATS" => $endcats,"BEGINARCH" => $beginarch,"ENDARCH" => $endarch, "LINKS" => $listlinks);
$Tem = "display_bottom.tpl";$Parser = new Parser();$con = $Parser->ParseTags($Tem, $PA);print $con;
?>