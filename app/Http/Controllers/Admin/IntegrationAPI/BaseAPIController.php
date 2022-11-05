<?php

namespace App\Http\Controllers\Admin\IntegrationAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BaseAPIController extends Controller
{
    protected $user;
    protected $userSecret;
    protected $url;
    protected $keySecret;
    protected $token;


    /**
     * set Connection Quizapi
     *
     * @param [type] $requestParameter
     * @param string $body
     * @param string $method
     * @return void
     */
    protected  function createSignatureQuizapi($requestParameter,$method='get',$body='')
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
}
