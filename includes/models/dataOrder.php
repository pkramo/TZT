<?php

class dataOrder extends connection {
	
	public function placeOrder($route,$maat,$gewicht,$sender,$puntenwaarden,$status) {
		$sql = "INSERT INTO bestelling (Maat_doos,Gewicht,Route,Puntenwaarde,Klant,Datum,Status) 
		VALUES (
                :Maat_doos, 
                :Gewicht, 
                :Route, 
                :Puntenwaarde,
                :Klant,
                now(),
                :Status
                )";				
		$q = $this -> conn -> prepare($sql);
        $q -> bindValue(':Maat_doos', $maat, PDO::PARAM_STR);
		$q -> bindValue(':Gewicht', $gewicht, PDO::PARAM_STR);
        $q -> bindValue(':Route', $route, PDO::PARAM_STR);
		$q -> bindValue(':Puntenwaarde', $puntenwaarden, PDO::PARAM_STR);		
		$q -> bindValue(':Klant', $sender, PDO::PARAM_STR);
		$q -> bindValue(':Status', $status, PDO::PARAM_STR);					
		$q -> execute();
		
		
		return true;
	}
	
	public function getOrder(){
		$sql = "SELECT * from bestelling WHERE Status = 'Wacht op koerier'";
		$q = $this->conn->prepare($sql);
		$q -> execute();
		return $q->fetchAll();
	}
	
	public function getOrderAdmin(){
		$sql = "SELECT * from bestelling WHERE Status = 'Koerier heeft pakket' OR Status = 'Pakket aangekomen' OR Status = 'Koerier haalt pakket op'ORDER BY Status";
		$q = $this->conn->prepare($sql);
		$q -> execute();
		return $q->fetchAll();
	}
	
	public function myOrder($account){		
		$sql = "SELECT * from bestelling WHERE Klant = :username ORDER BY Status DESC";
		$q = $this->conn->prepare($sql);
		$q->bindValue(':username',$account, PDO::PARAM_STR);		
		$q -> execute();
		
		return $q->fetchAll();
	}
	
	public function getMyPackage($account){		
		$sql = "SELECT * from bestelling WHERE Koerier = :username AND Status = 'Koerier heeft pakket'";
		$q = $this->conn->prepare($sql);
		$q->bindValue(':username',$account, PDO::PARAM_STR);		
		$q -> execute();
		
		return $q->fetchAll();
	}
	
	public function deleteOrder($id) {
		$sql = "DELETE FROM bestelling WHERE Bestelling_id = :id";
		$q = $this->conn->prepare($sql);
		$q->bindValue(':id', $id, PDO::PARAM_STR);
		$q->execute();
		return true;
	}
	
	public function finsihedOrder($id) {
		$sql = "DELETE FROM bestelling WHERE Bestelling_id = :id";
		$q = $this->conn->prepare($sql);
		$q->bindValue(':id', $id, PDO::PARAM_STR);
		$q->execute();
		return true;
	}
	
	public function PackageDelivered($packageID,$delivery,$status){		
		$sql = "UPDATE bestelling SET Koerier = :Sender, Status = :Status WHERE Bestelling_id = :id";
		$q = $this->conn->prepare($sql);
		$q->bindValue(':Sender',$delivery, PDO::PARAM_STR);
		$q->bindValue(':Status',$status, PDO::PARAM_STR);
		$q->bindValue(':id',$packageID, PDO::PARAM_STR);		
		$q->execute();
		return true;
	}
	
	public function finish($packageID,$status){		
		$sql = "UPDATE bestelling SET Status = :Status WHERE Bestelling_id = :id";
		$q = $this->conn->prepare($sql);		
		$q->bindValue(':Status',$status, PDO::PARAM_STR);
		$q->bindValue(':id',$packageID, PDO::PARAM_STR);		
		$q->execute();
		return true;
	}
	
	public function getPack($packageID,$status){		
		$sql = "UPDATE bestelling SET Status = :Status WHERE Bestelling_id = :id";
		$q = $this->conn->prepare($sql);		
		$q->bindValue(':Status',$status, PDO::PARAM_STR);
		$q->bindValue(':id',$packageID, PDO::PARAM_STR);		
		$q->execute();
		return true;
	}
	
	public function pickPackage($packageID,$delivery,$status){		
		$sql = "UPDATE bestelling SET Koerier = :sender, Status = :Status WHERE Bestelling_id = :id";
		$q = $this->conn->prepare($sql);
		$q->bindValue(':sender',$delivery, PDO::PARAM_STR);
		$q->bindValue(':Status',$status, PDO::PARAM_STR);
		$q->bindValue(':id',$packageID, PDO::PARAM_STR);		
		$q->execute();
		return true;
	}
	
	public function NewPoints($koerier,$newPoints){		
		$sql = "UPDATE account SET puntentotaal = :newpoints WHERE gebruikersnaam = :koerier";
		$q = $this->conn->prepare($sql);
		$q->bindValue(':koerier',$koerier, PDO::PARAM_STR);
		$q->bindValue(':newpoints',$newPoints, PDO::PARAM_INT);				
		$q->execute();
		return true;
	}
	
	public function getPoints($username) {
		$sql = "SELECT puntentotaal FROM account WHERE gebruikersnaam = :username";	
		$q = $this -> conn -> prepare($sql);
		$q -> bindValue(':username', $username, PDO::PARAM_STR);
		$q -> execute();
		return $q->fetchAll();
	}
}
