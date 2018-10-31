<?php
	session_start();

	if(array_key_exists('emailUsuarioLogado', $_SESSION))
	{
		header('Location: administrador.php');
		exit();
	}

	$erro = null;

	if(array_key_exists('erros', $_SESSION))
	{
		$erro = $_SESSION['erros'];
		unset($_SESSION['erros']);
	}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset= "utf-8"/>
    <title>SysGer </title>

	</head>
	<body>
			<?php require('BarraNav.php'); ?>
			<?php if($erro != null){ ?>
					<div id="erro">
						<p> ERRO: <?= $erro ?> </p>
					</div>
				<?php } ?>

				<h1> Tela de Login </h1>

				<!--<form method="POST" action="Controladores/Entrar.php">
					<label> CPF/CNPJ </label></br><input name="CPF/CNPJ" required type="text" value="" minlenght="11" maxlength="14"/></label></br></br>
					<label> Senha </label></br><input name="senha" required type="password" value=""/minlenght="6" maxlength="12"></label></br></br>
					<input type= "submit" value= "Entrar"/>
				</form>-->

	</body>
</html>
