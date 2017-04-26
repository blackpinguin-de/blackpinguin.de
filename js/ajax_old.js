//erstellen des requests
var req = null;
var loading = false;

var loadingtext = "<span style='font-size:16pt;'>Seite wird geladen ...</span><span style='font-size:8pt;'><br><br>Diese Seite ist f&uuml;r ";
loadingtext += "<a href='http://www.mozilla-europe.org/' target='_blank'>Mozilla Firefox</a> und <a href='http://www.apple.com/de/safari/' target='_blank'>Apple Safari</a> konzipiert.";
loadingtext += "<br>Sollten bei Ihnen unter einem anderem Browser Probleme auftreten, haben Sie Pech.";
loadingtext += "<br>Bei Problemen mit Mozilla Firefox oder Apple Safari schreiben Sie mir bitte eine eMail.<br><br><a href='inhalt/imp.php' target='_blank'>Impressum</a></span>";



function ajaxget(url,container)
{
if(!loading)
	{
	loading=true;
	delete req;

 	req=newXmlHttpRequest()

	if (req == null)
		{
		alert("Error creating request object!");
		}



	//anfrage erstellen (GET, url ist localhost,
	//request ist asynchron      
	framelogin.currentpage.value=url;

	document.getElementById(container).innerHTML = loadingtext;
	document.getElementById(container).style.cursor = "wait";
	req.open("GET","include.php?site="+url,true);

	//Beim abschliessen des request wird diese Funktion ausgeführt
	req.onreadystatechange = loadreq(url,container);
	req.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

	req.send(null);
	}
else
	{
	window.setTimeout("ajaxget('"+url+"','"+container+"')",50);
	}
}


function ajaxpost(url,container)
{
if(!loading)
	{
	loading=true;
	delete req;

 	req=newXmlHttpRequest()

	if (req == null)
		{
		alert("Error creating request object!");
		}

	alleInputs=document.getElementsByTagName('input');
	param='';
	for(var i=0; i < alleInputs.length; i++)
		{
		param=param + alleInputs[i].name + '=' + alleInputs[i].value;
		if( i < ( alleInputs.length -1 ) )
			{
			param = param + '&';
			}
		}

	document.getElementById(container).innerHTML = loadingtext;
	document.getElementById(container).style.cursor = "wait";
	req.open("POST","include.php?site="+url,true);
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.setRequestHeader("Content-length", param.length);
	req.setRequestHeader("Connection", "close");


	//Beim abschliessen des request wird diese Funktion ausgeführt
	req.onreadystatechange = loadreq(url,container);

	req.send(param);
	}
else
	{
	window.setTimeout("ajaxpost('"+url+"','"+container+"')",50);
	}
}



function newXmlHttpRequest() {
     var object = null;

     if ((typeof XMLHttpRequest == 'object')
         || (typeof XMLHttpRequest == 'function'))
       object = new XMLHttpRequest();
     else if ((typeof createRequest == 'object')
         || (typeof createRequest == 'function'))
       object = createRequest();
     else if (typeof ActiveXObject == 'function') {
       /*@cc_on @*/
       /*@if(@_jscript_version >= 5)
       try {
         object = new ActiveXObject('Msxml2.XMLHTTP');
       } catch(e) {
         try {
           object = new ActiveXObject('Microsoft.XMLHTTP');
         } catch(e) {
           object = null;
         }
       }
       @end @*/
     }
     return object; 
}







function loadreq(url,container)
	{
	switch(req.readyState)
		{
		case 0: //uninitialized
		document.getElementById(container).innerHTML = "uninitialized";
		return false;
		loading=false;
		break;

		case 1: //loading
		document.getElementById(container).innerHTML = "request readystate 1 - loading";
		window.setTimeout("loadreq('"+url+"','"+container+"')",50);
		break;

		case 2: //loaded
		document.getElementById(container).innerHTML = "request readystate 2 - loaded";
		window.setTimeout("loadreq('"+url+"','"+container+"')",50);
		break;

		case 3: //interactive
		document.getElementById(container).innerHTML = "request readystate 3 - interactive";
		window.setTimeout("loadreq('"+url+"','"+container+"')",50);
		break;

		case 4: //complete
		document.getElementById(container).innerHTML = "request readystate 4 - complete";
		if(req.status!=200)
			{
			loading=false;
			document.getElementById(container).innerHTML = "Error: req state != 200";
			document.getElementById(container).style.cursor = "auto";
			alert("Fehler:"+req.status); 
			}
		else
			{  
			loading=false;
			//schreibe die antwort in den div container mit der id content 
			document.getElementById(container).style.cursor = "auto";
			document.getElementById(container).innerHTML = req.responseText;
			if(url.substring(0,16)=="pic&sub=overview")
				{
				ajaxget('pic&sub=detailjs'+url.substring(16,url.length),'content-ext');
				}

			if(url.substring(0,16)=="pic&sub=detailjs")
				{
				eval(document.getElementById('content-ext').innerHTML);
				}
			if(url=="mp3")
				{
				loadfile();
				}
			return true;
			}
		break;
		}
	}

