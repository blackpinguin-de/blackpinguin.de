var t_audio = new Array(
new Array("mp3s/d.mp3","Portal - Still Alive","audio/mpeg"),
new Array("mp3s/b.mp3","In Extremo - Spielmannsfluch","audio/mpeg"),
new Array("mp3s/f.mp3","Jan Hegenberg - Der Heilär","audio/mpeg"),
new Array("mp3s/e.mp3","Schandmaul - Der Kurier","audio/mpeg"),
new Array("mp3s/a.mp3","Akeboshi - Wind","audio/mpeg"),
new Array("mp3s/c.mp3","Nobodyknows+ - El Mirador","audio/mpeg")
);

function loadfile()
{
for(i=0;i<t_audio.length;i++)
{
document.getElementById("tracks").innerHTML="<option value=\""+i+"\"";
if(playing==i){document.getElementById("tracks").innerHTML+=" selected";}
document.getElementById("tracks").innerHTML=">"+t_audio[i][1]+"<\/option>";
}

cngmp3();
}



function cngmp3()
{
var inhalt="<object id=\"mp3\" name=\"mp3\" style=\"visibility:hidden;width:0px;height:0px;\" data=\""+t_audio[playing][0]+"\" type=\""+t_audio[playing][2]+"\"><\/object>";
document.getElementById("mp3container").innerHTML = inhalt;

imgplay();
cngvol(100);
tracklist();
}



function selectcng()
{
playing=document.getElementById("tracks").selectedIndex;

cngmp3();
}



function imgplay()
{
document.getElementById("imgcont").innerHTML=
"<img src=\"img/mp3/backward.png\" onclick=\"backward();\" alt=\"backward\">"+
"<img src=\"img/mp3/rewind.png\" onclick=\"rewind();\" alt=\"rewind\">"+
"<img src=\"img/mp3/pause.png\" onclick=\"pause();\" alt=\"pause\">"+
"<img src=\"img/mp3/stop.png\" onclick=\"stop();\" alt=\"stop\">"+
"<img src=\"img/mp3/forward.png\" onclick=\"forward();\" alt=\"forward\">";
}

function imgstop()
{
document.getElementById("imgcont").innerHTML=
"<img src=\"img/mp3/backward.png\" onclick=\"backward();\" alt=\"backward\">"+
"<img src=\"img/mp3/rewind.png\" onclick=\"rewind();\" alt=\"rewind\">"+
"<img src=\"img/mp3/play.png\" onclick=\"play();\" alt=\"play\">"+
"<img src=\"img/mp3/forward.png\" onclick=\"forward();\" alt=\"forward\">";
}

function imgpause()
{
document.getElementById("imgcont").innerHTML=
"<img src=\"img/mp3/backward.png\" onclick=\"backward();\" alt=\"backward\">"+
"<img src=\"img/mp3/rewind.png\" onclick=\"rewind();\" alt=\"rewind\">"+
"<img src=\"img/mp3/play.png\" onclick=\"play();\" alt=\"play\">"+
"<img src=\"img/mp3/stop.png\" onclick=\"stop();\" alt=\"stop\">"+
"<img src=\"img/mp3/forward.png\" onclick=\"forward();\" alt=\"forward\">";
}





function play()
{
document.mp3.Play();
imgplay();
}

function pause()
{
document.mp3.Stop();
imgpause();
}

function stop()
{
document.mp3.Stop();
document.mp3.Rewind();
imgpause();
}

function rewind()
{
document.mp3.Rewind();
}



function forward()
{
if(playing+1>(t_audio.length-1))
{playing=0;}
else
{playing++;}

cngmp3();
}

function backward()
{
if(playing-1<0)
{playing=(t_audio.length-1);}
else
{playing--;}

cngmp3();
}




function getVolume()
{

return (parseInt(document.getElementById("volumea").style.width)/100 *255);
}

function setVolume(v)
{
cngvol(v);
v=((v/100)*255);
document.mp3.SetVolume(v);
}


function cngvol(v)
{
if(v>100)
	{
	v=100;
	}
if(v<0)
	{
	v=0;
	}

document.getElementById("volumea").style.width=v+"%";
document.getElementById("volumeb").style.width=(100-v)+"%";
}


function volup()
{
var v=((getVolume()/255)*100);
if((v+10)>100){v=100;}
else{v+=10;}
setVolume(v);
}

function voldown()
{
var v=((getVolume()/255)*100);
if((v-10)<0){v=0;}
else{v-=10;}
setVolume(v);

}


function tracklist()
{

var inhalt="";
for(i=0;i<t_audio.length;i++)
{
inhalt+="<option value=\""+i+"\"";
if(playing==i){inhalt+=" selected";}
inhalt+=">"+t_audio[i][1]+"</option>";
}


document.getElementById("tracks").innerHTML=inhalt;
}




var playing=0;