<?php 

/*
 * Hier wordt alles geregeld voor de account
 * 
 * Contactpersoon: Ramon Kerpershoek
 * Datum: 24-5-2017
 * 
 */
 
class accountManagement
{

//Registreren gebruiker
	public static function register(){
            $register  = new dataAccountManagement;
            $voornaam = input::get('Voornaam');
            $voorletter = input::get('Voorletter');
            $tussenvoegsel = input::get('Tussenvoegsel');
            $achternaam = input::get('Achternaam');
            $geboortedatum = input::get('Geboortedatum');
            $straat = input::get('Straat');
            $huisnummer = input::get('Huisnummer');
            $postcode = input::get('Postcode');
            $woonplaats = input::get('Woonplaats');
            $telefoonnummer = input::get('Telefoonnummer');
            $emailadres = input::get('Emailadres');
            $wachtwoord = input::get('Wachtwoord');
            $soortklant = input::get('Soort');			
			$rol = 1;
                
            $bedrijfsnaam = input::get('Bedrijfsnaam');
            $KVK = input::get('KVK');
            $straatbedrijf = input::get('Straatnaambedrijf');
            $huisnummerbedrijf = input::get('Huisnummerbedrijf');
            $postcodebedrijf = input::get('Postcodebedrijf');
            $plaatsbedrijf = input::get('Plaatsbedrijf');
            $telefoonnummerbedrijf = input::get('Telefoonnummerbedrijf');
            $wachtwoord1 = password_hash($wachtwoord, PASSWORD_DEFAULT);
			
			if ($register->setRegister($voornaam, $voorletter, $tussenvoegsel, $achternaam, $geboortedatum, $straat, $huisnummer, $postcode, $woonplaats, $telefoonnummer, $emailadres, $wachtwoord1, $soortklant, $bedrijfsnaam, $KVK, $straatbedrijf, $huisnummerbedrijf, $postcodebedrijf, $plaatsbedrijf, $telefoonnummerbedrijf, $rol)) {
				 $_SESSION['alert'] = true; 
                 $_SESSION['message'] = '<div class="alert alert-success">Gebruiker succesvol opgeslagen!</div>';
                                      
			}
        }

// Registreren admin
	public static function registerAdmin(){
	            $register  = new dataAccountManagement;
	            $voornaam = input::get('Voornaam');
	            $voorletter = input::get('Voorletter');
	            $tussenvoegsel = input::get('Tussenvoegsel');
	            $achternaam = input::get('Achternaam');
	            $geboortedatum = input::get('Geboortedatum');
	            $straat = input::get('Straat');
	            $huisnummer = input::get('Huisnummer');
	            $postcode = input::get('Postcode');
	            $woonplaats = input::get('Woonplaats');
	            $telefoonnummer = input::get('Telefoonnummer');
	            $emailadres = input::get('Emailadres');
	            $wachtwoord = input::get('Wachtwoord');
	            $soortklant = input::get('Soort');			
				$rol = 2;
	                
	       
	            $wachtwoord1 = password_hash($wachtwoord, PASSWORD_DEFAULT);
				
				if ($register->setRegisterAdmin($voornaam, $voorletter, $tussenvoegsel, $achternaam, $geboortedatum, $straat, $huisnummer, $postcode, $woonplaats, $telefoonnummer, $emailadres, $wachtwoord1, $rol)) {
					 $_SESSION['alert'] = true; 
	                 $_SESSION['message'] = '<div class="alert alert-success">Gebruiker succesvol opgeslagen!</div>';
	                                      
				} else {
					
				}
	       }
	
	// Login account cms
	public static function login()
	{
		$login  = new dataAccountManagement;
		$username  = Input::get('username');
		$password  = Input::get('password');        

       	
	    if (password_verify($password, $login->login($username)) == true) {
			$_SESSION['user']['loggedin'] = true;
			$_SESSION['user']['username'] = Input::get('username');
			$name = $login->getName(Input::get('username'));
			$_SESSION['user']['name'] = $name[0]['voornaam'];
			$role = $login->getRole(Input::get('username'));				
			$_SESSION['user']['role'] = $role[0]['rol'];
			$points = $login->getPoints(Input::get('username'));
			$_SESSION['user']['points'] = $points[0]['puntentotaal'];					
			header('Location: admin/index.php');			

		} else {
             
             $_SESSION['alert'] = true; 
             $_SESSION['message'] = '<div class="alert alert-danger">Gebruikersnaam of wachtwoord verkeerd!</div>';
            
		}			
	}
    
   	//Database zoekfunctie voor gebruikers
	public static function userInfo(){
		$userInfo = new dataAccountManagement;
		return $userInfo->getInfo();
	}

   
    //Database verwijderfunctie voor gebruikers
public static function deleteUser() {
		$userDel = new dataAccountManagement;
            if($userDel->delUser(Input::get('username'))) {
                 $_SESSION['alert'] = true; 
                 $_SESSION['message'] = '<div class="alert alert-success">Succesvol verwijderd!</div>';
            }
		}   
   
	 //  Haalt users op
	 public static function getUser($user){
		$users = new dataAccountManagement;				
		$output = $users->getUser($user);			
		return $output;
	}
    
	}



