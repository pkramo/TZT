<?php
/*
 * Regelt database connectie voor accounts
 * 
 * Contactpersoon: Ramon Kerpershoek
 * Datum: 24-5-2017
 * 
 */
 
class dataAccountManagement extends connection {
	
	// Registreren van gebruikers in de database
	public function setRegister($voornaam,$voorletter,$tussenvoegsel,$achternaam,$geboortedatum,$straat,$huisnummer,$postcode,$woonplaats,$telefoonnummer,$emailadres,$wachtwoord,$soortklant,$bedrijfsnaam,$KVK,$straatbedrijf,$huisnummerbedrijf,$postcodebedrijf,$plaatsbedrijf,$telefoonnummerbedrijf,$rol) {
		$sql = "INSERT INTO account (gebruikersnaam, voornaam, voorletter, tussenvoegsel, achternaam, geboortedatum, straat, huisnummer, postcode, woonplaats, telefoonnummer, emailadres, wachtwoord, soortklant, bedrijfsnaam, KVK, straatbedrijf, huisnummerbedrijf, postcodebedrijf, plaatsbedrijf, telefoonnummerbedrijf,rol) 
		VALUES (
                :gebruikersnaam, 
                :voornaam, 
                :voorletter, 
                :tussenvoegsel, 
                :achternaam, 
                :geboortedatum, 
                :straat, 
                :huisnummer, 
                :postcode, 
                :woonplaats, 
                :telefoonnummer, 
                :emailadres, 
                :wachtwoord, 
                :soortklant, 
                :bedrijfsnaam, 
                :KVK, 
                :straatbedrijf, 
                :huisnummerbedrijf, 
                :postcodebedrijf, 
                :plaatsbedrijf, 
                :telefoonnummerbedrijf,
                :rol
				)";
		$q = $this -> conn -> prepare($sql);
        $q -> bindValue(':gebruikersnaam', $emailadres, PDO::PARAM_STR);
		$q -> bindValue(':voornaam', $voornaam, PDO::PARAM_STR);
        $q -> bindValue(':voorletter', $voorletter, PDO::PARAM_STR);
		$q -> bindValue(':tussenvoegsel', $tussenvoegsel, PDO::PARAM_STR);		
		$q -> bindValue(':achternaam', $achternaam, PDO::PARAM_STR);
		$q -> bindValue(':geboortedatum', $geboortedatum, PDO::PARAM_STR);	
		$q -> bindValue(':straat', $straat, PDO::PARAM_STR);	
		$q -> bindValue(':huisnummer', $huisnummer, PDO::PARAM_STR);	
		$q -> bindValue(':postcode', $postcode, PDO::PARAM_STR);
        $q -> bindValue(':woonplaats', $woonplaats, PDO::PARAM_STR);
		$q -> bindValue(':telefoonnummer', $telefoonnummer, PDO::PARAM_STR);	
		$q -> bindValue(':emailadres', $emailadres, PDO::PARAM_STR);	
		$q -> bindValue(':wachtwoord', $wachtwoord, PDO::PARAM_STR);	
		$q -> bindValue(':soortklant', $soortklant, PDO::PARAM_STR);
        $q -> bindValue(':bedrijfsnaam', $bedrijfsnaam, PDO::PARAM_STR);
        $q -> bindValue(':KVK', $KVK, PDO::PARAM_STR);
        $q -> bindValue(':straatbedrijf', $straatbedrijf, PDO::PARAM_STR);
        $q -> bindValue(':huisnummerbedrijf', $huisnummerbedrijf, PDO::PARAM_STR);	
		$q -> bindValue(':postcodebedrijf', $postcodebedrijf, PDO::PARAM_STR);
        $q -> bindValue(':plaatsbedrijf', $plaatsbedrijf, PDO::PARAM_STR);
        $q -> bindValue(':telefoonnummerbedrijf', $telefoonnummerbedrijf, PDO::PARAM_STR);
		$q -> bindValue(':rol', $rol, PDO::PARAM_STR);
		$q -> execute();
               
		return true;
	}

