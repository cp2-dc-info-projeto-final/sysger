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

		    <h1> Histórico de pagamentos </h1>

				<form action="" method="GET">
				<input name= "Pesquisa" type="text" placeholder="Pequisar clientes"><br><br>
				<input type= "submit" value="Buscar"/><br>
				</form>

<div style="background-color:lightblue">

									<?php
													if ($nomecliente != null){

														$p = listapagamentos();

													}

																		{
															{


															echo "<h3>Pagamentos:</h3>";

										          echo "<table border='2' bgcolor= '#BC8F8F'>";

															echo "<tr>";

															echo "<td>Nome</td>";

															echo "<td>Mensalidade</td>";

															echo "<td>Data de Vencimento</td>";

															echo "<td>Data serviço pago</td>";

															echo "<td>STATUS</td>";

													   	echo "</tr>";

									          }

														if ($request ['dataPago'] != null){
															STATUS['p'] = 'Pago'
														}
														else {
															STATUS['p'] = 'Pendente'
														}

														else
									              {

									  		          echo "<tr>";

																echo "<td>".$0['nome']."</td>";

 									 		          echo "<td>".$p['dataVencimento']."</td>";

 									 		          echo "<td>".$p['dataPago']."</td>";

																echo date('M');

									  		         echo "<td>".$p['Mensalidade']."</td>";

									  		         echo "<td>".$p['STATUS']."</td>";

									  		          echo "</tr>";

									  		              }
									                      echo "</table>";

									  							 }
*/
									?>
										<table>
<td> </td>
<tr> </tr>
										</table>

								</div>
    </div>

	</body>
</html>
