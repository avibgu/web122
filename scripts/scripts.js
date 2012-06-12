function showHint(str)
{
	if (0 == str.length)
	{ 
		document.getElementById("mainDiv").innerHTML = "";
		return;
	}

	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function()
	{
		if (4 == xmlhttp.readyState && 200 == xmlhttp.status)
		{
			document.getElementById("mainDiv").innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("GET", "gethint.php?q=" + str, true);
	xmlhttp.send();
}

function load(page)
{
	loadPage(page, "mainDiv");
}

function loadPage(page, toWhere)
{
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function()
	{
		if (4 == xmlhttp.readyState && 200 == xmlhttp.status)
		{
			document.getElementById(toWhere).innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("GET", page, true);
	xmlhttp.send();
}

function activeHome()
{
	document.getElementById("navLiDefault").className = "active";
}

function login()
{
	var exdate = new Date();
	
	exdate.setDate(exdate.getDate() + 30);

	document.cookie = "username=AVI; expires=" + exdate.toUTCString();
	
	reloadNavBar();
}

function logout()
{
	var exdate = new Date();
	
	exdate.setDate(exdate.getDate() - 3600);

	document.cookie = "username=AVI; expires=" + exdate.toUTCString();
	
	reloadNavBar();
}

function reloadNavBar()
{
	loadPage("php/navbar.php", "navbarDiv");
}
