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
<div class="col-md-12">
		<div class="alert alert-success" role="alert">Edycja usługi</div> </br>
<form class="form-horizontal" action="edytuj_usluge_in.php" method="post">
  <div class="form-group">
    <label class="col-md-2 control-label">Usługa</label>
    <div class="col-md-8">
      <input type="text" class="form-control" name="edit_usluga" value="<?php echo "$usluga"; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-md-2 control-label">Opis</label>
    <div class="col-md-8">
      
      <textarea class="form-control" name="edit_opis" rows="10" value="<?php echo "$opis"; ?>"><?php echo "$opis"; ?></textarea>
    </div>
  </div>

  
  <div class="form-group">
    <div class="col-md-offset-2 col-md-8">
      <button type="submit" class="btn btn-default">Zapisz</button>
    </div>
  </div>
</form>

	</div>

</div>




 <?php 
	require_once ('footer.php');
  ?>