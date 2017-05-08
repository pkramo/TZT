<?php

/*
 * 
 *	De database connectie
 *  Door: JNF1-01
 *  Datum: 16/11/2016
 *  Contactpersoon: Ramon Kerpershoek
 *  
 */

class Connection 
{
    protected $host = "localhost"; 			//Host baan
    protected $dbname = "tzt"; 				//Database naam
    protected $user = "root"; 				//Gebruiker database
    protected $pass = ""; 				//Wachtwoord database
    protected $conn;

	//Zet database op
    function __construct() {

        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
        }
        catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

	//Sluit connectie af
    public function closeConnection() {

        $this->conn = null;
    }
}