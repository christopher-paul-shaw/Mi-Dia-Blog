</td>
              <td width="24%" valign="top">
                <form action="./" method="post"><table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td class="menubox"><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td class="boxtop"><font class="navfont">Search</font></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td> <table width="100%" border="0" cellspacing="0" cellpadding="2">
             <tr>
                <td><div align="center">
                  <input type="text" name="searchtag" id="searchtag" class="formcss" />
                </div></td>
              </tr>
              <tr>
                <td><div align="center"><input name="Submit" type="submit" value="Search" class="formcss" /></div></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    
    </td>
      </tr>
    </table></form>
    
    {BEGINLOGIN}<form action="?s=login" method="post"><table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td class="menubox"><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td class="boxtop"><font class="navfont">Login</font></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td> <table width="100%" border="0" cellspacing="0" cellpadding="2">
             <tr>
                <td width="1%">
        
                 <font class="normfont">Email:</font>
         
      </td>
                <td width="99%"><input type="text" name="email" id="email" class="formcss" /></td>
              </tr>
             <tr>
               <td><font class="normfont">Pass:</font></td>
               <td><input type="password" name="pass" id="pass" class="formcss" /></td>
             </tr>
             <tr>
               <td colspan="2"><div align="center">
                 <input name="Submit2" type="submit" value="Login" class="formcss" />
               </div></td>
             </tr>
             <tr>
               <td colspan="2"><div align="center">  <a class="normfont" href="{URL}?s=register">Join</a> 
  <font class="normfont">l </font>
  <a class="normfont" href="{URL}?s=lostpassword">Lost Password</a></div></td>
             </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    
    </td>
      </tr>
    </table></form>{ENDLOGIN}
    
    
    
    {BEGINCATS}<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td class="menubox"><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td class="boxtop"><font class="navfont">Categories</font></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td> <table width="100%" border="0" cellspacing="0" cellpadding="2">
             <tr>
                <td>{CATS}</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    
    </td>
      </tr>
    </table>{ENDCATS}
    
{BEGINARCH}<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td class="menubox"><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td class="boxtop"><font class="navfont">Archive</font></td>
           

              </tr>
            </table></td>
          </tr>
          <tr>
            <td> <table width="100%" border="0" cellspacing="0" cellpadding="2">
             <tr>
                <td>{ARCH}</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    
    </td>
    </tr>
    </table>{ENDARCH}
    {BEGINSTATS}<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td class="menubox"><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td class="boxtop"><font class="navfont">Stats</font></td>
           

              </tr>
            </table></td>
          </tr>
          <tr>
            <td> <table width="100%" border="0" cellspacing="0" cellpadding="2">
             <tr>
                <td><font class="normfont"><b>Users:</b> {USERS}<br />
<b>Entries:</b> {ENTRIES}<br />
<b>Comments:</b> {COMMENTS}</font>
</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    
    </td>
      </tr>
    </table>{ENDSTATS}
    {BEGINONLINE}<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td class="menubox"><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td class="boxtop"><font class="navfont">Online</font></td>
           

              </tr>
            </table></td>
          </tr>
          <tr>
            <td> <table width="100%" border="0" cellspacing="0" cellpadding="2">
             <tr>
                <td><font class="normfont"><b>Users:</b> {USERCOUNT}<br />
<b>Guests:</b> {GUESTCOUNT}</font></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    
    </td>
      </tr>
    </table>{ENDONLINE}
    {BEGINLINKS}
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td class="menubox"><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td class="boxtop"><font class="navfont">Links</font></td>
           

              </tr>
            </table></td>
          </tr>
          <tr>
            <td> <table width="100%" border="0" cellspacing="0" cellpadding="2">
             <tr>
                <td>{LINKS}</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    
    </td>
      </tr>
    </table>
    {ENDLINKS}
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td class="menubox"><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td class="boxtop"><font class="navfont">Notice</font></td>
           

              </tr>
            </table></td>
          </tr>
          <tr>
            <td> <table width="100%" border="0" cellspacing="0" cellpadding="2">
             <tr>
                <td><div align="center">
    <a href="http://validator.w3.org/check?uri=referer"><img
        src="http://www.w3.org/Icons/valid-xhtml10"
        alt="Valid XHTML 1.0 Transitional" height="31" width="88" border="0" /></a>
 
</div></td>
              </tr>
             <tr>
               <td><div align="center">
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />
    </a>
</div>
</td>
             </tr>
             <tr>
               <td><div align="center"><a href="http://validator.w3.org/feed/check.cgi?url=http%3A//www.mi-dia.co.uk/testblog/rss.php"><img src="http://validator.w3.org/feed/images/valid-rss.png" alt="[Valid RSS]" title="Validate my RSS feed" border="0"/></a></div></td>
             </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    
    </td>
      </tr>
    </table>
    
</td>
  </tr>
</table>
