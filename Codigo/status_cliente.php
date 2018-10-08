<?php
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
		    <h1> Seja bem-vindo Cliente  </h1>
				<form action="status_cliente.php" method="GET">
				<input name= "Pesquisa" type= "text" placeholder="Digite seu cpf/cnpj"></input><br><br>
				<input type= "submit" value= "Buscar"/><br><br><br></input>
			</form>
			<?php
									if (empty($cpf_cnpj))
											 {
													$clientes = BuscarCliente($cpf_cnpj);
													}

									 if ($clientes != null)
												{
									{




									echo "<h4>Status de pagamento do cliente:</h4>";

				          echo "<table border='1' bgcolor= '#BC8F8F'>";

									echo "<tr>";

									echo "<td>Nome</td>";

									echo "<td>CPF</td>";

			            echo "<td>CNPJ</td>";

									echo "<td> Pagamentos</td>";

							   	echo "</tr>";

			          }	foreach($clientes as $c)
			              {

			  		          echo "<tr>";

			  		          echo "<td>".$c['nome']."</td>";

			  							echo "<td>".$c['cpf']."</td>";

			                echo "<td>".$c['cnpj']."</td>";

			  		           echo "</tr>";

			  		              }
			                      echo "</table>";

			  							 }

			?>


    </div>

	</body>
</html>
