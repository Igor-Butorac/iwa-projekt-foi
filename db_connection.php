<?php

$DB_server	 = 'localhost';
$DB_baza     = 'iwa_2012_zb_projekt';
$DB_korisnik = 'iwa_2012';
$DB_lozinka  = 'FOI';


$dbc = null;
$db  = null;

$prikaz_sastanaka = 10; 
$prikaz_korisnika = 10;
$prikaz_komentara = 5;

function otvoriBP()
{
global $DB_server;
global $DB_baza;      
global $DB_korisnik;  
global $DB_lozinka;   
global $dbc;
global $db; 
	
	$dbc = mysql_connect ($DB_server, $DB_korisnik, $DB_lozinka);
	if ($dbc)
	{
		//echo 'Uspješno ste spojeni na bazu!';
	}
		else
		
	{
		echo 'Pogreška kod spajanja';
	}
	//echo '</br> ';
	$db = mysql_select_db($DB_baza,$dbc);
	
	if ($db)
	{
		//echo 'Uspješno izabrana baza podataka';
	}
	else
	{
		echo 'Pogreška pri odabiru';
	}
	mysql_query("set names 'utf8'",$dbc);
	//echo '</br>';
	}
	function zatvoriBP()
	{
	global $dbc;
	mysql_close($dbc);
	}




?>