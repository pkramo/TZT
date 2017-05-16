<?php
include("build/header.php");

?>

<div class="row">
	<div class="col-xs-1"></div>
	<div class="col-xs-10">
		<h1>Bestelling plaatsen</h1>
	    <!--laat zien dat * betekent verplicht veld -->	    
	        <form method='post'>
	        <?php
	        if($_SESSION['alert']) {
	           echo $_SESSION['message']; 
	        }        
	        ?>
		    <div class="form-group">
			    <label for="Beginlocatie">Route</label> 
			    <select class="form-control" name="route">
			        <option value="Utrecht Centraal -> Amsterdam Centraal">Utrecht Centraal -> Amsterdam Centraal</option>	        
			        <option value="Amsterdam Centraal -> Utrecht Centraal">Amsterdam Centraal -> Utrecht Centraal</option>	        
			    </select>
		    </div>			
			<div class="form-group">
			    <label for="Maat">Maat doos</label>
			    <select name="maat" class="form-control">
			        <option value="305 x 215 x 110">305 x 215 x 110mm</option>
			        <option value="485 x 360 x 260">485 x 360 x 260mm</option>
			        <option value="600 x 450 x 350">600 x 450 x 350mm</option>
			    </select>
			</div>
			<div class="form-group">
			    <label for="Gewicht">Gewicht(kg)</label> <input class="form-control" type="text" name="gewicht"><br>
			</div>
			<div class="form-group">
		    	<input type="submit" class="btn btn-primary form-control" name="placeOrder" value="Plaats bestelling">	
		   	</div>
		</form>
	</div>
	<div class="col-xs-1"></div>
</div>

<?php
include("build/footer.php");
?>