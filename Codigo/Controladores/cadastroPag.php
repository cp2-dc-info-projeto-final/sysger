<?php
include '../funcoes.php';
$erros = [];

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
  $request,
  [
    'valor' => FILTER_DEFAULT,
    'data' => FILTER_DEFAULT,
  ]
);
$valor = $request['valor'];
if($valor == false){
  $erros[] = "O valor não foi inserido";
}
else($valor == double){
  $erros[] = "O valor inserido é inválido"
}

$data = $request['$data'];
if($data == false){
  $erros[] = "A data não foi inserido";
}

?>
