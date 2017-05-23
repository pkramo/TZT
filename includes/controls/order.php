<?php 
class order {
	public static function placeOrder() {
		$order  = new dataOrder;
		$route = input::get('route');
		$maat = input::get('maat');
		$sender = input::get('klant');
		$puntenwaarden = input::get('punten');
		$gewicht = input::get('gewicht')." kg";		
		$status = 'Wacht op koerier';
		
		
		if($order->placeOrder($route,$maat,$gewicht,$sender,$puntenwaarden,$status)) {
			$_SESSION['alert'] = true; 
            $_SESSION['message'] = '<div class="alert alert-success">Order geplaatst!</div>';
		} else {
			$_SESSION['alert'] = true; 
            $_SESSION['message'] = '<div class="alert alert-danger">Er is iets misgegaan!</div>';
		}
	}
	
	public static function getOrder(){
		$order = new dataOrder;
		return $order->getOrder();
	}
	
	public static function getOrderAdmin(){
		$order = new dataOrder;
		return $order->getOrderAdmin();
	}
	
	public static function myOrder($account){
		$order = new dataOrder;				
		$output = $order->myOrder($account);			
		return $output;
	}
	
	public static function getMyPackage($account){
		$order = new dataOrder;				
		$output = $order->getMyPackage($account);			
		return $output;
	}
	
	public static function deleteOrder() {
		$delOrder = new dataOrder;
		$id = Input::get('id');		
        if($delOrder->deleteOrder($id)) {
             $_SESSION['alert'] = true; 
             $_SESSION['message'] = '<div class="alert alert-success">Succesvol verwijderd!</div>';
        }
	}
	
	public static function PackageDelivered() {
		$finOrder = new dataOrder;		
		$id = Input::get('id');	
		$koerier = Input::get('koerier');
		$koeriername = Input::get('koerier');
		$points = $finOrder->getPoints($koeriername);
		
		$puntenKoerier = $points[0]['puntentotaal'];
		
		$puntenOrder = Input::get('puntenwaarde');
		$newPoints = $puntenKoerier + $puntenOrder;
		$status = 'Pakket aangekomen';	
		
		
		
        if($finOrder->PackageDelivered($id,$koerier,$status)) {
        	if($finOrder->NewPoints($koeriername,$newPoints)) {
             $_SESSION['alert'] = true; 
             $_SESSION['message'] = '<div class="alert alert-success">Pakket is aangekomen bij de kiosk!</div>';
			}
        }
	}
	
	public static function finish() {
		$finOrder = new dataOrder;		
		$id = Input::get('id');	
		$koerier = Input::get('koerier');				
		$status = 'Afgeleverd';	
		
		
		
        if($finOrder->finish($id,$status)) {
        	
             $_SESSION['alert'] = true; 
             $_SESSION['message'] = '<div class="alert alert-success">Het pakketje is bezorgd aan de klant!</div>';
			
        }
	}
	
	public static function getPack() {
		$finOrder = new dataOrder;		
		$id = Input::get('id');	
		$koerier = Input::get('koerier');				
		$status = 'Koerier heeft pakket';	
		
		
		
        if($finOrder->getPack($id,$status)) {
        	
             $_SESSION['alert'] = true; 
             $_SESSION['message'] = '<div class="alert alert-success">Het pakketje wordt nu bezorgd!</div>';
			
        }
	}
	
	public static function pickPackage(){
		$order = new dataOrder;				
		$packageID = Input::get('id');
		$sender = Input::get('klant');
		$status = 'Koerier haalt pakket op';
		$delivery = $_SESSION['user']['username'];	
		
		if($sender != $delivery) {
			if($order->pickPackage($packageID,$delivery,$status)){
				$_SESSION['alert'] = true; 
            	$_SESSION['message'] = '<div class="alert alert-success">Dit pakketje kunt u nu ophalen bij de Kiosk!</div>';
			} else {
				$_SESSION['alert'] = true; 
            	$_SESSION['message'] = '<div class="alert alert-danger">Er is iets misgegaan!</div>';
			}
		} else {
			$_SESSION['alert'] = true; 
            $_SESSION['message'] = '<div class="alert alert-danger">Dit is uw eigen pakket!</div>';
		}
	}
	
	
	
	
}
