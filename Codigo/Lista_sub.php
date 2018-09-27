<?php

include '../funcoes.php';
//empty($_GET);
//verificar o que tem no get conectando no banco

$request = array_map('trim', $_REQUEST);


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
		    <h1> Lista de Subgerentes </h1>
				<form action="Lista_sub.php" method="GET">
				<input name= "Pesquisa" type="text" placeholder="Pequisar"><br><br>
				<input type= "button" value="Buscar"/><br><br><br>
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

						$tabelahtml = $tabelahtml.'<td>Nome</td>';

						$tabelahtml	= $tabelahtml.'<td>Telefone</td>';

						$tabelahtml = $tabelahtml.'<td>E-mail</td>';

						$tabelahtml = $tabelahtml.'<td>CPF</td>';

						$tabelahtml = $tabelahtml.'</tr>';

						}
						foreach($subgerentes as $s){

		          $tabelahtml = $tabelahtml.'<tr>';

		          $tabelahtml = $tabelahtml.'<td>.$request[nome].</td>';

		          $tabelahtml = $tabelahtml.'<td>.$request[telefone].</td>';

		          $tabelahtml = $tabelahtml.'<td>.$request[email].</td>';

							$tabelahtml = $tabelahtml.'<td>.$request[cpf].</td>';

		          $tabelahtml = $tabelahtml.'</tr>';

		              }

		          $tabelahtml = $tabelahtml. '</table>';

							 }

?>
    </div>

	</body>
</html>
