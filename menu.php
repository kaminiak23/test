<?php 

if (!isset($_SESSION['zalogowany'])) 
{
	header('Location: index.php');
	exit();
}

$zalogowany = $_SESSION['login'];

?>


<div class="lewa">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-inverse">
				<ul class="nav navbar-nav">
			        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'zalogowany.php?sort_user=asc'){echo 'active'; }else { echo ''; } ?>"><a href="zalogowany.php?sort_user=asc">Lista userów</a></li>
			        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'dodaj.php'){echo 'active'; }else { echo ''; } ?>"><a href="dodaj.php">Dodaj usera</a></li>
			        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'ustawinia.php'){echo 'active'; }else { echo ''; } ?>"><a href="ustawinia.php">Ustawienia</a></li>
			        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'uslugi.php'){echo 'active'; }else { echo ''; } ?>"><a href="uslugi.php">Usługi</a></li>
			        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'logi.php'){echo 'active'; }else { echo ''; } ?>"><a href="logi.php">Logi</a></li>
			        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'alerty.php'){echo 'active'; }else { echo ''; } ?>"><a href="alerty.php">Alerty</a></li>
			    </ul>
			    <ul class="nav navbar-nav pull-right">
					<li><a href="wyloguj.php"><?php echo '<b><font color="white">'.$zalogowany.'</font></b>'; ?> - Wyloguj się</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>