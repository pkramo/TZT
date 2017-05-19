<?php

/*
 * 
 *	mail model voor verbindingen met de database
 *  Door: DevAlly
 *  Datum: 30/05/2015
 *  Contactpersoon: Ramon Kerpershoek
 *  
 */

Class MailModel extends Connection
{
	//Standaard verend model
    public function send($name, $email, $message)
	{
		$to = "pkramo@gmail.com";
		// this is your Email address and this has to be changed before giving it to the client
		$from = $email;
		// this is the sender's Email address
		$subject = "Contact aanvraag";
		$subject2 = "Bevestiging contact aanvraag";
		$message = $name . " heeft het volgende bericht naar u gestuurd via het contact formulier van scouting de Hanzeluiden:

		". $message;
		$message2 = "Uw vraag is verstuurd we nemen zo spoedig mogelijk contact met u op.
		    
		Met vriendelijke groet,
		TZT";
		$headers = "From:" . $from;
		$headers2 = "From:" . $to;
		
		
		return mail($to, $subject, $message, $headers).
		mail($from, $subject2, $message2, $headers2);
		
		
		
		
	}
}