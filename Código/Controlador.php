<?php
    require_once('Tela de Login.php')
    $erros = [];

	  $request = array_map('trim', $_REQUEST);
    $request = filter_var_array(
		$request,
		[
      'CPF'=> FILTER_DEFAULT,
      'CNPJ'=> FILTER_DEFAULT,
      'Senha'=> FILTER_DEFAULT
    ]
   );

   $cpf = $request['CPF'];
   if($cpf == false){
      $erros[] = "CPF vazio";
   }
   else if (strlen($cpf) == 11){
      PermitirLoginPessoaF($request);
   }

   $cnpj = $request['CNPJ'];
   if($cnpj == false){
      $erros[] = "CNPJ vazio";
   }
   else if (strlen($cnpj) == 14){
      PermitirLoginPessoaJ($request);
   }

   $senha = $request['Senha'];
   if($senha == false){
      $erros[] = "Senha inválida";
   }
   else if (strlen($senha) > 6 || strlen($senha) < 12){
      PermitirLoginPessoaF($request);
   }

?>


Funções

<?php

function FazerLigação()
{
	$bd = new PDO('mysql:host=localhost;dbname=bancosysger;charset=utf8',
	'bancosysger',
	'tccsysger');

	$bd->setAttribute(PDO::ATTR_ERRMODE,
					  PDO::ERRMODE_EXCEPTION);

	return $bd;
}

function PermitirLoginPessoaF()
{
	$bd = FazerLigação();

	$resultados = $bd->query('SELECT cpf FROM Pessoa_Fisica');

	return $resultados;

	if(empty($resultados)){
		$resultados = $bd->query('SELECT cpf FROM Gerenciamento');
		return $resultados;
	}

}

function PermitirLoginPessoaJ()
{
	$bd = FazerLigação();

	$resultados = $bd->prepare('SELECT cnpj FROM Pessoa_Juridica WHERE cnpj = ');

	return $resultados;
}

function Senha()
{
	$bd = FazerLigação();

	$resultados = $bd->query('SELECT senha FROM Cliente');

	return $resultados;

	if(empty($resultados)){
		$resultados = $bd->query('SELECT senha FROM Gerenciamento');
		return $resultados;
	}

}
?>
