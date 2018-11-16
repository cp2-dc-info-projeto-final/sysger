<?php
	include '../funcoes.php';
	$erros = [];

	$request = array_map('trim', $_REQUEST);
	$request = filter_var_array(
		$request,
		[
			'tiposerv' => FILTER_DEFAULT,
			'cpf/cnpj' => FILTER_DEFAULT,
      'CpfGerenciador' => FILTER_DEFAULT,
			'dataContrato' => FILTER_DEFAULT,
			'diaVenc' =>  FILTER_DEFAULT,
			'valor' =>  FILTER_DEFAULT,
			'placa' => FILTER_DEFAULT,
			'cor' => FILTER_DEFAULT,
			'ano' => FILTER_DEFAULT,
			'numRastreador' => FILTER_DEFAULT,
			'marca' => FILTER_DEFAULT,
			'modelo' => FILTER_DEFAULT,
			'numero' => FILTER_DEFAULT,
			'email' => FILTER_DEFAULT

		]
	);
	$cpf_cnpj = $request['cpf/cnpj'];

	if($cpf_cnpj == false){
		$erros[] = "Cpf/cnpj vazio";
	}
	else if (strlen($cpf_cnpj) == 11) {
		$cliente = BuscaUsuarioPorCPF($cpf_cnpj);
	}
	else if (strlen($cpf_cnpj) == 14) {
		$cliente = BuscaUsuarioPorCNPJ($cpf_cnpj);
	}
	else {
		$erros[] = "CPF/CNPJ informado não é válido";
	}

	if ($cpf_cnpj != false && $cliente == null)
	{
		$erros[] = "Nenhum cliente cadastrado com o CPF/CNPJ informado";
	}

	$CpfGerenciador = $request['CpfGerenciador'];
	if($CpfGerenciador == false){
		$erros[] = "Cpf do administrador vazio";
	}
	else {
		$gerente = BuscaGerente($CpfGerenciador);
		if ($gerente == false)
		{
			$erros[] = "Nenhum gerente cadastrado com o CPF informado";
		}
	}

	$dataContrato = $request['dataContrato'];
	if($dataContrato == false){
		$erros[] = "Data do contrato está vazio";
	}

	$diaVencimento = $request['diaVenc'];
	if($diaVencimento == false){
		$erros[] = "Dia do Vencimento está vazio";
	}

	$valor = $request['valor'];
	if($valor == false){
		$erros[] = "Valor do serviço está vazio";
	}

  $tiposerv = $request['tiposerv'];
if ($tiposerv == 'veiculo' && $tiposerv == 'celularveiculo')
{
	$placa = $request['placa'];
	if($placa == false){
		$erros[] ="Placa do veículo está vazio";
}
	$ano = $request['ano'];
	if($ano == false){
			$erros[] ="Ano do veículo está vazio ";
}
	$cor = $request['cor'];
	if($cor == false){
	$erros[] ="Cor do veículo está vazio";
}
	$numRastreador = $request['numRastreador'];
	if($numRastreador == false){
  $erros[] ="Número do rastreio está vazio";
}
	$marca = $request['marca'];
	if($marca == false){
	$erros[] =" Marca do veículo está vazio";
}
	$modelo = $request['modelo'];
	if($modelo == false){
 $erros[] ="Modelo do veículo está vazio";

	}
}

else if ($tiposerv == 'celular' && $tiposerv == 'celularveiculo'){

	$numero = $request['numero'];
	if($numero == false){
		$erros[] = "O número do celular não foi inserido";
   }

	 $email = $request['email'];
	 if($email == false){
	 	$erros[] = "O email não foi inserido";
	  }
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

var_dump($_SESSION);
exit();
header('Location: ../DadosNovoContrato.php');

?>
