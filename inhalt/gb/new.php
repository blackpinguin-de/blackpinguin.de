﻿<div style="position:relative;left:58px;width:344px;">
<form name="gb-post" action="">

<div>
Ihr anzuzeigender Name:
<br><input name="p_name" type="text" size="40" maxlength="40">
</div>
<br>
<div>
Ihre E-Mail Adresse:
<br><input name="p_email" type="text"  size="40" maxlength="40">&nbsp;<input type="checkbox" name="p_evisible" value="true">anzeigen
</div>
<br>
<div>
Ihr Eintrag
<br>
<!-- <input name="p_text" type="text" maxlength="400"> -->
<textarea name="p_text" rows="4" cols="40" wrap="physical" maxlength="400"></textarea>
</div>
</div>

<br>
<br>
<div style="text-align:right;">
<input type="button" value="Zurück" onclick="javascript:ajaxpost('gb','content');">
<input type="button" value="Senden" 
onclick="javascript:tform=document.forms['gb-post'];if(  isNotEmpty(tform.elements['p_name']) && isEmail(tform.elements['p_email'])  &&
isNotEmpty(tform.elements['p_text'])  ){  ajaxpost('gb&sub=add','content');   }">
</form>
</div>

