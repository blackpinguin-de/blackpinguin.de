var key_list = new Array(
new Array("S",""),
new Array("D",""),
new Array("B",""),
new Array("M",""),
new Array("W",""),
new Array("C",""),
new Array("I","")
);




document.onkeypress=keyevent;
function keyevent(e)
	{
	var c;
	var target;
	var altKey;
	var ctrlKey;
	if (window.event != null)
		{
		c=String.fromCharCode(window.event.keyCode).toUpperCase(); 
		altKey=window.event.altKey;
		ctrlKey=window.event.ctrlKey;
		}
	else
		{
		c=String.fromCharCode(e.charCode).toUpperCase();
		altKey=e.altKey;
		ctrlKey=e.ctrlKey;
		}
	if (window.event != null)
		{
		target=window.event.srcElement;
		}
	else
		{
		target=e.originalTarget;
		}
	if (target.nodeName.toUpperCase()=='INPUT' || target.nodeName.toUpperCase()=='TEXTAREA' || altKey || ctrlKey)
		{
		}
	else
		{
		if (c == 'I') { window.location='index.html'; return false; }
		if (c == 'B') { window.location='beta'; return false; }
		if (c == 'S') { window.location='shop'; return false; }
		}
	}