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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
	<body>
		<nav class="navbar navbar-dark bg-dark">
			<h1 class="navbar-brand"> SysGER </h1>

			<form class="form-inline" action= "Controladores/Entrar.php" method= "POST">
					<label class="navbar-text"> CPF/CNPJ </label></br><input class="form-control" name="CPF/CNPJ" required type="text" value="" minlenght="11" maxlength="14"/></label>
					<label class="navbar-text"> Senha </label></br><input class="form-control" name="senha" required type="password" value=""/minlenght="6" maxlength="12"></label>
					<input class="btn btn-sm btn-outline-secondary" type= "submit" value= "Entrar"/>
			</form>
		</nav>
    <div>

				<?php if($erro != null){ ?>
					<div id="erro">
						<p> ERRO: <?= $erro ?> </p>
					</div>
				<?php } ?>



					<!--<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header"
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>-->
    </div>

	</body>
</html>
