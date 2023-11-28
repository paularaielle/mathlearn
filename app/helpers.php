<?php

use Illuminate\Support\Arr;
/**
 * Função que calculo baseado num Simbolo/Operador
 */
function calc ($valor1, $valor2, $simbolo)
{
    $resultado = null;
    switch ($simbolo) {
        case "+":
            $resultado = $valor1 + $valor2;
            break;
        case "-":
            $resultado = $valor1 - $valor2;
            break;
        case "*":
            $resultado = $valor1 * $valor2;
            break;
        case "/":
            $resultado = $valor1 / $valor2;
            break;
    }

    return $resultado;
}


function motivacionaisErro () {
    $index = rand(0, 5);
    $data = [
        'Ops... Não foi dessa vez, continue tentando',
        'Você errou, mas está no caminho',
        'Poxa... Você errou',
        'Você errou, mas o aprendizado é algo árduo',
        'Você errou, continue tentando',
        'Poxa, uma pena, mas não desanime',
    ];

    return $data[$index];
}

function ordenador($numero, $simbolo, $tabuada)
{
    $valor1 = 0;
    $valor2 = 0;
    if ($numero < $tabuada) {
        $valor1 = $tabuada;
        $valor2 = $numero;
    }
    if ($tabuada < $numero) {
        $valor1 = $numero;
        $valor2 = $tabuada;
    }
    if ($numero == $tabuada) {
        $valor1 = $numero;
        $valor2 = $tabuada;
    }
    $resposta = calc($valor1 , $valor2, $simbolo);

    return [
        'valor1' => $valor1,
        'simbolo' => $simbolo,
        'valor2' => $valor2,
        'formula'   => $valor1 . $simbolo . $valor2 . ' = ' . $resposta,
        'resposta'  => $resposta,
    ];
}

function ordenadorDivisao ($numero, $simbolo, $tabuada)
{
    $valor1 = 0;
    $valor2 = 0;
    if ($tabuada == 1) {
        $valor1 = $numero;
        $valor2 = $tabuada;
    }

    if ($tabuada >= 2) {

        if ($numero == 1) {
            $valor1 = $tabuada;
            $valor2 = $tabuada;
        } else {
            $valor1 = $tabuada * $numero;
            $valor2 = $tabuada;
        }
    }
    $resposta = calc($valor1 , $valor2, $simbolo);

    return [
        'valor1'    => $valor1,
        'simbolo'   => $simbolo,
        'valor2'    => $valor2,
        'formula'   => $valor1 . $simbolo . $valor2 . ' = ' . $resposta,
        'resposta'  => $resposta,
    ];
}

function questoesAleatorias ($simbolo, $tabuada)
{
    $questoes = [];
    $data = [];
    $keys = [];
    $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    foreach ($array as $q) {
        if ($simbolo == '/') {
            $data[] = ordenadorDivisao($q, $simbolo, $tabuada);
        } else {
            $data[] = ordenador($q, $simbolo, $tabuada);
        }
    }

    shuffle($data);

    foreach ($data as $i => $d) {
        $questoes[$i + 1] = $d;
    }

    return $questoes;
}

function get_method ($method)
{
    return $method == 'PUT' ? method_field('PUT') : null;
}
