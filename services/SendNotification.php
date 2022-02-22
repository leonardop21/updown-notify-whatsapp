<?php

namespace Services;

require __DIR__ . "/../vendor/autoload.php";

use GuzzleHttp\Client;

class SendNotification {

    public function __construct()
    {
        $this->client = new Client(["base_uri" => "#"]);
    }

    public function get(String $url = '', Array $headers = []){
        $response = $this->client->post($url, [
            'body' => json_encode($headers),
            'headers' => $headers
        ]);
        return json_decode($response->getBody()->getContents(), true); 
   }

   // Envia a notificação para o WhatsApp
    public function post(String $url = '', Array $headers = [], Array $data = []){
        $response = $this->client->post($url, [
            'body' => json_encode($data),
            'headers' => $headers
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function delete(String $url = '', Array $headers = []){
        $response = $this->client->delete($url, [
            'headers' => $headers
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}