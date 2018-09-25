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

function BuscaUsuarioPorCPF($CPF)
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

function BuscaGerente($CPF)
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

function BuscaUsuarioPorCNPJ($CNPJ)
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

function BuscarSubgerente($nome)
{

$bd = FazerLigação();
$sql = $bd->query('SELECT * FROM gerenciamento WHERE nome = :nome AND subgerente = 1 AND gerente = 0' );

$sql->bindParam(':nome', $nome);

if ($sql->execute())
{
	return $sql->fetchall();
}

return null;

}


function BuscarCliente($buscarCliente)
{

$bd = FazerLigação();
$sql = $bd->query('SELECT * FROM Cliente WHERE nome = :nome');

$sql->bindParam(':nome', $nome);

if ($sql->execute())
{
	return $sql->fetchall();
}

return null;

}

function InsereCliente($dadosNovoCliente)
{
	$bd = FazerLigação();

	$nome = $dadosNovoCliente['nome'];

	$sql = $bd->prepare('INSERT INTO cliente (nome, email, senha, dataNasc, telefone, endereco )
	VALUES (:nome, :email, :senha, :dataNasc,:telefone, :endereco);');

	$sql->bindValue(':nome', $nome);
	$sql->bindValue(':email', $dadosNovoCliente['email']);
	$sql->bindValue(':senha', $dadosNovoCliente['senha']);
	$sql->bindValue(':dataNasc', $dadosNovoCliente['dataNasc']);
	$sql->bindValue(':telefone', $dadosNovoCliente['telefone']);
	$sql->bindValue(':endereco', $dadosNovoCliente['endereco']);


	$linhaCliente = BuscaUsuarioPorEmail($dadosNovoCliente['email']);
	$idCliente = $linhaCliente['idCliente'];
	if ( strlen($dadosNovoCliente['cpf_cnpj']) == 11 )
	{
		$sql = $bd->prepare('INSERT INTO pessoa_fisica (id_PF, cpf )
		VALUES (:id_PF, :cpf);');

		$sql->bindValue(':id_PF', $idCliente);
		$sql->bindValue(':cpf', $dadosNovoCliente['cpf_cnpj']);
	}
	else if ( strlen($dadosNovoCliente['cpf_cnpj']) == 14 )
	{
		$sql = $bd->prepare('INSERT INTO pessoa_juridica (id_PJ, cnpj )
		VALUES (:id_PJ, :cnpj);');

		$sql->bindValue(':id_PJ', $idCliente);
		$sql->bindValue(':cnpj', $dadosNovoCliente['cpf_cnpj']);
	}

	$sql->execute();
}

function BuscaUsuarioPorEmail($email)
{
	$bd = FazerLigação();

	$sql = $bd->prepare('SELECT idCliente FROM cliente WHERE email = :email');

	$sql->bindValue(':email', $email);

	$sql->execute();

	return $sql->fetch();
}


?>
