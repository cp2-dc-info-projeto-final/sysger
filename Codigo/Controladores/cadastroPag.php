<?php
include '../funcoes.php';
$erros = [];

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
  $request,
  [
    'valor' => FILTER_DEFAULT,
    'dataVencimento' => FILTER_DEFAULT,
    'dataPago' => FILTER_DEFAULT,

  ]
);

$valor = $request['valor'];
if($valor == false){
  $erros[] = "O valor não foi inserido ou inválido.";
}

$dataVencimento = $request['dataVencimento'];
if($dataVencimento == false){
  $erros[] = "A data de vencimento do serviço não foi inserido";
}
$dataPago = $request['dataPago'];
if($dataPago == false){
  $erros[] = "A data que o serviço foi pago não foi inserido";
}

session_start();
if (empty($erros))
{
  InserePagamento($request);
  $_SESSION['sucesso'] = "Pagamento cadastrado com sucesso";
}
else {
  $_SESSION['erros'] = $erros;
}

header('Location: ../DadosNovoPagamento.php');
?>
