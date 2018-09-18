<?php
	session_start();

  unset($_SESSION['emailUsuarioLogado']);

  header('Location: ../Tela de Login.php');
?>
