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
		    <h1> Lista de Subgerentes </h1>
				<form action="Controladores/Lista_sub" method="POST">
				<input name= "Pesquisa" type="text" placeholder="Pequisa">
				<input type= "button" value="Buscar"/><br><br><br>
				<input type = "Listbox" value="Subgerentes"><p>chamar função que exibirá o resultdo do select</p
			</form>





    </div>

	</body>
</html>