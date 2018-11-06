<?php
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset= "utf-8"/>
	<title> SysGER </title>

</head>
<body>
	<?php require('BarraNav.php'); ?>
	<div>
		<main> <h1> Status de Pagamento </h1>
			<form action="status_cliente.php" method="GET">
			<input name= "Pesquisa" type= "text" placeholder="Digite cpf/cnpj"></input><br><br>
			<input type= "submit" value= "Buscar"/><br><br><br></input>
		</form>
	</main>
			<?php
/*

								if (empty())
								{

							}
									echo "<h4>Status de pagamento do cliente:</h4>";

				          echo "<table border='1' bgcolor= '#FFCC99'>";

									echo "<tr>";

									echo "<td>Nome</td>";

									echo "<td>Mês</td>";

									echo "<td>Status</td>";

							   	echo "</tr>";

			          }	foreach($clientes as $c)
			              {

			  		          echo "<tr>";

			  		          echo "<td>".$c['nome']."</td>";

											echo "<td>"

			  		           echo "</tr>";

			  		              }
			                      echo "</table>";

			  							 }
*/
			?>

			<a href ="Cliente.php">Voltar</a>

    </div>

	</body>
</html>
