<?php 
class accountManagement
{

//Registreren gebruiker
	public static function register()
	{
		$register  = new dataAccountManagement;
		$username  = Input::get('username');
		$password  = Input::get('password');
		$fname     = Input::get('f_name');
		$insertion = Input::get('insertion');
		$lname     = Input::get('l_name');
		$rol       = Input::get('rol');
		$email     = Input::get('email');
		$tel       = Input::get('tel');
		$dys       = Input::get('dys');
		$comment   = Input::get('comment');
		$date      = Input::get('join_date');
        $class     = Input::get('class');
        $school    = Input::get('school');
        $password = password_hash($password, PASSWORD_DEFAULT);
        $check = true;
       foreach (accountManagement::userInfo() as $user) {
            if ($user['username'] == $username) {
                $check = FALSE;
            }
            }
        
        if ($check) {
        if(!empty(input::get("username"))) { // kijkt of gebruikersnaam niet leeg is
          if(preg_match("/^[a-zA-Z ]*$/",$username)){ // kijkt of er geen rare tekens in gebruikersnaam staan
            if(!empty(input::get("password"))) { // kijkt of wachtwoord leeg is
                if (!empty(input::get("f_name"))){ // kijkt of voornaam leeg is
                   if(preg_match("/^[a-zA-Z ]*$/",$fname)) { // kijkt of er geen rare tekens in de voornaam staan
                     if(preg_match("/^[a-zA-Z ]*$/",$insertion)) { // kijkt of geen rare tekens bij tussenvoegsel staan
                      if(!empty(input::get("l_name"))) { // kijkt of achternaam niet leeg is
                        if(preg_match("/^[a-zA-Z ]*$/",$lname)) { // kijkt of er geen rare tekens bij achternaam staan
                          if (preg_match("/^[a-zA-Z0-9 ]*$/",$class)) { // kijkt of er geen rare tekens bij klas staan
                           if(preg_match("/^[a-zA-Z ]*$/",$school)) { // kijkt of er geen rare tekens bij school staan 
                              if(filter_var($email, FILTER_VALIDATE_EMAIL) || empty(input::get("email")))  { // kijkt of email wel goed geformuleerd is
                                //$_SESSION['alert'] = true; 
                                //$_SESSION['message'] = '<div class="alert alert-danger">email is goed</div>';
                                   if(preg_match("/^[0-9]*$/",$tel)) { // kijkt of telefoonnummer wel uit cijfers bestaan
                                      if ($register->setRegister($username,$password,$fname,$insertion,$lname,$rol,$email,$tel,$dys,$comment,$date,$class,$school)) {
			                                         $_SESSION['alert'] = true; 
                                                    $_SESSION['message'] = '<div class="alert alert-success">Gebruiker succesvol opgeslagen!</div>';
                                       // maakt alle variablen leeg nadat de gebruiker succesvol is opgeslagen
                                       $_POST['username'] = $_POST['password'] = $_POST['f_name'] = $_POST['insertion'] = $_POST['l_name'] = $_POST['rol'] = $_POST['email'] = $_POST['tel'] = $_POST['dys'] = $_POST['comment'] = $_POST['join_date'] = $_POST['class'] = $_POST['school'] = "";}
                                       
                                   } else { // plaatst alert over verkeerd ingevuld
                                    $_SESSION['alert'] = true; 
                                $_SESSION['message'] = '<div class="alert alert-danger">telnr is verkeerd</div>'; 
                                   }
                               } else { // plaatst alert over verkeerd ingevuld
                                 $_SESSION['alert'] = true; 
                                $_SESSION['message'] = '<div class="alert alert-danger">email is verkeerd</div>';  
                               } 
                           } else { // plaatst alert over verkeerd ingevuld
                    $_SESSION['alert'] = true; 
            $_SESSION['message'] = '<div class="alert alert-danger">School is verkeerd</div>';
                           }  
                          }  else { // plaatst alert over verkeerd ingevuld
                               $_SESSION['alert'] = true; 
            $_SESSION['message'] = '<div class="alert alert-danger">klas is verkeerd</div>'; 
                          }
                        }  else { // plaatst alert over verkeerd ingevuld
                             $_SESSION['alert'] = true; 
            $_SESSION['message'] = '<div class="alert alert-danger">Achternaam is verkeerd</div>';   
                        }
                      } else { // plaatst alert over het niet ingevulde veld
                       $_SESSION['alert'] = true; 
            $_SESSION['message'] = '<div class="alert alert-danger">Achternaam is verplicht</div>';    
                      }
                     }  else { // plaatst alert over verkeerd ingevuld
                       $_SESSION['alert'] = true; 
            $_SESSION['message'] = '<div class="alert alert-danger">Tussenvoegsel is verkeerd</div>';  
                     }
                   } else { // plaatst alert over verkeerd ingevuld
                     $_SESSION['alert'] = true; 
            $_SESSION['message'] = '<div class="alert alert-danger">Voornaam is verkeerd</div>';  
                   }
                } else { // plaatst alert over het niet ingevulde veld
                   $_SESSION['alert'] = true; 
            $_SESSION['message'] = '<div class="alert alert-danger">Voornaam is verplicht</div>'; 
                }
            }  else { // plaatst alert over het niet ingevulde veld
              $_SESSION['alert'] = true; 
            $_SESSION['message'] = '<div class="alert alert-danger">Wachtwoord is verplicht</div>';  
            }
          } else { // plaatst alert over verkeerd ingevuld
           $_SESSION['alert'] = true; 
            $_SESSION['message'] = '<div class="alert alert-danger">Gebruikersnaam is verkeerd</div>';   
          }
        } else { // plaatst alert over het niet ingevulde veld
         $_SESSION['alert'] = true; 
            $_SESSION['message'] = '<div class="alert alert-danger">Gebruikersnaam is verplicht</div>';   
        }
        } else {
             $_SESSION['alert'] = true;
            $_SESSION['message'] = '<div class="alert alert-danger form-group">Gebruikersnaam is al in gebruik</div>';
        }

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
			header('Location: admin/userinfo.php');			

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



