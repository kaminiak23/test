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
$query  = "SELECT * FROM logi ";
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
			
				<tr>
				  
				  <td>ID usera</td>
				  <td>Data dodania wpisu</td>
				  <td>Wartość przed działaniem</td>
				  <td>Blokada</td>
				  <td>Wysłana wiadomość</td>
				  <td>Podawany Login do bilingu</td>
				  <td>Informacja</td>
				  <td>Opcje</td>
				</tr>

				
';
while ($row = mysql_fetch_array($result)) {
	
	echo '  
 				<tr>
				  
				  
				  <td>'.$row["id_usera"].'</td>
				  <td>'.date("<b>Y.m.d</b> H:i:s",strtotime($row['data_wpisu'])).'</td>
				  <td>'.$row["wartosc_przed_dzialaniem"].'</td>
				  <td>'.$row["blokada"].'</td>
				  <td>'.$row["wyslana_wiadomosc"].'</td>
				  <td>'.$row["zalogowany"].'</td>
				  <td>'.$row["tresc"].'</td>
				  
				  <td>
					<form class="pull-right">
					    <a class="btn btn-success btn-xs" type="submit" href="zobacz_usera.php?id='.$row['id'].'">Zobacz</a>
					    <a class="btn btn-success btn-xs" type="submit" href="edytuj_usera.php?id='.$row['id'].'">Edytuj</a>
					    <a class="btn btn-danger btn-xs" type="submit" href="kasuj_usera.php?id='.$row['id'].'">Kasuj</a>
					</form>
				  </td>
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