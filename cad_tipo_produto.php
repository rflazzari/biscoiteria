<?php

include "header.php";
include "menu.php";

include "connection.php";

// FLAGS
define('DEBUG', true);

// Cadastro
$processar = 0;
$msg_successo = $msg_erro = "";
$sql = "";
$id = $nome = $tipo_produto = $linha = $descricao = $ativo = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Ações
	if (empty($_POST["acao"])) {
		$msg_erro = "Ação requerida. ";
		
	// Cadastrar	
	} else if ($_POST["acao"] == "cadastrar"){
				
// DEBUG
if (DEBUG)
echo 'NOME: '  . $_POST["nome"] 
   . ' TIPO: ' . $_POST["tipo_produto"]
   . ' LINHA: ' . $_POST["linha"]
   . ' DESC: ' . $_POST["descricao"] 
   ;		
				
		if (!empty($_POST["nome"])) {
			$nome = test_input($_POST["nome"]);
			$processar = 1;
		} else {
			$msg_erro = "Nome requerido. ";
			$processar = 0;
		}  
		
		if ($processar && !empty($_POST["tipo_produto"])) {
			$tipo_produto = test_input($_POST["tipo_produto"]);
			
		} else {
			$msg_erro .= "<br>Tipo requerido. ";			
			$processar = 0;
		}
		
		if ($processar && !empty($_POST["linha"])) {
			$linha = test_input($_POST["linha"]);
		} 
		
		if ($processar && !empty($_POST["descricao"])) {
			$descricao = test_input($_POST["descricao"]);
		} 
		
		
		if ($processar) {
			$sql = "INSERT INTO produto (nm_produto, id_tipo_produto, nm_linha, ds_produto)
					VALUES ('" . $nome . "', " . $tipo_produto . ", " . (!empty($linha) ? "'".$linha."'" : "null") . ", " . (!empty($descricao) ? "'".$descricao."'" : "null") . ");";
// DEBUG
if (DEBUG)
	echo " SQL: " .$sql;

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
			$sql = "DELETE FROM produto "
				 . " WHERE id_produto = " . $id . " ;";

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
			$sql = "UPDATE produto "
				 . "   SET ativo = " . ($_POST["ativo"] ? 0 : 1)
				 . " WHERE id_produto = " . $id . " ;";

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
SELECT id_tipo_produto
     , nm_tipo_produto
	 , ativo
  FROM tipo_produto
";

$sql_tipo_produto = "
SELECT tp.id_tipo_produto
	 , tp.nm_tipo_produto
     , tp.ativo
  FROM tipo_produto tp
 -- WHERE tp.ativo = 1
;";


$result = mysqli_query($conn, $sql);

$result_tipo_produto = mysqli_query($conn, $sql_tipo_produto);

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
	  <p><b>Cadastro de Produto</b></p>
	  <form action="cad_produto.php" method="POST" class="needs-validation">
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
		
		<div class="row">
			<div class="col">
			  <div class="form-group">
				<label for="tipo_produto">Tipo:</label>
				<select class="custom-select" id="tipo_produto" name="tipo_produto">
				  <option value="" selected>-- Selecione --</option>
				
					<?php

					// Imprime itens
					if (mysqli_num_rows($result_tipo_produto) > 0) {
						while($row = mysqli_fetch_assoc($result_tipo_produto)) {
							echo '<option value="'. $row["id_tipo_produto"] . '">' . $row["nm_tipo_produto"] . '</option>';
					  }
					} else {
					  echo "<tr><td> 0 resultados.</td></tr>";
					}

					?>
				</select>
				<div class="valid-feedback">Valido.</div>
				<div class="invalid-feedback">Preencha o campo.</div>
			  </div>
			</div>
		</div>
		
		<div class="row">
			<div class="col">
			  <div class="form-group">
				<label for="linha">Linha:</label>
				<input type="text" class="form-control" id="linha" placeholder="Entre a linha" name="linha">
				<div class="valid-feedback">Valido.</div>
				<div class="invalid-feedback">Preencha o campo.</div>
			  </div>
			</div>
		</div>
		
		<div class="row">
			<div class="col">
			  <div class="form-group">
				<label for="descricao">Descrição:</label>
				<textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
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
			  <th scope="col">Tipo Produto</th>
			  <th scope="col">Ativo</th>
			</tr>
		  </thead>
		  <tbody>
			<?php

			// Imprime itens tabela
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo '<tr>'
						. '<th scope="row">' . $row["id_tipo_produto"] . '</th>'
						. '<td>' . $row["nm_tipo_produto"] . '</td>'
						. '<td>' . $row["ativo"] . '</td>'
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

<br><br><br><br><br><br>
<br><br><br><br><br><br>

<?php

mysqli_close($conn);

include "footer.php";

?>
