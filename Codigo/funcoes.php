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

function BuscaUsuarioPorCPF($CPF, $senha)
{
	$bd = FazerLigação();

 	$sql = $bd->prepare('SELECT cpf,senha FROM Pessoa_Fisica JOIN Cliente ON Cliente.IdCliente = Pessoa_Fisica.id_PF Where CPF = :cpf');

	$sql->bindParam(':cpf', $CPF);

	if ($sql->execute())
	{
	  return $sql->fetch();
  }

	return null;
}

function BuscaGerente($CPF, $senha)
{
	$bd = FazerLigação();

 	$sql = $bd->prepare('SELECT cpf,senha FROM gerenciamento Where CPF = :cpf');

	$sql->bindParam(':cpf', $CPF);

	if ($sql->execute())
	{
	  return $sql->fetch();
  }

	return null;
}

function BuscaUsuarioPorCNPJ($CNPJ, $senha)
{
	$bd = FazerLigação();

	$sql = $bd->prepare('SELECT cnpj,senha FROM Pessoa_Juridica JOIN Cliente ON Cliente.IdCliente = Pessoa_Juridica.id_PJ Where CNPJ = :cnpj');

	$sql->bindParam(':cnpj', $CNPJ);

	if ($sql->execute())
	{
		return $sql->fetch();
	}

	return null;

}

function BuscarSubgerente($buscarsubgerente)
{

$bd = FazerLigação();
$buscarsubgenrente = $bd->query('SELECT subgerente FROM gerenciamento');
 return $buscarsubgenrente;
}

function BuscarCliente($buscarCliente)
{

$bd = FazerLigação();
$buscarCliente = $bd->query('SELECT gerente FROM gerenciamento');
 return $buscarCliente;
}
?>
