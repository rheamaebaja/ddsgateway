<?php

    namespace App\Traits;
    use GuzzleHttp\Client;

    trait ConsumesExternalService
    {
        
    /** 
    * Send a request to any service
    * @return string
    */
    
    // note form params and headers are optional
 
    public function performRequest($method, $requestUrl,$form_params =[],$headers =[])
    {
    // create a new client request
    $client = new Client(['base_uri' => $this->baseUri,]);

    // perform the request (method, url, form parameters, headers)
    $response = $client->request($method,$requestUrl,['form_params' =>$form_params, 'headers' =>$headers]);
    // return the response body contents
     return $response->getBody()->getContents();
    }
}