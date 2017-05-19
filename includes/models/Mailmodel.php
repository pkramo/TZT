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
    public function basic($subject, $sender, $receiver, $content)
    {
        $headers = 'MIME-Version: 1.0' . "\r\n" .

            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .

            'From: ' . $sender . "\r\n" .

            'Reply-To: ' . $sender . "\r\n" .

            'X-Mailer: PHP/' . phpversion();

        $content_markup = "";
        $content_markup .= $content;
        $content_markup .= "";
        mail($receiver, $subject, $content_markup, $headers);
    }
}