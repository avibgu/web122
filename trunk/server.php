<?php 
$path =  $_SERVER['DOCUMENT_ROOT'];

echo $path;

$con = mysql_connect('localhost', 'digmia', "RYkUhstj");

if (!$con)
	die('Could not connect: ' . mysql_error());


/*
ftp://www.ie.bgu.ac.il/iemweb/Class2012

ה- path תקיות שלכם הוא:

iemweb\www\web\class2012
*/
?>