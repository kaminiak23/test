<?php 
session_start();
require_once ('config.php');
require_once ('top.php');

// sprawdzenie czy jest zalogowany
if (!isset($_SESSION['zalogowany'])) 
{
	header('Location: index.php');
	exit();
}


$id_uslugi = $_GET ['id'];

$zapytanie = "SELECT * FROM uslugi WHERE id='$id_uslugi'";
$wynik = mysql_query($zapytanie);
$row = mysql_fetch_assoc($wynik);
?>

<div class="lewa">
	<?php require_once ('menu.php'); ?>
</div>


<?php
echo '<div class="alert alert-danger" role="alert">Czy na pewno chcesz wykasować usługę <b>'. $row['usluga'] . '</b>?</div>';
echo '<a type="button" class="btn btn-danger" href="kasuj_usluge_done.php?id='.$id_uslugi.'">Tak usuń tą usługę!</a>';

 ?>

 <?php 
	require_once ('footer.php');
  ?>