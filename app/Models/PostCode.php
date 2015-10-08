<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 01/10/15
 * Time: 12:47
 */

namespace App\Models;


class PostCode
{

    public function getAddress ($zipCode) {
        $zipCode = str_replace("-", "", $zipCode);

        $url = "http://www.buscacep.correios.com.br/servicos/dnec/consultaLogradouroAction.do";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "CEP=".$zipCode."&Metodo=listaLogradouro&TipoConsulta=cep&StartRow=1&EndRow=10");

        $r = curl_exec($ch);
        curl_close($ch);
        //EXTRAINDO VALORES
        if ($pos = strpos($r, '<table border="0" cellspacing="1" cellpadding="5" bgcolor="gray">'))
        {
            $table = substr($r, $pos, 500);
            $table = trim(strip_tags($table));
            $returnArray = explode("\n", $table);
            if (count($returnArray) == 5)
            {
                $logradouro = trim(utf8_encode($returnArray[0]));
                $bairro = trim(utf8_encode($returnArray[1]));
                $cidade = trim(utf8_encode($returnArray[2]));
                $uf = utf8_encode($returnArray[3]);
                $zipCode = utf8_encode($returnArray[4]);
            }

            else
                if (count($returnArray) == 3) {
                    $logradouro = "";
                    $bairro = "";
                    $cidade = trim(utf8_encode($returnArray[0]));
                    $uf = utf8_encode($returnArray[1]);
                    $zipCode = utf8_encode($returnArray[2]);
                } else {
                    return null;
                }

            return array("logradouro" => str_replace("\r\n", "", $logradouro), "bairro" => str_replace("\r\n", "", $bairro), "cidade" => (trim(str_replace("\r\n", "", ($cidade)))), "estado" => trim(str_replace("\r\n", "", $uf)), "cep" => $zipCode);
        }
        else
        {
            return null;
        }

    }
} 