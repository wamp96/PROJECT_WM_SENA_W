<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use \Firebase\JWT\JWT;

class Login extends BaseController
{

    use ResponseTrait;

    public function index()
    {
        $userModel = new UserModel();
        $email = $this->request->getVar('User_correo');
        $password = $this->request->getVar('User_password');
        $user = $userModel->where('User_correo', $email)->first();
        
        if (is_null($user)){
            return $this->respond(['error' => 'Invalid username', 401]);
        }
        
        $pwd_verify = password_verify($password, $user['User_password']);

        if(!$pwd_verify){
            return $this->respond(['error' => $user['User_password'],$password,$pwd_verify], 401);
        }
        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + 3600;
        $payload = array(
            'iss' => "Issuser of the JWT",
            'aud' => "Audience of the JWT",
            'sub' => "Subject of the JWT",
            'iat' => $iat,
            'exp' => $exp,        
            'User_correo' => $user['User_correo'],
        );
        $token = JWT::encode($payload, $key, 'HS256');
        $response = [
            'message' => 'Login successful',
            'token' => $token
        ];
        return $this->respond($response, 200);
   }
} 