<?php

$host = "localhost";
$port = 3306;
$user = "bis_sys";
$pass = "bisSys01..";
$dbname = "biscoiteria";

// Cria conexão
$conn = mysqli_connect($host, $user, $pass, $dbname, $port);

// Checa conexão
if (!$conn) {
  die("Conexão de dados falhou: " . mysqli_connect_error());
}

mysqli_set_charset($conn,"utf8");

// echo "Initial character set is: " . mysqli_character_set_name($conn) . "<br>";
// // Change character set to utf8
// mysqli_set_charset($conn,"utf8");
// echo "Current character set is: " . mysqli_character_set_name($conn) . "<br><br>";

?>
