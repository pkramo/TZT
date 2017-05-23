<?php
include('build/header.php');

?>


<div class="row">
        <div class="col-md-1"><!--Linker kant--></div>
  <div class="col-md-10">
    
    <h1>Mijn geplaatste bestellingen</h1>
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
	        <th>Tijdstip</th>        
        </thead>
      <tbody>
<?php	

$user = $_SESSION['user']['username'];   
 foreach(order::myOrder($user) as $order)
{
	echo'
    <tr> 
    	<td>'.$order['Status'].'</td>   
    	<td>'.$order['Route'].'</td>  
        <td>'.$order['Maat_doos'].'</td>               
        <td>'.$order['Gewicht'].'</td>
        <td>'.date($order['Datum']).'</td>                
        <td>
    		<form method="post">
    			<input type="hidden" name="id" value="'. $order['Bestelling_id'] .'">								
				'; if($order['Status'] == 'Afgeleverd' || $order['Status'] == 'Wacht op koerier'){ echo '
				<button type="submit" name="deleteMyOrder" value="Verwijder" class="btn-cms btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
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
