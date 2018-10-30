<?php
session_start();
require_once("login.php");

}


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset= "utf-8"/>
    <title> SysGER </title>
		<style>

      h1 {Color: #708090; padding-left: 200px;}
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
		     <?php echo "Boleto do Cliente ".$_SESSION['nome'];  ?>

				 <h1>Gerar 2a via do Boleto</h1>

		    <br><br>  <a href="C:\Users\labcaxias\Documents\GITHUB\requisitos-sysger\FotosTelas\BoletoBancario.png"> Download do Boleto </a>

    </div>

	</body>
</html>
