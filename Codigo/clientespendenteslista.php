<?php
require_once ('funcoes.php');

session_start();

if(array_key_exists('emailUsuarioLogado', $_SESSION))
{
	header('Location: clientespendenteslista.php');
}
else {
		header('Location: login.php');
		exit();
}

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
  $request,
  [
    'Pesquisa' => FILTER_DEFAULT
  ]
);

$nomecliente = $request['Pesquisa'];

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
      <main class="container" style="border: 1px solid black; max-width: 600px; margin-top: 20px; border-radius:30px 30px 30px 30px ">
		    <h1> Clientes Pendentes </h1>

				<form action="status_administrador.php" method="GET">
				<input type= "submit" value="Listar"/><br>
      </form><br><br>


        <?php
                    $listapend = listapagamentosp();

                              echo "<section class='row'>";
                              echo "<table border='1' bgcolor= '#FFFAFA'>";
                              echo "<tr>";
                              echo "<td>Nome</td>";
                              echo "<td>Data de Vencimento</td>";
                              echo "<td>Data do Serviço Pago</td>";
                            /*  echo "<td>Serviço</td>";*/
                              echo "<td>STATUS</td>";
                              echo "</tr>";

                                  foreach($listapend as $pd)
                                  {
                                          echo "<tr>";
                                          echo "<td>".$pd['nome']."</td>";
                                          echo "<td>".$pd['dataVencimento']."</td>";
                                          echo "<td>".$pd['dataPago']."</td>";
                                        /*  echo "<td>".$pd['']."</td>";*/
                                          if ($pd['dataPago'] == null){
                                                echo "<td>Pendente</td>";
                                          }
                                           echo "</tr>";

                                     }
                         echo "</table>";
                         echo  "</section>";

?>
<br><br>
								</div>
    </div>
  </main>
	</body>
</html>
