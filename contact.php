<?php
include("includes/autoloader.php");
include("build/head.php");
include("build/navbar.php");
?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-5 padding-auto">
			<div class="col-md-12 ">					
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d649.3079491820458!2d5.1099197360314355!3d52.089553714946895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbb7edc561c63485!2sKiosk!5e0!3m2!1snl!2snl!4v1494575721091" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>	
		<div class="col-xs-12 col-md-7 padding-auto" >
			<div class="col-md-12 lightgrey-background padding-auto">
				<?php
			    if($_SESSION['alert']) {
			        echo $_SESSION['message']; 
			    } ?>
				<form method="POST">
					<div class="form-group">
						<h1>Neem contact met ons op!</h1>
						<label for="name">Naam: </label><input class="form-control" type="text" name="nameContact">
						<label for="email">Email: </label><input class="form-control" type="email" name="emailContact">
						<label for="text">Vul hier uw bericht in: </label><textarea rows="6" class="form-control" name="contentContact"></textarea>
					</div>
					<div class="form-group">	
						<input type="submit" class="btn btn-info form-control" name="sendContact" value="Verzend">
					</div>	
				</form>			
			</div>
		</div>				
	</div>	

<?php

include("build/footer.php");
?>
