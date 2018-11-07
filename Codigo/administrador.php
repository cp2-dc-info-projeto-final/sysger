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
<main class="container" style="border: 1px solid black; max-width: 600px; margin-top: 20px; border-radius:30px 30px 30px 30px">
		    <h1> Gerenciamento </h1><br>

				<a href="Lista_func.php"> Listagem dos Funcionários</a><br><br>
			 	<a href="DadosNovoFunc.php">Cadastrar novos funcionários</a><br><br>
				<a href="Lista_cliente.php">Listagem dos Clientes</a><br><br>
				<a href="histPagamentos.php">Status dos clientes</a><br><br>
				<a href="DadosNovoCliente.php">Cadastrar novos cliente</a><br><br>
				<a href="DadosNovoContrato.php">Cadastrar novos contratos</a><br><br>
				<a href="DadosPagamento.php">Cadastrar novos Pagamentos</a><br><br>

    </div>
</main>
	</body>
</html>
