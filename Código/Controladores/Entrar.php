<?php
	require_once('.php');

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
	else if (array_key_exists($CPF, ) == false)
	{
		$erro = "Nenhum cliente encontrado para este CPF";
	}
	else if ($CNPJ == false)
	{
		$erro = "CNPJ não informado";
	}
	else if (array_key_exists($CNPJ, ) == false)
	{
		$erro = "Nenhum cliente encontrado para este CNPJ";
	}
	else if ($senha == false)
	{
		$erro = "Senha não informada";
	}
	else if(password_verify($request['senha'], $dadosClientes[$CPF]['senha']))
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
