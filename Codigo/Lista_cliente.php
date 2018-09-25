<?php
include '../funcoes.php';
$request = array_map('trim', $_REQUEST);
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
		    <h1> Lista de Clientes </h1>
				<form action="Controladores/Lista_cliente" method="POST">
				<input name= "Pesquisa" type= "text" placeholder="Pequisa"></input>
				<input type= "button" value= "Buscar"/><br><br><br></input>
			</form>
<?php
function BuscarCliente($nome, $telefone, $email, $CPF)

						{

						$bd = FazerLigação();

						<h4>Listagem dos Clientes:</h4>

	          <table border='1' bgcolor= '##BEBEBE>'
						<tr>

						<td>Nome</td>

						<td>Telefone</td>

						<td>E-mail</td>

						<td>CPF</td>

						</tr>

						}
						while($request = mysql_fetch_assoc($bd)){

		            <tr>

		           <td>'.$request["nome"].'</td>

		           <td>'.$request["telefone"].'</td>

		           <td>'.$request["email"].'</td>

							<td>'.$request["cpf"].'</td>

		           </tr>

		              }

		             </table>

		              }

?>
<form action="Cadastro" method ="POST">
	<input type="submit" name="Cadastar" id="Cadastrar" value="Cadastrar" onclick="window.open(this.getAttribute('cadastroCliente.php.php?id=<?php echo "$resultadoanuncio[CODIGOANUNCIO]";?>'), '_blank');"  />
  <input type="submit" value = "Cadastrar"></input>
</form>


    </div>

	</body>
</html>
