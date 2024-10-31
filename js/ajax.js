var loading = false;

var loadingtext = "<span style='font-size:16pt;'>Seite wird geladen ...</span><span style='font-size:8pt;'><br><br>Diese Seite ist f&uuml;r ";
loadingtext += "<a href='https://mozilla.org/firefox/' target='_blank' rel='noopener'>Mozilla Firefox</a> konzipiert.";
loadingtext += "<br>Sollten bei Ihnen unter einem anderem Browser Probleme auftreten, haben Sie Pech.";
loadingtext += "<br>Bei Problemen mit Mozilla Firefox schreiben Sie mir bitte eine eMail.<br><br><a href='imp.html' target='_blank' rel='noopener'>Impressum</a></span>";

function callback(data, serverStatus, url, container){
var cont = document.getElementById(container);
loading=false;
if(serverStatus==200){
	cont.style.cursor = "auto";
	cont.innerHTML = data;
	if(url.substring(0,9)=="pic&sub=1"){
		ajaxget('pic&sub=2'+url.substring(9,url.length),'content-ext');
	}
	if(url.substring(0,9)=="pic&sub=2"){
		eval(document.getElementById('content-ext').innerHTML);
	}
	if(url=="mp3"){
		loadfile();
	}
	var scs = cont.querySelectorAll("script");
	for(var i=0; i<scs.length; i++){
		eval(scs[i].innerHTML);
	}
}
else {
	cont.innerHTML = "Error: req state != 200";
	cont.style.cursor = "auto";
}
}


var dl_files = {
   1: '/dl/beep-exe.rar',
   2: '/dl/beepG15-exe.rar',
   3: '/dl/chat-client-exe.rar',
   4: '/dl/chat-server-exe.rar',
   5: '/dl/geo-exe.rar',
   6: '/dl/netsend-exe.rar',
   7: '/dl/bdsp-v1.1.0.rar',
   8: '/dl/bdsp-v1.2.1.rar',
   9: '/dl/bdsp-v1.0.0.rar',
  10: '/dl/bdsp-v1.5.0.rar',
  11: '/dl/bdsp-v1.4.0.rar',
  12: '/dl/bdsp-v1.3.2.rar',
  13: '/dl/bdsp-v1.3.0.rar',
  14: '/dl/Zielsetzung.pdf',
  15: 'https://github.com/Istador/Mau-Dau-Mau/releases/download/v0.0.8/mdm-v0.00.008.0292.rar',
  16: 'https://github.com/Istador/Mau-Dau-Mau/releases/download/v0.2.16/mdm-v0.02.016.0771.rar',
  17: 'https://github.com/Istador/Mau-Dau-Mau/releases/download/v0.3.28/mdm-v0.03.028.0980.rar',
  18: 'https://github.com/Istador/Mau-Dau-Mau/releases/download/v0.4.36/mdm-v0.04.036.2123.rar',
  19: 'https://github.com/Istador/Mau-Dau-Mau/releases/download/v0.6.42/mdm-v0.06.042.2529.rar',
  20: 'https://github.com/Istador/Mau-Dau-Mau/releases/download/v0.14.74/mdm-v0.14.074.3107.rar',
  21: 'https://github.com/Istador/Mau-Dau-Mau/releases/download/v0.14.77/mdm-v0.14.077.3171.rar',
  22: 'https://github.com/Istador/Mau-Dau-Mau/releases/download/v0.15.83/mdm-v0.15.083.3371.rar',
  23: 'https://github.com/Istador/Mau-Dau-Mau/releases/download/v0.16.89/mdm-v0.16.089.3462.rar',
  24: 'https://github.com/Istador/Mau-Dau-Mau/releases/download/v0.17.96/mdm-v0.17.096.3707.rar',
  25: 'https://github.com/Istador/Mau-Dau-Mau/releases/download/v1.17.97/mdm-v1.17.097.3737.rar',
  26: '/dl/Handbuch.pdf',
  27: '/dl/Dokumentation.pdf',
  28: 'https://github.com/Istador/Mau-Dau-Mau/releases/download/v1.19.105/mdm-v1.19.105.3808.rar',
}


