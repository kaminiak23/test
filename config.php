<?php 


$login_admin = 'admin';
$haslo_admin = '23';

$host = 'localhost';
$db_name = 'biling';
$db_user = 'root';
$db_pass = '';

// łączymy się z bazą danych
$connection = @mysql_connect('localhost', 'root', '')
or die('Brak połączenia z serwerem MySQL');
mysql_query("SET NAMES utf8");
$db = @mysql_select_db('biling', $connection)
or die('Nie mogę połączyć się z bazą danych');



 ?>