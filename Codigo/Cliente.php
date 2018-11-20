<?php

/*session_start();

if(array_key_exists('emailUsuarioLogado', $_SESSION))
{
	header('Location: Cliente.php');
}
else {
		header('Location: login.php');
		exit();
}*/

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
															box-shadow: 2px 2px 2px;">
		    <h1> Seja Bem-Vindo, Cliente  </h1><br>

							<a href="status_cliente.php" class="btn btn-prymary btn-lg btn-block btn-outline-dark"><b>Meu Status de Pagamento</b></a><br><br>
							<a href="Imagens/BoletoBancario.png" class="btn btn-prymary btn-lg btn-block btn-outline-dark"><b>2a via do Boleto</b></a><br><br>

    </div>
     </main>
	</body>
</html>
