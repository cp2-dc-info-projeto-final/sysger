
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


	/*

	$telefone = $request['telefone'];
	if($telefone == false){
		$erros[] = "Telefone vazio";
	}
	else if (strlen($telefone) < 8 || strlen($telefone) >15 ){
		$erros[] = "Telefone deve ter no mínimo 8 e no máximo 50 caracteres";
	}

	$datanasc = $request['dataNasc'];

	$data = DateTime::createFromFormat('Y-m-d', $datanasc);

	if ($data == false){
		$erros[] = "Valor de Data de Nascimento inválido";
	}
	else if(array_key_exists('dia', $_REQUEST)){
		$dia = $_REQUEST['dia'];
		$data = DateTime::createFromFormat('Y-m-d', $datanasc);
		$hoje = new DateTime();
		$diferença = $data -> diff ($hoje);
		if($anoscorridos < 18){
			$erros[] = "É necessário ter mais de 18 anos";
		}
	}
	$telefone = $request['telefone'];
	if($telefone == false){
		$erros[] = "Telefone vazio";
	}
	$endereco = $request['endereco'];
	if($endereco == false){
		$erros[] = "Endereco vazio";
	}

	session_start();
	if (empty($erros))
	{
		InsereCliente($request);
		$_SESSION['sucesso'] = "Cliente $nome cadastrado com sucesso";
	}
	else {
		$_SESSION['erros'] = $erros;
	}

	header('Location: ../DadosNovoCliente.php');
*/
?>
