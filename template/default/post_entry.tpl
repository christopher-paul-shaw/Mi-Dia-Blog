<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td class="boxtop"><font class="navfont">Post Entry</font></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
    
    <form action="" method="post" name="post" target="_self"><table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td width="11%"><font class="normfont">Title:</font></td>
    <td width="89%"><input name="title" type="text" class="formcss" size="40" maxlength="40" /></td>
  </tr>
  <tr>
    <td><font class="normfont">Tags:</font></td>
    <td><input name="tags" type="text" class="formcss" size="40" maxlength="40" /></td>
  </tr>
  <tr>
    <td><font class="normfont">Category:</font></td>
    <td><select size="1" name="category" class="formcss">
                                                               {CATS}           
    </select></td>
  </tr>
  <tr>
    <td valign="top"><font class="normfont">Snippet:</font><br />
      <input readonly="readonly" type="text" name="countdown" size="5" value="140" class="formcss"/></td>
    <td><textarea name="snippet" onkeydown="limitText(this.form.snippet,this.form.countdown,140);" 
onkeyup="limitText(this.form.snippet,this.form.countdown,140);" rows="1" cols="20" style="width: 100%; height: 50" class="formcss">
</textarea></td>
  </tr>
  <tr>
    <td colspan="2"><input type="button" value="B" onclick="document.forms['post']. elements['message'].value=document.forms['post']. elements['message'].value+'[b][/b]'" class="formcss" />
      <input type="button" value="i" onclick="document.forms['post']. elements['message'].value=document.forms['post']. elements['message'].value+'[i][/i]'" class="formcss" />
      <input type="button" value="U" onclick="document.forms['post']. elements['message'].value=document.forms['post']. elements['message'].value+'[u][/u]'"  class="formcss"/>
      <input type="button" value="Size" onclick="document.forms['post']. elements['message'].value=document.forms['post']. elements['message'].value+'[size=8][/size]'" class="formcss" />
      <input type="button" value="Color" onclick="document.forms['post']. elements['message'].value=document.forms['post']. elements['message'].value+'[color=000000][/color]'" class="formcss" />
      <input type="button" value="WWW" onclick="document.forms['post']. elements['message'].value=document.forms['post']. elements['message'].value+'[url=http://link here]Text Here[/url]'" class="formcss" />
      <input type="button" value="Img" onclick="document.forms['post']. elements['message'].value=document.forms['post']. elements['message'].value+'[img]Text Here[/img]'" class="formcss" /></td>
    </tr>
  <tr>
    <td colspan="2"><textarea name="message" id="message" rows="10" cols="40" style="width: 100%; height: 50" class="formcss"></textarea></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><input name="Submit" type="submit" value="Post" /></div></td>
  </tr>
    </table>
</form>
    
    
    </td>
  </tr>
</table>
