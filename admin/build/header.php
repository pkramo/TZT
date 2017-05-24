<?php
include('../includes/autoloader.php');

if($_SESSION['user']['role'] == '1' || $_SESSION['user']['role'] == '2') {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="tzt">
    <meta name="author" content="tzt">
    
	<meta property="og:title" content="tzt">
	<meta property="og:description" content="tzt">
	<meta property="og:url" content="www.tzt.nl/admin">
	<meta property="og:site_name" content="tzt">
	<meta property="og:type" content="website">	
	
	<title>TZT</title>
   	
    <!-- Custom CSS -->    
    <link href="https://bootswatch.com/cerulean/bootstrap.min.css" rel="stylesheet"> 
    <link href="../css/admin.css" rel="stylesheet">      	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.0/cropper.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 

    <!-- Custom Fonts -->
   
	</head>

	<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top nav-color always-open" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav-color">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">TZT</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav nav-color">
            	<p class="navbar-text block"><b><?php echo "Punten: ". $_SESSION['user']['points']; ?></b></p>
                <li class="dropdown">
                    <a href="logout.php"> <?php echo "Uitloggen";  ?></a>                    
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse nav-color">
                
                <ul class="nav navbar-nav side-nav">
                    <?php $file = basename($_SERVER['PHP_SELF'] , '.php'); ?>
                    <li>
                    	<p class="navbar-text"><b><?php echo "Welkom ". $_SESSION['user']['name'] ."!"; ?></b></p>
                    </li>        
                    <li <?php if($file == 'index' || $file == 'send'){?> class="active collapsed" <?php } ?>>
	                    <a data-toggle="collapse" data-parent="#accordion" href="#koerier"><span class="glyphicon glyphicon-send"></span>
	                    	 Koerier
	                    </a>            
	                    <div id="koerier" class="collapse">
	                    	<ul class="collapsemenu">
		                    	<li <?php if($file == 'index'){?> class="active" <?php } ?>>
		                        	<a href="index.php"><span class="glyphicon glyphicon-plus"></span> Pakket Kiezen</a>
		                    	</li>	                    
		                    	<?php if($_SESSION['user']['role'] == '1') { ?>
		                    	<li <?php if($file == 'send'){?> class="active" <?php } ?>>
		                        	<a href="send.php"><span class="glyphicon glyphicon-inbox"></span> Mijn Leveringen</a>
		                    	</li>
		                    	<?php } ?>  
	                    	</ul>
	                    </div>                   
                    </li>
                    <?php if($_SESSION['user']['role'] == '1') { ?>
                    <li <?php if($file == 'myOrders'){?> class="active" <?php } ?>>
	                 <a data-toggle="collapse" data-parent="#accordion" href="#klant"><span class="glyphicon glyphicon-briefcase"></span>
	                 	 	Klant
	                 </a>            
	                    <div id="klant" class="collapse">
                    	<ul class="collapsemenu">	                    	
	                    	<li <?php if($file == 'myOrders'){?> class="active" <?php } ?>>
	                        	<a href="myOrders.php"><span class="glyphicon glyphicon-list"></span> Mijn Bestellingen</a>
	                    	</li>
                    	</ul>
                    </div>
                    </li>
                    <?php } ?>
                    <li <?php if($file == 'mijnGegevens'){?> class="active" <?php } ?>>
	                      <a href="mijnGegevens.php"><span class="glyphicon glyphicon-user"></span> Mijn gegevens</a>
	                </li>
	                
	                <?php if($_SESSION['user']['role'] == '2') { ?>
	                	
	                 <li <?php if($file == 'bestelling' || $file == 'createadmin' || $file == 'infousers' || $file == 'confirm'){?> class="active collapsed" <?php } ?>>
	                 <a data-toggle="collapse" data-parent="#accordion" href="#admin"><span class="glyphicon glyphicon-list"></span>
	                 	 	Admin
	                 </a>            
	                    <div id="admin" class="collapse">
                    	<ul class="collapsemenu">
	                    	<?php if($_SESSION['user']['role'] == '2') {?> 
		                     <li <?php if($file == 'bestelling'){?> class="active" <?php } ?>>
	                        	<a href="bestelling.php"><span class="glyphicon glyphicon-cloud"></span> Bestelling Plaatsen</a>
	                    	</li>	                    	
	                    	 <?php } if($_SESSION['user']['role'] == '2') { ?>
	                    	<li <?php if($file == 'createadmin'){?> class="active" <?php } ?>>
	                        	<a href="createadmin.php"><span class="glyphicon glyphicon-user"></span> Nieuwe admin</a>
	                    	</li>
	                    	 <?php } if($_SESSION['user']['role'] == '2') {?> 
	                    	<li <?php if($file == 'infousers'){?> class="active" <?php } ?>>
	                        	<a href="infousers.php"><span class="glyphicon glyphicon-menu-hamburger"></span> Alle users</a>
	                    	</li>
	                    	<?php } if($_SESSION['user']['role'] == '2') {?> 
	                    	<li <?php if($file == 'confirm'){?> class="active" <?php } ?>>
		                        <a href="confirm.php"><span class="glyphicon glyphicon-inbox"></span> Aankomst bevestigen</a>
		                    </li> 		                     
	                    	<?php } ?>
                    	</ul>
                    </div>
                    </li>
                    
                    <?php } ?>                  
                                     
                           
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>    
        
<?php	
} else {
	header('location: ../index.php');
}


?>