<? header('Content-type: text/xml');
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
require("includes/connect.php");
require("includes/bbcode.php");
require("includes/function-blog.php");

$configsql = mysql_query("SELECT siteurl , sitename, path FROM ".$dbmast.".config WHERE id = '$dbsiteid'")or die(mysql_error());
$config = mysql_fetch_array($configsql);
$su = $config['siteurl'];
$confpath = $config['path'];
if ( $confpath ){$siteurl = "$su/$confpath";}else{$siteurl = "$su";}
$sitename = $config['sitename'];
$desc = bb($config['welcome']);
$c = htmlspecialchars($_GET['c']);
if ( $c ){$atom = "$siteurl/rss.php?c=$c";}else{$atom = "$siteurl/rss.php";}
 ?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="<?=$atom;?>" rel="self" type="application/rss+xml" />
<title><?=$sitename;?></title>
<description><?=confdata(rss_info);?>. Powered by Mi-Dia Blog v<?=confdata(version);?> :: http://www.mi-dia.co.uk</description>
<link><?=$siteurl;?></link>
<copyright>This content may be under copyright of <?=$sitename;?><?=$siteurl;?></copyright>

<?


if ( $c ){$q = "SELECT * FROM ".$dbslave."." . $prefix . "_entry  WHERE cat_id = '$c' ORDER BY id DESC LIMIT 15";}
else{$q = "SELECT * FROM ".$dbslave."." . $prefix . "_entry  ORDER BY id DESC LIMIT 15";}
$doGet=mysql_query($q);

if ( confdata(rss_status) == '1')
{
while($result = mysql_fetch_array($doGet)){
?>
     <item>
        <title> <?=htmlentities(strip_tags($result['title'])); ?></title>
        <description> <?=htmlentities(strip_tags(bb($result['snippet']),'ENT_QUOTES'));?></description>
         <link><?=$siteurl;?>/?s=view&amp;v=<?=$result['id'];?></link>
         <guid><?=$siteurl;?>/?s=view&amp;v=<?=$result['id'];?></guid>
        <pubDate> <?=$result['date'];?></pubDate>

     </item>  
<? }}else{ ?>  
    <item>
        <title>RSS Feed Disabled</title>
        <description>This RSS Feed has been disabled by the Blog Administrator</description>
         <link><?=$siteurl;?></link>
         <guid><?=$siteurl;?></guid>
        <pubDate> <?=date("RSS_DATE");?></pubDate>

     </item>
<? } ?>  

</channel>
</rss>
