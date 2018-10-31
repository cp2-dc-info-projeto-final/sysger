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

		    <h1> Histórico de pagamentos </h1>

				<form action="histPagamentos.php" method="GET">
				<input name= "Pesquisa" type="text" placeholder="Pequisar clientes"><br><br>
				<input type= "submit" value="Buscar"/><br>
				</form>


									<?php
                    if (empty($nomecliente))
                      {
                          $tclientes = listapagamentos();
                      }
                      else {
                          $tclientes = listapagamentos($nomecliente);
                          }

																		{
															{


															echo "<h3>Pagamentos:</h3>";

                              echo "<section class='row'>";

										          echo "<table border='1' bgcolor= '#FFFAFA'>";

															echo "<tr>";

															echo "<td>Nome</td>";

															echo "<td>Mensalidade</td>";

															echo "<td>Data de Vencimento</td>";

															echo "<td>Data serviço pago</td>";

															echo "<td>STATUS</td>";

													   	echo "</tr>";

									          }

                            foreach($tclientes as $p)

													/*	if ($request['dataPago'] != null){
															STATUS['p'] = 'Pago'
														}
														else {
															STATUS['p'] = 'Pendente'
														}*/
									              {

									  		          echo "<tr>";

																echo "<td>".$p['nome']."</td>";

 									 		          echo "<td>".$p['dataVencimento']."</td>";

 									 		          echo "<td>".$p['dataPago']."</td>";

																echo date('M');

									  		         echo "<td>".$p['Mensalidade']."</td>";

									  		         echo "<td>".$p['STATUS']."</td>";

									  		          echo "</tr>";

									  		              }
									                      echo "</table>";
                                        echo  "</section>";
									  							 }

									?>

										<table>
<td> </td>
<tr> </tr>
										</table>

								</div>
    </div>

    <a href= "clientespendenteslista.php"> Clientes Pendentes </a>

	</body>
</html>
