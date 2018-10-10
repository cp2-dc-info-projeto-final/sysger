<?php
	include '../funcoes.php';
	$erros = [];

	$request = array_map('trim', $_REQUEST);
	$request = filter_var_array(
		$request,
		[
			'cpf/cnpj' => FILTER_DEFAULT,
      'CpfGerenciador' => FILTER_DEFAULT,
			'dataContrato' => FILTER_DEFAULT,
			'diaVenc' =>  FILTER_DEFAULT,
			'Valor' =>  FILTER_DEFAULT,


		]
	);
	$cpf_cnpj = $request['cpf_cnpj'];
	$erros[] = BuscaUsuarioPorCPF($cpf_cnpj);
	if($cpf_cnpj == false){
		$erros[] = "Cpf/cnpj vazio";
	}

	else if (empty(BuscaUsuarioPorCPF($cpf_cnpj)) == false) {
		$erros[] = "Já existe um cliente cadastrado com esse cpf";
	}
	else if (empty(BuscaUsuarioPorCNPJ($cpf_cnpj)) == false) {
		$erros[] = "Já existe um cliente cadastrado com esse cnpj";
	}

	$CpfGerenciador = $request['CpfGerenciador'];
	$erros[] = BuscaGerente($CpfGerenciador);
	if($CpfGerenciador == false){
		$erros[] = "Cpf do administraor vazio";
	}

	$dataContrato = $request['dataContrato'];
	if($dataContrato == false){
		$erros[] = "Data do contrato está vazio";
	}

	$diaVencimento = $request['diaVenc'];
	if($diaVencimento == false){
		$erros[] = "Dia do Vencimento está vazio";
	}

	$valor = $request['Valor'];
	if($valor == false){
		$erros[] = "Valor do serviço está vazio";
	}

	session_start();
	if (empty($erros))
	{
		InsereServicos($request);
		$_SESSION['sucesso'] = "Serviço cadastrado com sucesso";
	}
	else {
		$_SESSION['erros'] = $erros;
	}

	header('Location: ../DadosServicos.php');

?>
