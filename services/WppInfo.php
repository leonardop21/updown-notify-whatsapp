<?php 

namespace Services;

require __DIR__ . "/../vendor/autoload.php";

use Services\SendNotification;

date_default_timezone_set('America/Sao_Paulo');

class WppInfo extends SendNotification{

    protected $token_api_wpp_info;
    protected $session_wpp_info;
    protected $base_uri_wpp_info;
    protected $token_wpp_info;
    protected $sendNotification;

    public function __construct()
    {
        $this->token_api_wpp_info = "#";
        $this->session_wpp_info = "#";
        $this->base_uri_wpp_info = $this->session_wpp_info . "/send-message";
        $this->token_wpp_info = '#';
        $this->phone = "5545#";
    }

    public function headers(){
        return [
            'Authorization' => 'Bearer ' . $this->token_wpp_info,
            'Content-Type' => 'application/json'
        ];
    }

    public function getData($message){
        return [
            "phone" => $this->phone,
            "message" => $message,
            "isGroup" => false
        ];
    }

    // Instância a notificação, pega os headers e a mensagem a ser enviada
    public function sendWhats($message){
        $sendNotification = new SendNotification;
        return $sendNotification->post($this->base_uri_wpp_info, $this->headers(), $this->getData($message));
    }

    // Prepara a mensagem de acordo com o status
    public function message($status, $lastStatus){
        if($status){
            $message = "*AVISO UPDOWN: {$this->date()}* \n\n*O servidor está fora do ar*. \n\n*Último status: {$lastStatus}*";
        }else {
            $message = "*AVISO UPDOWN: {$this->date()}*  \n\n*O servidor está ativo e no ar*, \n\n*Último status: {$lastStatus}*";
        }
        // Envia para a função sendWhats
        return $this->sendWhats($message);
    }

    public function date(){
        return date('d/m/Y H:i');
    }

}