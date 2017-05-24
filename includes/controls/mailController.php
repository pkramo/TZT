<?php

/*
 * Contact functie
 * 
 * Contactpersoon: Ramon Kerpershoek
 * Datum: 24-5-2017
 * 
 */

Class mailController{
	
	//Aanvraag ingedient en email opgeslagen
    public static function contact()
    {
    		$mail = new MailModel;
    		$name = Input::get('nameContact');
			$email = Input::get('emailContact');
            $content = Input::get('contentContact');
			        
            if($mail->send($name,$email,$content)) {
            	
            	$_SESSION['alert'] = true; 
	            $_SESSION['message'] = '<div class="alert alert-success">Contact formulier verzonden</div>';
            } else {
            	
            	$_SESSION['alert'] = true; 
	            $_SESSION['message'] = '<div class="alert alert-warning">Er is iets misgegaan vul alles in en probeer opnieuw!</div>';
            }
    }

	
}