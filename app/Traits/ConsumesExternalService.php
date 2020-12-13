<?php

namespace App\Traits;  //directory of the this file

// include the Guzzle Component Library 
use GuzzleHttp\Client; //Guzzle will be the one to work on the requests

trait ConsumesExternalService
{
    /** 
    *	Send a request to any service
    *	@return string
    */
    // note form params and headers are optional     
    public function performRequest($method, $requestUrl,$form_params =[],$headers =[])
    {
        // create a new client request
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);
        
        // if there is a value in the authorization in the header, and if it request in the service
        // then we will get the value of the secret
        if(isset($this->secret)){
            $headers['Authorization'] = $this->secret;
        }       
        
        // perform the request (method, url, form parameters, headers)
        $response = $client->request($method,$requestUrl,['form_params' => $form_params, 'headers' => $headers]);

        // return the response body contents         
        return $response->getBody()->getContents();
    }                      
}