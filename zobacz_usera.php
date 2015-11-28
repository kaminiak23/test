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

$edytuj_id = $_GET['id'];


// wyswietlenie wynikow tabeli pytania
$query  = "SELECT * FROM klienci WHERE id='$edytuj_id'";
$result = mysql_query($query)
    or die("Query failed");
$row = mysql_fetch_array($result);
require_once('menu.php');

echo '  
	
		<table class="table table-hover table-bordered">
			<tr>
				<td class="col-md-2">Id w bazie danych</td>
				<td class="col-md-10">'.$row["id"].'</td>
			</tr>
 			<tr>
				<td>Nazwa usera</td>
				<td>'.$row["user"].'</td>
			</tr>
			<tr>
				<td>Usługa</td>
				<td>'.$row["usluga"].'</td>
			</tr>
			<tr>
				<td>Scieżka</td>
				<td>'.$row["sciezka"].'</td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td>'.$row["email"].'</td>
			</tr>
			<tr>
				<td>Dodał</td>
				<td>'.$row["dodal"].'</td>
			</tr>
			<tr>
				<td>Data dodania</td>
				<td>'.date("Y.m.d",strtotime($row['dodano_data'])).'</td>
			</tr>
			<tr>
				<td>Data do kiedy</td>
				<td>';
					  if ($row['do_kiedy_data'] > 1) 
					  {
					  	echo date("Y.m.d", $row["do_kiedy_data"]);
					  	
					  }
					  else
					  {
					  	echo "Brak";
					  }
					  echo '</td>

			</tr>
			<tr>
				<td>Dni do końca</td>
				<td>';

					if ($row['do_kiedy_data'] > 1) 
					  {
					  	$dkd = $row['do_kiedy_data'];
					  	$data = date("Y-m-d");
						$dataUnix = strtotime($data);

						// odejmowanie dni - pokazuje ile dni zostalo
						$roznicaDat = $dkd - $dataUnix; 
						$ileDniZostalo = $roznicaDat/60/60/24;
					  	echo round($ileDniZostalo);
					  }
					  else 
					  {
					  	echo "Brak";
					  }


				echo '</td>
			</tr>
		</table>
	';		
?>

<a class="btn btn-success " type="submit" href="zalogowany.php?sort_user=asc">Wróc</a>
</br></br></br>
LOGI
</br></br>

<?php 

$query_zakupy  = "SELECT * FROM zakupy WHERE id_usera='$edytuj_id'";
$result_zakupy = mysql_query($query_zakupy)
    or die("Query failed");
//$row_zakupy = mysql_fetch_array($result_zakupy);






echo '<table class="table table-hover table-bordered">';
while ($row_zakupy = mysql_fetch_array($result_zakupy))
	{
		
		echo '  
			
					<tr>
						<td class="col-md-2">'.$row_zakupy["data_zakupu"].'</td>
						<td class="col-md-10">Dodano dni: <b> '.$row_zakupy["ile_dni"].' </b>. ' ;
						

						if ($row_zakupy['data_wygasania_przed_zakupem'] > 1) 
							{
								echo'Data wygasania przed dodaniem to: '. date("Y.m.d H:i:s", $row_zakupy["data_wygasania_przed_zakupem"]). ', / było wtedy '.$row_zakupy["ilosc_dni_przed_zakupem"].' do końca abonamentu.' ;

							}
							else
							{
								echo "Przed dodaniem nie było abonamentu.";
							}

						echo 
						' Osoba dodająca: '.$row_zakupy["kto_dodal"].'</td>
					</tr>
		 			
				';	

	}	
echo '</table>';

 ?>


<?php
require_once ('footer.php');
 ?>