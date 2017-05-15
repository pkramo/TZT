<?php
include("includes/autoloader.php");
include("build/head.php");
include("build/navbar.php");
?>

<div class="container">
	<div class="row">
		<div class="col-md-2">			
		</div>
		<div class="col-md-8 padding-auto">
			<div class="col-md-12 lightgrey-background padding-auto">
				<?php // laad de errors in het inlogscherm
							if ($_SESSION['alert']) {
								echo $_SESSION['message'];
							}
						?>
				<h2>Login</h2>
				<form method="POST">
					<div class="form-group"><input class="form-control" type="text" name="username" placeholder="Inlognaam"></div>
					<div class="form-group"><input class="form-control" type="password" name="password" placeholder="Wachtwoord"></div>
					<div class="form group">
						<input class="btn btn-primary" type="submit" name="login" value="Inloggen">
						<a class="btn btn-danger pull-right" href="register.php">Registreren</a>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-2">			
		</div>
	</div>
</div>
