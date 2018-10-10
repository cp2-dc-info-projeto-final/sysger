<?php
include '../funcoes.php';
$erros = [];

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
  $request,
  [
    'valor' => FILTER_DEFAULT,
    'dataContrato' => FILTER_DEFAULT,
  ]
);
$valor = $request['valor'];
$erros[] = ($valor);
if($valor == false){
  $erros[] = "Valor vazio";
}

$dataContrato = $request['dataContrato'];
$erros[] = ($dataContrato);
if($dataContrato == false){
  $erros[] = "da vazio";
}
?>
