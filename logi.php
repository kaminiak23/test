<?php 
session_start();
require_once ('top.php');
require_once ('config.php');

// sprawdzenie czy zalogowany
if (!isset($_SESSION['zalogowany'])) 
{
	header('Location: index.php');
	exit();
}



// wyswietlenie wynikow tabeli pytania
$query  = "SELECT * FROM logi ORDER BY data_wpisu desc ";
$result = mysql_query($query)
    or die("Query failed");
?>

<div class="lewa">
	<?php 
		require_once('menu.php');
	 ?>
</div>
<div class="prawa">
	<?php 
		

echo '  <table class="table table-hover table-bordered">
			
				<tr class="active">
				  <td  class="col-md-2">Data dodania wpisu</td>
				  <td  class="col-md-10">Logi logowania do bilingu</td>
				</tr>

				
';
while ($row = mysql_fetch_array($result)) {
	
	echo '  
 				<tr>
				  <td>'.date("Y.m.d H:i:s",strtotime($row['data_wpisu'])).'</td>
				  <td>'.$row["tresc"].'<b>'.$row["zalogowany"].'</b></td>
				</tr>
			';
			
}
echo '  </table>';

	 ?>
</div>
<div class="clearboth"></div>



<?php 
require_once ('footer.php');
 ?>