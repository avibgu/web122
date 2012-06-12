
function get(page, params, whereToLoad)
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
			document.getElementById(whereToLoad).innerHTML = xmlhttp.responseText;
		}
	}
	
	if ("" == params)
		xmlhttp.open("GET", page, true);
		
	else
		xmlhttp.open("GET", page + "?" + params, true);
		
	xmlhttp.send();
}

function post(page, content, whereToLoad)
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
			document.getElementById(whereToLoad).innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("POST", page, true);
	xmlhttp.send(content);
}

function load(page)
{
	get(page, "", "mainDiv");
}

function loadWithParams(page, params)
{
	get(page, params, "mainDiv");
}

function activeHome()
{
	document.getElementById("navLiDefault").className = "active";
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
	get("php/navbar.php", "", "navbarDiv");
}
