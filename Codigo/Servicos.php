<?php

require('funcoes.php');
require('BarraNav.php');
require('ImagemDeFundo.css');

$resultado = BuscaServico();
?>

<!DOCTYPE hmtl>
<html>
<head>
</head>
<body>
<main class="container" style="max-width: 600px;
                          margin-top: 20px;">
  <table border='1' bgcolor= '#FFFAFA'>

  <thead>
    <th>Contrato</th>
    <th>Valor</th>
    <th>Dia do Vencimento</th>
    <th>Data do Contrato</th>
    <th>idCliente</th>
    <th>idGerenciamento</th>

  </thead>

<tbody>
<?php
  foreach ($resultado as $r) { ?>
    <tr>
        <td> <a href= "DadosPagamento.php"><?= $r['idServico'] ?> </a></td>
        <td> <a href= "DadosPagamento.php"><?= $r['valor'] ?> </a></td>
        <td> <a href= "DadosPagamento.php"><?= $r['diaVenc'] ?> </a></td>
        <td> <a href= "DadosPagamento.php"><?= $r['dataContrato'] ?> </a></td>
        <td> <a href= "DadosPagamento.php"><?= $r['idCliente'] ?> </a></td>
        <td> <a href= "DadosPagamento.php"><?= $r['idGerenciamento'] ?> </a></td>
    </tr>
  <?php } ?>

</tbody>
</main>
</body>
</html>
