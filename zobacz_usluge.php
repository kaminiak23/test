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

$usluga = $row['usluga'];
$opis = $row['opis'];

$_SESSION['id_uslugi'] = $id_uslugi;
?>

<div class="lewa">
	<?php require_once ('menu.php'); ?>
</div>



<div class="row">
<div class="col-md-2">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Usługa</h3>
  </div>
  <div class="panel-body">
    <?php echo "$usluga"; ?>
  </div>
</div>
</div>

<div class="col-md-10">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Opis</h3>
  </div>
  <div class="panel-body">
    <?php echo "$opis"; ?>
  </div>
</div>
</div>
</div>


  <a class="btn btn-success pull-right " type="submit" href="uslugi.php">Wróć do listy usług</a>



 <?php 
	require_once ('footer.php');
  ?>