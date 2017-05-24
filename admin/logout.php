<?php
/*
 * Log uit knop cms
 * 
 * Contactpersoon: Ramon Kerpershoek
 * Datum: 24-5-2017
 * 
 */

  session_start();
  session_destroy();   // function that Destroys Session 
  header("Location: index.php");
?>
