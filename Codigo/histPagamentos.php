<?php
/* query com volta do banco */
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
		    <h1> Histórico de pagamentos dos Clientes  </h1>

								<div style="background-color:lightblue">

									<?php
															if (empty($pag))
																	{
																			$pag = Buscapagamento();
																	}
																	else {
																			$pag = Buscapagamento();
																			}

															 if ($pag != null)
																		{
															{


															echo "<h3>Pagamentos:</h3>";

										          echo "<table border='2' bgcolor= '#BC8F8F'>";

															echo "<tr>";

															echo "<td>Mensalidade</td>";

															echo "<td>STATUS</td>";


													   	echo "</tr>";

									          }	for
														if
														(mes.pagamento == mes.mensalidade && valor.pagamento['id'] == valor.devido){
															status['p'] = 'Pago'
														}
														else {
															status['p'] = 'Pendente'
														}

														else
									              {

									  		          echo "<tr>";


																	echo date('M');

									  		          echo "<td>".$p['Mensalidade']."</td>";

									  		          echo "<td>".$p['status']."</td>";

									  		           echo "</tr>";

									  		              }
									                      echo "</table>";

									  							 }

									?>
										<table> //for
<td> </td>
<tr> </tr>
										</table>
								<!--	<?php
								$pg = Buscapagamento();
								if() {

								}
								else(){

								}

								?>-->
								</div>
    </div>

	</body>
</html>
