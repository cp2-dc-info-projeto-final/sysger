<?php
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset= "utf-8"/>
	<title> SysGER </title>
	<style>
	body{
		background-color: white;
	}

	h1{
		color: black;
		text-align: center;
	}

	div, form{
		text-align: center;
	}
	</style>
</head>
<body>
	<div>
			<h1> Status de Pagamento </h1>
			<form action="status_cliente.php" method="GET">
			<input name= "Pesquisa" type= "text" placeholder="Digite cpf/cnpj"></input><br><br>
			<input type= "submit" value= "Buscar"/><br><br><br></input>
		</form>
			<?php
/*

								if (empty())
								{

							}
									echo "<h4>Status de pagamento do cliente:</h4>";

				          echo "<table border='1' bgcolor= '#FFCC99'>";

									echo "<tr>";

									echo "<td>Nome</td>";

									echo "<td>CPF</td>";

			            echo "<td>CNPJ</td>";

									echo "<td>Pagamentos</td>";

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
*/
			?>


    </div>

	</body>
</html>
