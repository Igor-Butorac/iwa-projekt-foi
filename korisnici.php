<?php

include ("db_connection.php");
include ("header.php");


otvoriBP();

echo '<p><i><a href="index.php"><< Natrag</a></i></p>';

$query   = "SELECT count(*) 
			FROM korisnik";
			
$result  = mysql_query($query) or die (mysql_error()); 
$row_kor = mysql_fetch_array ($result);
$br_red  = $row_kor [0];

$br_ispisa =  ceil($br_red / $prikaz_korisnika); 

$query = "SELECT * FROM korisnik order by korisnik_id LIMIT " . $prikaz_korisnika;

if(isset($_GET['stranica'])) 
	{
		$query = $query . " OFFSET " . (($_GET['stranica'] - 1) * $prikaz_korisnika);
		$aktivna = $_GET['stranica'];
	} else 
	{
		$aktivna = 1;  
	}
	
$result = mysql_query($query) or die (mysql_error()); 

echo '
		<table id="korisnici" cellspacing="0" cellpadding="0">
		
	<tr>
		<th>Korisnicko ime</th> 
		<th>Ime</th> 
		<th>Prezime</th> 
		<th>Lozinka</th> 
		<th>Email</th> 
		<th>Slika</th> 
	</tr>';

	
while($row = mysql_fetch_array($result))

{ 
	$koris_ime = $row ['korisnicko_ime'];
	$ime 	   = $row ['ime'];
	$prezime   = $row ['prezime'];
	$lozinka   = $row ['lozinka'];
	$email     = $row ['email'];
	$slika	   = $row ['slika'];
	

echo '
	
	<tr> 
		<td>'.$koris_ime.'</td>
		<td>'.$ime.'</td>
		<td>'.$prezime.'</td>
		<td>'.$lozinka.'</td>
		<td>'.$email.'</td>
		<td><img src = '.$slika.' alt="" width="100"></td>';
		
		if($aktivni_korisnik_tip == 0)
			{
			echo "<td><a class='link' href='korisnik.php?korisnik=$id' >Uredi</a></td>"; 
			
			}
	echo
	'</tr>';
 }
 
 zatvoriBP();
 
 echo 
 "<div id='paginacija' >";
		if($aktivna != 1) {
			$prethodna = $aktivna - 1;
			echo "<a class='link3' href='korisnici.php?stranica=" . $prethodna . "' >&lt;</a>";
		}
		
		for($i = 1; $i <= $br_ispisa; $i++) {
			echo "<a class='link3";
			if($i == $aktivna) {
				echo " aktivna";
			}
			echo "' href='korisnici.php?stranica=" . $i . "' >$i</a>";
		}
		
		if($aktivna < $br_ispisa) {
			$sljedeca = $aktivna + 1;
			echo "<a class='link3' href='korisnici.php?stranica=" . $sljedeca . "'>&gt</a>";
		}
		
		
	
		echo "<div id='dodaj_korisnika'>";
		if($aktivni_korisnik_tip == 0) {
			echo "<a class='link4' href='korisnik.php' >Dodaj korisnika</a>";
		}
		
		echo "</div>";
	
		include ("footer.php");
	
?>