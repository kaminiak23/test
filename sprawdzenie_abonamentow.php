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
$data = date("Y-m-d");
$dataUnix = strtotime($data);


$query  = "SELECT * FROM klienci WHERE do_kiedy_data < $dataUnix ";
$result = mysql_query($query)
    or die("Query failed");

$r = array();
$tablica_email = array();


$sql = mysql_query("UPDATE klienci SET do_kiedy_data=0 WHERE do_kiedy_data < $dataUnix AND do_kiedy_data > 2");

// while ($row = mysql_fetch_array($result)) 
// {
// 	$x = $row["id"];
// 	$r[] = $x;	
// }

while ($row = mysql_fetch_array($result)) 
{
	$e = $row["id"];
	$tablica_email[] = $e;	
}

echo "<pre>";
print_r($tablica_email);

$_SESSION['tablica'] = $tablica_email;

foreach($r as $v)
{
    
	$ins = mysql_query("INSERT INTO sprawdzenia(id_usera) VALUES ('$v')");
}

//header('Location: mail_blokada.php');


 ?>