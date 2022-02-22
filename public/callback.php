<?php

namespace Publics;

require __DIR__ . "/../vendor/autoload.php";


use Services\WppInfo;

Class Callback extends WppInfo{

    public function callbackKey(){
        $callbackKey = "key-define";  
        return isset($_GET['key']) && $_GET['key'] === $callbackKey ? true : false;
    }

    public function checkPost(){
        return $_SERVER['REQUEST_METHOD'] == "POST" ? true: false;
    }

    public function getCallback(){
        $post = json_decode(file_get_contents('php://input'), true);
        $status = $post[0]['check']['down'];
        $last_status = $post[0]['check']['last_status'];
        // Informa o status do servidor e o código
        $response = $this->message($status, $last_status);
        return json_encode(["message" => $response['status']]);
    }
}

$callback = new Callback();

// Checa se o método é post e se a key é valida
if($callback->checkPost() && $callback->callbackKey()){
    echo $callback->getCallback();
}else {
    header('HTTP/1.0 404 Not Found', true, 404);
    echo "404 Not Found";
}