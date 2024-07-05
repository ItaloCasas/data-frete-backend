<?php
function validateCEP($value)
{
    $opts = array(
        'http' =>
            array(
                'method' => 'GET',
                'header' => 'Authorization: Token token=991c75ebcb31d5fcc0dab002589c571a'
            )
    );

    $context = stream_context_create($opts);
    // API CEPAberto.com estava offline no momento do desenvolvimento do projeto
    // $result = file_get_contents('https://www.cepaberto.com/api/v3/cep?cep='.$value, false, $context);
    return file_get_contents('https://brasilapi.com.br/api/cep/v2/' . $value, false, $context);
}