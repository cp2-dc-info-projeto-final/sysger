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

	$resultados = $bd->query('SELECT cpf FROM Pessoa_Fisica Where cpf == $request['CPF']');

	return $resultados;

	if(empty($resultados)){
		$resultados = $bd->query('SELECT cpf FROM Gerenciamento Where cpf == $request['CPF']');
		return $resultados;
	}

}

function PermitirLoginPessoaJ()
{
	$bd = FazerLigação();

	$resultados = $bd->prepare('SELECT cnpj FROM Pessoa_Juridica WHERE cnpj = $request['CNPJ'] ');

	return $resultados;
}

function Senha()
{
	$bd = FazerLigação();

	$resultados = $bd->query('SELECT senha FROM Cliente Where senha == $request['senha']');

	return $resultados;

	if(empty($resultados)){
		$resultados = $bd->query('SELECT senha FROM Gerenciamento Where senha == $request['senha']');
		return $resultados;
	}

}
?>
