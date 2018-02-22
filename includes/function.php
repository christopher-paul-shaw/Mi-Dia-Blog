<?php
/***********************
Name: Mi-Dia Blog
Author: Christopher Shaw
This file belongs to Mi-Dia Blog, it may be freely modified but this notice, and all copyright marks must be left
intact. See COPYING.txt
************************/
function username( $accountid )
{global $siteaddress, $dbmast;
$usql = mysql_query("SELECT name FROM ".$dbmast.".accounts WHERE id = '$accountid'");
$u = mysql_fetch_array($usql);
$usnm = $u['name'];
$ulink = '<a href="'.$siteaddress.'?s=authsearch&amp;a='.$accountid.'" class="normfont">'.$usnm.'</a>';
return $ulink;}

function PageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function safe( $data )
{
$data = strip_tags($data);
$data = mysql_real_escape_string($data);
return $data;
}

function pagnate( $sql , $amount , $relay )
{

global $page;

$query = mysql_query("$sql");
$num   = mysql_num_rows($query);
$num2 = $num;
$count = 0;
$pagestext = '';
$final = $num / $amount;

if ( $num )
{
$pagestext .= '<a href="'.$relay.'" class="navfont">First | </a>';
while($num2 > 0 ){
$num2-=$amount;
$count++;
$low = $page - 5;
$high = $page + 5;
if ($count > $low &&  $count < $high){$pagestext .= '<a href="'.$relay.'&amp;page='.$count.'" class="navfont">'.$count.' </a>';}
}
$pagestext .= '<a href="'.$relay.'&amp;page='.$count.'" class="navfont">| Last</a>';
}

return $pagestext;

}


function email( $email , $subject ,$message )
{
global $siteaddress,$siteaddress, $dbmast,$sitename;
$usql = mysql_query("SELECT email FROM ".$dbmast.".accounts WHERE id = '1'");
$u = mysql_fetch_array($usql);
$from = $u['email'];
$to      = $email;
$subject = "$subject";
$amessage = "This is an automated email from $sitename .\n---------------------------------\n$message\n---------------------------------\nThe Management\n$siteaddress";
$headers = 'From: '.$from.'' . "\r\n" .
    'Reply-To: '.$from.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $amessage, $headers);}


function obslog( $action , $area , $staff ){
global $account , $clock, $root, $prefix;
$faccid = $account['id'];

$logsql = mysql_query("INSERT INTO ".$dbslave."." . $prefix . "_logs (user_id, action, area, date, staff) 
VALUES ('$faccid', '$action' , '$area', '$clock', '$staff')");
if (!$logsql) {
    die('Invalid query: ' . mysql_error());}
	return;	
}

function message( $title , $message ){
global $root , $template, $siteaddress;
$ParseArray = array(
"TITLE"     => $title,
"MESSAGE" => $message,
"URL" => $siteaddress
);
$Template     = "message.tpl";
$Parser = new Parser();
$content = $Parser->ParseTags($Template, $ParseArray);
print $content;

	return;
}

function bar( $pagetext ){
global $root , $template,$siteaddress;
$ParseArray = array(
"MESSAGE" => $pagetext,
"URL" => $siteaddress
);
$Template     = "minibar.tpl";
$Parser = new Parser();
$content = $Parser->ParseTags($Template, $ParseArray);
print $content;

	return;
}


function stop( $title , $message ){
global $root , $template;
$ParseArray = array(
"TITLE"     => $title,
"MESSAGE" => $message
);
$Template     = "message.tpl";
$Parser = new Parser();
$content = $Parser->ParseTags($Template, $ParseArray);
print $content;
$Template     = "display_bottom.tpl";
$Parser = new Parser();
$content = $Parser->ParseTags($Template, $ParseArray);
print $content;
$Template     = "footer.tpl";
$Parser = new Parser();
$content = $Parser->ParseTags($Template, $ParseArray);
print $content;
die();
	return;
}

function stopa( $message ){
?>
<font class="normfont"><?php echo $message;?></font>
<?php
	return;
}




// NEW
function status( $id )
{global $siteaddress, $dbmast;
$usql = mysql_query("SELECT id FROM ".$dbmast.".online WHERE account_id = '$id'");
$u = mysql_fetch_array($usql);
if ( $u ) { $status = 'Online'; } else { $status = 'Offline'; }
return $status;}


?>