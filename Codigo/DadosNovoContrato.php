
<!DOCTYPE html>
<html>
	<head>
		<meta charset= "utf-8"/>
    <title> SysGER </title>
		<?php require('ImagemDeFundo.css'); ?>

		<script>
		function exibir_ocultar(val){
			var veiculo = document.getElementById('escolhidoVeiculo');
			var celular = document.getElementById('escolhidoCelular');

			veiculo.hidden = (val != 'veiculo' && val != 'celularveiculo');
			celular.hidden = (val != 'celular' && val != 'celularveiculo');
		}
		</script>

	</head>
	<body>
		<?php require('BarraNav.php'); ?>
    <main class="container" style="border: 1px solid black;
														max-width: 600px;
														margin-top: 20px;
														border-radius:30px 30px 30px 30px;
														box-shadow: 2px 2px 2px">
		    <h1> Cadastrar Novos Contratos </h1>

        <form action="Controladores/cadastroServico.php" method="POST">

              <label>Serviço:
								<select name = tiposerv id="tipo_servico" onchange="exibir_ocultar(this.value)">
								<option></option>
								<option value="veiculo">Veiculo</option>
								<option value="celular">Celular</option>
								<option value="celularveiculo">Veículo e Celular</option>
							</select><br><br>
							<label>Cpf/cnpj do cliente:<input name="cpf/cnpj" type="text" minlength="11" maxlength="14" required/><br/><br/>
							<label>Cpf do Gerenciador:<input name="CpfGerenciador" type="text" minlength="1'" maxlength="11" required/><br/><br/>
							<label>Data do contrato:<input name="dataContrato" type="date" required/><br/><br/>
							<label>Data de vencimento:<input name="diaVenc" type="date" required/><br/><br/>
						  <label>Valor do serviço:<input name="valor" type="double" required/><br/><br/>

						<div id="escolhidoVeiculo">
						<label>Placa do veículo:<input name="placa" type="text" minlength="7" maxlength="30" /><br/><br/>
						<label>Cor:<input name="cor" type="text" minlength="1" maxlength="30" /><br/><br/>
						<label>Ano:<input name="ano" type="string" minlength = "4" maxlength="4" required/><br/><br/>
						<label>Número do rastreador:<input name="numRastreador" type="text" minlength="11" maxlength="11" /><br/><br/>
						<label>Marca:<input name="marca" type="text" minlength="1" maxlength="30" /><br/><br/>
						<label>Modelo:<input name="modelo" type="text" minlength="1" maxlength="30" /><br/><br/>
						<label>Tipo de Veículo:
							<select name="Veiculo">
							<option></option>
							<option value="veiculo">Carro</option>
							<option value="veiculo">Caminhão</option>
							<option value="veiculo">Moto</option>
							<option value="veiculo">Carro Forte</option>
							<option value="veiculo">Ônibus</option>
							<option value="veiculo">Bicicleta</option>
							<option value="veiculo">Barco</option>
						</select><br><br>

					</div>

					<div id="escolhidoCelular">
					<label>Número do Celular:<input name="numero" type="text" minlength="8" maxlength="30" /><br/><br/>
					<label>Email:<input name="email" type="email" /><br/><br/>

					</div>

						 <input type="submit" value="Cadastrar"/><br><br>
						 <input type="reset" value="Cancelar" /><br></br>
    </form>
		<a href ="DadosPagamento.php" class="btn btn-outline-dark"><b> Cadastrar Pagamentos</b></a></br></br>
		<a href ="administrador.php" class="btn btn-outline-dark"><b>Voltar</b></a></br></br>
	</main>
    	</body>
    </html>
