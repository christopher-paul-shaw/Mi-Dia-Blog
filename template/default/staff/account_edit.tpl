<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td class="boxtop"><font class="navfont">Account Edit</font></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
    
    <form action="" method="post" name="config" target="_self"><table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td width="11%"><font class="normfont">Name:</font></td>
    <td width="89%"><input name="regname" type="text" class="formcss" id="regname" value="{ACCOUNTNAME}" size="40" maxlength="40" /></td>
  </tr>
   <tr>
    <td width="11%"><font class="normfont">IP:</font></td>
    <td width="89%"><input name="justip" type="text" class="formcss" id="justip" value="{ACCOUNTIP}" size="40" maxlength="40" readonly="readonly" /></td>
  </tr>
   <tr>
    <td width="11%"><font class="normfont">Email:</font></td>
    <td width="89%"><input name="regemail" type="text" class="formcss" id="regemail" value="{ACCOUNTEMAIL}" size="40" maxlength="100" /></td>
  </tr>
   <tr>
    <td width="11%"><font class="normfont">Password:</font></td>
    <td width="89%"><input name="regpass" type="password" class="formcss" id="regpass" size="40" maxlength="40" /></td>
  </tr>
    <tr>
    <td width="11%"><font class="normfont">Level:</font></td>
    <td width="89%"><font class="normfont">
      <select size="1" name="reglevel" class="formcss" >
        <option {USER} value="0">User</option>
        <option {STAFF} value="1">Staff</option>
      </select>
    </font></td>
  </tr>
    <tr>
    <td width="11%"><font class="normfont">Status:</font></td>
    <td width="89%"><font class="normfont">
      <select size="1" name="sfrozen" class="formcss" >
        <option {ACTIVE} value="0">Active</option>
        <option {FROZEN} value="1">Frozen</option>
      </select>
    </font></td>
  </tr>
   <tr>
    <td width="11%"><font class="normfont">Notes:</font></td>
    <td width="89%"><textarea rows="2" name="notes" cols="20" style="width: 100%; height: 100" class="formcss" >{NOTES}</textarea></td>
  </tr>
  
  <tr>
    <td colspan="2"><div align="center"><input name="Submit" type="submit" class="formcss" value="Update"/></div></td>
    </tr>
</table>
</form>
    
    
    </td>
  </tr>
</table>
