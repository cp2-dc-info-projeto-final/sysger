<?php
	include '../Controlador.php';

	$erro = null;

	$request = array_map('trim', $_REQUEST);
	$request = filter_var_array(
	               $request,
	               [ 'CPF/CNPJ' => FILTER_DEFAULT,
								   'senha' => FILTER_DEFAULT ]
	           );
	if (strlen($request['CPF/CNPJ']) == 11){
		$CPF = $request['CPF/CNPJ'];
	}
	else if (strlen($request['CPF/CNPJ']) == 14){
		$CNPJ = $request['CPF/CNPJ'];
	}
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
	else if(PermitirLoginPessoaF($CPF, $senha))
	{
		session_start();
		$_SESSION['emailUsuarioLogado'] = $CPF;
		header('Location: Subgerente.html');
		exit();
	}
	else if(PermitirLoginPessoaJ($CNPJ, $senha))
	{
		session_start();
		$_SESSION['emailUsuarioLogado'] = $CNPJ;
		header('Location: Subgerente.html');
		exit();
	}
	else
	{
		$erro = "Senha inválida";
	}

	//session_start();

	//$_SESSION['erros'] = $erro;

	//header('Location: ../login.php');
?>
