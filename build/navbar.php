<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        </button>
            <a class="navbar-brand" href="index.php"><b>TZT</b></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
            	<?php $file = basename($_SERVER['PHP_SELF'] , '.php'); ?>
                <li <?php if($file == 'index'){?> class="active" <?php } ?>><a href="index.php">Home</a></li>
                <li <?php if($file == 'info'){?> class="active" <?php } ?>><a href="info.php">Wat doen we</a></li>
                <li <?php if($file == 'over-ons'){?> class="active" <?php } ?>><a href="over-ons.php">Over ons</a></li>
                <li <?php if($file == 'contact'){?> class="active" <?php } ?>><a href="contact.php">Contact</a></li>                
            </ul> 
            <ul class="nav navbar-nav navbar-right">  
            	<li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
            </ul>        
        </div>
    </div>
 </nav>


