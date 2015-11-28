<?php 
session_start();
require_once ('config.php');


// sprawdzenie czy jest zalogowany
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


$usluga_id = $_GET['id'];


$zapytanie = mysql_query("SELECT * FROM uslugi WHERE id='$usluga_id'");
$row = mysql_fetch_array($zapytanie); 

$poprzedni_nazwa_uslugi = $row['usluga'];
$poprzedni_zapis_uslugi = $row['opis'];




if (!empty($usluga_id)) 
{
	mysql_query("DELETE FROM uslugi WHERE id='$usluga_id'")
	or die('Błąd zapytania: '.mysql_error());
	$log = mysql_query("INSERT INTO logi SET tresc='Wykasowano usługę: $poprzedni_nazwa_uslugi. Zapis opisu usługi $poprzedni_nazwa_uslugi w bazie przed wykasowaniem: $poprzedni_zapis_uslugi.  Wykasował:  ', zalogowany='$wybrany_login'");
	header('Location: uslugi.php?usunieto');
}

else
{
	echo "błąd przesłania ID usera do kasowania";
}

  ?>