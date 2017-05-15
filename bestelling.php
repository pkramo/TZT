<?php
include("includes/autoloader.php");
include("build/head.php");
include("build/navbar.php");
?>

<form method="post" action="bestelling.php">
    <label for="Beginlocatie">Beginlocatie</label> 
    <select name="plaats">
        <option value="Utrecht">Utrecht Centraal</option>
        
        <option value="Amsterdam">Amsterdam Centraal</option>
        
    </select><br>

    <label for="Eindlocatie">Eindlocatie</label>
        <?php if($_POST['plaats'] === 'Utrecht'){
            echo '<label for="Plaats">Amsterdam Centraal</label><br>';
        } else if($_POST['plaats'] === 'Amsterdam') {
        echo '<label for="Plaats">Utrecht Centraal</label><br>';
        } ?>


    <label for="Maat">Maat doos</label>
    <select>
        <option value="305 x 215 x 110">305 x 215 x 110mm</option>
        <option value="485 x 360 x 260">485 x 360 x 260mm</option>
        <option value="600 x 450 x 350">600 x 450 x 350mm</option>
    </select><br>
    <label for="Gewicht">Gewicht(kg)</label> <input type="text" name="Gewicht"><br>

    <input type="submit" name="Verstuur" value="Verstuur gegevens">

</form>