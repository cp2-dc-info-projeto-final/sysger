<?php
	require_once('.php');

	$erro = null;

	$request = array_map('trim', $_REQUEST);
	$request = filter_var_array(
	               $request,
	               [ 'CPF/CNPJ' => FILTER_DEFAULT,
	                 'senha' => FILTER_DEFAULT ]
	           );

	$CPF = $request['CPF/CNPJ'];
	$senha = $request['senha'];

	if ($CPF == false)
	{
		$erro = "CPF/CNPJ não informado";
	}
	else if (array_key_exists($CPF, $dadosClientes) == false)
	{
		$erro = "Nenhum cliente encontrado para este CPF/CNPJ";
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
