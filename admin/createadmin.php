<?php

include("build/header.php");

?>

<div class="container">
	<div class="row">
		<div class="col-xs-1">			
		</div>
		<div class="col-xs-10">			
				<?php // laad de errors in het inlogscherm
							if ($_SESSION['alert']) {
								echo $_SESSION['message'];
							}
				?>
				<h2>Maak hier je admin account aan</h2>
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
						  
					    </div>
					    <div class="form-group">
					    	<input class="btn btn-primary form-control" type="submit" name="RegisterAdmin" value="Registreer">
					    </div>
				    </div>				    
				</form>
			
		</div>
		<div class="col-xs-1">			
		</div>
	</div>
</div>

<?php
include("build/footer.php");
?>