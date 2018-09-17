<?php
	session_start();

	if(array_key_exists('emailUsuarioLogado', $_SESSION))
	{
		header('Location: .php');
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
    <title> SysGER </title>
		<style>

      h1 {Color: black; padding-left: 50px;}
      body { background-color: #0A0A2A; }
      div { background-color: #F8E0F7;
				margin-left: 600px;
				margin-top: 200px;
				margin-right: 650px;
				margin-bottom: 10px;
				padding: 20px;
				border { background-color: black;}}
      form{padding: 50px; padding-top: 10px;}
       {
      background-color: #4CAF50;
        border: none;
        color: green;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        }
      .azul{
				background-color: #A9D0F5;
				padding-left: 65px;
				padding-right: 68px;
				padding-bottom: 5px;
      }
		</style>
	</head>
	<body>
    <div>
		    <h1> Tela de Login</h1>

		      <form action= "" method= "POST">
		          <label> CPF/CNPJ </label><input name="CPF/CNPJ" required type="text" value="" minlenght="11" maxlength="14"/></label><br/><br/>
			        <label> Senha </label><input name="Senha" required type="password" value=""/minlenght="6" maxlength="12"></label><br/></br>
              <input class="button azul" type= "submit" value= "Entrar"/>
		      </form>

            <label>Esqueceu sua senha?</label>
    </div>

	</body>
</html>
