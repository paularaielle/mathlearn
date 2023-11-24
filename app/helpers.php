<?php

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
            $resultado = $valor1 + $valor2;
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