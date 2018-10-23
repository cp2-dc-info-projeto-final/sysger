<?php
session_start();
require_once("login.php");


/*$arquivo = $_GET["arquivo"];
if(isset($arquivo) && file_exists($arquivo)){
      switch(strtolower(substr(strrchr(basename($arquivo),"."),1))){
         case "pdf": $tipo="application/pdf"; break;
      }
      header("Content-Type: ".$tipo); // informa o tipo do arquivo ao navegador
      header("Content-Length: ".filesize($arquivo)); // informa o tamanho do arquivo ao navegador
      header("Content-Disposition: attachment; filename=".basename($arquivo)); // informa ao navegador que é tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
      readfile($arquivo); // lê o arquivo
      exit; // aborta pós-ações
}*/


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
		     <?php echo "Boleto do Cliente ".$_SESSION['nome'];  ?>

		      <a href="baixar.php?arquivo=arquivos/imagem.jpg">Download do Boleto </a>

    </div>

	</body>
</html>
