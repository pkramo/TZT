<?php

class dataOrder extends connection {
	
	public function placeOrder($route,$maat,$gewicht,$sender,$puntenwaarden) {
		$sql = "INSERT INTO bestelling (Maat_doos,Gewicht,Route,Puntenwaarde,Klant,Datum) 
		VALUES (
                :Maat_doos, 
                :Gewicht, 
                :Route, 
                :Puntenwaarde,
                :Klant,
                now()
                )";				
		$q = $this -> conn -> prepare($sql);
        $q -> bindValue(':Maat_doos', $maat, PDO::PARAM_STR);
		$q -> bindValue(':Gewicht', $gewicht, PDO::PARAM_STR);
        $q -> bindValue(':Route', $route, PDO::PARAM_STR);
		$q -> bindValue(':Puntenwaarde', $puntenwaarden, PDO::PARAM_STR);		
		$q -> bindValue(':Klant', $sender, PDO::PARAM_STR);				
		$q -> execute();
		
		
		return true;
	}
	
	public function getOrder(){
		$sql = "SELECT * from bestelling";
		$q = $this->conn->prepare($sql);
		$q -> execute();
		return $q->fetchAll();
	}
	
	public function myOrder($account){		
		$sql = "SELECT * from bestelling WHERE Klant = :username";
		$q = $this->conn->prepare($sql);
		$q->bindValue(':username',$account, PDO::PARAM_STR);		
		$q -> execute();
		
		return $q->fetchAll();
	}
	
	public function getMyPackage($account){		
		$sql = "SELECT * from bestelling WHERE Koerier = :username";
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
	
	public function pickPackage($packageID,$delivery){		
		$sql = "UPDATE bestelling SET Koerier = :sender WHERE Bestelling_id = :id";
		$q = $this->conn->prepare($sql);
		$q->bindValue(':sender',$delivery, PDO::PARAM_STR);
		$q->bindValue(':id',$packageID, PDO::PARAM_STR);		
		$q->execute();
		return true;
	}
}
