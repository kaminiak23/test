
<?php 
session_start();
require_once ('config.php');

$odbiorcy = $_SESSION['tablica'];

echo "<pre>";
print_r($odbiorcy);


$wiadomosc = 'test';
$odkogo = 'kaminiak23@wp.pl';
$to      = 'kaminiak23@wp.pl';
$subject = 'rower';
$headers = 'From: ' . $odkogo . "\r\n" .
			'Content-type: text/html; charset=utf-8';


$message = '

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>' . $wiadomosc . '</body>
</html>';

for ($i=0; count($odbiorcy) > $i; ++$i) 
mail($odbiorcy[$i], 'Kontakt ze strony www.strona.pl', $message, $headers);


//mail($to, $subject, $message, $headers);

$_SESSION['wyslano'] = true;
//$_SESSION['wyslano'] = ;

// $data = date("Y-m-d");
// $dataUnix = strtotime($data);
// $query  = "SELECT email FROM klienci WHERE id =21";
// $result = mysql_query($query)
//     or die("Query failed");

echo "wyslano ";
echo "<br>";
echo "<br>";echo "<br>";


// for ($i=0; count($odbiorcy) > $i; ++$i) 
// mail($odbiorcy[$i], 'Kontakt ze strony www.strona.pl', $message, $headers);

for ($i=0; count($odbiorcy) > $i; ++$i) 
{
	echo $odbiorcy[$i] ;
	echo " - ";
	
	echo "<br>";
}

?>