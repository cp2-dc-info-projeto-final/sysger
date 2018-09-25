<?php
	include 'funcoes.php';
	$erros = [];

	$request = array_map('trim', $_REQUEST);
	$request = filter_var_array(
		$request,
		[
			'nome' => FILTER_DEFAULT,
			'email' => FILTER_VALIDATE_EMAIL,
      'cpf_cnpj' => FILTER_DEFAULT,
			'senha' => FILTER_DEFAULT,
			'dataNasc' =>  FILTER_DEFAULT,
			'telefone' =>  FILTER_DEFAULT,
			'endereco' =>  FILTER_DEFAULT,

		]
	);

	$nome = $request['nome'];
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
		if($anoscorridos < 16){
			$erros[] = "É necessário ter mais de 16 anos";
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

	foreach($erros as $msg)
	{
		echo "<p>$msg</p>";
	}
	if (empty($erros))
	{
	InsereCliente($request);
	}

?>
