<?php
require_once ('funcoes.php');

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

		    <h1> Clientes Pendentes </h1>

				<form action="status_administrador.php" method="GET">
				<input type= "submit" value="Listar"/><br>
				</form>


        <?php
          if (empty($nomecliente))
            {
                $tclientes = listapagamentos();
            }
            else {
                $tclientes = BuscaPagamentos($nomecliente);
            }

                    echo "<h3>Pagamentos Pendentes:</h3>";
                    echo "<section class='row'>";
                    echo "<table border='1' bgcolor= '#FFFAFA'>";
                    echo "<tr>";
                    echo "<td>Nome</td>";
                    echo "<td>Data de Vencimento</td>";
                    echo "<td>Data serviço pago</td>";
                    echo "<td>STATUS</td>";
                    echo "</tr>";

            foreach($tclientes as $p)
            {
                    echo "<tr>";
                    echo "<td>".$p['nome']."</td>";
                    echo "<td>".$p['dataVencimento']."</td>";
                    echo "<td>".$p['dataPago']."</td>";
                    echo date('M');
                    if ($request['dataPago'] == null){
                          echo "<td>Pendente</td>";
                    }
                     echo "</tr>";

               }
               echo "</table>";
               echo  "</section>";

?>


								</div>
    </div>

	</body>
</html>
