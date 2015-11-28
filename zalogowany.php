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

<div class="lewa">
	<?php 
		require_once('menu.php');
	 ?>
</div>
<div class="prawa">
	<?php 
		require_once('content.php');
	 ?>
</div>
<div class="clearboth"></div>



<?php 
require_once ('footer.php');
 ?>