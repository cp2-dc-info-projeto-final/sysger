<?php
	include 'Controlador.php';

	$erro = null;

	$request = array_map('trim', $_REQUEST);
	$request = filter_var_array(
	               $request,
	               [ 'CPF' => FILTER_DEFAULT,
					'CNPJ' => FILTER_DEFAULT,
	                 'senha' => FILTER_DEFAULT ]
	           );

	$CPF = $request['CPF'];
	$CNPJ = $request['CNPJ'];
	$senha = $request['senha'];

	if ($CPF == false)
	{
		$erro = "CPF não informado";
	}
	 
	else if ($CNPJ == false)
	{
		$erro = "CNPJ não informado";
	}

	else if ($senha == false)
	{
		$erro = "Senha não informada";
	}
	else if())
	{
		session_start();
		$_SESSION['emailUsuarioLogado'] = $request['CPF'];
		header('Location: .php');
		exit();
	}
	else
	{
		$erro = "Senha inválida";
	}

	session_start();

	$_SESSION['erros'] = $erro;

	header('Location: ../Tela de Login.php');
?>
