<?php
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
				<h2>Maak hier je account aan</h2>
				<form method="POST">
					<div class="form-group">
					    <div class="form-group">
						    <label for="Voornaam">Voornaam*</label> <input required class="form-control" type="text" name="Voornaam"> 
						    <label for="Voorletter">Voorletter*</label> <input required class="form-control" type="text" name="Voorletter">
						    <label for="Achternaam">Achternaam* </label> <input required class="form-control" type="text" name="Achternaam">
						    <label for="Geboortedatum">Geboortedatum* </label> <input required class="form-control" type="date" name="Geboortedatum">
						    <label for="Straat">Straat*</label> <input required class="form-control" type="text" name="Straat">
						    <label for="Huisnummer">Huisnummer*</label> <input required class="form-control" type="text" name="Huisnummer">
						    <label for="Postcode">Postcode* </label> <input required class="form-control" type="text" name="Postcode" placeholder="Bijv. 2442HN">
						    <label for="Woonplaats">Woonplaats* </label> <input required class="form-control" type="text" name="Woonplaats">
						    <label for="Telefoonnummer"> Telefoonnummer*</label><input required class="form-control" type="text" name="Telefoonnummer">
						    <label for="Emailadres">Emailadres* </label><input required class="form-control" type="email" name="Emailadres">
						    <label for="Herhaal Emailadres">Herhaal emailadres* </label> <input required class="form-control" type="email" name="Emailadres">
						    <label for="Wachtwoord">Wachtwoord* </label> <input required class="form-control" type="password" name="Wachtwoord">
						    <label for="Herhaal wachtwoord">Herhaal wachtwoord* </label> <input required class="form-control" type="password" name="Wachtwoord">
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
						    <label for="Plaats bedrijf">Plaats bedrijf</label> <input class="form-control" type="text" name="Plaats bedrijf">
						    <label for="Postcode bedrijf">Postcode bedrijf</label> <input class="form-control" type="text" name="Postcode bedrijf">
						    <label for="Woonplaats">Straatnaam bedrijf</label> <input class="form-control" type="text" name="Straatnaam bedrijf">
						    <label for="Straatnummer bedrijf">Straatnummer bedrijf</label> <input class="form-control" type="text" name="Straatnummer bedrijf">
						    <label for="Telefoonnummer bedrijf">Telefoonnummer bedrijf</label> <input class="form-control" type="text" name="Telefoonnummer bedrijf">
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