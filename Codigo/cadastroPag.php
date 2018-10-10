<?php
include '../funcoes.php';
$erros = [];

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
  $request,
  [
    'valor' => FILTER_DEFAULT,
    'dataPagamento' => FILTER_DEFAULT,
    'dataPago' => FILTER_DEFAULT,
  ]
);
$valor = $request['valor'];
$erros[] = ($valor);
if($valor == false){
  $erros[] = "O valor não foi inserido";
}

$dataPagamento = $request['dataPagamento'];
$erros[] = ($dataPagamento);
if($dataPagamento == false){
  $erros[] = "A data de Pagamento não foi inserida";
}

d

?>
