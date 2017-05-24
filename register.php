<?php
/*
 * Registreren gebruiker
 * 
 * Contactpersoon: Ramon Kerpershoek
 * Datum: 24-5-2017
 * 
 */
include("includes/autoloader.php");
include("build/head.php");
include("build/navbar.php");
?>

<div class="container">
	<div class="row">
		<div class="col-md-2">			
		</div>
		<div class="col-md-8 padding-auto">
			<div class="col-md-12 lightgrey-background padding-auto">
				<?php // laad de errors in het inlogscherm
							if ($_SESSION['alert']) {
								echo $_SESSION['message'];
							}
				?>
				<h2>Maak hier je account aan</h2>
				<form method="POST">
					<div class="form-group">
					    <div class="form-group">
						    <label for="Voornaam">Voornaam*</label> <input required class="form-control" type="text" name="Voornaam"> 
						    <label for="Voorletter">Voorletter*</label> <input required class="form-control" type="text" name="Voorletter">
                                                    <label for="Tussenvoegsel">Tussenvoegsel</label> <input class="form-control" type="text" name="Tussenvoegsel"> 
						    <label for="Achternaam">Achternaam* </label> <input required class="form-control" type="text" name="Achternaam">
						    <label for="Geboortedatum">Geboortedatum* </label> <input required class="form-control" type="date" name="Geboortedatum">
						    <label for="Straat">Straat*</label> <input required class="form-control" type="text" name="Straat">
						    <label for="Huisnummer">Huisnummer*</label> <input required class="form-control" type="text" name="Huisnummer">
						    <label for="Postcode">Postcode* </label> <input required class="form-control" type="text" name="Postcode" placeholder="Bijv. 2442HN">
						    <label for="Woonplaats">Woonplaats* </label> <input required class="form-control" type="text" name="Woonplaats">
						    <label for="Telefoonnummer"> Telefoonnummer*</label><input required class="form-control" type="text" name="Telefoonnummer">
						    <label for="Emailadres">Emailadres* </label><input required class="form-control" type="email" name="Emailadres">
						    <label for="Wachtwoord">Wachtwoord* </label> <input required class="form-control" type="password" name="Wachtwoord">
						    <div class="form-group">
							    <label for="Maak uw keuze">Maak uw keuze:* </label> 
							    <div class="radio">
							    	<label for="Particulier"><input  type="radio" name="Soort" value="Particulier">Particulier</label> 
							    </div>
							    <div class="radio"> 
							    	<label for="Bedrijf"><input type="radio" name="Soort" value="Bedrijf">Bedrijf</label>
							    </div>
						    </div>
						    <label for="Bedrijfsnaam">Bedrijfsnaam </label> <input class="form-control" type="text" name="Bedrijfsnaam">
						    <label for="KVK-nummer">KVK-nummer</label> <input class="form-control" type="text" name="KVK">
						    <label for="Straatnaam bedrijf">Straatnaam bedrijf</label> <input class="form-control" type="text" name="Straatnaambedrijf">
						    <label for="Huisnummer bedrijf">Huisnummer bedrijf</label> <input class="form-control" type="text" name="Huisnummerbedrijf">
						    <label for="Postcode bedrijf">Postcode bedrijf</label> <input class="form-control" type="text" name="Postcodebedrijf">
						    <label for="Plaats bedrijf">Plaats bedrijf</label> <input class="form-control" type="text" name="Plaatsbedrijf">
						    <label for="Telefoonnummer bedrijf">Telefoonnummer bedrijf</label> <input class="form-control" type="text" name="Telefoonnummerbedrijf">
						    <p>* = verplicht invullen</p>
					    </div>
					    <div class="form-group">
					    	<input class="btn btn-primary form-control" type="submit" name="Register" value="Registreer">
					    </div>
				    </div>				    
				</form>
			</div>
		</div>
		<div class="col-md-2">			
		</div>
	</div>
</div>