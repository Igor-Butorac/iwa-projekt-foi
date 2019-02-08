<?php

// slika - promijeniti ju... nije radila s drugima osim s ovom...pogledat zakaj!
// nekak ubaciti broj polaznika trebalo bi samo count neki
include ("db_connection.php");
include ("header.php");

otvoriBP();

$_SESSION['tip'] = $aktivni_korisnik_tip;

$result = mysql_query("SELECT count(*) FROM sastanak");
	$row = mysql_fetch_array($result);
	$br_red = $row [0];
	$broj_stranica = ceil($br_red / $prikaz_korisnika);

$folder = 'materijali/';

$query = "SELECT sastanak.tema, 
		  sastanak.slika, 
		  sastanak.vrijeme_pocetka, 
		  sastanak.vrijeme_zavrsetka,
		  korisnik.korisnicko_ime
		  FROM sastanak INNER JOIN korisnik ON (sastanak.korisnik_id = korisnik.korisnik_id ) 					
		  ORDER BY sastanak.tema ASC, korisnik.korisnicko_ime  ASC;";
	
$result = mysql_query($query) or die (mysql_error ());

if ($result)
	{
echo "<table id='sastanci' cellspacing='0' cellpadding='0'>
			<tr>
				<th class='th2'>Tema</th>
				<th class='th2'>Slika</th>
				<th class='th3'>Početak</th>
				<th class='th3'>Kraj</th>
				<th class='th3'>Trajanje</th>
				<th class='th2'>Moderator</th>
				<th class='th2'>Pozvanika</th>		
			</tr>";

while($row = mysql_fetch_array($result))

{
	
	$tema      = $row ['tema'];
	$slika	   = $row ['slika'];
	$moderator = $row ['korisnicko_ime'];
  //$polaznici = $row ['']; (( mozda if ($get id bla bla ... a id (novi) i onda ona stipina formula nekak u moju...
	$pocetak   = $row ['vrijeme_pocetka'];
	$kraj	   = $row ['vrijeme_zavrsetka'];
	
$formula  = strtotime($kraj) - strtotime($pocetak);
$trajanje =  date('H:i:s',  $formula - 3600) ;	

/*<td>'.$broj_polaznika.'</td> dole ide to */

echo '
	
	<tr> 
		<td>'.$tema.'</td>
		<td><img src = '.$folder.$slika.' alt="" width="100"></td>
		<td>'.$pocetak.'</td>
		<td></td>
		<td>'.$kraj.'</td>
		<td></td>
	    <td>'.$trajanje.'</td>
		<td>'.$moderator.'</td>
		
		
		
		
		';
		
		}
	}
?>