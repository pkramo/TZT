<?php
$_SESSION['alert'] = false; 
$_SESSION['message'] = "";
/*
 * Post alle functies hier
 * 
 * Naam: Ramon Kerpershoek
 * Datum: 6-12-2016
 * 
 */
 
// Account 
 if (Input::has('login')) accountManagement::login();
 if (Input::has('Register')) accountManagement::register();
 
 // Bestellingen
 if (Input::has('placeOrder')) order::placeOrder();
 if (Input::has('deleteMyOrder')) order::deleteOrder();
 if (Input::has('pickPackage')) order::pickPackage();
 if (Input::has('finished')) order::finishedOrder();

 