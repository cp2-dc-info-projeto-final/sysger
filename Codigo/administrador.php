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
		body{
			background-color: white;
		}

		h1{
			color: black;
			text-align: center;
		}

		div, form{
			text-align: center;
		}
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
					<?php if(usuarioEhSubgerente($id) == false ) { ?>
				<a href ="DadosNovoCliente.php">Cadastrar novos cliente</a><br><br><br>
					<?php } ?><br><br><br>
				<a href ="controladores/Sair.php">SAIR</a>



    </div>
	</body>
</html>
