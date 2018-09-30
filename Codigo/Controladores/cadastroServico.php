
<?php
	include '../funcoes.php';
	$erros = [];

	$request = array_map('trim', $_REQUEST);
	$request = filter_var_array(
		$request,
		[
			'idServico' => FILTER_DEFAULT,
			'IdCliente' => FILTER_VALIDATE_EMAIL,
      'IdGerenciamento' => FILTER_DEFAULT,
			'dataContrato' => FILTER_DEFAULT,
			'diaVenc' =>  FILTER_DEFAULT,
			'valor' =>  FILTER_DEFAULT,


		]
	);

	/*$nome = $request['nome'];
	if($nome == false){
		$erros[] = "Nome vazio";
	}
	else if (strlen($nome) < 3 || strlen($nome) > 35 ){
		$erros[] = "Nome deve ter no mínimo 3 e no máximo 35 caracteres";
	}

	$email = $request['email'];
	if($email == false){
		$erros[] = "Email vazio";
	}
	else if (empty(BuscaUsuarioPorEmail($request['email'])) == false) {
		$erros[] = "Já existe um cliente cadastrado com esse email";
	}

  $cpf_cnpj = $request['cpf_cnpj'];
	if($cpf_cnpj == false){
		$erros[] = "Cpf vazio";
	}
	else if (empty(BuscaUsuarioPorCPF($cpf_cnpj)) == false) {
		$erros[] = "Já existe um cliente cadastrado com esse cpf";
	}
	else if (empty(BuscaUsuarioPorCNPJ($cpf_cnpj)) == false) {
		$erros[] = "Já existe um cliente cadastrado com esse cnpj";
	}

	$senha = $request['senha'];
	if($senha == false){
		$erros[] = "Senha vazia";
	}
	else if (strlen ($senha) < 6 || strlen($senha) > 12 ){
		$erros[] = "Senha deve ter no mínimo 6 e no máximo 12 caracteres";
	}

	else {
		$request['senha'] = password_hash($senha, PASSWORD_DEFAULT);
	}

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
