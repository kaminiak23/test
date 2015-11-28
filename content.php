<?php 


// sprawdzenie czy zalogowany
if (!isset($_SESSION['zalogowany'])) 
{
	header('Location: index.php');
	exit();
}


// info o usunieciu usera
if (isset($_GET['user_wykasowany'])) 
	echo '<div class="alert alert-success" role="alert">User został wykasowany z bazy</div>';

// info o poprawnym dodaniu nowego usera do bazy
if (isset($_GET['dodano_usera'])) 
	echo '<div class="alert alert-success" role="alert">Nowy user został dodany poprawnie do bilingu</div>';

// info o zmianie rekordu
if (isset($_GET['poprawna_edycja_usera'])) 
	echo '<div class="alert alert-success" role="alert">Rekord został zmieniony poprawnie</div>';

// info o dodaniu dni (abonamentu)
if (isset($_GET['poprawnie_dodano_dni'])) 
	echo '<div class="alert alert-success" role="alert">Poprawnie dodano dni abonamentu dla edytowanego usera</div>';

// info o zmianie data (abonamentu)
if (isset($_GET['poprawnie_zmieniono_date'])) 
	echo '<div class="alert alert-success" role="alert">Poprawnie zmieniono datę abonamentu dla edytowanego usera</div>';


// sortowanie usera
if (isset($_GET['sort_user'])) 
	{
		if ($_GET['sort_user']==='asc') {
			$sortowanie_by = 'user asc';
		}
		else {
			$sortowanie_by = 'user desc';
		}
	}

// sortowanie uslugi
if (isset($_GET['sort_usluga'])) 
	{
		if ($_GET['sort_usluga']==='asc') {
			$sortowanie_by = 'usluga asc';
		}
		else {
			$sortowanie_by = 'usluga desc';
		}
	}

// sortowanie po adresie email
if (isset($_GET['sort_email'])) 
	{
		if ($_GET['sort_email']==='asc') {
			$sortowanie_by = 'email asc';
		}
		else {
			$sortowanie_by = 'email desc';
		}
	}

// sortowanie po dacie dodania
if (isset($_GET['sort_dodano_data'])) 
	{
		if ($_GET['sort_dodano_data']==='asc') {
			$sortowanie_by = 'dodano_data asc';
		}
		else {
			$sortowanie_by = 'dodano_data desc';
		}
	}

// sortowanie po dacie do końca
if (isset($_GET['sort_do_kiedy_data'])) 
	{
		if ($_GET['sort_do_kiedy_data']==='asc') {
			$sortowanie_by = 'do_kiedy_data asc';
		}
		else {
			$sortowanie_by = 'do_kiedy_data desc';
		}
	}

// sortowanie po ilości dni do końca
if (isset($_GET['sort_dni_do_konca'])) 
	{
		if ($_GET['sort_dni_do_konca']==='asc') {
			$sortowanie_by = 'do_kiedy_data asc';
		}
		else {
			$sortowanie_by = 'do_kiedy_data desc';
		}
	}

// wyswietlenie wynikow tabeli pytania
$query  = "SELECT * FROM klienci ORDER BY $sortowanie_by ";
$result = mysql_query($query)
    or die("Query failed");





