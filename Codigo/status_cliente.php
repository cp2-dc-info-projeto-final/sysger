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
  <?php require('ImagemDeFundo.css'); ?>

</head>
<body>
	<?php require('BarraNav.php'); ?>
	<div>
<main class="container" style="border: 1px solid black;
                        max-width: 600px;
                        margin-top: 20px;
                        border-radius:30px 30px 30px 30px;
                        box-shadow: 2px 2px 2px">
		<h1> Seu status de Pagamento </h1>
			<?php

			if (empty($nome))
					{
							$clientesp = ListaCliente();
					}
					else {
							$clientesp = BuscarCliente($nome);
							}

			if ($clientesp != null)
			{
									echo "<h4>Pagamentos do cliente:</h4>";
				          echo "<table border='1' bgcolor= '#FFCC99'>";
									echo "<tr>";
									echo "<td>Nome</td>";
									echo "<td>Mês</td>";
									echo "<td>Status</td>";
							   	echo "</tr>";

			          }	foreach($clientesp as $cp)
			              {

			  		          echo "<tr>";
			  		          echo "<td>".$cp['nome']."</td>";
											echo "<td>".$cp ['dataPago']. "</td>";
                      echo date('M');
                      if ($request['dataPago'] == null){
                            echo "<td>Pendente</td>";
                      }
                      else if ($p['dataPago'] <= $p['dataVencimento']) {
                            echo "<td>Pago</td>";
                      }
                      else
                      {
                            echo "<td>Pago com atraso</td>";
                      }

			  		          echo "</tr>";

                        echo "</table>";

			  							 }

			?>

			<a href ="Cliente.php" class="btn btn-outline-dark">Voltar</a></br></br>

    </div>
</main>
	</body>
</html>
