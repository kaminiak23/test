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

$kasuj_id = $_GET['id'];
$query = "SELECT user FROM klienci WHERE id='$kasuj_id'";
$rezultat = mysql_query($query);
$row = mysql_fetch_assoc($rezultat);
?>


<div class="lewa">
	<?php 
		require_once('menu.php');
	 ?>
</div>

<?php
echo '<div class="alert alert-danger" role="alert"> Czy na pewno chcesz wykasować klienta <b>'.$row["user"].'</b>'.'?</div>';
echo '<form action="kasuj_usera_done.php?id='.$kasuj_id.'" method="post"><button type="submit" class="btn btn-danger">Tak, kasuj tego klienta z bilingu</button></form>';
?>

<?php 
require_once ('footer.php');
?>