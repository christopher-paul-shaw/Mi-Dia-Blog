<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Description" http-equiv="Description" content="{METAINFO}" />
<meta name="Keywords" http-equiv="Keywords" content="{METAKEYWORDS}" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{SITENAME}</title>
<script type="text/JavaScript" src="{URL}template/default/inc/nav.js"></script>
<script type="text/JavaScript" src="{URL}template/default/inc/snippet.js"></script>
<link rel="stylesheet" type="text/css" href="{URL}template/default/inc/style.css" />

</head>
<body>
<div id="global">
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td class="outerbar"><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td><strong>{SITENAME}</strong></td>
        <td><div align="right" class="namefont">{USERNAME}</div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class="navbar"><table border="0" cellspacing="0" cellpadding="0" onmouseover="changeto(event, '#A4C8E6')" onmouseout="changeback(event, '#5A9CD1')">
        <tr>
          <td class="navtab" width="100"><div align="center"><a href="{URL}" class="navfont">Home</a></div></td>
{BEGININ}
          <td class="navtab" width="100"><div align="center"><a href="{URL}?s=account" class="navfont">Account</a></div></td>
          <td class="navtab" width="100"><div align="center"><a href="{URL}?s=logout" class="navfont">Logout</a></div></td>
{ENDIN}
{BEGINOUT}
          <td class="navtab" width="100"><div align="center"><a href="{URL}?s=register" class="navfont">Join</a></div></td>
          <td class="navtab" width="100"><div align="center"><a href="{URL}?s=login" class="navfont">Login</a></div></td>
{ENDOUT}
{BEGINSTAFF}
          <td class="navtab" width="100"><div align="center"><a href="{URL}staff/" class="navfont">staff</a></div></td>
{ENDSTAFF}        
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="29" class="container"><div align="center">
      <table border="0" width="700">
        <tr>
          <td class="bodyline">