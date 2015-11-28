<?php 
session_start();
require_once ('top.php');

// sprawdzenie czy zalogowany
if (!isset($_SESSION['zalogowany'])) 
{
	header('Location: index.php');
	exit();
}


echo "Witaj <b>".$_SESSION['login'].' </b>jestes w pliku "zalogowany"' . '  |  ' .'<a href="wyloguj.php">Wyloguj się</a>';
?>


<?php require_once('menu.php'); ?>

<div class="prawa">
	<?php 
		require_once('content.php');
	 ?>
</div>
<div class="clearboth"></div>




<?php require_once ('footer.php'); ?>