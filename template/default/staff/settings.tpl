<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td class="boxtop"><font class="navfont">Settings</font></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
    
    <form action="" method="post" name="config" target="_self"><table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td colspan="2"><font class="normfont"><strong>Config Settings</strong></font></td>
    </tr>
  <tr>
    <td width="11%"><font class="normfont">Version:</font></td>
    <td width="89%"><input name="version" type="text" class="formcss" id="version" value="{VERSION}" size="40" maxlength="40" readonly="readonly" /></td>
  </tr>
   <tr>
    <td colspan="2"><font class="normfont"><strong>Meta Settings</strong></font></td>
    </tr>
   <tr>
    <td width="11%"><font class="normfont">Description:</font></td>
    <td width="89%"><input name="metainfo" type="text" class="formcss" id="metainfo" value="{METAINFO}" size="40" maxlength="40" /></td>
  </tr>
   <tr>
    <td width="11%"><font class="normfont">Keywords:</font></td>
    <td width="89%"><input name="metakeywords" type="text" class="formcss" id="metakeywords" value="{METAKEYWORDS}" size="40" maxlength="40" /></td>
  </tr>
    <tr>
    <td colspan="2"><font class="normfont"><strong>RSS Settings</strong></font></td>
    </tr>
    <tr>
    <td width="11%"><font class="normfont">Status:</font></td>
    <td width="89%"><font class="normfont">
      <select name="rssstatus" class="formcss">
        <option {RSSYES} value="1">Enabled</option>
        <option {RSSNO} value="0">Disabled</option>
      </select>
    </font></td>
  </tr>
   <tr>
    <td width="11%"><font class="normfont">Info:</font></td>
    <td width="89%"><input name="rssinfo" type="text" class="formcss" id="rssinfo" value="{RSSINFO}" size="40" maxlength="40" /></td>
  </tr>
  <tr>
    <td colspan="2"><font class="normfont"><strong>Permission Settings</strong></font></td>
    </tr>
    <tr>
    <td width="11%"><font class="normfont">Registration:</font></td>
    <td width="89%"><font class="normfont">
      <select name="rvalue" class="formcss">
        <option {RYES} value="1">Open</option>
        <option {RNO} value="0">Closed</option>
      </select>
    </font></td>
  </tr>
      <tr>
    <td width="11%"><font class="normfont">Site:</font></td>
    <td width="89%"><font class="normfont">
      <select name="status" class="formcss">
        <option {SYES} value="1">Closed</option>
        <option {SNO} value="0">Open</option>
      </select>
    </font></td>
  </tr>
      <tr>
    <td width="11%"><font class="normfont">Users Post:</font></td>
    <td width="89%"><font class="normfont">
      <select name="pvalue" class="formcss">
        <option {PYES} value="1">Yes</option>
        <option {PNO} value="0">No</option>
      </select>
    </font></td>
  </tr>
      <tr>
        <td colspan="2"><font class="normfont"><strong>Block Settings</strong></font></td>
        </tr>
      <tr>
        <td><font class="normfont">Login:</font></td>
        <td><font class="normfont">
          <select name="login" class="formcss">
            <option {LOGINYES} value="1">Hide</option>
            <option {LOGINNO} value="0">Show</option>
          </select>
        </font></td>
      </tr>
      <tr>
        <td><font class="normfont">Stats:</font></td>
        <td><select name="stats" class="formcss">
          <option {STATSYES} value="1">Hide</option>
          <option {STATSNO} value="0">Show</option>
        </select>
       </td>
      </tr>
      <tr>
        <td><font class="normfont">Online:</font></td>
        <td><font class="normfont">
          <select name="online" class="formcss">
            <option {ONLINEYES} value="1">Hide</option>
            <option {ONLINENO} value="0">Show</option>
          </select>
        </font></td>
      </tr>
      <tr>
        <td><font class="normfont">Archive:</font></td>
        <td><font class="normfont">
        <select name="archive" class="formcss">
          <option {ARCHIVEYES} value="1">Hide</option>
          <option {ARCHIVENO} value="0">Show</option>
        </select>
        </font></td>
      </tr>
      <tr>
        <td><font class="normfont">Categories:</font></td>
        <td><font class="normfont">
          <select name="category" class="formcss">
            <option {CATEGORYYES} value="1">Hide</option>
            <option {CATEGORYNO} value="0">Show</option>
          </select>
        </font></td>
      </tr>
      <tr>
        <td><font class="normfont">Links:</font></td>
        <td><font class="normfont">
          <select name="links" class="formcss">
            <option {LINKSYES} value="1">Hide</option>
            <option {LINKSNO} value="0">Show</option>
          </select>
        </font></td>
      </tr>
  <tr>
    <td colspan="2"><div align="center"><input name="submit" type="submit" class="formcss" value="Update"/></div></td>
  </tr>
</table>
</form>
    
    
    </td>
  </tr>
</table>
