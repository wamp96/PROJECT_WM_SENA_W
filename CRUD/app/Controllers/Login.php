<?php
namespace App\Controller;

use App\Controller\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use \Firebase\JWT\JWT;


class Login extends BaseController
{
    use RequestTrait;

    public function index()
    {
        /*Se crea Objeto User Model*/
        $userModel = new UserModel();
        /*Se crea variable que continer email*/
        $email = $this->request->getVar('email');
        /*Se crea variable que continer password*/
        $password = $this->request->getVar('password');
        /*Se crea variable que continer user*/
        $user = $userModel->where('email', $email)->first();

        if(is_null($user)){
            return $this->respond(['error' => 'Invalid username or password'],401);
        }

        $pwd_verify = password_verify($password,$user['password']);

        if($pwd_verify){
            return $this->respond(['error' => 'Invalid username or password'],401);
        }
        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + 360;
        $payload = array(
            "iss" => "Issuer of the JWT",
            "aud" => "Audience that the JWT",
            "sub" => "Subject of the JWT",
            "iat" => $iat,
            "exp" => $exp,
            "email" => $user['email'],
        );
        $token = JWT::encode($payload, $key, 'HS256');
        $response = [
            'message' => 'Login Succesful',
            'token' => $token
        ];
        return $this->respond($response, 200);
    }
    
}
?>