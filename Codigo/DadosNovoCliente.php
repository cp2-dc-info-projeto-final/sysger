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
		    <h1> Cadastrar Cliente</h1>

				<!--<?php if($erro != null) { ?>
					<div>
						<p> ERRO: <?= $erro ?> </p>
					</div>
				<?php } ?>-->

        <form action="cadastroCliente.php" method="POST">
					
              <label>Nome:<input name="nome" type="text" minlength="3" maxlength="35" required placeholder="Nome"/><br/><br/>
              <label>E-mail:<input name="email" type="email" required placeholder="E-Mail"/><br/><br/>
            	<label>Senha: <input name="senha" type="password" minlength="6" maxlength="12" required placeholder="Senha"/><br/><br/>
              <label>Cpf:<input name="cpf" type="text" minlength="11" maxlength="11" required placeholder="CPF"/><br/><br/>
						  <label>Telefone:<input name="telefone" type="telefone" required placeholder="Telefone"/><br/><br/>
						  <label>Endereço:<input name="endereco" type="endereco" required placeholder="Endereço"/><br/><br/>
            	<label>Data de nascimento: <input name="dataNasc" type="date" required/></label><br/><br/>

            <input type="submit" value="Cadastrar"/>
</form>
    </div>

	</body>
</html>
