<?php 
class order {
	public static function placeOrder() {
		$order  = new dataOrder;
		$route = input::get('route');
		$maat = input::get('maat');
		$gewicht = input::get('gewicht')." kg";
		$sender = $_SESSION['user']['username'];
		$puntenwaarden = 15;
		
		
		if($order->placeOrder($route,$maat,$gewicht,$sender,$puntenwaarden)) {
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
	
	public static function finishedOrder() {
		$finOrder = new dataOrder;
		$id = Input::get('id');		
        if($finOrder->finsihedOrder($id)) {
             $_SESSION['alert'] = true; 
             $_SESSION['message'] = '<div class="alert alert-success">Succesvol afgerond!</div>';
        }
	}
	
	public static function pickPackage(){
		$order = new dataOrder;				
		$packageID = Input::get('id');
		$sender = Input::get('klant');
		$delivery = $_SESSION['user']['username'];	
		
		if($sender != $delivery) {
			if($order->pickPackage($packageID,$delivery)){
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
