
<?php

header('Content-Type: application/json');
$request= json_decode(file_get_contents('php://input'), true);

$arquivoMaquinaExistente = file_get_contents('maquinas/maquina1.json');

$tabela = json_decode($arquivoMaquinaExistente,true);

$caracterInicial = "|";
$caracterFinal = "#";

$palavra = $caracterInicial . "aabbb" . $caracterFinal;

$palavraArray = str_split($palavra, 1);

//print_r($palavraArray);
$valida = 2;
$estadoAtual = 'q0';
$estadoFinal = 'q4';
$posicaoPalavra = 0;

$arquivo = fopen("testes.log", "ab");


$hora = date("H:i:s T");
fwrite($arquivo, "[$hora] " . print_r($tabela[$estadoAtual], TRUE) . "\r\n");
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
            if ($tabela[$estadoAtual][$atual]['direcao'] == 'd') {
                $posicaoPalavra++;
            } else {
                if ($tabela[$estadoAtual][$atual]['direcao'] == 'e') {
                    $posicaoPalavra--;
                } else {
                    //      echo"FALHA NA DIREÇÃO " . $tabela[$estadoAtual][$atual]['direcao'];
                }
            }
            //fim alterar posicao da palavra na fita

            $estadoAtual = $tabela[$estadoAtual][$atual]['estado'];
            if ($estadoAtual == $estadoFinal) {
                $valida = 1;
                echo json_encode(array("resposta" => "<h1>>>>>Palavra valida</h1>"));
            }
        } else {
            $valida = 0;
            echo json_encode(array("resposta" => ">>>>Palavra invalida"));
        }
    } else {
        $valida = 0;
        echo json_encode(array("resposta" => ">>>>Palavra invalida"));
    }
}


?>
