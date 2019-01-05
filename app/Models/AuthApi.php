<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\RequestException;

class AuthApi extends Model
{
    private $token;

    public function __construct()
    {
    	$guzzle = new Guzzle;
        try {
            $response = $guzzle->request('POST',URL_API.'auth',[
            'form_params'   => [
                'email'     => EMAIL_API,
                'password'  => PASSWORD_API
            ]
        	]);

	        $this->token = json_decode($response->getBody())->token;

        } catch (RequestException $e) {
            dd("Error: {$e}");
        }
    }

    public function getToken()
    {
    	return $this->token;
    }
}
