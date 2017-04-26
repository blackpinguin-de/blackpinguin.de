
<form name="form-register" method="post" action="">


<div class="style-dunkel" style="text-align:right;float:left;width:150px;height:24px;line-height:24px;">Account Name:&nbsp;</div>
<div style="text-align:center;width:300px;height:24px;line-height:24px;" class="style-hell"><input type="text" name="register-name" style="height:24px;width:150px;"></div>
<div style="height:3px;"></div>
<div class="style-dunkel" style="text-align:right;float:left;width:150px;height:24px;line-height:24px;">Passwort:&nbsp;</div>
<div style="text-align:center;width:300px;height:24px;line-height:24px;" class="style-hell"><input type="password" name="register-passwd" style="height:24px;width:150px;"></div>
<div style="height:3px;"></div>
<div class="style-dunkel" style="text-align:right;float:left;width:150px;height:24px;line-height:24px;">E-Mail:&nbsp;</div>
<div style="text-align:center;width:300px;height:24px;line-height:24px;" class="style-hell"><input type="text" name="register-email" style="height:24px;width:150px;"></div>
<div style="height:3px;"></div>
<div 
style="position:absolute;left:170px;width:150px;text-align:center;"><input 
type="reset" value="clear" style="width:75px;"><input type="submit" 
value="register" style="width:75px;" onClick="return isNotEmpty(document.forms['form-register'].elements['register-name']) && 
isStrongPW(document.forms['form-register'].elements['register-passwd']) && 
isEmail(document.forms['form-register'].elements['register-email']);"></div>
</form>
<div style="height:1px;"></div>
