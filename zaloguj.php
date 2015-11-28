<?php 
session_start();
require_once ('top.php');

if (!isset($_POST['login']) && ($_POST['haslo'])) 
{
	header('Location: index.php');
	require_once ('wyloguj.php');
	exit();
}

require_once ('config.php');

$login = $_POST['login'];
$haslo = $_POST['haslo'];

//$_SESSION['login'] = $login;

if ($login == $login_admin AND $haslo == $haslo_admin ) 
{
	$_SESSION['zalogowany'] = true;
	$sql = mysql_query("INSERT INTO logi SET tresc='Poprawnie zalogowano do bilingu na login: ', zalogowany='$login'");
	header('Location: wybor.php');
	//header('Location: zalogowany.php?sort_user=asc');

}
else {
    $_SESSION['blad'] = "Błędne dane logowania";
    $sql = mysql_query("INSERT INTO logi SET tresc='Błąd logowania, podawany login to: ', zalogowany='$login'");
    header('Location: index.php');
	
}

//echo $login;

 ?>