echo '  <table class="table table-hover table-bordered">
			
				<tr class="active">
				  
				  <td>Nazwa usera</td>
				  <td>Usługa</td>
				  <td>Scieżka</td>
				  <td>E-mail</td>
				  <td>Dodał</td>
				  <td>Data dodania</td>
				  <td>Data do kiedy</td>
				  <td>Dni do końca</td>
				  <td>Opcje</td>
				</tr>

				<tr>
				  
				  <td>
				  	<a class="btn btn-'; if (isset($_GET['sort_user']) AND $_GET['sort_user']==='asc') { echo "success"; } else{ echo "default"; } echo ' btn-xs" type="submit" href="zalogowany.php?sort_user=asc">A-Z</a>
				  	<a class="btn btn-'; if (isset($_GET['sort_user']) AND $_GET['sort_user']==='desc') { echo "success"; } else{ echo "default"; } echo ' btn-xs" type="submit" href="zalogowany.php?sort_user=desc">Z-A</a>
				  </td>
				  <td>
				  	<a class="btn btn-'; if (isset($_GET['sort_usluga']) AND $_GET['sort_usluga']==='asc') { echo "success"; } else{ echo "default"; } echo ' btn-xs" type="submit" href="zalogowany.php?sort_usluga=asc">A-Z</a>
				  	<a class="btn btn-'; if (isset($_GET['sort_usluga']) AND $_GET['sort_usluga']==='desc') { echo "success"; } else{ echo "default"; } echo ' btn-xs" type="submit" href="zalogowany.php?sort_usluga=desc">Z-A</a>
				  </td>
				  <td></td>
				  <td>
				  	<a class="btn btn-'; if (isset($_GET['sort_email']) AND $_GET['sort_email']==='asc') { echo "success"; } else{ echo "default"; } echo ' btn-xs" type="submit" href="zalogowany.php?sort_email=asc">A-Z</a>
				  	<a class="btn btn-'; if (isset($_GET['sort_email']) AND $_GET['sort_email']==='desc') { echo "success"; } else{ echo "default"; } echo ' btn-xs" type="submit" href="zalogowany.php?sort_email=desc">Z-A</a>
				  </td>
				  <td></td>
				  <td>
				  	<a class="btn btn-'; if (isset($_GET['sort_dodano_data']) AND $_GET['sort_dodano_data']==='asc') { echo "success"; } else{ echo "default"; } echo ' btn-xs" type="submit" href="zalogowany.php?sort_dodano_data=asc">Najstarszy</a>
				  	<a class="btn btn-'; if (isset($_GET['sort_dodano_data']) AND $_GET['sort_dodano_data']==='desc') { echo "success"; } else{ echo "default"; } echo ' btn-xs" type="submit" href="zalogowany.php?sort_dodano_data=desc">Najnowszy</a>
				  </td>
				  <td>
				  	<a class="btn btn-'; if (isset($_GET['sort_do_kiedy_data']) AND $_GET['sort_do_kiedy_data']==='asc') { echo "success"; } else{ echo "default"; } echo ' btn-xs" type="submit" href="zalogowany.php?sort_do_kiedy_data=asc">Najszybciej</a>
				  	<a class="btn btn-'; if (isset($_GET['sort_do_kiedy_data']) AND $_GET['sort_do_kiedy_data']==='desc') { echo "success"; } else{ echo "default"; } echo ' btn-xs" type="submit" href="zalogowany.php?sort_do_kiedy_data=desc">Najpóźniej</a>
				  </td>
				  <td>
				  	<a class="btn btn-'; if (isset($_GET['sort_dni_do_konca']) AND $_GET['sort_dni_do_konca']==='asc') { echo "success"; } else{ echo "default"; } echo ' btn-xs" type="submit" href="zalogowany.php?sort_dni_do_konca=asc">Najmniej</a>
				  	<a class="btn btn-'; if (isset($_GET['sort_dni_do_konca']) AND $_GET['sort_dni_do_konca']==='desc') { echo "success"; } else{ echo "default"; } echo ' btn-xs" type="submit" href="zalogowany.php?sort_dni_do_konca=desc">Najwięcej</a>
				  </td>
				  <td></td>
				</tr>
';
while ($row = mysql_fetch_array($result)) {
	
	echo '  
 				<tr>
				  
				  
				  <td>'.$row["user"].'</td>
				  <td>'.$row["usluga"].'</td>
				  <td>'.substr($row['sciezka'],0,10).'</td>
				  <td>'.$row["email"].'</td>
				  <td>'.$row["dodal"].'</td>
				  <td>'.date("<b>Y.m.d</b> H:i:s",strtotime($row['dodano_data'])).'</td>
				  <td>';
					  if ($row['do_kiedy_data'] > 1) 
					  {
					  	echo date("<b>Y.m.d</b> H:i:s", $row["do_kiedy_data"]);
					  	echo '</td><td>';
					  }
					  else
					  {
					  	echo "Brak";
					  	echo '</td><td>';
					  }

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