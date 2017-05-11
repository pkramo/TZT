<?php
include("includes/autoloader.php");
include("build/head.php");
include("build/navbar.php");
?>

<p>Maak hier je account aan</p>
<form>
    <label for="Voornaam">Voornaam*</label> <input type="text" name="Voornaam"> 
    <label for="Voorletter">Voorletter*</label> <input type="text" name="Voorletter"><br>
    <label for="Achternaam">Achternaam* </label> <input type="text" name="Achternaam"><br>
    <label for="Geboortedatum">Geboortedatum* </label> <input type="date" name="Geboortedatum"><br>
    <label for="Straat">Straat*</label> <input type="text" name="Straat">
    <label for="Huisnummer">Huisnummer*</label> <input type="text" name="Huisnummer"><br>
    <label for="Postcode">Postcode* </label> <input type="text" name="Postcode" placeholder="Bijv. 2442HN"><br>
    <label for="Woonplaats">Woonplaats* </label> <input type="text" name="Woonplaats"><br>
    <label for="Telefoonnummer"> Telefoonnummer*</label><input type="text" name="Telefoonnummer"><br>
    <label for="Emailadres">Emailadres* </label><input type="text" name="Emailadres"><br>
    <label for="Herhaal Emailadres">Herhaal emailadres* </label> <input type="text" name="Emailadres"><br>
    <label for="Wachtwoord">Wachtwoord* </label> <input type="password" name="Wachtwoord"><br>
    <label for="Herhaal wachtwoord">Herhaal wachtwoord* </label> <input type="password" name="Wachtwoord"><br>
    <label for="Maak uw keuze">Maak uw keuze:* </label> <input type="radio" name="Soort" value="Particulier"><label for="Particulier">Particulier</label><br>
    <input type="radio" name="Soort" value="Bedrijf"><label for="Bedrijf">Bedrijf</label><br>
    <label for="Bedrijfsnaam">Bedrijfsnaam* </label> <input type="text" name="Bedrijfsnaam"><br>
    <label for="KVK-nummer">KVK-nummer*</label> <input type="text" name="KVK"><br>
    <label for="Plaats bedrijf">Plaats bedrijf*</label> <input type="text" name="Plaats bedrijf"><br>
    <label for="Postcode bedrijf">Postcode bedrijf*</label> <input type="text" name="Postcode bedrijf"><br>
    <label for="Woonplaats">Straatnaam bedrijf* </label> <input type="text" name="Straatnaam bedrijf">
    <label for="Straatnummer bedrijf">Straatnummer bedrijf*</label> <input type="text" name="Straatnummer bedrijf"><br>
    <label for="Telefoonnummer bedrijf">Telefoonnummer bedrijf* </label> <input type="text" name="Telefoonnummer bedrijf"><br><br>
    <p>* = verplicht invullen</p><br>
    <input type="button" value="Registreer">
    
</form>