<?php
require_once ('funcoes.php');

/*session_start();

if(array_key_exists('emailUsuarioLogado', $_SESSION))
{
	header('Location: Lista_func.php');
}
else {
		header('Location: login.php');
		exit();
}*/

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
      <h1> Funcionários </h1>
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
						echo "<h4>Listagem dos Funcionários:</h4>";
	          echo "<table border='1' bgcolor= '#FFFAFA'>";
						echo "<tr>";
						echo "<td>Nome</td>";
						echo "<td>Telefone</td>";
						echo "<td>E-mail</td>";
            echo "<td>Endereço</td>";
						echo "<td>CPF</td>";
				   	echo "</tr>";

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
<br><br>
<a href ="administrador.php" class="btn btn-outline-dark"><b>Voltar</b></a></br></br>
    </div>
</main>
	</body>
</html>
