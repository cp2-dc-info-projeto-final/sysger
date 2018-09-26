<! DOCTYPE  html >
<?php
	$usuario = $_SESSION['usuarioLogado'];
	$usuarioLogadoEhGerente = $_SESSION['usuarioLogadoEhGerente'];
?>
< html >
	< cabeça >
		< meta  charset = " utf-8 " />
    < title > SysGER </ title >
		< style >
      h1 { cor : preto ; preenchimento esquerdo : 50 px ;
      corpo { cor de fundo : # 0A0A2A ; }
      div { cor de fundo : # F8E0F7 ;
				margem esquerda : 500 px ;
				margem superior : 150 px ;
				margem direita : 500 px ;
				margem inferior : 10 px;
				preenchimento : 20 px ;
				border { background-color : black ;}}
      forma { preenchimento : 50 px ; top de preenchimento : 10 px ;
		< / style >
	</ head >
	< body >
    < div >
		    < h1 > Gerente </ h1 >

			<?php if ($usuarioLogadoEhGerente) { ?>
				< A  href = " Lista_sub.php " > Lista de Subgerentes </ a >
			<?php } ?>
				< A  href = " Lista_cliente.php " > Lista de Clientes </ a >
				< A  href = " status_gerente.php " > Estado </ a >
				< A  href = " cadastroCliente.php " > Cadastrar Novos Cliente </ a >
				< A  href = " Controladores / Sair.php " > Sair </ a >



    </ div >

	</ body >
</ html >