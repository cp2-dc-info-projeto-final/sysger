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

function PermitirLoginPessoaF($CPF, $senha)
{
	$bd = FazerLigação();

 	if (	$sql = $bd->prepare('SELECT cpf,senha FROM Pessoa_Fisica JOIN Cliente ON Cliente.IdCliente = Pessoa_Fisica.id_PF Where CPF = :cpf'))
	{

		$sql->bindParam(':cpf', $CPF);

		$sql->execute();

	  $sql->fetch();

		echo("%s (%s)\n", $row["cpf"], $row["senha"]);

  }

	return 1;

}

function PermitirLoginPessoaJ($CNPJ, $senha)
{
	$bd = FazerLigação();

	if (	$sql = $bd->prepare('SELECT cnpj,senha FROM Pessoa_Juridica JOIN Cliente ON Cliente.IdCliente = Pessoa_Fisica.id_PF Where CNPJ = :cnpj'))
	{

		$sql->bindParam(':cnpj', $CNPJ);

		$sql->execute();

		$sql->fetch();

		echo("%s (%s)\n", $row["cpf"], $row["senha"]);

	}

	return 0;

}
}

?>
