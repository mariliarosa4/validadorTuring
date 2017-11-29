
<?php

header('Content-Type: application/json');
$request= json_decode(file_get_contents('php://input'), true);

$arquivo = fopen("testes.log", "ab");
$hora = date("H:i:s T");
fwrite($arquivo, "[$hora] " . print_r($request, TRUE) . "\r\n");
fclose($arquivo);


$arquivoMaquinaExistente = file_get_contents('maquinas/'.$request['nomeMaquina'].'.json');

$tabela = json_decode($arquivoMaquinaExistente,true);

$caracterInicial ="|";
$caracterFinal = "#";

$palavra = $caracterInicial . $request['sentenca'] . $caracterFinal;

$palavraArray = str_split($palavra, 1);
$arquivo = fopen("testes.log", "ab");


$hora = date("H:i:s T");
fwrite($arquivo, "[$hora] palavra array" . print_r($palavraArray, TRUE) . "\r\n");
fclose($arquivo);
//print_r($palavraArray);
$valida = 2;
$estadoAtual = $request['estadoInicial'];
$estadoFinal = $request['estadoFinal'];
$arrayEstadosFinais = explode(";", $estadoFinal);
$posicaoPalavra = 0;

$arquivo = fopen("testes.log", "ab");


$hora = date("H:i:s T");
fwrite($arquivo, "[$hora] " . print_r($estadoFinal, TRUE) . "\r\n");
fclose($arquivo);
while ($valida == 2) {
    if (array_key_exists($posicaoPalavra, $palavraArray)) {
        $atual = $palavraArray[$posicaoPalavra];
        //   echo "<br> >>>> Letra atual: " . $atual;
        if (isset($tabela[$estadoAtual][$atual])) {
            //    echo"<br> Existe";
            //substituir a letra na fita
            $palavraArray[$posicaoPalavra] = $tabela[$estadoAtual][$atual]['substitui'];
            //alterar posicao da palavra na fita
            if (strtolower($tabela[$estadoAtual][$atual]['direcao']) == 'd') {
                $posicaoPalavra++;
            } else {
                if (strtolower($tabela[$estadoAtual][$atual]['direcao']) == 'e') {
                    $posicaoPalavra--;
                } else {
                    //      echo"FALHA NA DIREÇÃO " . $tabela[$estadoAtual][$atual]['direcao'];
                }
            }
            //fim alterar posicao da palavra na fita

            $estadoAtual = $tabela[$estadoAtual][$atual]['estado'];
            if  ((in_array($estadoAtual, $arrayEstadosFinais)) && ($atual=='#')) {
                $valida = 1;
                echo json_encode(array("resposta" => "VALIDA"));
            }
        } else {
            $valida = 0;
            echo json_encode(array("resposta" => "invalida"));
        }
    } else {
        $valida = 0;
        echo json_encode(array("resposta" => "invalida"));
    }
}


?>
