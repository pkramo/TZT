<?php
include('build/header.php');

?>


<div class="row">
        <div class="col-md-1"><!--Linker kant--></div>
  <div class="col-md-10">
    
    <h1>Kies je bestelling</h1>
        <?php
	    if($_SESSION['alert']) {
	        echo $_SESSION['message']; 
	    } ?>
    <table class="table table-hover">
        <thead>        
        <th>Afmeting</th>
        <th>Route</th>
        <th>Gewicht</th>
        <th>Klant</th>
        <th>Puntenwaarde</th>        
        </thead>
      <tbody>
<?php	

$user = $_SESSION['user']['username']; 	    
foreach(order::getMyPackage($user) as $order)
{
	echo'
    <tr>    
    	<td>'.$order['Route'].'</td>  
        <td>'.$order['Maat_doos'].'</td>               
        <td>'.$order['Gewicht'].'</td>
        <td>'.$order['Klant'].'</td>
        <td>'.$order['Puntenwaarde'].'</td>        
        <td>
    		<form method="post">
	    		<input type="hidden" name="id" value="'. $order['Bestelling_id'] .'">	    										
				<button type="submit" name="finished" value="Verwijder" class="btn-cms btn btn-primary"><span class="glyphicon glyphicon-ok"></span></button>
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
