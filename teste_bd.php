<?php

include "connection.php";

?>

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

// Form --------------------
echo "--- Form ---<br>";

// Cadastro
$processar = 0;
$id = $nome = "";
$msg_erro = "";
$msg_successo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Ações
	if (empty($_POST["acao"])) {
		$msg_erro = "Ação requerida.";
		
	// Cadastrar	
	} else if ($_POST["acao"] == "cadastrar"){
		
		if (empty($_POST["nome"])) {
			$msg_erro = "Nome requerido. ";
		} else {
			$nome = test_input($_POST["nome"]);
			$processar = 1;
		}  

		if ($processar) {
			$sql = "INSERT INTO material (nm_material)
					VALUES ('" . $nome . "');";

			if (mysqli_query($conn, $sql)) {
			  $msg_successo = "Item cadastrado com sucesso: " . mysqli_insert_id($conn);
			} else {
			  $msg_erro = "Erro: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	} else {
		$msg_erro = "Ação inválida.";
	}
}

// Funções
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if ($msg_successo != "") {
	echo '<div class="alert alert-success alert-dismissible fade show shadow-sm p-3 mb-5 rounded" role="alert">'
	   . $msg_successo
	   . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>';
} else if ($msg_erro != "") {
	echo '<div class="alert alert-danger alert-dismissible fade show shadow-sm p-3 mb-5 rounded" role="alert">'
	   . $msg_erro
	   . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>';
}
?>

<!-- Formulário de cadastro -->
<div class="container p-3 my-3 border">  
  <p><b>Cadastro de Teste</b></p>
  <form action="teste_bd.php" method="POST" class="needs-validation">
	<input type="hidden" id="acao" name="acao" value="cadastrar">
	<div class="row">
		<div class="col">
		  <div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" class="form-control" id="nome" placeholder="Entre o nome" name="nome">
			<div class="valid-feedback">Valido.</div>
			<div class="invalid-feedback">Preencha o campo.</div>
		  </div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
</div>

<br><br>--- Tabela de Dados ---<br>
<!-- Tabela -->
<table style="border: 2px solid green; width: 20%;">
  <thead style="border: 2px solid green;">
	<tr>
	  <th style="border: 2px solid green;">#</th>
	  <th>Material</th>
	</tr>
  </thead>
  <tbody>

<?php

// Consulta
$sql = " SELECT id_material , nm_material, ativo FROM material ";

// Executa e guarda o resultado na var result
$result = mysqli_query($conn, $sql);

// Imprime tabela
if (mysqli_num_rows($result) > 0) {
	
	while($row = mysqli_fetch_assoc($result)) {
		echo '<tr>'
			. '<th>' . $row["id_material"] . '</th>'
			. '<td>' . $row["nm_material"] . '</td>'
			. '</tr>';
	}
} else {
  echo '<tr><td colspan="100%"> 0 resultados. </td></tr>';
}

?>
		  </tbody>
		</table>
    </div>
  </div>
  
</div>
<br><br>------------------------------------------------------- X -------------------------------------------------------
<br><br>
<?php

// Fecha conn
mysqli_close($conn);

//include "footer.php";

?>
</div>
</body>
</html>
