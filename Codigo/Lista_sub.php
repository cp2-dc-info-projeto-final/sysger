<?php
require_once ('funcoes.php');
//empty($_GET);
//verificar o que tem no get conectando no banco

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
		<style>

      h1 {Color: black; padding-left: 50px;}
      body { background-color: #0A0A2A; }
      div { background-color: #F8E0F7;
				margin-left: 500px;
				margin-top: 150px;
				margin-right: 500px;
				margin-bottom: 10px;
				padding: 20px;
				border { background-color: black;}}
      form{padding: 50px; padding-top: 10px;}
		</style>
	</head>
	<body>
    <div>
		    <h1> Lista de Subgerentes </h1>
				<form action="Lista_sub.php" method="GET">
				<input name= "Pesquisa" type="text" placeholder="Pequisar"><br><br>
				<input type= "submit" value="Buscar"/><br>
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

						echo "<h4>Listagem dos Subgerentes:</h4>";

	          echo "<table border='1' bgcolor= '#BC8F8F'>";

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
