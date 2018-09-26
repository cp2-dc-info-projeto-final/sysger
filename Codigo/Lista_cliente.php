<?php
include '../funcoes.php';
$request = array_map('trim', $_REQUEST);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset= "utf-8"/>
    <title> SysGER </title>
		<style>

      h1 {Color: black; padding-left: 50px;}
      body { background-color: #0A0A2A; }
      div { background-color: #F8E0F7;
				margin-left: 500px;
				margin-top: 150px;
				margin-right: 500px;
				margin-bottom: 10 px;
				padding: 20px;
				border { background-color: black;}}
      form{padding: 50px; padding-top: 10px;}
		</style>
	</head>
	<body>
    <div>
		    <h1> Lista de Clientes </h1>
				<form action="Controladores/Lista_cliente" method="POST">
				<input name= "Pesquisa" type= "text" placeholder="Pequisa"></input>
				<input type= "button" value= "Buscar"/><br><br><br></input>
			</form>

<?php
				if (BuscarCliente($nome, $telefone, $email, $CPF))

									{
						{

						$bd = FazerLigação();

						$tabelahtml = "<h4>Listagem dos Clientes:</h4>";

	          $tabelahtml = $tabelahtml."<table border='1' bgcolor= '#BEBEBE'>";

						<tr>

						$tabelahtml = $tabelahtml.<td>'Nome'</td>

						$tabelahtml	= $tabelahtml.<td>'Telefone'</td>

						$tabelahtml = $tabelahtml.<td>'E-mail'</td>

						$tabelahtml = $tabelahtml.<td>'CPF'</td>

						</tr>

						}
						while($request = mysql_fetch_assoc($nome, $telefone, $email, $cpf)){

		            <tr>

		           $tabelahtml = $tabelahtml.<td>'.$request['nome'].'</td>

		           $tabelahtml = $tabelahtml.<td>'.$request['telefone'].'</td>

		           $tabelahtml = $tabelahtml.<td>'.$request['email'].'</td>

							$tabelahtml = $tabelahtml.<td>'.$request['cpf'].'</td>

		           </tr>

		              }

		             </table>

							 }


/*<?php
$tabela = $dom->createElement('Lista');
$domAttribute = $dom->createAttribute('id');
$domAttribute->value = '';

$tr = $dom->createElement('tr');
$tabela->appendChild($tr);

$td = $dom->createElement('td', 'Nome');
$tr->appendChild($td);

$td = $dom->createElement('td', 'Email');
$tr->appendChild($td);

$td = $dom->createElement('td', 'senha');
$tr->appendChild($td);

$td = $dom->createElement('td', 'endereço');
$tr->appendChild($td);

$td = $dom->createElement('td', 'telefone');
$tr->appendChild($td);

$td = $dom->createElement('td','cpf');
$tr->appendChild($td);

$table->appendChild($domAttribute);
$dom->appendChild($table);


//The above code will output:
<table id="my_table">
<tbody>
<tr>
<td>Label</td>
<td>Value</td>
</tr>
</tbody>
</table>
?>*/


<a href ="cadastroCliente.php">Cadastrar Novos Clientes</a>


    </div>

	</body>
</html>
