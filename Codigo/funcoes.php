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

 	$sql = $bd->prepare('SELECT nome, cpf, email  FROM Pessoa_Fisica JOIN Cliente ON Cliente.IdCliente = Pessoa_Fisica.id_PF Where CPF = :cpf');

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

 	$sql = $bd->prepare('SELECT nome, cpf, senha, email FROM gerenciamento Where CPF = :cpf');

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
												JOIN pessoa_fisica ON cliente.idCliente = Pessoa_Fisica.id_PF
												JOIN pessoa_juridica ON Pessoa_Fisica.id_PF = Pessoa_Juridica.id_PJ
												WHERE nome LIKE :nome AND nome LIKE :pesquisa' );

$sql->bindParam(':pesquisa', '%' . $pesquisa . '%');

if ($sql->execute())
{
	return $sql->fetchall();
}

return null;

}


function ListaCliente()
{

$bd = FazerLigacao();
$sql = $bd->query('SELECT *
											FROM cliente
											LEFT JOIN pessoa_fisica ON cliente.IdCliente = pessoa_fisica.id_PF
											LEFT JOIN pessoa_juridica ON cliente.IdCliente = pessoa_juridica.id_PJ');

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

function InsereServicos($dadosServico)
{
	$bd = FazerLigacao();

	$sql = $bd->prepare('INSERT INTO servico (valor, diaVenc, dataContrato)
	VALUES (:valor, :diaVenc, :dataContrato);');

	$sql->bindValue(':valor', $dadosServico['valor']);
	$sql->bindValue(':diaVenc', $dadosServico['diaVenc']);
	$sql->bindValue(':dataContrato', $dadosServico['dataContrato']);

	$sql->execute();

}

function InserePagamento($dadosPagamentos)
{
	$bd = FazerLigacao();

	$sql = $bd->prepare('INSERT INTO pagamento (valor, dataVencimento, dataPago)
	VALUES (:valor, :dataVencimento,:dataPago );');

	$sql->bindValue(':valor', $dadosPagamentos['valor']);
	$sql->bindValue(':dataVencimento', $dadosPagamentos['dataVencimento']);
	$sql->bindValue(':dataPago', $dadosPagamentos['dataPago']);
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

/*function Spagamentos()
{
	$bd = FazerLigacao();

	$sql = $bd->query('SELECT dataPago, dataVencimento FROM pagamento');

	$sql->execute();

	return $sql->fetch();
}*/

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

?>
