<?php

header('Content-Type: text/html; charset=utf-8');

$tabela['q0']['|'] = array('substitui' => '|', 'direcao' => 'd', 'estado' => 'q0');

$tabela['q0']['a'] = array('substitui' => 'a', 'direcao' => 'd', 'estado' => 'q0');

$tabela['q0']['b'] = array('substitui' => 'b', 'direcao' => 'd', 'estado' => 'q0');

$tabela['q0']['#'] = array('substitui' => '#', 'direcao' => 'e', 'estado' => 'q1');

$tabela['q1']['a'] = array('substitui' => 'a', 'direcao' => 'e', 'estado' => 'q2');
$tabela['q1']['b'] = array('substitui' => 'b', 'direcao' => 'e', 'estado' => 'q2');

$tabela['q2']['a'] = array('substitui' => 'a', 'direcao' => 'e', 'estado' => 'q3');
$tabela['q2']['b'] = array('substitui' => 'b', 'direcao' => 'e', 'estado' => 'q3');
$tabela['q3']['a'] = array('substitui' => 'a', 'direcao' => 'e', 'estado' => 'q4');
$tabela['q3']['b'] = array('substitui' => 'b', 'direcao' => 'e', 'estado' => 'q4');
$tabela['q4']['a'] = array('substitui' => 'a', 'direcao' => 'e', 'estado' => 'q5');
$tabela['q4']['b'] = array('substitui' => 'b', 'direcao' => 'e', 'estado' => 'q5');
$tabela['q5']['a'] = array('substitui' => 'a', 'direcao' => 'e', 'estado' => 'q6');
$tabela['q5']['b'] = array('substitui' => 'b', 'direcao' => 'e', 'estado' => 'q6');
$tabela['q6']['a'] = array('substitui' => 'a', 'direcao' => 'e', 'estado' => 'q7');
$tabela['q6']['b'] = array('substitui' => 'b', 'direcao' => 'e', 'estado' => 'q7');
$tabela['q7']['a'] = array('substitui' => 'a', 'direcao' => 'e', 'estado' => 'q8');
$tabela['q7']['b'] = array('substitui' => 'b', 'direcao' => 'e', 'estado' => 'q8');
$tabela['q8']['a'] = array('substitui' => 'a', 'direcao' => 'e', 'estado' => 'q9');
$tabela['q8']['b'] = array('substitui' => 'b', 'direcao' => 'e', 'estado' => 'q9');
$tabela['q9']['a'] = array('substitui' => 'a', 'direcao' => 'e', 'estado' => 'q10');
$tabela['q9']['b'] = array('substitui' => 'b', 'direcao' => 'e', 'estado' => 'q10');
$tabela['q10']['a'] = array('substitui' => 'a', 'direcao' => 'd', 'estado' => 'q11');

$caracterInicial = "|";
$caracterFinal = "#";
$palavra = $caracterInicial."bbabbbbbbbab".$caracterFinal;

$palavraArray = str_split($palavra, 1);

print_r($palavraArray);
$valida = 2;
$estadoAtual = 'q0';
$estadoFinal = 'q11';
$posicaoPalavra = 0;


while ($valida == 2) {
    if (array_key_exists($posicaoPalavra, $palavraArray)) {
        $atual = $palavraArray[$posicaoPalavra];
        echo "<br> >>>> Letra atual: " . $atual;
        if (isset($tabela[$estadoAtual][$atual])) {
            echo"<br> Existe";
            //substituir a letra na fita
            $palavraArray[$posicaoPalavra] = $tabela[$estadoAtual][$atual]['substitui'];
            //alterar posicao da palavra na fita
            if ($tabela[$estadoAtual][$atual]['direcao'] == 'd') {
                $posicaoPalavra++;
            } else {
                if ($tabela[$estadoAtual][$atual]['direcao'] == 'e') {
                    $posicaoPalavra--;
                } else {
                    echo"FALHA NA DIREÇÃO " . $tabela[$estadoAtual][$atual]['direcao'];
                }
            }
            //fim alterar posicao da palavra na fita

            $estadoAtual = $tabela[$estadoAtual][$atual]['estado'];
            if ($estadoAtual == $estadoFinal) {
                $valida = 1;
                echo"<h1>>>>>Palavra valida</h1>";
            }
        } else {
            $valida = 0;
            echo">>>>Palavra invalida";
        }
    } else {
        $valida = 0;
        echo">>>>Palavra invalida";
    }
}
?>