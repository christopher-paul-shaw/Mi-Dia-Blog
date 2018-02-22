<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
$author_id = mysql_real_escape_string($_GET['a']);
if ($author_id){
$author = username($author_id);
obslog( "Searched for posts by User ( $author_id )" , "Search" , '0' );
message("Author Search","The following posts have been written by $author");
$sql = "SELECT * FROM ".$dbslave."." . $prefix . "_entry WHERE author_id = '$author_id'";
$relay = "?s=authsearch&amp;a=$author_id";
if(isset($_GET['page'])){$page = $_GET['page'];}else{$page = 1;}
if($page != 1){$start = ($page-1)*5;}else{$start = 0;}
$pagestext = pagnate("$sql","5","$relay");
$postsql = mysql_query("SELECT * FROM ".$dbslave."." . $prefix . "_entry WHERE author_id = '$author_id' ORDER BY id DESC LIMIT $start, 5;") 
or die(mysql_error());
if ( $postsql ){bar("$pagestext");}
while ($row = mysql_fetch_array( $postsql )) {
$listtags = $row['tag'];
$listtags = str_replace(",", " ", "$listtags");
$tags = explode(" ", $listtags);
$newArray=array_unique($tags);
foreach($newArray as $strItem){
$tag = taglink($strItem);
$listtagsout = "$listtagsout $tag";}
if ( $account['level'] > '0' ){$del = '<a href="'.$siteaddress.'?s=list&amp;d='.$row['id'].'"class="normfont">[ Delete ]</a>';}else{ $del = ''; }
$Tem     = "view_entry.tpl";
$Parser = new Parser();
$PA = array("TITLE" => stripslashes(htmlspecialchars($row['title'])),"DATE" => $row['date'],"DELETE" => $del,"SNIPPET" => bb($row['snippet']),"MESSAGE" => view($row['id']),"TAG" => $listtagsout,"RSS" => rss($row['cat_id']),"COM" => comment($row['id']),"AUTHOR" => username($row['author_id']),"CAT" => category($row['cat_id']));
$con = $Parser->ParseTags($Tem, $PA);
print $con;$listtagsout = '';}
if ( $postsql ){bar("$pagestext");}
}else{message("Author Search","No User ID was supplied");}?>