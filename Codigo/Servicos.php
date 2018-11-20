<?php

require('funcoes.php');

$resultado = BuscaServico();

if ($resultado != null)
{
   echo "<h4>Listagem dos Serviços:</h4>";
   echo "<table border='1' bgcolor= '#FFFAFA'>";
   echo "<tr>";
   echo "<td>Contrato</td>";
   echo "<td>Valor</td>";
   echo "<td>Dia do Vencimento</td>";
   echo "<td>Data do Contrato</td>";
   echo "<td>idCliente</td>";
   echo "<td>idGerenciamento</td>";
   echo "</tr>";

   foreach($resultado as $r) { ?>
     <a href= "DadosPagamento.php">
  <? echo "<tr>";
     echo "<td>".$r['idServico']."</td>";
     echo "<td>".$r['valor']."</td>";
     echo "<td>".$r['diaVenc']."</td>";
     echo "<td>".$r['dataContrato']."</td>";
     echo "<td>".$r['idCliente']."</td>";
     echo "<td>".$r['idGerenciamento']."</td>";
     echo "</tr>";
   }

    echo "</table>";
  ?>
      </a>
<?= } ?>
