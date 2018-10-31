
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

	</head>
	<body>
		<?php require('BarraNav.php'); ?>
    <div>
		    <h1> Gerenciamento </h1>
<<<<<<< HEAD
				<?php if(usuarioEhSubgerente($id) == false ) { ?>
				<a href="Lista_func.php"> <button>Listagem dos Funcionários</button></a><br><br>
			<?php } ?>
			<?php if(usuarioEhSubgerente($id) == false ) { ?>
			<a href ="DadosNovoFunc.php"><button>Cadastrar novos funcionários</button></a><br><br>
				<?php } ?>
				<a href="Lista_cliente.php"> <button>Listagem dos Clientes</button></a><br><br>
				<a href="status_cliente.php"> <button>Status dos clientes</button></a><br><br>
					<?php if(usuarioEhSubgerente($id) == false ) { ?>
				<a href ="DadosNovoCliente.php"><button>Cadastrar novos cliente</button></a><br><br>
					<?php } ?>
				<a href ="controladores/Sair.php"><button>SAIR</button></a>
=======

				<a href="Lista_func.php"> Listagem dos Funcionários</a><br><br>
			 	<a href ="DadosNovoFunc.php">Cadastrar novos funcionários</a><br><br>
				<a href="Lista_cliente.php">Listagem dos Clientes</a><br><br>
				<a href="status_cliente.php">Status dos clientes</a><br><br>
				<a href ="DadosNovoCliente.php">Cadastrar novos cliente</a><br><br>
>>>>>>> 44cbfd76a735286693ec38cdce6ea78a3f15dec2

    </div>
	</body>
</html>
