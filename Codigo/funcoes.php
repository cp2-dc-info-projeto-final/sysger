<?php

function FazerLigacao()
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
	$bd = FazerLigacao();

 	$sql = $bd->prepare('SELECT * FROM Pessoa_Fisica JOIN Cliente ON Cliente.IdCliente = Pessoa_Fisica.id_PF Where CPF = :cpf');

	$sql->bindParam(':cpf', $CPF);

	if ($sql->execute())
	{
	  return $sql->fetch();
  }

	return null;
}

function BuscaGerente($CPF)
{
	$bd = FazerLigacao();

 	$sql = $bd->prepare('SELECT * FROM gerenciamento Where CPF = :cpf');

	$sql->bindParam(':cpf', $CPF);

	if ($sql->execute())
	{
	  return $sql->fetch();
  }

	return null;
}

function BuscaUsuarioPorCNPJ($CNPJ)
{
	$bd = FazerLigacao();

	$sql = $bd->prepare('SELECT cnpj,senha, email
		 FROM Pessoa_Juridica JOIN Cliente ON Cliente.IdCliente = Pessoa_Juridica.id_PJ Where CNPJ = :cnpj');

	$sql->bindParam(':cnpj', $CNPJ);

	if ($sql->execute())
	{
		return $sql->fetch();
	}

	return null;

}

function ListaSubgerente()
{

$bd = FazerLigacao();
$sql = $bd->query('SELECT * FROM gerenciamento' );

if ($sql->execute())
{
	return $sql->fetchall();
}

return null;

}


function BuscarSubgerente($pesquisa)
{

$bd = FazerLigacao();
$sql = $bd->query('SELECT *
	                 FROM gerenciamento
									 WHERE nome LIKE :nome AND nome LIKE :pesquisa' );

$sql->bindParam(':pesquisa', '%' . $pesquisa . '%');

if ($sql->execute())
{
	return $sql->fetchall();
}

return null;

}

function BuscarCliente($buscarCliente)
{

$bd = FazerLigacao();
$sql = $bd->query('SELECT *
												FROM cliente
												LEFT JOIN pessoa_fisica ON cliente.idCliente = Pessoa_Fisica.id_PF
												LEFT JOIN pessoa_juridica ON cliente.idCliente = Pessoa_Juridica.id_PJ
												WHERE nome LIKE :nome AND nome LIKE :pesquisa' );

$sql->bindParam(':pesquisa', '%' . $pesquisa . '%');

if ($sql->execute())
{
	return $sql->fetchall();
}

return null;

}

function BuscarClientePorId(int $id)
{

$bd = FazerLigacao();
$sql = $bd->prepare('SELECT *
												FROM cliente
												LEFT JOIN pessoa_fisica ON cliente.idCliente = Pessoa_Fisica.id_PF
												LEFT JOIN pessoa_juridica ON cliente.idCliente = Pessoa_Juridica.id_PJ
												WHERE idCliente LIKE :valId' );

$sql->bindParam(':valId', $id);

if ($sql->execute())
{
	return $sql->fetch();
}

return null;

}


function ListaCliente()
{

$bd = FazerLigacao();
$sql = $bd->query('SELECT *
											FROM cliente
											LEFT JOIN pessoa_fisica ON cliente.IdCliente = pessoa_fisica.id_PF
											LEFT JOIN pessoa_juridica ON cliente.IdCliente = pessoa_juridica.id_PJ
											LEFT JOIN servico ON cliente.IdCliente = servico.idServico
											LEFT JOIN pagamento ON pagamento.idServico = servico.idServico
											');

if ($sql->execute())
{
	return $sql->fetchall();
}

return null;

}

function InsereCliente($dadosNovoCliente)
{
	$bd = FazerLigacao();

	$nome = $dadosNovoCliente['nome'];

	$sql = $bd->prepare('INSERT INTO cliente (nome, email, senha, dataNasc, telefone, endereco )
	VALUES (:nome, :email, :senha, :dataNasc,:telefone, :endereco);');

	$sql->bindValue(':nome', $nome);
	$sql->bindValue(':email', $dadosNovoCliente['email']);
	$sql->bindValue(':senha', $dadosNovoCliente['senha']);
	$sql->bindValue(':dataNasc', $dadosNovoCliente['dataNasc']);
	$sql->bindValue(':telefone', $dadosNovoCliente['telefone']);
	$sql->bindValue(':endereco', $dadosNovoCliente['endereco']);

	$sql->execute();

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
	$bd = FazerLigacao();

	$sql = $bd->prepare('SELECT idCliente, nome FROM cliente WHERE email = :email');

	$sql->bindValue(':email', $email);

	$sql->execute();

	return $sql->fetch();
}

function InsereSubgerente($dadosNovoFunc)
{
	$bd = FazerLigacao();

	$nome = $dadosNovoFunc['nome'];

	$sql = $bd->prepare('INSERT INTO gerenciamento (nome, email, senha, dataNasc, telefone, endereco, cpf )
	VALUES (:nome, :email, :senha, :dataNasc,:telefone, :endereco, :cpf);');

	$sql->bindValue(':nome', $nome);
	$sql->bindValue(':email', $dadosNovoFunc['email']);
	$sql->bindValue(':senha', $dadosNovoFunc['senha']);
	$sql->bindValue(':dataNasc', $dadosNovoFunc['dataNasc']);
	$sql->bindValue(':telefone', $dadosNovoFunc['telefone']);
	$sql->bindValue(':endereco', $dadosNovoFunc['endereco']);
	$sql->bindValue(':cpf', $dadosNovoFunc ['cpf']);

	$sql->execute();

}

function InsereServicos(int $gerente, int $cliente, $dadosServico)
{
	$bd = FazerLigacao();

	$sql = $bd->prepare('INSERT INTO servico (idCliente, idGerenciamento, valor, diaVenc, dataContrato)
	VALUES (:valIdCliente, :valIdGerenciamento, :valor, :diaVenc, :dataContrato);');

	$sql->bindValue(':valIdCliente', $cliente['idCliente']);
	$sql->bindValue(':valIdGerenciamento', $gerente['idGerenciamento']);
	$sql->bindValue(':valor', $dadosServico['valor']);
	$sql->bindValue(':diaVenc', $dadosServico['diaVenc']);
	$sql->bindValue(':dataContrato', $dadosServico['dataContrato']);

	var_dump($cliente);
	$sql->execute();

	var_dump($cliente);
	exit();

	$idServico = $bd->lastInsertedId();

	if ($dadosServico['numero'] != false)
	{
		$sql = $bd->prepare('INSERT INTO celular (numero, email)
		VALUES (:numero, :email);');

		$sql->bindValue(':numero', $dadosServico['numero']);
		$sql->bindValue(':email', $dadosServico['email']);

		$sql->execute();
	}

	if ($dadosServico['placa'] != false)
	{
		$sql = $bd->prepare('INSERT INTO veiculo (marca, modelo, tiposervico, placa, cor, ano, numRastreador )
		VALUES (:marca, :modelo, :tiposervico, :placa, :cor, :ano, :numRastreador);');

		$sql->bindValue(':marca', $dadosServico['marca']);
		$sql->bindValue(':modelo', $dadosServico['modelo']);
		$sql->bindValue(':tiposervico', $dadosServico['tiposervico']);
		$sql->bindValue(':placa', $dadosServico['placa']);
		$sql->bindValue(':cor', $dadosServico['cor']);
		$sql->bindValue(':ano', $dadosServico['ano']);
		$sql->bindValue(':numRastreador', $dadosServico['numRastreador']);

		$sql->execute();
	}

}

function InserePagamento($dadosPagamentos)
{
	$bd = FazerLigacao();

	$sql = $bd->prepare('INSERT INTO pagamento (valor, dataVencimento, idServico , dataPago)
	VALUES (:valor, :dataVencimento, :idServico, :dataPago );');

	$sql->bindValue(':valor', $dadosPagamentos['valor']);
	$sql->bindValue(':dataVencimento', $dadosPagamentos['dataVencimento']);
	$sql->bindValue(':dataPago', $dadosPagamentos['dataPago']);
	$sql->bindValue(':idServico', $dadosPagamentos['idServico']);
	$sql->execute();

}

function usuarioEhSubgerente($id)
{

  	$bd = FazerLigacao();

    $sql = $bd->prepare('SELECT funcionario FROM gerenciamento WHERE idGerenciamento = :valId');

    $sql->bindValue(':valId', $id);

    $sql->execute();

    $resultado = $sql->fetch();

    if ($resultado['funcionario'] == 0){

        return false;
		}
    else{

        return true;
		}
}

function BuscaSubgerentePorEmail($email)
{
	$bd = FazerLigacao();

	$sql = $bd->prepare('SELECT idGerenciamento, nome FROM gerenciamento WHERE email = :email');

	$sql->bindValue(':email', $email);

	$sql->execute();

	return $sql->fetch();
}

function BuscaPagamentos($nomecliente)
{

$bd = FazerLigacao();

$sql = $bd->query('SELECT dataPago, dataVencimento, IdPagamento
											FROM pagamento
											JOIN cliente ON pagamento.IdPagamento = cliente.nome
											WHERE nome LIKE :nome AND nome LIKE :pesquisa');

$sql->bindParam(':pesquisa', '%' . $pesquisa . '%');

if ($sql->execute())
{
	return $sql->fetchall();
}

return null;

}

function listapagamentos()
{

$bd = FazerLigacao();
$sql = $bd->query('SELECT dataPago, dataVencimento, IdPagamento
											FROM pagamento
											JOIN cliente ON pagamento.IdPagamento = cliente.nome');

if ($sql->execute())
{
	return $sql->fetchall();
}

return null;

}


function ExtraiRegistroSessão(string $chave)
{
	if (array_key_exists($chave, $_SESSION))
	{
		$erro = $_SESSION[$chave];
		unset($_SESSION[$chave]);

		return $erro;
	}
	else
	{
		return null;
	}
}

function BuscaUsuario($Id)
{
	$bd = FazerLigacao();

 	$sql = $bd->prepare('SELECT * FROM Pessoa_Fisica JOIN Cliente ON Cliente.IdCliente = Pessoa_Fisica.id_PF Where idCliente = :id');
	$sql->bindParam(':id', $Id);

	if ($sql->execute())
	{
		return $sql->fetchAll();
	}

  $sql = $bd->prepare('SELECT * FROM Pessoa_Juridica JOIN Cliente ON Cliente.IdCliente = Pessoa_Juridica.id_PJ Where idCliente = :id');
	$sql->bindParam(':id', $Id);

	if ($sql->execute())
	{
	  return $sql->fetchAll();
  }

	$sql = $bd->prepare('SELECT * FROM gerenciamento Where idGerenciamento = :id');
	$sql->bindParam(':id', $Id);

	if ($sql->execute())
	{
		return $sql->fetchAll();
	}

	return null;
}

function ClienteLogado()
{
		session_start();
		if (array_key_exists('id', $_SESSION ))
		{
	  	$id = $_SESSION['id'];
  		return BuscarClientePorId($id);
		}
		else {
			return null;
		}
}

function ListaClientePag()
{
$id = $_SESSION['id'];
$bd = FazerLigacao();

$id = intval($id);
$sql = $bd->prepare("SELECT *
											FROM cliente
											LEFT JOIN servico ON cliente.IdCliente = servico.idServico
											LEFT JOIN pagamento ON pagamento.idServico = servico.idServico
											WHERE cliente.IdCliente  = :id "
										);
$sql->bindParam(':id', $id);

if ($sql->execute())
{
	return $sql->fetchall();
}

return null;

}

function listapagamentosp()
{

$bd = FazerLigacao();
$sql = $bd->query('SELECT *
											FROM cliente
											JOIN servico ON cliente.IdCliente = servico.idServico
											JOIN pagamento ON pagamento.idServico = servico.idServico
											WHERE dataPago is null ');

if ($sql->execute())
{
	return $sql->fetchall();
}

return null;

}
/*
function statusMensalidade($idServico)
{

$bd = FazerLigacao();

$sql = $bd->query('SELECT diaVenc, dataContrato FROM Servico
									WHERE idServico = :valIdServico');

$sql->bindValue(':valIdServico', $idServico);
$resultado = $sql->fetch();

$dia_vencimento = $resultado['diaVenc'];
$data_inicio = $resultado['dataContrato'];
$dia_inicio = intval(date('d', $data_inicio));

if ($dia_vencimento <= $dia_inicio) {
	//primeiro vencimento proximo mes
	$primeiro_vencimento = date('Y-m-d', strtotime("+1 months", strtotime($data_inicio)));
} else {
	$primeiro_vencimento = $data_inicio;
}

$sql = $bd->prepare('SELECT
											 dataCal,
											 COALESCE(pgto.status, "NÃO-PAGO")
										 FROM       (
													 				SELECT
						                          dataVencimento,
						                          dataPago,
						                          CASE
						                              WHEN dataPago > dataVencimento THEN "ATRASADO"
						                              ELSE "PAGO"
						                          END as status
								                   FROM pagamento WHERE idServico = 1
																 ) as pgto
									   RIGHT JOIN  (
													 						SELECT "2018-05-15" + INTERVAL (seq) MONTH dataCal
			                               	FROM seq_0_to_400
																	) AS sequencia
	                   ON sequencia.dataCal = pgto.dataVencimento
							       WHERE (sequencia.dataCal) <= CURDATE()
										 ORDER BY dataCal');

$sql->bindValue(':valDataPrimeiroVencimento', $primeiro_vencimento);
$sql->bindValue(':valIdServico', $idServico);

$sql->execute();
return $sql->fetchAll();

}
*/
function BuscaServico()
{
	$bd = FazerLigacao();

	$sql = $bd->query('SELECT idServico, valor, diaVenc, dataContrato,i dCliente, idGerenciamento
		 									FROM Servico');

	if ($sql->execute())
	{
		return $sql->fetchAll();
 	}
	else
	{
		return null;
	}
}

?>
