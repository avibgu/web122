
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
	
	var PickupHours = PickupTime.split(":")[0];
	var PickupMinutes = PickupTime.split(":")[1];
	var PickupDate = new Date(PickupYear, PickupMonth, PickupDay, PickupHours, PickupMinutes, 0, 0);

	var ReturnHours = ReturnTime.split(":")[0];
	var ReturnMinutes = ReturnTime.split(":")[1];
	var ReturnDate = new Date(ReturnYear, ReturnMonth, ReturnDay, ReturnHours, ReturnMinutes, 0, 0);

	if (PickupDate.getTime() > ReturnDate.getTime()){
		alert("Return Date is before the Pickup Date !");
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

function validateRegForm()
{
	var x = document.getElementById("inputID");
	if (x.value=="" || x.value.length!=9)
		x.style.backgroundColor = "#FF5050";
	x = document.getElementById("inputFirstName");
	if (x.value=="" || IsNumeric(x.value))
		x.style.backgroundColor = "#FF5050";
	x = document.getElementById("inputLastName");
	if (x.value=="" || IsNumeric(x.value))
		x.style.backgroundColor = "#FF5050";
	x = document.getElementById("inputAddress");
	if (x.value=="")
		x.style.backgroundColor = "#FF5050";
	x = document.getElementById("inputCity");
	if (x.value=="")
		x.style.backgroundColor = "#FF5050";
	x = document.getElementById("inputZipCode");
	if (!IsNumeric(x.value))
		x.style.backgroundColor = "#FF5050";
	x = document.getElementById("inputPhone");
	if (x.value=="" || !IsNumeric(x.value) || x.value.length < 6 || x.value.length > 10)
		x.style.backgroundColor = "#FF5050";
	x = document.getElementById("inputEmail");
	var atpos=x.value.indexOf("@");
	var dotpos=x.value.lastIndexOf(".");
	if (x.value=="" || atpos < 0 || dotpos < 0 || dotpos < atpos)
		x.style.backgroundColor = "#FF5050";
	x = document.getElementById("inputPassword");
	if (x.value.length > 3 || x.value.length < 13){
		alert("Password length 4-12");
		x.style.backgroundColor = "#FF5050";
	}
	var passRetype = document.getElementById("inputRetypePassword");
	if (x.value != passRetype.value)
		passRetype.style.backgroundColor = "#FF5050";
	x = document.getElementById("inputLicenseNo");
	if (x.value=="" || !IsNumeric(x.value))
		x.style.backgroundColor = "#FF5050";
	x = document.getElementById("checkboxAgree");
	if (x.value.checked != true)
		alert("Must Agree To Terms");
		
}

function IsNumeric(sText)
{
   var ValidChars = "0123456789";
   var IsNumber=true;
   var Char;
 
   for (i = 0; i < sText.length && IsNumber == true; i++){ 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1){
         return false;
         }
   }
   return IsNumber;
}

function clearRegForm()
{
	load('php/registration.php');
	/*var fields = new Array("inputID","inputFirstName","inputLastName","inputAddress","inputCity","inputZipCode","inputPhone","inputEmail","inputPassword",
		"inputRetypePassword","inputLicenseNo","inputLicenseNo","selectYear","selectMonth","selectDay","selectYearBirth","selectMonthBirth",
		"selectDayBirth");
	var i;
	for (i=0; i<fields.length; i++){
		var input = document.getElementById(fields[i]);
		var p = input.parentNode;
		p.innerHTML = p.innerHTML;
		input.style.backgroundColor = "#FFFFFF";
	}
	document.getElementById("checkboxAgree").checked = false;*/
}
