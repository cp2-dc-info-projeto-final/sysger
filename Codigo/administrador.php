<?php
require_once ('funcoes.php');

session_start();

/*if(array_key_exists('emailUsuarioLogado', $_SESSION))
{
	header('Location: administrador.php');
}
else {
		header('Location: login.php');
		exit();
}*/
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
				box-shadow: 2px 2px 2px;
				padding-left: : 100px"
				>

		     <h1> Gerenciamento </h1><br>

				<a href="Lista_func.php" class="btn btn-prymary btn-lg btn-block btn-outline-dark"> <b> Listagem dos Funcionários </b> </a><br><br>
				<a href="Lista_cliente.php" class="btn btn-primary btn-lg btn-block btn-outline-dark"> <b> Listagem dos Clientes </b> </a><br><br>
				<a href="histPagamentos.php" class="btn btn-primary btn-lg btn-block btn-outline-dark"><b> Status dos Clientes </b> </a><br><br>
				<a href="DadosNovoFunc.php" class="btn btn-primary btn-lg btn-block btn-outline-dark"> <b> Cadastrar Novos Funcionários </b> </a><br><br>
				<a href="DadosNovoCliente.php" class="btn btn-primary btn-lg btn-block btn-outline-dark"> <b> Cadastrar Novos Clientes </b></a><br><br>
				<a href="DadosNovoContrato.php" class="btn btn-primary btn-lg btn-block btn-outline-dark"><b> Cadastrar Novos Contratos </b></a><br><br>
				<a href="DadosPagamento.php" class="btn btn-prymary btn-lg btn-block btn-outline-dark"> <b> Cadastrar Pagamentos </b> </a><br><br>
				<a href="Servicos.php" class="btn btn-prymary btn-lg btn-block btn-outline-dark"> <b> Serviços Atualizados </b> </a><br><br>


    </div>
</main>
	</body>
</html>
