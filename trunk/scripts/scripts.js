
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
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
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
	
	var yearSelect = document.forms["rentForm"]["Year"];
	
	for (i = yearSelect.length - 1; i>=0; i--)
		yearSelect.remove(i);
		
	var option = document.createElement('option');
	
    option.text = "Year";
    option.value = "Year";
	
	yearSelect.add(option, 0);
	
	document.forms["rentForm"]["ReturnYear"].value = "Year";
	document.forms["rentForm"]["ReturnMonth"].value = "Month";
	document.forms["rentForm"]["ReturnDay"].value = "Day";
	document.forms["rentForm"]["ReturnTime"].value = "Time";
}

function validateAndSendRentForm()
{
	// Brand, PickupYear, PickupMonth, PickupDay, PickupTime
	// Year, ReturnYear, ReturnMonth, ReturnDay, ReturnTime

	var form = document.forms["rentForm"];
	
	var Brand = form["Brand"].value;
	
	if (null == Brand || "" == Brand || "Brand" == Brand) {
	
		alert("Brand must be filled out");
		return false;
	}
	
	var PickupYear = form["PickupYear"].value;
	
	if (null == PickupYear || "" == PickupYear || "Year" == PickupYear) {
	
		alert("PickupYear must be filled out");
		return false;
	}
	
	var PickupMonth = form["PickupMonth"].value;
	
	if (null == PickupMonth || "" == PickupMonth || "Month" == PickupMonth) {
	
		alert("PickupMonth must be filled out");
		return false;
	}
	
	var PickupDay = form["PickupDay"].value;
	
	if (null == PickupDay || "" == PickupDay || "Day" == PickupDay) {
	
		alert("PickupDay must be filled out");
		return false;
	}
	
	var PickupTime = form["PickupTime"].value;
	
	if (null == PickupTime || "" == PickupTime || "Time" == PickupTime) {
	
		alert("PickupTime must be filled out");
		return false;
	}
	
	var Year = form["Year"].value;
	
	if (null == Year || "" == Year || "Year" == Year) {
	
		alert("Year must be filled out");
		return false;
	}
	
	var ReturnYear = form["ReturnYear"].value;
	
	if (null == ReturnYear || "" == ReturnYear || "Year" == ReturnYear) {
	
		alert("ReturnYear must be filled out");
		return false;
	}
	
	var ReturnMonth = form["ReturnMonth"].value;
	
	if (null == ReturnMonth || "" == ReturnMonth || "Month" == ReturnMonth) {
	
		alert("ReturnMonth must be filled out");
		return false;
	}
	
	var ReturnDay = form["ReturnDay"].value;
	
	if (null == ReturnDay || "" == ReturnDay || "Day" == ReturnDay) {
	
		alert("ReturnDay must be filled out");
		return false;
	}
	
	var ReturnTime = form["ReturnTime"].value;
	
	if (null == ReturnTime || "" == ReturnTime || "Time" == ReturnTime) {
	
		alert("ReturnTime must be filled out");
		return false;
	}
	
	var username = getCookie("username");
	
	if (null == username || "" == username){
		alert("you should be logged-in in order to Rent!");
		return false;
	}
	
	var content =	Brand + "&PickupYear=" + PickupYear + "&PickupMonth=" + PickupMonth +
					"&PickupDay=" + PickupDay + "&PickupTime=" + PickupTime + "&Year=" + Year +
					"&ReturnYear=" + ReturnYear +"&ReturnMonth=" + ReturnMonth + 
					"&ReturnDay=" + ReturnDay + "&ReturnTime=" + ReturnTime;
	
	post('php/rentForm.php', content, 'mainDiv');
}

function getCookie(c_name)
{
	var i,x,y,ARRcookies = document.cookie.split(";");
	
	for (i = 0; i < ARRcookies.length; i++) {
	
		x = ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
		y = ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
		x = x.replace(/^\s+|\s+$/g,"");
	
		if (x==c_name)
			return unescape(y);
	}
}
