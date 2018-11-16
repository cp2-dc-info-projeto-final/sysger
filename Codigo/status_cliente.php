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

$cliente = ClienteLogado();
if ($cliente == null)
{
  header('Location: login.php');
  exit();
}

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
		<h1> Seu status de Pagamento </h1><br>
			<?php

			$cliente = ListaClientePag();

			if ($cliente != null)
			{

				          echo "<table border='1' bgcolor= '#FFFAFA'>";
									echo "<tr>";
									echo "<td>Nome</td>";
                  echo "<td>Valor do Contrato</td>";
                  echo "<td>Data de Pagamento</td>";
									echo "<td>Status</td>";
							   	echo "</tr>";

			          }	foreach($cliente as $cp)
			              {

			  		          echo "<tr>";
			  		          echo "<td>".$cp['nome']."</td>";
                      echo "<td>".$cp['valor']."</td>";
											echo "<td>".$cp ['dataPago']. "</td>";
                      if ($cp['dataPago'] == null){
                            echo "<td>Pendente</td>";
                      }
                      else if ($cp['dataPago'] <= $cp['dataVencimento']) {
                            echo "<td>Pago</td>";
                      }
                      else
                      {
                            echo "<td>Pago com atraso</td>";
                      }

			  		          echo "</tr>";
			  							 }

                       echo "</table>";
			?>

      <br><br>
			<a href ="Cliente.php" class="btn btn-outline-dark">Voltar</a></br></br>

    </div>
</main>
	</body>
</html>
