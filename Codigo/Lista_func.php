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
</head>
<body>
  <div>
      <h1> Lista de Funcionários </h1>
      <form action="Lista_func" method="GET">
      <input name= "Pesquisa" type= "text" placeholder="Pequisar"></input><br><br>
      <input type= "submit" value= "Buscar"/><br><br><br></input>
    </form>

      <?php

        if (empty($nome))
            {
                $subgerentes = ListaSubgerente();
            }
            else {
                $subgerentes = BuscarSubgerente($nome);
                }

         if ($subgerentes != null)
          {

            {

						echo "<h4>Listagem dos Funcionários:</h4>";

	          echo "<table border='1' bgcolor= '#FFFAFA'>";

						echo "<tr>";

						echo "<td>Nome</td>";

						echo "<td>Telefone</td>";

						echo "<td>E-mail</td>";

            echo "<td>Endereço</td>";

						echo "<td>CPF</td>";

				   	echo "</tr>";

						}
						foreach($subgerentes as $s)
            {

		          echo "<tr>";

		          echo "<td>".$s['nome']."</td>";

		          echo "<td>".$s['telefone']."</td>";

		          echo "<td>".$s['email']."</td>";

              echo "<td>".$s['endereco']."</td>";

							echo "<td>".$s['cpf']."</td>";

		           echo "</tr>";

		              }
                    echo "</table>";

							 }

?>
    </div>

	</body>
</html>
