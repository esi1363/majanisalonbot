<?php
    
    $botUrl = "https://api.telegram.org/bot779227788:AAHCOpiUaMCCsVAWLECG9XYh1VIfgg57Kw4"; //سالن آرایش ماجانی

    //-------------------------------------
    $update = file_get_contents("php://input");
    $update_array = json_decode($update, true);
    if( isset($update_array["message"]) ) {
        $text    = $update_array["message"]["text"];
        $chat_id = $update_array["message"]["chat"]["id"];
    }
    //------------------------------------- 
       // ارسال پیام
    $reply = "به ربات سالن آرایش ماجانی خوش آمدید.";
    $url = $GLOBALS['botUrl'] . "/sendMessage";
    $post_params = [ 'chat_id' =>  $GLOBALS['chat_id'] , 'text' => $reply ];
    send_reply($url, $post_params);
    //-------------------------------------
    function send_reply($url, $post_params) {
        $cu = curl_init();
        curl_setopt($cu, CURLOPT_URL, $url);
        curl_setopt($cu, CURLOPT_POSTFIELDS, $post_params);
        curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);  // get result
        $result = curl_exec($cu);
        curl_close($cu);
        return $result;
    }
    
    //-------------------------------------
?>