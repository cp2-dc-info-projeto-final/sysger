<?php
require_once ('funcoes.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset= "utf-8"/>
    <title> SysGER </title>
		<?php require('ImagemDeFundo.css'); ?>

	</head>
	<body>
		<?php require('BarraNav.php'); ?>
    <div>
<main class="container"
				style="border: 1px solid black;
				max-width: 600px;
				margin-top: 40px;
				border-radius:30px 30px 30px 30px;
			/*	background-color:#D3D3D3;*/
				box-shadow: 2px 2px 2px;
				padding-left: : 100px"
				>

		     <h1> Gerenciamento </h1><br>

				<a href="Lista_func.php" class="btn btn-prymary btn-lg btn-block btn-outline-dark"> Listagem dos Funcionários</a><br><br>
				<a href="Lista_cliente.php" class="btn btn-primary btn-lg btn-block btn-outline-dark">Listagem dos Clientes</a><br><br>
				<a href="histPagamentos.php" class="btn btn-primary btn-lg btn-block btn-outline-dark">Status dos Clientes</a><br><br>
				<a href="DadosNovoFunc.php" class="btn btn-primary btn-lg btn-block btn-outline-dark">Cadastrar novos Funcionários</a><br><br>
				<a href="DadosNovoCliente.php" class="btn btn-primary btn-lg btn-block btn-outline-dark">Cadastrar novos Clientes</a><br><br>
				<a href="DadosNovoContrato.php" class="btn btn-primary btn-lg btn-block btn-outline-dark">Cadastrar novos Contratos</a><br><br>
				<a href="DadosPagamento.php" class="btn btn-primary btn-lg btn-block btn-outline-dark">Cadastrar novos Pagamentos</a><br><br>

    </div>
</main>
	</body>
</html>
