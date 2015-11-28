<?php 
session_start();

if (isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany']==true)) 
{
	header('Location: zalogowany.php');
	exit();
}

require_once ('top.php');

?>


Biling - Panel Administracyjny <br/><br/>

<form action="zaloguj.php" method="post">
	Login: <br/> <input type="text" name="login"><br/>
	Hasło: <br/> <input type="password" name="haslo"><br/><br/>
	<input type="submit" value="Zaloguj się"></br></br>
</form>
	




<?php 

  if(isset($_SESSION['blad'])) 
  	echo $_SESSION['blad']; 
  	unset($_SESSION['blad']);
  require_once ('footer.php');
  
?>

