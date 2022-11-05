<?php
class Speedio{
    const SPEEDIO_URL = 'https://api-publica.speedio.com.br';

    public function consultarCNPJ($cnpj){
        return $this->get('/buscarcnpj?cnpj='.$cnpj);
    }

    public function get($resource){
        $endpoint = self::SPEEDIO_URL.$resource;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        $responseArray = json_decode($response, true);

        return is_array($responseArray) ? $responseArray : [];
        
    }
}