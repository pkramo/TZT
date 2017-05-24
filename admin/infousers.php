<?php

/*
 * Account overzicht voor admin
 * 
 * Contactpersoon: Ramon Kerpershoek
 * Datum: 24-5-2017
 * 
 */

include("build/header.php");
if($_SESSION['user']['role'] == '1') {
	header('location: ../index.php');
}
?>

<div class="container">
	<div class="row">
		<div class="col-md-1">			
		</div>
		<div class="col-md-10">
			 <h1>Informatie Gebruikers</h1>
		        <?php
			    if($_SESSION['alert']) {
			        echo $_SESSION['message']; 
			    } ?>
		    <table class="table">
		        <thead>
		        <th>Gebruikersnaam</th>
		        <th>Volledige naam</th>
		        <th>Geboortedatum</th>
		        <th>Adres</th>
		        <th>Telefoonnummer</th>
		        <th>Soort klant</th>
		        <th>bedrijfsnaam</th>		        
		        </thead>
		      <tbody>
			 
			 <?php
			 foreach(accountManagement::userInfo() as $user)
			{
				echo'
			    <tr>
			    <td>'.$user['gebruikersnaam'].'</td>			        
			        <td>'.$user['voornaam'].' '.$user['tussenvoegsel'].' '.$user['achternaam'].'</td>
			        <td>'.$user['geboortedatum'].'</td>
			        <td>'.$user['straat'].' '.$user['huisnummer'].' '.$user['postcode'].' '.$user['woonplaats'].'</td>
			        <td>'.$user['telefoonnummer'].'</td>
			        <td>'.$user['soortklant'].'</td>
			        <td>'.$user['bedrijfsnaam'].'</td>			        
			        <td>
			    		<form method="post">				
							<input type="hidden" name="username" value="'. $user['gebruikersnaam'] .'">
							<button type="submit" name="deleteUser" value="Verwijder" class="btn-cms btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
						</form>
						</td>
			       </tr> 
			        ';
			      
			}
			?>

 
			</tbody>
			</table>			
		</div>
		<div class="col-md-1">			
		</div>
	</div>
</div>
		