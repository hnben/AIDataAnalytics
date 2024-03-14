<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
class gptData{
    static function getGPTResponse($message){
        $response = "failed response";

        require_once ($_SERVER["DOCUMENT_ROOT"].'/../api.php');
        // Your OpenAI API key
        $OPENAI_API_KEY = API;

        // API endpoint
        $url = "https://api.openai.com/v1/chat/completions";

        // Request data
        $data = array(
            "model" => "gpt-3.5-turbo",
            "messages" => array(
                array(
                    "role" => "system",
                    "content" => "You are a helpful assistant."
                ),
                array(
                    "role" => "user",
                    "content" => $message
                )
            )
        );

        // Encode data
        $data_string = json_encode($data);

        // Initialize cURL session
        $ch = curl_init($url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $OPENAI_API_KEY,
                'Content-Length: ' . strlen($data_string))
        );

        // Execute cURL session
        $result = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        } else {
            // Decode and echo the result
            $decoded_result = json_decode($result, true);
            $response = $decoded_result["choices"][0]["message"]["content"];
        }

        // Close cURL session
        curl_close($ch);

        return $response;
    }
}

