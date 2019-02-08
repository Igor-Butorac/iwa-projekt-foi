<?php

if(session_id() == "") 
   {
		session_start();
		
		$aktivni_korisnik 	  =  0;
		$aktivni_korisnik_tip = -1;
		
		if(isset($_SESSION['aktivni_korisnik'])) 
		{
			$aktivni_korisnik     = $_SESSION['aktivni_korisnik'];
			$aktivni_korisnik_ime = $_SESSION['aktivni_korisnik_ime'];
			$aktivni_korisnik_tip = $_SESSION['aktivni_korisnik_tip'];
			$aktivni_korisnik_id  = $_SESSION['aktivni_korisnik_id'];
		}
	}

?>


<?php
		if($aktivni_korisnik === 0)
		    {
			  echo "Neprijavljeni korisnik <br/>";
			  echo "<a class='link' href='login.php'>prijava</a>";
			}
			else 
			{
			echo "<p id='welcome'>Dobro došli $aktivni_korisnik_ime 
							<a class='link1' href='login.php?logout=1' >odjava</a></br>
							<a class='link1' href='korisnik.php?korisnik=" . $_SESSION['aktivni_korisnik_id'] . "' >Uredi profil</a></p>";
			 
					
					
			}
?>	
<div id="menu">
						<a class="menu_links" href="index.php">POČETNA</a>
						<a class="menu_links" href="sastanci.php">SASTANCI</a>		
<?php

	   if($aktivni_korisnik_tip == 0 || $aktivni_korisnik_tip == 1)
	   {
	   echo '<a class="menu_links" href="korisnici.php">KORISNICI</a>';
	   
	   }
?>
	</div>				
