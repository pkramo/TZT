<?php
include('build/header.php');

?>


<div class="row">
        <div class="col-md-1"><!--Linker kant--></div>
  <div class="col-md-10">
    
    <h1>Kies uw pakket</h1>
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

	    
 foreach(order::getOrder() as $order)
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
	    		<input type="hidden" name="klant" value="'. $order['Klant'] .'">									
				'; if($_SESSION['user']['role'] != '2'){ echo '
				<button type="submit" name="pickPackage" value="update" class="btn-cms btn btn-primary"><span class="glyphicon glyphicon-inbox"></span></button>
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
