<?php
	include '../Controlador.php';

	$erro = null;

	$request = array_map('trim', $_REQUEST);
	$request = filter_var_array(
	               $request,
	               [ 'CPF/CNPJ' => FILTER_DEFAULT,
								   'senha' => FILTER_DEFAULT ]
	           );

	$codigoPessoa = $request['CPF/CNPJ'];
	if ( $codigoPessoa == false )
	{
		$erro = "CPF ou CNPJ inválido ou não informado";
	}


	if (strlen($codigoPessoa) == 11)
	{
		$usuario = BuscaUsuarioPorCPF($codigoPessoa, $senha);
	}
	else if (strlen($códigoPessoa) == 14)
	{
		$usuario = BuscaUsuarioPorCNPJ($codigoPessoa, $senha);
	}
	else
	{
		$erro = "CPF ou CNPJ inválido";
	}

	$senha = $request['senha'];
	if ($senha == false)
	{
		$erro = "Senha não informada";
	}
	else if ($usuario != null && password_verify($senha, $usuario['senha']))
	{
		session_start();
		$_SESSION['emailUsuarioLogado'] = $codigoPessoa;
		header('Location: ../gerente.php');
		exit();
	}
	else {
		$erro = "Não foi possível logar";
	}

	session_start();

	$_SESSION['erros'] = $erro;

	header('Location: ../login.php');
?>
