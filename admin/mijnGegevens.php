<?php

/*
 * Hier staan alle gegevens van het ingelogde account
 * 
 * Contactpersoon: Ramon Kerpershoek
 * Datum: 24-5-2017
 * 
 */
 
include("build/header.php");

$users = $_SESSION['user']['username']; 
foreach (accountManagement::getUser($users) as $user) {
				echo '


<div class="row">
	<div class="col-xs-1"></div>
	<div class="col-xs-5">
		<h2>Mijn gegevens</h2>
		<h6>Volledige naam: '.$user['voorletter'].'. '.$user['voornaam'].' '.$user['tussenvoegsel'].' '.$user['achternaam'].'</h6>
		<h6>Geboortedatum: '.$user['geboortedatum'].'</h6>
		<h6>Adres: '.$user['straat'].' '.$user['huisnummer'].'</h6>
		<h6>Postcode: '.$user['postcode'].'</h6>
		<h6>Plaats: '.$user['woonplaats'].'</h6>
		<h6>Email: '.$user['emailadres'].'</h6>
		<h6>Telefoonnummer: '.$user['telefoonnummer'].'</h6>
		</div>'; 
		if($user['soortklant'] == 'Bedrijf') {
		echo '
		<div class="col-xs-5">
		<h2>Bedrijfsgegevens</h2>
		<h6>Bedrijfsnaam: '.$user['bedrijfsnaam'].'</h6>	
		<h6>KvK: '.$user['KVK'].'</h6>
		<h6>Adres: '.$user['straatbedrijf'].' '.$user['huisnummerbedrijf'].'</h6>
		<h6>Postcode: '.$user['postcodebedrijf'].'</h6>
		<h6>Plaats: '.$user['plaatsbedrijf'].'</h6>
		<h6>Telefoonnummer: '.$user['telefoonnummerbedrijf'].'</h6>
		</div>';
		} else { }
}?>			
		 
	
	<div class="col-xs-1"></div>
</div>
	
<?php
include("build/footer.php");
?>