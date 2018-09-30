<?php
?>
!DOCTYPE html>
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
		    <h1> Cadastrar Serviços </h1>

        <form action="cadastroServicos.php" method="POST">

              <label>Serviço:
								<select name="idServiço">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select><br><br>

							<label>Id do cliente:<input name="idCliente" type="text" minlength="1" maxlength="100" required/><br/><br/>
							<label>Id do Gerenciador:<input name="idGerenciador" type="text" minlength="1" maxlength="100" required/><br/><br/>
							<label>Data do contrato:<input name="dataContrato" type="date" required/><br/><br/>
              <label>Data de vencimento:<input name="diaVenc" type="date" required/><br/><br/>
						  <label>Valor do serviço:<input name="text" type="double" required/><br/><br/>

              <input type="submit" value="Cadastrar"/><br><br>
							<input type="reset" value="Cancelar" />

    </form>
        </div>

    	</body>
    </html>
