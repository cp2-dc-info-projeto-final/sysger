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
		    <h1> Lista de Clientes </h1>
				<form action="Controladores/Lista_cliente" method="POST">
				<input name= "Pesquisa" type= "text" placeholder="Pequisa"></input>
				<input type= "button" value= "Buscar"/><br><br><br></input>
				<input type = "textare">
			</form>
<?php
			if ($buscarCliente==true)
  {
    BuscarCliente($buscarCliente);
  }

?>
<form action="Cadastro" method ="POST">
  <input type="submit" value = "Cadastrar"></input>
</form>


    </div>

	</body>
</html>