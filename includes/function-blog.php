<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
function taglink( $tag )
{global $siteaddress;
$tag = str_replace(" ", "", "$tag");
$tlink = '<a href="'.$siteaddress.'/?s=search&amp;tags='.$tag.'" class="normfont">'.$tag.' </a>';
return $tlink;}

function category( $id )
{global $siteaddress, $dbslave,$prefix;
$sql = mysql_query("SELECT name FROM ".$dbslave.".".$prefix."_cats WHERE id = '$id'");
$cat = mysql_fetch_array($sql);

$ck = '<a href="'.$siteaddress.'?s=cat&amp;c='.$id.'" class="normfont">'.$cat['name'].' </a>';
return $ck;}

function comment( $id )
{global $siteaddress, $dbslave,$prefix;
$csql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_comment WHERE post = '$id'");
$cnum=mysql_num_rows($csql);
$com = '<a href="'.$siteaddress.'?s=view&amp;v='.$id.'" class="normfont">'.$cnum.'</a>';
return $com;}

function rss( $id )
{global $siteaddress;
$rss = '<a href="'.$siteaddress.'rss.php?c='.$id.'"><img alt=""
src="'.$siteaddress.'/images/feed.png" border="0" /></a>';
return $rss;}

function view( $id )
{global $siteaddress;

$com = '<a href="'.$siteaddress.'?s=view&amp;v='.$id.'" class="normfont">View Full Entry</a>';
return $com;}

function confdata( $id )
{global $siteaddress, $dbslave,$prefix;
$sql = mysql_query("SELECT value FROM ".$dbslave.".".$prefix."_confdata WHERE name = '$id'");
$cat = mysql_fetch_array($sql);
return $cat['value'];}
?>