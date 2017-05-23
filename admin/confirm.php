<?php
include('build/header.php');

?>


<div class="row">
        <div class="col-md-1"><!--Linker kant--></div>
  <div class="col-md-10">
    
    <h1>Mijn gekozen pakketten</h1>
        <?php
	    if($_SESSION['alert']) {
	        echo $_SESSION['message']; 
	    } ?>
    <table class="table table-hover">
        <thead>
        <th>Status</th>        
        <th>Route</th>
        <th>Afmeting</th>
        <th>Gewicht</th>
        <th>Klant</th>
        <th>Koerier</th>
        <th>Puntenwaarde</th>        
        </thead>
      <tbody>
<?php	

$user = $_SESSION['user']['username']; 	    
foreach(order::getOrderAdmin($user) as $order)
{
	echo'
    <tr>
    	<td>'.$order['Status'].'</td>    
    	<td>'.$order['Route'].'</td>  
        <td>'.$order['Maat_doos'].'</td>               
        <td>'.$order['Gewicht'].'</td>
        <td>'.$order['Klant'].'</td>
        <td>'.$order['Koerier'].'</td>  
        <td>'.$order['Puntenwaarde'].'</td>        
        <td>
    		<form method="post">
	    		<input type="hidden" name="id" value="'. $order['Bestelling_id'] .'">	
	    		<input type="hidden" name="koerier" value="'. $order['Koerier'] .'">
	    		<input type="hidden" name="puntenwaarde" value="'. $order['Puntenwaarde'] .'">    										
				'; if($order['Status'] == 'Koerier heeft pakket'){ echo '<button type="submit" name="received" value="Verwijder" class="btn-cms btn btn-warning"><span class="glyphicon glyphicon-ok"></span></button>
				'; } else if($order['Status'] == 'Pakket aangekomen'){ echo' <button type="submit" name="finished" value="Verwijder" class="btn-cms btn btn-primary"><span class="glyphicon glyphicon-ok"></span></button>
			'; } else if ($order['Status'] == 'Koerier haalt pakket op') {echo ' <button type="submit" name="getpack" value="Verwijder" class="btn-cms btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>
			'; } echo '
			</form>
			</td>
       </tr> 
        ';
      
}
?>

 
</tbody>
</table>
  </div>
  
  <div class="col-md-1"><!--Rechter kant--></div>  
  </div>    
