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

	$sql = $bd->query('SELECT cpf,senha FROM Pessoa_Fisica JOIN Cliente ON Cliente.IdCliente = Pessoa_Fisica.id_PF Where CPF = :cpf');

	$sql->bindValue(':cpf', $CPF);

	while ($row = $sql->fetch_assoc()) {
        printf("%s (%s)\n", $row["cpf"], $row["senha"]);
    }

	return $resultados;

}

function PermitirLoginPessoaJ()
{
	$bd = FazerLigação();

	$resultados = $bd->query('SELECT cnpj,senha FROM Pessoa_Juridica  JOIN Cliente ON Cliente.IdCliente = Pessoa_Juridica.id_PJ WHERE cnpj = :cnpj ');

	$resultados->bindValue(':cnpj', $CNPJ);

	return $resultados;
}

?>
