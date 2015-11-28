<?php 
session_start();
require_once ('top.php');
require_once ('config.php');


if (!isset($_SESSION['zalogowany'])) 
{
	header('Location: index.php');
	exit();
}
?>

Wybierz konto na jakie chcesz się zalogować:
<?php 
echo ' 
<a class="btn btn-success " type="submit" href="wybor_sprawdzenie.php?login=konrad">Konrad</a>
<a class="btn btn-success " type="submit" href="wybor_sprawdzenie.php?login=gosia">Gosia</a>
';
?>

<?php 
require_once ('footer.php');
 ?>
