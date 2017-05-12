<?php 
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
                
            $bedrijfsnaam = input::get('Bedrijfsnaam');
            $KVK = input::get('KVK');
            $straatbedrijf = input::get('Straatnaam bedrijf');
            $huisnummerbedrijf = input::get('Huisnummer bedrijf');
            $postcodebedrijf = input::get('Postcode bedrijf');
            $plaatsbedrijf = input::get('Plaats bedrijf');
            $telefoonnummerbedrijf = input::get('Telefoonnummer bedrijf');
            VAR_DUMP($voornaam, $voorletter, $tussenvoegsel, $achternaam, $geboortedatum, $straat, $huisnummer, $postcode, $woonplaats, $telefoonnummer, $emailadres, $wachtwoord, $soortklant, $bedrijfsnaam, $KVK, $straatbedrijf, $huisnummerbedrijf, $postcodebedrijf, $plaatsbedrijf, $telefoonnummerbedrijf);
            exit;
            
        }
	
	public static function login()
	{
		$login  = new dataAccountManagement;
		$username  = Input::get('username');
		$password  = Input::get('password');        

       	
		if (password_verify($password, $login->login($username)) == true) {
			$_SESSION['user']['loggedin'] = true;
			$_SESSION['user']['username'] = Input::get('username');
			$role = $login->getRole(Input::get('username'));				
			$_SESSION['user']['role'] = $role[0]['rol'];				
			header('Location: admin/index.php');			

		} else {
            
             $_SESSION['alert'] = true; 
             $_SESSION['message'] = '<div class="alert alert-danger">Gebruikersnaam of wachtwoord verkeerd!</div>';
            
		}			
	}
    
    	public static function rol()
	{
		$rol  = new dataAccountManagement;
		$username  = Input::get('username');
        $role = Input::get('rol');
        		
	}
	public static function getParents(){
		$getOuder = new dataAccountManagement;
		return $getOuder->getParents();
	}
	public static function getChild(){
		$getKind = new dataAccountManagement;
		return $getKind->getChild();
	}
	
	public static function parenthood()
	{
		$register  	= new dataAccountManagement;
		$child  	= Input::get('child');
		$parent  	= Input::get('parent');
		// geeft alert als kind goed is gekoppeld
		if ($register->setParenthood($child,$parent)) {
			 $_SESSION['alert'] = true; 
             $_SESSION['message'] = '<div class="alert alert-success">Kind aan Ouder gekoppeld!</div>';
		} else {
			 $_SESSION['alert'] = true; 
             $_SESSION['message'] = '<div class="alert alert-danger">Error!</div>';
		}			
	}
	
	//Vakken
	public static function Subject(){
		$subject = new dataAccountManagement;
		return $subject->Subject();
	}
	
	public static function setUserSubject()
	{
		$register	= new dataAccountManagement;
		$username	= Input::get('username');
		$subject	= Input::get('subject');
		// geeft alert als vak goed is gekoppeld 
		if ($register->setUserSubject($username, $subject)) {
			$_SESSION['alert'] = true; 
             $_SESSION['message'] = '<div class="alert alert-success">Vak succesvol gekoppeld!</div>';
		} else {
			$_SESSION['alert'] = true; 
            $_SESSION['message'] = '<div class="alert alert-danger">Error!</div>';
		}
	}
	
	//Database zoekfunctie voor gebruikers
	public static function userInfo(){
		$userInfo = new dataAccountManagement;
		return $userInfo->getInfo();
	}

    //Database zoekfunctie voor kinderen
	public static function kindInfo(){
		$kindInfo = new dataAccountManagement;
		return $kindInfo->kindInfo();
	}
    //Database zoekfunctie voor vakken
    public static function vakInfo(){
		$vakInfo = new dataAccountManagement;
		return $vakInfo->vakInfo();
	}
    //Database verwijderfunctie voor gebruikers
public static function deleteUser() {
		$userDel = new dataAccountManagement;
            if($userDel->delUser(Input::get('username'))) {
                 $_SESSION['alert'] = true; 
                 $_SESSION['message'] = '<div class="alert alert-success">Succesvol verwijderd!</div>';
            }
		}
    //Database verwijderfunctie voor gekoppelde ouders
    public static function deleteParent() {
		$parentDel = new dataAccountManagement;
     
            if($parentDel->delParent(Input::get('child'),Input::get('parent'))) {
                 $_SESSION['alert'] = true; 
                 $_SESSION['message'] = '<div class="alert alert-success">Succesvol verwijderd!</div>';
            }
		}
    //Database verwijderfunctie voor gekoppelde vakken
     public static function deleteVak() {
		$vakDel = new dataAccountManagement;
    
            if($vakDel->delVak(Input::get('username'),Input::get('subject'))) {
                 $_SESSION['alert'] = true; 
                 $_SESSION['message'] = '<div class="alert alert-success">Succesvol verwijderd!</div>';
            }
		}
    
	}