function ajaxget(url, container, keepQuery) 
{
var type = 'content';
// downloads
if(/^dl&sub=3&id=/.test(url)) {
  var id = Number(url.substr(12));
  if (id in dl_files) {
    var url = dl_files[id];
    if (url.substr(0, 1) == '/') {
      url = window.location.href.substr(0, window.location.href.lastIndexOf('/')) + url;
    }
    window.open(url);
    return;
  }
}
// pics
if(/^pic&sub=(1|2)&kategorie=/.test(url)) {
  type = 'pics';
}

if(!loading)
	{
	var AJAX = null;
	if (window.XMLHttpRequest)
		{
		AJAX=new XMLHttpRequest();
		}
	else
		{
		AJAX=new ActiveXObject("Microsoft.XMLHTTP");
		}
	if (AJAX==null)
		{
		document.getElementById(container).innerHTML = "Dein Browser unterstützt kein Ajax.";
		}
	else
		{
		loading=true;
		framelogin.currentpage.value=url;
		document.getElementById(container).innerHTML = loadingtext;
		document.getElementById(container).style.cursor = "wait";

		AJAX.onreadystatechange = function()
			{
			if (AJAX.readyState==4 || AJAX.readyState=="complete") {callback(AJAX.responseText, AJAX.status, url, container);}
			}
		AJAX.open("GET", "./inhalt/" + type + "/"+url+".html", true);
		AJAX.setRequestHeader("If-Modified-Since", "Sat, 1 Jan 2000 00:00:00 GMT");
		AJAX.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		AJAX.send(null);
		if (!keepQuery && window.location.search)
			{
			window.history.replaceState(window.history.state, null, window.location.href.replace(/\?.*$/, ''));
			}
		}
	}
else
	{
	window.setTimeout("ajaxget('"+url+"','"+container+"',"+keepQuery+")",50);
	}
}











function ajaxpost(url,container) 
{
alert('Fehler: Keine Interaktion möglich! Dies ist ein Backup der eigentlichen Seite.');
return;
if(!loading)
	{
	var AJAX = null;
	if (window.XMLHttpRequest)
		{
		AJAX=new XMLHttpRequest();
		}
	else
		{
		AJAX=new ActiveXObject("Microsoft.XMLHTTP");
		}
	if (AJAX==null)
		{
		document.getElementById(container).innerHTML = "Dein Browser unterstützt kein Ajax.";
		}
	else
		{
		loading=true;

		alleInputs=document.getElementsByTagName('input');
		param='';
		for(var i=0; i < alleInputs.length; i++)
			{
			param=param + alleInputs[i].name + '=' + escape(alleInputs[i].value);
			if( i < ( alleInputs.length -1 ) )
				{
				param = param + '&';
				}
			}
		alleInputs2=document.getElementsByTagName('textarea');
		if (alleInputs.length>0 && alleInputs2.length>0)
			{
			param=param+'&'
			}	
		for(var i=0; i < alleInputs2.length; i++)
			{
			param=param + alleInputs2[i].name + '=' + escape(alleInputs2[i].value);
			if( i < ( alleInputs2.length -1 ) )
				{
				param = param + '&';
				}
			}
		
		document.getElementById(container).innerHTML = loadingtext;
		document.getElementById(container).style.cursor = "wait";

		AJAX.open("POST","include.php?s="+url,true);
		AJAX.setRequestHeader("If-Modified-Since", "Sat, 1 Jan 2000 00:00:00 GMT");
		AJAX.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		AJAX.setRequestHeader("Content-length", param.length);
		AJAX.setRequestHeader("Connection", "close");
		
		AJAX.onreadystatechange = function()
			{
			if (AJAX.readyState==4 || AJAX.readyState=="complete") {callback(AJAX.responseText, AJAX.status, url, container);}
			}		

		AJAX.send(param);
		}
	}
else
	{
	window.setTimeout("ajaxpost('"+url+"','"+container+"')",50);
	}
}



function firstload(sub) {
  const query = new URLSearchParams(window.location.search);
  var s = sub || query.get('s');
  if (!s) {
    ajaxget("home","content");
    selected = document.getElementById("a0");
    selected.style.backgroundImage = "url(./img/ban2_mouseout.png)";
  } else {
    var a = query.get('a');
    var b = query.get('b');
    ajaxget(s + (a ? '&sub=' + a : '') + (b ? '&id=' + b : ''),"content", true);
    selected = document.getElementById(bannerIds[s]);
    if (selected) { selected.style.backgroundImage = "url(./img/ban2_mouseout.png)"; }
  }
}

