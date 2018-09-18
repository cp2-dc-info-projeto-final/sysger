<?php
	include '../Controlador.php';

	$erro = null;

	$request = array_map('trim', $_REQUEST);
	$request = filter_var_array(
	               $request,
	               [ 'CPF/CNPJ' => FILTER_DEFAULT,
					'CPF/CNPJ' => FILTER_DEFAULT,
	                 'senha' => FILTER_DEFAULT ]
	           );

	$CPFCNPJ = $request['CPF/CNPJ'];
	$senha = $request['senha'];

	if ($CPFCNPJ == false)
	{
		$erro = "CPF não informado";
	}

	else if ($CPFCNPJ == false)
	{
		$erro = "CNPJ não informado";
	}

	else if ($senha == false)
	{
		$erro = "Senha não informada";
	}
	else if(PermitirLoginPessoaF($CPFCNPJ, $senha))
	{
		session_start();
		$_SESSION['emailUsuarioLogado'] = $CPFCNPJ;
		header('Location: Subgerente.html');
		exit();
	}
	else
	{
		$erro = "Senha inválida";
	}

	session_start();

	$_SESSION['erros'] = $erro;

	header('Location: ../login.php');
?>
