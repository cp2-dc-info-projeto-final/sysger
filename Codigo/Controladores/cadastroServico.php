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
		$erros[] = "Cpf do administrador vazio";
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

if else ($tiposerv == 'celular' && $tiposerv == 'celularveiculo'){

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

header('Location: ../DadosServicos.php');

?>
