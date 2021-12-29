<!DOCTYPE html>

<html lang="pt-br">
<head>
  <title>VerSys</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>

<div class="jumbotron jumbotron-fluid text-center" style="margin-bottom:0; padding: 10px;">
  <h1>VerSys</h1>
  <p>Bem vindo ao VerSys!</p> 
</div>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<?php
include "menu.php";
?>

<style>
body {
  background-color: gray;
}
  img {
  display: block;
  margin-left: auto;
  margin-right: auto;

}
  </style>

<br>

<?php
// inicio da pag, controles e vars

if (empty($_GET["p"])) {
    $pag_atual = 1;
} else {
   $pag_atual = $_GET["p"];
}
$pag_total = 20;

echo 'PAGINA ATUAL: ' . $pag_atual;
echo '<br>';
echo 'PAGINA TOTAL: ' . $pag_total;
echo '<br>';
echo 'PAGINA P: ' . $_GET["p"];
echo '<br><br>';
?>



<?php
echo '<img src="img/' . $pag_atual . '.jpg" class="img-fluid" /><br>';
// fim da pag
 

for ($x = 1; $x <= $pag_total; $x++) {
}
?>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <?php
	
    echo '<a class="page-item"><a class="page-link" href="catalogo.php?p=' . ($pag_atual -1) . '"> Previous > </a></li>';
		for ($x = 1; $x <= $pag_total; $x++) {
			
	echo '<li class="page-item"><a class="page-link" href="catalogo.php?p=' . $x . '"> ' . $x . '</a></li>';
	}	
	
    echo '<li class="page-item"><a class="page-link" href="catalogo.php?p=' . ($pag_atual +1) . '"> Next > </a></li>';
	?>
  </ul>
</nav>

</body>
</html>

<nav aria-label="...">
  <ul class="pagination justify-content-center">

<?php

// Paginação
echo '<li class="page-item' . ($pag_atual <= 1 ? ' disabled' : '') . '">';
echo '    <a class="page-link" href="catalogo.php?p=' . ($pag_atual -1) . '"' . ( $pag_atual <= 1 ? ' tabindex="-1" aria-disabled="true"' : '') . '>Previous</a>';
echo '</li>';

for ($x = 1; $x <= $pag_total; $x++) {
    echo '<li class="page-item' . ($pag_atual == $x ? ' active" aria-current="page' : '') 
	   . '"><a class="page-link" href="catalogo.php?p=' . $x . '"> ' . $x . ($pag_atual == $x ? ' <span class="sr-only">(current)</span>' : '') 
	   . ' </a></li>';
} 

echo '<li class="page-item' . ($pag_atual >= $pag_total ? ' disabled' : '') . '">';
echo '    <a class="page-link" href="catalogo.php?p=' . ($pag_atual +1) . '"' . ( $pag_atual >= $pag_total ? ' tabindex="-1" aria-disabled="true"' : '') . '>Next</a>';
echo '</li>';
	
?>

  </ul>
</nav>

<?php

include "footer.php";

?>
