<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>SysGER</title>
	<style>
	h1 {
					Color: black; padding-left: 50px;
			}

	body {
		 			background-color: #0A0A2A;
	  		}

	form	{
					padding: 50px; padding-top: 10px;
				}
	</style>
</head>
<body>

	<h1>Cadastrar Cliente</h1>


	<form method="POST" action="Controlador/cadastroCliente.php">
		<input name="nomePróprio" type="text"  placeholder="Nome próprio" minlength=3 maxlength=35 />

		<input name="sobrenome" type="text"  placeholder="Sobrenome" minlength=3 maxlength=35 /><br/>

	  <input name="email" type="email" placeholder="E-Mail"/></label><br/>

		<input name="senha" type="password" placeholder="Senha" minlength=6 maxlength=12 /><br/>

		<input name="telefone" type="tel"  placeholder="Telefone" minlength=8 maxlength=50 /><br/>

		<label>Data de nascimento:<input name="dataNasc" type="date" required/><br/>

		<input name="cpf" type="text" placeholder="CPF" minlength=11 maxlength=11/><br/>

		<input type="submit" value="Cadastrar"/>

	</form>

</body>
</html>
