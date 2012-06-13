
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

function clearRentForm()
{
	document.forms["rentForm"]["Brand"].value = "Brand";
	document.forms["rentForm"]["PickupYear"].value = "Year";
	document.forms["rentForm"]["PickupMonth"].value = "Month";
	document.forms["rentForm"]["PickupDay"].value = "Day";
	document.forms["rentForm"]["PickupTime"].value = "Time";
	
	var elSel = document.forms["rentForm"]["Year"];
	
	for (i = elSel.length - 1; i>=0; i--)
		elSel.remove(i);
		
	var elOptNew = document.createElement('option');
	
    elOptNew.text = "Year";
    elOptNew.value = "Year";
	
	elSel.add(elOptNew, 0);
	
	document.forms["rentForm"]["ReturnYear"].value = "Year";
	document.forms["rentForm"]["ReturnMonth"].value = "Month";
	document.forms["rentForm"]["ReturnDay"].value = "Day";
	document.forms["rentForm"]["ReturnTime"].value = "Time";
}

function validateRentForm()
{

	// Brand, PickupYear, PickupMonth, PickupDay, PickupTime
	// Year, ReturnYear, ReturnMonth, ReturnDay, ReturnTime

	var x = document.forms["rentForm"]["Brand"].value;
	
	if (null == x || "" == x || "Brand" == x) {
	
		alert("First name must be filled out");
		return false;
	}
}
