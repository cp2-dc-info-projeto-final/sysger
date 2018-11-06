<?php
require_once ('funcoes.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset= "utf-8"/>
    <title> SysGER </title>

	</head>
	<body>
		<?php require('BarraNav.php'); ?>
    <div>
		    <h1> Gerenciamento </h1>

				<a href="Lista_func.php"> Listagem dos Funcionários</a><br><br>
			 	<a href="DadosNovoFunc.php">Cadastrar novos funcionários</a><br><br>
				<a href="Lista_cliente.php">Listagem dos Clientes</a><br><br>
				<a href="histPagamentos.php">Status dos clientes</a><br><br>
				<a href="DadosNovoCliente.php">Cadastrar novos cliente</a><br><br>
				<a href="DadosNovoContrato.php">Cadastrar novos contratos</a><br><br>
				<a href="DadosPagamento.php">Cadastrar novos Pagamentos</a><br><br>

    </div>
	</body>
</html>
