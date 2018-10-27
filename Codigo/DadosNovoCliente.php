<?php
	session_start();

	//if(array_key_exists('emailUsuarioLogado', $_SESSION))
	//{
		//header('Location: ../Cliente.php');
		//exit();
	//}

	$erros = null;
	$sucesso = null;

	if(array_key_exists('erros', $_SESSION))
	{
		$erros = $_SESSION['erros'];
		unset($_SESSION['erros']);
	}
	if(array_key_exists('sucesso', $_SESSION))
		{
			$sucesso = $_SESSION['sucesso'];
			unset($_SESSION['sucesso']);
		}
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
		    <h1> Cadastrar Cliente</h1>

				<?php if($erros != null) { ?>
					<div>
						<p> ERRO:  </p>
						<?php foreach($erros as $msg)
						{
							echo "<p>$msg</p>";
						}
						?>
					</div>
				<?php } ?>
				<?php if($sucesso != null) { ?>
					<div>
							<? echo "<p>$sucesso</p>"; ?>
					</div>
				<?php } ?>

        <form action="Controladores/cadastroCliente.php" method="POST">

              <label>Nome:<input name="nome" type="text" minlength="3" maxlength="35" required/><br/><br/>
              <label>E-mail:<input name="email" type="email" required/><br/><br/>
            	<label>Senha: <input name="senha" type="password" minlength="6" maxlength="12" required /><br/><br/>
              <label>CPF/CNPJ:<input name="cpf_cnpj" type="text" minlength="11" maxlength="14" required/><br/><br/>
						  <label>Telefone:<input name="telefone" type="telefone" minlength="8" maxlength="15" required/><br/><br/>
						  <label>Endereço:<input name="endereco" type="endereco" required/><br/><br/>
            	<label>Data de nascimento: <input name="dataNasc" type="date" required/></label><br/><br/>

            <input type="submit" value="Cadastrar"/><br><br>
						<input type="reset" value="Cancelar" /><br><br>

						<a href ="DadosServicos.php">Cadastrar novos serviços</a><br><br><br>


</form>
    </div>

	</body>
</html>
