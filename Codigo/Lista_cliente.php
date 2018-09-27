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
				<input name= "Pesquisa" type= "text" placeholder="Pequisar"></input><br><br>
				<input type= "button" value= "Buscar"/><br><br><br></input>
			</form>

<?php
						if (empty($nome))
								{
										$clientes = ListaCliente();
								}
								else {
										$clientes = BuscarCliente($nome);
										}

						 if ($clientes != null)
									{
						{

						$bd = FazerLigação();

						echo "<h4>Listagem dos Clientes:</h4>";

						echo "<h4>Listagem dos Clientes:</h4>";

	          echo "<table border='1' bgcolor= '#BC8F8F'>";

						echo "<tr>";

						$tabelahtml = $tabelahtml.'<td>Nome</td>';

						$tabelahtml	= $tabelahtml.'<td>Telefone</td>';

						$tabelahtml = $tabelahtml.'<td>E-mail</td>';

						$tabelahtml = $tabelahtml.'<td>CPF</td>';

						$tabelahtml = $tabelahtml.'</tr>';

						}
						foreach($clientes as $c){

		          $tabelahtml = $tabelahtml.'<tr>';

		          $tabelahtml = $tabelahtml.'<td>.$request[nome].</td>';

		          $tabelahtml = $tabelahtml.'<td>.$request[telefone].</td>';

		          $tabelahtml = $tabelahtml.'<td>.$request[email].</td>';

							$tabelahtml = $tabelahtml.'<td>.$request[cpf].</td>';

		          $tabelahtml = $tabelahtml.'</tr>';

		              }

		          $tabelahtml = $tabelahtml. '</table>';

							 }


?>

 <a href ="cadastroCliente.php">Cadastrar Novos Cliente</a>


    </div>

	</body>
</html>
