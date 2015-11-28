<?php  
session_start();
require_once ('config.php');

// sprawdzenie czy zalogowany
if (!isset($_SESSION['zalogowany'])) 
{
	header('Location: index.php');
	exit();
}

// sprawdzenie czy wybrano login
if (!isset($_SESSION['login'])) 
{
  header('Location: wybor.php');
  exit();
}

$wybrany_login = $_SESSION['login'];

$kasuj_id = $_GET['id'];

$zapytanie = "SELECT * FROM klienci WHERE id='$kasuj_id'";
$wynik = mysql_query($zapytanie);
$row = mysql_fetch_array($wynik);

$user = $row['user'];
$email = $row['email'];
$sciezka = $row['sciezka'];
$usluga = $row['usluga'];
$do_kiedy = date("Y.m.d H:i:s", $row["do_kiedy_data"]);



if (!empty($kasuj_id)) 
{
	mysql_query("DELETE FROM klienci WHERE id='$kasuj_id'")
	or die('Błąd zapytania: '.mysql_error());

	$sql = mysql_query("INSERT INTO logi SET tresc='Wykasowano usera o nicku $user. Miał on w danej chwili parametry:</br>(email-$email), (ścieżka-$sciezka), (usługa-$usluga), (data wygasania usługi-$do_kiedy). Wykasował:  ', zalogowany='$wybrany_login'");
	header('Location: zalogowany.php?user_wykasowany&sort_user=asc');

}
else
{
	echo "błąd przesłania ID usera do kasowania";
}

?>