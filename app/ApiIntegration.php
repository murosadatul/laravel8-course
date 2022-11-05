<?php

namespace App;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class ApiIntegration
{
    public $user;
    public $userSecret;
    public $url;
    public $keySecret;
    public $token;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * set Connection Quizapi
     *
     * @param [type] $requestParameter
     * @param string $body
     * @param string $method
     * @return void
     */
    public  function createSignatureQuizapi($requestParameter,$method='get',$body='')
    {
        $this->url = 'https://quizapi.io/api/v1/';
        $this->keySecret = 'xbwRnOriCSkiA1nMFHYiEnzzO6QVrmDlUrn8c06J';

        switch($method){
            case 'get':
                return self::quizapiGet($requestParameter);
                break;
            case 'delete':
                return self::quizapiDelete($requestParameter);
                break;
            case 'put':
                return self::quizapiPut($requestParameter,$body);
                break;
            case 'post':
                return self::quizapiPost($requestParameter,$body);
                break;
            default:
                return false;
                break;
        }
    }

    private function quizapiGet($requestParameter)
    {
        $request = Http::get($this->url.$requestParameter, [
            'apiKey' => $this->keySecret,
            'limit' => 15,
        ]);
        $request->getBody();
        return $request;
    }

    private function quizapiPost($requestParameter,$body)
    {
        $request = Http::post($this->url.$requestParameter, [
            'apiKey' => $this->keySecret,
            'body'=>$body
        ]);
        $request->send();
        return $request;
    }

    private function quizapiDelete()
    {
        $request = Http::delete($this->url.$requestParameter, [
            'apiKey' => $this->keySecret,
        ]);
        $request->send();
        return $request;
    }

    private function quizapiPut()
    {
        $request = Http::put($this->url.$requestParameter, [
            'apiKey' => $this->keySecret,
            'body'=>$body
        ]);
        $request->send();
        return $request;
    }


    /**
     * Create Signature Annawawi API
     *
     * @param [type] $requestParameter
     * @param string $method
     * @param string $body
     * @return void
     */
    public function createSignatureAnnawawiApi($requestParameter,$method='get',$body='')
    {


        $this->url = 'url';

        if (!Session()->has('annawawi_token'))
        {
          self::annawawiLogin();
        }

        $this->token = Session()->get('annawawi_token');

        switch($method){
            case 'get':
                return self::annawawiApiGet($requestParameter);
                break;
            case 'delete':
                self::annawawiApiDelete($requestParameter);
                break;
            case 'put':
                self::annawawiApiPut($requestParameter,$body);
                break;
            case 'post':
                self::annawawiApiPost($requestParameter,$body);
                break;
            default:
                return false;
                break;
        }
    }

    private function annawawiLogin()
    {
        $requestParameter = 'url';
        $request = Http::post($this->url.$requestParameter, [
            'username'=>'[...]',
            'password'=>'[...]'
        ]);
        $response = $request->json();

        if($response['status']){
            $session['annawawi_token'] = $response['data']['token'];
            session($session);
            View::share($session);
            return true;
        }

        return $response;
    }

    private function annawawiApiGet($requestParameter)
    {
        $request = Http::withHeaders([
            'Authorization'=>'Bearer '.$this->token
        ])->get($this->url.$requestParameter);
        dd($request->json());
        die();
        // $response = $request->getHeaders();
        return $request->getBody();
    }

    private function annawawiApiPost($requestParameter,$body)
    {
        $request = Http::post($this->url.$requestParameter, [
            'apiKey' => $this->keySecret,
            'body'=>$body
        ]);
        $request->send();
        return $request;
    }

    private function annawawiApiDelete()
    {
        $request = Http::delete($this->url.$requestParameter, [
            'apiKey' => $this->keySecret,
        ]);
        $request->send();
        return $request;
    }

    private function annawawiApiPut()
    {
        $request = Http::put($this->url.$requestParameter, [
            'apiKey' => $this->keySecret,
            'body'=>$body
        ]);
        $request->send();
        return $request;
    }
}
