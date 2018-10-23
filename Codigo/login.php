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
<a class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar"></a>
<nav class="navbar navbar-dark bg-dark">
<!DOCTYPE html>
<html>
	<head>
		<meta charset= "utf-8"/>
    <title> SysGER </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
	<body>
    <div>
				<h1> SysGER </h1>
				<?php if($erro != null){ ?>
					<div id="erro">
						<p> ERRO: <?= $erro ?> </p>
					</div>
				<?php } ?>

		      <form action= "Controladores/Entrar.php" method= "POST">
		          <label> CPF/CNPJ </label></br><input name="CPF/CNPJ" required type="text" value="" minlenght="11" maxlength="14"/></label><br/><br/>
			        <label> Senha </label></br><input name="senha" required type="password" value=""/minlenght="6" maxlength="12"></label><br/></br>
              <input class="glyphicon glyphicon-log-in" type= "submit" value= "Entrar"/>
		      </form>

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
