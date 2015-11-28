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

//$id_uslugi = $_GET ['id'];

$usluga = $_POST['edit_usluga'];
$opis = $_POST['edit_opis'];

$id = $_SESSION['id_uslugi'];

//sprawdzenie czy sa wymagane zmienne z formularza dodania
if (!$usluga || !$opis) 
{
header('Location: uslugi.php?edycja_brak_danych');
	exit();
}


$q = mysql_query( "SELECT * FROM uslugi WHERE usluga = '$usluga' AND id != $id"); 

$zapytanie = mysql_query("SELECT * FROM uslugi WHERE id='$id'");
$row = mysql_fetch_array($zapytanie); 

$poprzedni_zapis_uslugi = $row['opis'];



if(mysql_num_rows($q) >0) 
{																																
 	header('Location: uslugi.php?jest_podana');
	exit();

} 

    
// dodajemy rekord do bazy

if (isset($_SESSION['id_uslugi'])) 
{
	$sql = mysql_query("UPDATE uslugi SET usluga='$usluga', opis='$opis' WHERE id='$id'");
	$log = mysql_query("INSERT INTO logi SET tresc='Edytowano usługę: $usluga. Poprzedni zapis w bazie: $poprzedni_zapis_uslugi.  Edytował:  ', zalogowany='$wybrany_login'");
	header('Location: uslugi.php?poprawna_edycja');
}




?>