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


$zmien_data = $_POST['zmien_data'];
$zmien_powod = $_POST['zmien_powod'];
$zmien_kto = $_POST['zmien_kto'];


$id = $_SESSION['edytuj_id'];

//sprawdzenie czy sa wymagane zmienne z formularza dodania
if (!$zmien_data || !$zmien_powod || !$zmien_kto ) 
{
header('Location: edytuj_usera.php?blad_zmien_data&id='.$id);
	exit();
}


$zapytanie = "SELECT * FROM klienci WHERE id='$id'"; 
$wynik = mysql_query($zapytanie);
$wiersz = mysql_fetch_array($wynik);

//$ddd = date("Y-m-d H:i:s", $wiersz['do_kiedy_data']);

$ile = 60*60*24*$dodaj_dni_ile;

$dkd = $wiersz['do_kiedy_data'];
$odkodowanaData = date("Y-m-d" , $dkd);

$data = date("Y-m-d");
$dataUnix = strtotime($data);

// dodawanie dni - pokazuje ile dni dodano
$sumowanieDat = $dkd + $ile;
$sumowanieDat2 = $dataUnix + $ile;

$nowaData = strtotime($zmien_data);



// dodajemy rekord do bazy
if (isset($_SESSION['edytuj_id'])) 
{
	
		$ins = @mysql_query("UPDATE klienci SET do_kiedy_data='$nowaData' WHERE id='$id'");
		unset($_SESSION['edytuj_id']);
	
}



if($ins) 
header('Location: zalogowany.php?poprawnie_zmieniono_date&sort_user=asc');



require_once ('footer.php');
 ?>