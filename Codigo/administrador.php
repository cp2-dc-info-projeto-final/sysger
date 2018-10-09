<?php
require_once ('funcoes.php');
session_start();
$id = $_SESSION['id'];
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
		    <h1> Gerenciamento </h1>
				<?php if(usuarioEhSubgerente($id) == false ) { ?>
				<a href="Lista_func.php">Listagem dos Funcionários</a>
			<?php } ?><br><br><br>
				<a href="Lista_cliente.php">Listagem dos Clientes</a><br><br><br>
				<a href="status_cliente.php">Status dos clientes</a><br><br><br>
				<a href ="cadastroCliente.php">Cadastrar novos cliente</a><br><br><br>
				<a href ="controladores/Sair.php">SAIR</a>



    </div>
	</body>
</html>
