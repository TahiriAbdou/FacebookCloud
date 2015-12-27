<?php
namespace Hoteru\Repositories;

use Socialite;
use Facebook\Facebook;

class FacebookRepository 
{
    /**
     * The base Facebook Graph URL.
     *
     * @var string
     */
    protected $graphUrl = 'https://graph.facebook.com';

    /**
     * The Graph API version for the request.
     *
     * @var string
     */
    protected $version = 'v2.5';


    public function getPages(){
        $response = $this->getHttpClient()->get(
            $this->graphUrl.'/'.$this->version.'/me/accounts?access_token='.$this->getToken(), 
        [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
        return $response;
    }

    public function getToken(){
        return \Session::get('facebook.token');
    }

    public function getHttpClient()
    {
        return new \GuzzleHttp\Client;
    }
}
