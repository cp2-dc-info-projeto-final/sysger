<?php
require_once ('funcoes.php');
$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
  $request,
  [
    'Pesquisa' => FILTER_DEFAULT
  ]
);

$nome = $request['Pesquisa'];

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
				<form action="Lista_cliente" method="GET">
				<input name= "Pesquisa" type= "text" placeholder="Pequisar"></input><br><br>
				<input type= "submit" value= "Buscar"/><br><br><br></input>
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


						echo "<h4>Listagem dos Clientes:</h4>";

	          echo "<table border='1' bgcolor= '#BC8F8F'>";

						echo "<tr>";

						echo "<td>Nome</td>";

						echo "<td>Telefone</td>";

						echo "<td>E-mail</td>";

            echo "<td>Endereço</td>";

						echo "<td>CPF</td>";

            echo "<td>CNPJ</td>";

				   	echo "</tr>";

          }	foreach($clientes as $c)
              {

  		          echo "<tr>";

  		          echo "<td>".$c['nome']."</td>";

  		          echo "<td>".$c['telefone']."</td>";

  		          echo "<td>".$c['email']."</td>";

                echo "<td>".$c['endereco']."</td>";

  							echo "<td>".$c['cpf']."</td>";

                echo "<td>".$c['cnpj']."</td>";

  		           echo "</tr>";

  		              }
                      echo "</table>";

  							 }

?>

 <a href ="DadosNovoCliente.php"><button>Cadastrar Novos Cliente</button></a>


    </div>

	</body>
</html>
