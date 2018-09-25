<?php

include '../funcoes.php';
empty($_GET);
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
				<input name= "Pesquisa" type="text" placeholder="Pequisa">
				<input type= "button" value="Buscar"/><br><br><br>
			</form>
      <?
          function BuscarSubgerente($nome, $telefone, $email, $cpf)

          {

            {

            $bd = FazerLigação();

            <h4>Listagem dos Subgerentes:</h4>

            <table border='1' bgcolor= '#BEBEBE'>
            <tr>

            <td>Nome</td>

            <td>Telefone</td>

            <td>E-mail</td>

            <td>CPF</td>

            </tr>

            }
            while($request = mysql_fetch_assoc($bd)){

                <tr>

               <td>'.$request["nome"].'</td>

               <td>'.$request["telefone"].'</td>

               <td>'.$request["email"].'</td>

              <td>'.$request["cpf"].'</td>

               </tr>

                  }

                 </table>

                  }



?>

    <!--  <table border="1">
            <tr>
            <td>linha 1, célula 1</td>
            <td>linha 1, célula 2</td>
            </tr>
            <tr>
            <td>linha 2, célula 1</td>
            <td>linha 2, célula 2</td>
            </tr>
      </table>-->




    </div>

	</body>
</html>
