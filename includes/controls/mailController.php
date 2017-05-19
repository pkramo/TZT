<?php

/*
 * 
 *	Mail controller voor de mail
 *  Door: DevAlly
 *  Datum: 30/05/2015
 *  Contactpersoon: Ramon Kerpershoek
 *  
 */

Class mailController{
	
	//Aanvraag ingedient en email opgeslagen
    public static function mailClass()
    {
            $content = Input::get('mailContent');
            $mail = new MailModel;
            $mail->basic('Verhuur aanvraag geaccepteerd De Hanzeluiden', 'info@hanzeluiden.nl', Input::get('emailRequester'), $content);
    }

	//Aanvraag geweigerd
    public static function mailClassCancel()
    {
            $content = Input::get('mailContentCancel');
            $mail = new MailModel;
            $mail->basic('Verhuur aanvraag afgewezen De Hanzeluiden', 'info@hanzeluiden.nl', Input::get('emailRequester'), $content);
    }
}