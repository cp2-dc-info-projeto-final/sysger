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
		    <h1> Histórico de Pagamentos </h1>

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
                          $tclientes = BuscaPagamentos($nomecliente);
                      }

															echo "<h3>Pagamentos:</h3>";
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

									  		 }
									       echo "</table>";
                         echo  "</section>";

?>
</br>
          <a href= "clientespendenteslista.php" class="btn btn-outline-dark"><b> Clientes Pendentes</bd> </a></br></br>
          <a href ="administrador.php" class="btn btn-outline-dark"><b> Voltar </b></a></br></br>
    </div>
</main>
	</body>
</html>
