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

function PermitirLogin()
{
	$bd = FazerLigação();

	$resultados = $bd->query('SELECT * FROM Cliente');

	return $resultados;

	if($resultados = $_REQUEST)
	{
	}
	if{

	}
}
?>
