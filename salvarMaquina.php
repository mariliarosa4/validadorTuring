<?php
$tabela = json_decode(file_get_contents('php://input'), true);

$maquinaArquivo = fopen("maquinas/".$tabela['nomeMaquina'].".json", "a");

fwrite($maquinaArquivo, json_encode($tabela['maquina']));
fclose($maquinaArquivo);


$arquivo = fopen("logMaquinas.log", "ab");


$hora = date("H:i:s T");
fwrite($arquivo, "[$hora] " . print_r($tabela, TRUE) . "\r\n");
fclose($arquivo);

echo json_encode(array("sucesso"=>true));
?>
