<?php
	require_once('funcoes.php');

	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}


	if (array_key_exists('emailUsuarioLogado', $_SESSION))
	{
		$usuárioConectado = BuscaUsuario($_SESSION['emailUsuarioLogado']);
	}
	else
	{
		$usuárioConectado = null;
	}

	$navErroLogin = ExtraiRegistroSessão('erroLogin');
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<nav class="navbar navbar-dark bg-dark">
	<a class="navbar-brand" style="color:white">SysGer</a>

	<?php if ($usuárioConectado == null) { ?>
		<form class="form-inline" method="POST" action="Controladores/Entrar.php">
			<label class="navbar-text"> CPF/CNPJ </label></br><input class="form-control" name="CPF/CNPJ" required type="text" value="" minlenght="11" maxlength="14"/></label>
			<label class="navbar-text"> Senha </label></br><input class="form-control" name="senha" required type="password" value=""/minlenght="6" maxlength="12"></label>
			<input name="local" type="hidden" value="<?= $_SERVER['REQUEST_URI'] ?>">
			<input class="btn btn-outline-info my-2 my-sm-0" type= "submit" value= "Entrar"/>
		</form>
	<?php } else { ?>
		<a class="ml-auto mr-2" href="usuário.php?id=<?= $usuárioConectado['id'] ?>"><?= $usuárioConectado['nome'] ?></a>

		<form class="form-inline" method="POST" action="Controladores/Sair.php">
			<input name="local" type="hidden" value="<?=  $_SERVER['REQUEST_URI'] ?>">
			<input type="submit" value="Sair">
		</form>
	<?php } ?>
</nav>

<?php if ($navErroLogin != null) { ?>
	<div class="alert alert-warning">
		<p>Erro: <?= $navErroLogin ?></p>
	</div>
<?php } ?>

<!DOCTYPE html>
<html>
<head>
<style>
	#fundo {
		position: fixed;
		width: 100%;
		height: 100%;
	}
</style>
</head>
<body>
	<div id="fundo">
			<img src="Fundo.jpg" alt="" />
	</div>
</body>

</html>
