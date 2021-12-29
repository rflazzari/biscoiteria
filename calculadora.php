<?php

include "header.php";
include "menu.php";

?>
<script>

function calcular() {
    var qtdDiamante = document.getElementById('qtdDiamante').value;
	var tamanhoDiamante = document.getElementById('tamanhoDiamante').value;
    var qtdDiamante1 = document.getElementById('qtdDiamante1').value;
	var tamanhoDiamante1 = document.getElementById('tamanhoDiamante1').value;
	var qtdDiamante2 = document.getElementById('qtdDiamante2').value;
	var tamanhoDiamante2 = document.getElementById('tamanhoDiamante2').value;
	
    var soma = ( (qtdDiamante * tamanhoDiamante) + (qtdDiamante1 * tamanhoDiamante1) + (qtdDiamante2 * tamanhoDiamante2) ) * 100;
	
    document.getElementById('kilate').value = soma;
}


</script>

  <!-- Formulário de cadastro -->
  <div class="container p-3 my-3 border">  
	  <p><b>Calculadora de valores</b></p>
	  
	  <form action="#" method="POST" class="needs-validation">
		
		<div class="row">
			<div class="col-auto">
			  <div class="form-group">
				<label for="qtdDiamante">Quantidade de diamantes:</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
					  <div class="input-group-text"><i class="far fa-gem"></i></div>
					</div>				
					<input type="text" id="qtdDiamante" name="qtdDiamante" onkeyup="calcular()" class="form-control" placeholder="Entre a quantidade" required>
				</div>
				<div class="valid-feedback">Valido.</div>
				<div class="invalid-feedback">Preencha o campo.</div>
			  </div>
			</div>
			
			<div class="col-auto">
			  <div class="form-group">
				<label for="tamanhoDiamante">Tamanho dos diamantes:</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
					  <div class="input-group-text"><i class="fas fa-arrows-alt-v"></i></div>
					</div>				
					<input type="text" id="tamanhoDiamante" name="tamanhoDiamante" onkeyup="calcular()" class="form-control" placeholder="Entre o tamanho" required>
				</div>
				<div class="valid-feedback">Valido.</div>
				<div class="invalid-feedback">Preencha o campo.</div>
			  </div>
			</div>
		</div>
		
				<div class="row">
			<div class="col-auto">
			  <div class="form-group">
				<label for="qtdDiamante1">Quantidade de diamantes:</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
					  <div class="input-group-text"><i class="far fa-gem"></i></div>
					</div>				
					<input type="text" id="qtdDiamante1" name="qtdDiamante1" onkeyup="calcular()" class="form-control" placeholder="Entre a quantidade" required>
				</div>
				<div class="valid-feedback">Valido.</div>
				<div class="invalid-feedback">Preencha o campo.</div>
			  </div>
			</div>
			
			<div class="col-auto">
			  <div class="form-group">
				<label for="tamanhoDiamante1">Tamanho dos diamantes:</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
					  <div class="input-group-text"><i class="fas fa-arrows-alt-v"></i></div>
					</div>				
					<input type="text" id="tamanhoDiamante1" name="tamanhoDiamante1" onkeyup="calcular()" class="form-control" placeholder="Entre o tamanho" required>
				</div>
				<div class="valid-feedback">Valido.</div>
				<div class="invalid-feedback">Preencha o campo.</div>
			  </div>
			</div>
		</div>
		
				<div class="row">
			<div class="col-auto">
			  <div class="form-group">
				<label for="qtdDiamante2">Quantidade de diamantes:</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
					  <div class="input-group-text"><i class="far fa-gem"></i></div>
					</div>				
					<input type="text" id="qtdDiamante2" name="qtdDiamante2" onkeyup="calcular()" class="form-control" placeholder="Entre a quantidade" required>
				</div>
				<div class="valid-feedback">Valido.</div>
				<div class="invalid-feedback">Preencha o campo.</div>
			  </div>
			</div>
			
			<div class="col-auto">
			  <div class="form-group">
				<label for="tamanhoDiamante2">Tamanho dos diamantes:</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
					  <div class="input-group-text"><i class="fas fa-arrows-alt-v"></i></div>
					</div>				
					<input type="text" id="tamanhoDiamante2" name="tamanhoDiamante2" onkeyup="calcular()" class="form-control" placeholder="Entre o tamanho" required>
				</div>
				<div class="valid-feedback">Valido.</div>
				<div class="invalid-feedback">Preencha o campo.</div>
			  </div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-auto">
			  <div class="form-group">
				<label for="kilate">Kilates:</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
					  <div class="input-group-text"><i class="fas fa-ring"></i></div>
					</div>				
					<input type="text" id="kilate" name="kilate" class="form-control" placeholder="Kilate" readonly>
				</div>
			  </div>
			</div>
		</div>

		<button type="button" class="btn btn-primary" onclick="adicionar()">Adicionar</button>
		
		<button type="button" class="btn btn-primary" onclick="limpar()">Limpar</button>
		
	  </form>
  </div>
  <br><br>

</div>

<br><br><br><br><br><br>
<br><br><br><br><br><br>

<?php

include "footer.php";

?>
