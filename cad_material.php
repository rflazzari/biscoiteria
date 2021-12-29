<?php

include "header.php";
include "menu.php";

include "connection.php";

// Cadastro
$processar = 0;
$msg_successo = $msg_erro = "";
$sql = "";
$id = $nome = $ativo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Ações
	if (empty($_POST["acao"])) {
		$msg_erro = "Ação requerida. ";
		
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
		
	// Excluir
	}  else if ($_POST["acao"] == "excluir"){
		if (empty($_POST["id"])) {
			$msg_erro = "ID requerido. ";
		} else {
			$id = test_input($_POST["id"]);
			$processar = 1;
		}  

		if ($processar) {
			$sql = "DELETE FROM material "
				 . " WHERE id_material = " . $id . " ;";

			if (mysqli_query($conn, $sql)) {
			  $msg_successo = "Item excluído com sucesso: " . $id;
			} else {
			  $msg_erro = "Erro: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
		
	// Ativar / desativar
	}  else if ($_POST["acao"] == "ativar"){
		if (empty($_POST["id"]) 
			|| !($_POST["ativo"] == 0 || $_POST["ativo"] == 1)) {
			
			$msg_erro = "ID requerido. ";
		} else {
			$id = test_input($_POST["id"]);
			$ativo = test_input($_POST["ativo"]);
			$processar = 1;
		}  

		if ($processar) {
			$sql = "UPDATE material "
				 . "   SET ativo = " . ($_POST["ativo"] ? 0 : 1)
				 . " WHERE id_material = " . $id . " ;";

			if (mysqli_query($conn, $sql)) {
			  $msg_successo = "Item alterado com sucesso: " . $id;
			} else {
			  $msg_erro = "Erro: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	}
}


// Consulta
$sql = "
SELECT m.id_material
	 , m.nm_material
     , m.ativo
  FROM material m
;";

$result = mysqli_query($conn, $sql);

// Funções
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<div class="container" style="margin-top:30px">

<?php
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
	  <p><b>Cadastro de Material</b></p>
	  <form action="cad_material.php" method="POST" class="needs-validation">
		<input type="hidden" id="acao" name="acao" value="cadastrar">
		<div class="row">
			<div class="col">
			  <div class="form-group">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" id="nome" placeholder="Entre o nome" name="nome" required>
				<div class="valid-feedback">Valido.</div>
				<div class="invalid-feedback">Preencha o campo.</div>
			  </div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Cadastrar</button>
	  </form>
  </div>
  <br><br>
  
  <!-- Tabela -->
  <div class="row">
    <div class="col-sm-12">  
		<table class="table table-sm table-striped table-hover table-bordered">
		  <thead>
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Material</th>
			  <th scope="col">Ações</th>
			</tr>
		  </thead>
		  <tbody>

<?php

// Imprime itens tabela
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		echo '<tr>'
			. '<th scope="row">' . $row["id_material"] . '</th>'
			. '<td>' . $row["nm_material"] . '</td>'
			. '<td><div style = "display: flex; flex-direction: row;">' 
				. '<form action="cad_material.php" method="POST">
						<input type="hidden" id="acao" name="acao" value="ativar">
						<input type="hidden" id="id" name="id" value="' . $row["id_material"] . '">
						<input type="hidden" id="ativo" name="ativo" value="' . $row["ativo"] . '">
						<button type="submit" class="btn btn-' . ($row["ativo"] ? 'success' : 'danger') . ' btn-sm">
						<i class="' . ($row["ativo"] ? 'fas' : 'far') . ' fa-check-circle"></i> ' . ($row["ativo"] ? 'Ativo &nbsp;' : 'Inativo') . ' </button>
				   </form> &nbsp;&nbsp; '
				. '<form action="cad_material.php" method="POST">
						<input type="hidden" id="acao" name="acao" value="excluir">
						<input type="hidden" id="id" name="id" value="' . $row["id_material"] . '">
						<button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-times"></i> </button>
				   </form>' 
			   
			. '</div></td>'
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
<!-- Fim Tabela -->
</div>

<br><br><br><br><br><br>
<br><br><br><br><br><br>

<?php

// Fecha conn
mysqli_close($conn);

include "footer.php";

?>