	// Registreren van admin
	public function setRegisterAdmin($voornaam,$voorletter,$tussenvoegsel,$achternaam,$geboortedatum,$straat,$huisnummer,$postcode,$woonplaats,$telefoonnummer,$emailadres,$wachtwoord,$rol) {
		$sql = "INSERT INTO account (gebruikersnaam, voornaam, voorletter, tussenvoegsel, achternaam, geboortedatum, straat, huisnummer, postcode, woonplaats, telefoonnummer, emailadres, wachtwoord, rol) 
		VALUES (
                :gebruikersnaam, 
                :voornaam, 
                :voorletter, 
                :tussenvoegsel, 
                :achternaam, 
                :geboortedatum, 
                :straat, 
                :huisnummer, 
                :postcode, 
                :woonplaats, 
                :telefoonnummer, 
                :emailadres, 
                :wachtwoord,                
                :rol
				)";
		$q = $this -> conn -> prepare($sql);
        $q -> bindValue(':gebruikersnaam', $emailadres, PDO::PARAM_STR);
		$q -> bindValue(':voornaam', $voornaam, PDO::PARAM_STR);
        $q -> bindValue(':voorletter', $voorletter, PDO::PARAM_STR);
		$q -> bindValue(':tussenvoegsel', $tussenvoegsel, PDO::PARAM_STR);		
		$q -> bindValue(':achternaam', $achternaam, PDO::PARAM_STR);
		$q -> bindValue(':geboortedatum', $geboortedatum, PDO::PARAM_STR);	
		$q -> bindValue(':straat', $straat, PDO::PARAM_STR);	
		$q -> bindValue(':huisnummer', $huisnummer, PDO::PARAM_STR);	
		$q -> bindValue(':postcode', $postcode, PDO::PARAM_STR);
        $q -> bindValue(':woonplaats', $woonplaats, PDO::PARAM_STR);
		$q -> bindValue(':telefoonnummer', $telefoonnummer, PDO::PARAM_STR);	
		$q -> bindValue(':emailadres', $emailadres, PDO::PARAM_STR);	
		$q -> bindValue(':wachtwoord', $wachtwoord, PDO::PARAM_STR);			
		$q -> bindValue(':rol', $rol, PDO::PARAM_STR);
		$q -> execute();
               
		return true;
	}
	// hier word de gebruikersnaam opgehaald uit de database
	public function login($username) {
		$sql = "SELECT * FROM account WHERE gebruikersnaam = :username "; 		
		$q = $this -> conn -> prepare($sql);
		$q -> BindParam(':username',$username);		
		$q -> execute();		
		$row = $q->fetchAll();
		
		if ($row == true){
			return $row[0]['wachtwoord'];			
		}else{
			return false;
		}
	}
	// hier word de rol van de gebruiker uit de database gehaald 
    public function getRole($username) {
		$sql = "SELECT rol FROM account WHERE gebruikersnaam = :username";	
		$q = $this -> conn -> prepare($sql);
		$q -> bindValue(':username', $username, PDO::PARAM_STR);
		$q -> execute();
		return $q->fetchAll();
	}
	
	// haalt aantal punten op van gebruiker
	public function getPoints($username) {
		$sql = "SELECT puntentotaal FROM account WHERE gebruikersnaam = :username";	
		$q = $this -> conn -> prepare($sql);
		$q -> bindValue(':username', $username, PDO::PARAM_STR);
		$q -> execute();
		return $q->fetchAll();
	}
	
	// haalt de voornaam op
	public function getName($username) {
		$sql = "SELECT voornaam FROM account WHERE gebruikersnaam = :username";	
		$q = $this -> conn -> prepare($sql);
		$q -> bindValue(':username', $username, PDO::PARAM_STR);
		$q -> execute();
		return $q->fetchAll();
	}
	
	
	// hier worden alle gebruikers met de rol ouder of kind opgehaald om te tonen voor de beheerder
	public function getInfo(){
		$sql = "SELECT * from account WHERE rol = '1' OR rol = '2' ORDER BY soortklant";
		$q = $this->conn->prepare($sql);
		$q -> execute();
		return $q->fetchAll();
	}
    
        // deze functie wordt gebruikt op de gebruikers pagina om een gebruiker te verwijderen
	public function delUser($user) {
		$sql = "DELETE FROM account WHERE gebruikersnaam = :username";
		$q = $this->conn->prepare($sql);
		$q->bindValue(':username', $user, PDO::PARAM_STR);
		$q->execute();
		return true;
	}
    // deze functie wordt gebruikt om op de ouderschap pagina een ouder van een kind te verwijderen
	public function delParent($child,$parent) {
		$sql = "DELETE FROM parent WHERE user_child = :user_child AND user_parent = :user_parent";
		$q = $this->conn->prepare($sql);
        $q->bindValue(':user_child', $child, PDO::PARAM_STR);
        $q->bindValue(':user_parent', $parent, PDO::PARAM_STR);
		$q->execute();
		return true;
	}
   
   // haalt de gebruiker op
	public function getUser($user){		
		$sql = "SELECT * from account WHERE gebruikersnaam = :username";
		$q = $this->conn->prepare($sql);
		$q->bindValue(':username',$user, PDO::PARAM_STR);		
		$q -> execute();
		
		return $q->fetchAll();
	}
}