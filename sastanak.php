<?php

include ("db_connection.php");
include ("header.php");

otvoriBP();

$greska = "";

if (isset ($_POST ['moderator'];))
{

$moderator 	 = $_POST ['moderator'];
$moderator_id = mysql_fetch_array(mysql_query("SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$moderator'"));

if($aktivni_korisnik_tip == 1) 
{

$tema        = $_POST ['tema'];
$opis	     = $_POST ['opis'];
$slika       = $_POST ['slika'];
$v_pocetka   = $_POST ['vrijeme_pocetka'];
$v_zavrsetka = $_POST ['vrijeme_zavrsetka'];
$dnevni_red  = $_POST ['dnevni_red'];
$zapisnik	 = $_POST ['zapisnik'];
$id			 = $_POST ['novi_id'];

$query = "UPDATE sastanak SET 
		  korisnik_id = '$moderator_id[0]'
		  tema		  = '$tema',
		  opis        = '$opis',
		  slika		  = '$slika',
		  vrijeme_pocetka   = '$v_pocetka',
		  vrijeme_zavrsetka = '$v_zavrsetka',
		  dnevni_red  = '$dnevni_red',
		  zapisnik	  = '$zapisnik'
		  WHERE id_sastanak = $id";

//header("Location: sastanci.php");
$result = mysql_query ($query) or die (mysql_error()); 

}

else
{
$tema        = "";
$opis	     = "";
$slika       = "";
$v_pocetka   = "";
$v_zavrsetka = "";
$dnevni_red  = "";
$zapisnik	 = "";
$id			 = $_POST ['novi_id'];

$query_unos = "INSERT INTO sastanak 
			   (korisnik_id, tema)
			   VALUES 
			   ('$moderator_id[0]', '$tema')";
$result = mysql_query ($query_unos) or die (mysql_error ());
header("Location: sastanci.php");
}
}









?>