<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>TESTE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<style type="text/css">

</style>
</head>
<body>
<div class="container" style="margin:3px">


<?php

// VARs -----------------------

$oi = "HELL-O!";

echo "--- VARs ---<br>";
echo $oi;

// IF / FORs -----------------------
echo "<br><br>--- IF / FORs ---<br>";

$chovendo = true;
$ventando = true;


// IF
if ($chovendo)
	echo "<br> Está chovendo.";
else
	echo "<br> Não está chovendo.";

// FOR
for ($i=0 ; $i < 5; $i++) {
	echo "<br>FOR Passo " . $i;
}

// Do While
$w = 0;
do {
	echo "<br>Do While Passo " . $w;
	$w++;

} while ($w < 5);

// While
$w = 0;
while ($w < 5) {
	echo "<br>While Passo " . $w;
	$w++;
}

// Funções --------------------

// Func 1
echo "<br><br>--- Func 1 ---<br>";

function writeMsg() {
  echo "Hello world!";
}

writeMsg(); // call the function

// Func 2
echo "<br><br>--- Func 2 ---<br>";

function familyName($fname, $year) {
  echo "$fname Refsnes. Born in $year <br>";
}

familyName("Hege", "1975");
familyName("Stale", "1978");
familyName("Kai Jim", "1983");


// Func 3
echo "<br><br>--- Func 3 ---<br>";
echo 'function sum($x, $y) <br>';

function sum($x, $y) {
  $z = $x + $y;
  return $z;
}

echo "5 + 10 = " . sum(5, 10) . "<br>";
echo "7 + 13 = " . sum(7, 13) . "<br>";
echo "2 + 4 = " . sum(2, 4);


// Ternario
$chovendo = false;
$ventando = false;

echo "<br><br>--- Ternario ---<br>";
echo "T1: ";
echo $ventando ? "Está ventando." : "Não está ventando.";

echo "<br>T2: ";
echo $ventando && $chovendo ? "Está ventando E chovendo." : "Não está ventando E chovendo.";

echo "<br>T3: ";
echo $ventando || $chovendo ? "Está ventando OU chovendo." : "Não está ventando NEM chovendo.";


// Classes --------------------
echo "<br><br>--- Classes ---<br>";
class Car {
  public $color;
  public $model;
  public function __construct($color, $model) {
    $this->color = $color;
    $this->model = $model;
  }
  public function message() {
    return "My car is a " . $this->color . " " . $this->model . "!";
  }
}

$myCar = new Car("black", "Volvo");
echo $myCar -> message();
echo "<br>";
$myCar2 = new Car("red", "Toyota");
echo $myCar2 -> message();

// Sobrescrevendo a cor
$myCar->color = "YELLOW";

$lista[] = $myCar;
$lista[1] = $myCar2;

echo '<br>Lista 0: ' . $lista[0]->model . ' - ' . $lista[0]->color;
echo '<br>Lista 1: ' . $lista[1]->model . ' - ' . $lista[1]->color;


//include "footer.php";

?>
</div>

<br><br><br>

</body>
</html>



