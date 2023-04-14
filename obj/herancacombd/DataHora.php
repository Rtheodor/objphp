<?php

class DataHora

{

    public int $testHora;

    //O exemplo abaixo cria uma data e hora a partir da strtotime()função:
    public function dataHoraAgora()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $d = strtotime("now");
        echo "Hoje é: " . date("d/m/Y H:i", $d) . "<br>";
               
    }
}
