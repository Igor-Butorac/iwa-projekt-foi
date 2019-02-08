<?php

include ("db_connection.php");

if(isset($_GET['logout']))
{
	session_start();
	unset($_SESSION['aktivni_korisnik']);
	unset($_SESSION['aktivni_korisnik_tip']);
	unset($_SESSION['aktivni_korisnik_id']);
		session_destroy();
		header("Location:index.php");
}

if (isset ($_POST['korisnicko_ime']))
{
$bp = otvoriBP();
$koris_ime = $_POST ['korisnicko_ime'];
$lozinka   = $_POST ['lozinka'];

if (!empty($koris_ime) && !empty ($lozinka))
{
	$query = "SELECT korisnik_id, tip_id, ime, prezime
		   FROM korisnik
		   WHERE korisnicko_ime = '$koris_ime' AND lozinka = '$lozinka'";
	$result = mysql_query ($query);
	
if(mysql_num_rows($result) == 0)
	{
	echo 'U bazi ne postoji taj korisnik';
	}
else
{
session_start();			
	list($id, $tipid, $ime, $prezime) 	  = mysql_fetch_array($result); //kaj to radi?
		$_SESSION['aktivni_korisnik'] 	  = $koris_ime;
		$_SESSION['aktivni_korisnik_ime'] = $ime . " " . $prezime;
		$_SESSION['aktivni_korisnik_id']  = $id;
		$_SESSION['aktivni_korisnik_tip'] = $tipid;
	header("Location:index.php");
}
mysql_close();
}

else
	{
	echo 'Obavezan unos korisničkog imena i lozinke';
	}
}
include("header.php");	

echo'
<form method="post" action="login.php">
	<table>
		<tr>
			<td>Korisničko ime: </td>
			<td><input type="text" name="korisnicko_ime"/></td>
		</tr>
		<tr>
			<td>Lozinka: </td>
			<td><input type="password" name="lozinka"/></td>
		</tr>
		<tr>
			<td><input type="submit" value="Prijavi me"/></td>
		</tr>
	</table>
</form>';

?>