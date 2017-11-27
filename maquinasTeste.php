<?php

//a e b estao em mesma quantidade
$tabela['q0']['a'] = array('substitui' => 'A', 'direcao' => 'd', 'estado' => 'q1');
$tabela['q0']['|'] = array('substitui' => '|', 'direcao' => 'd', 'estado' => 'q0');
$tabela['q0']['b'] = array('substitui' => 'B', 'direcao' => 'd', 'estado' => 'q3');
$tabela['q0']['A'] = array('substitui' => 'A', 'direcao' => 'd', 'estado' => 'q0');
$tabela['q0']['B'] = array('substitui' => 'B', 'direcao' => 'd', 'estado' => 'q0');
$tabela['q0']['#'] = array('substitui' => '#', 'direcao' => 'd', 'estado' => 'q4');
$tabela['q1']['a'] = array('substitui' => 'a', 'direcao' => 'd', 'estado' => 'q1');
$tabela['q1']['b'] = array('substitui' => 'B', 'direcao' => 'e', 'estado' => 'q2');
$tabela['q1']['A'] = array('substitui' => 'A', 'direcao' => 'd', 'estado' => 'q1');
$tabela['q1']['B'] = array('substitui' => 'B', 'direcao' => 'd', 'estado' => 'q1');
$tabela['q2']['|'] = array('substitui' => '|', 'direcao' => 'd', 'estado' => 'q0');
$tabela['q2']['a'] = array('substitui' => 'a', 'direcao' => 'e', 'estado' => 'q2');
$tabela['q2']['b'] = array('substitui' => 'b', 'direcao' => 'e', 'estado' => 'q2');
$tabela['q2']['A'] = array('substitui' => 'A', 'direcao' => 'e', 'estado' => 'q2');
$tabela['q2']['B'] = array('substitui' => 'B', 'direcao' => 'e', 'estado' => 'q2');
$tabela['q3']['a'] = array('substitui' => 'A', 'direcao' => 'e', 'estado' => 'q2');
$tabela['q3']['b'] = array('substitui' => 'b', 'direcao' => 'd', 'estado' => 'q3');
$tabela['q3']['A'] = array('substitui' => 'A', 'direcao' => 'd', 'estado' => 'q3');
$tabela['q3']['B'] = array('substitui' => 'B', 'direcao' => 'd', 'estado' => 'q3');

?>