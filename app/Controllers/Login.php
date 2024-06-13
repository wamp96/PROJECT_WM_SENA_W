<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Message;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Login extends BaseController
{

    private $loginModel;
    private $data;

    public function __construct(){
        $this->loginModel = new LoginModel();
        $this->data = [];
    }
    public function index()
    {
        $this -> loginModel = new LoginModel();
        $this->data = [];
    } 

    public function login()
    {
        if ($this->request->isAJAX()){
            $email = $this->request->getVar('User_user');
            $password = $this->request->getVar('User_password');
            $user = $this->loginModel->where('User_user', $email)->first();
            if (is_null($user)) {
              $this->$this->data['message'] = 'Invalid username.';
              $this->data['response'] = ResponseInterface::HTTP_UNAUTHORIZED;
              $this->data['data'] = '';
            }
            $pwd_verify = password_verify($password, $user['User_password']);
            if (!$pwd_verify) {
              $this->data['message'] = 'Invalid password.';
              $this->data['response'] = ResponseInterface::HTTP_UNAUTHORIZED;
              $this->data['data'] = '';
            } else {
              $session = session();
              $this->data['message'] = 'Login successful';
              $this->data['response'] = ResponseInterface::HTTP_OK;
              $this->data['data'] = $user;
              $session->set(LOGGED_USER,$user);
            }
        }else {
            $this->data['message'] = 'Error Ajax';
            $this->data['response'] = ResponseInterface::HTTP_CONFLICT;
            $this->data['data'] = '';
        }
        echo json_encode($this->data);
    }

    public function singOff(){
        if ($this->request->isAJAX()){
            $session = session();
            $this->data['message'] = 'Login successful';
            $this->data['response'] = ResponseInterface::HTTP_OK;
            $this->data['data'] = "";
            $session->remove(LOGGED_USER);
        }else{
            $this->data[] = 'Error Ajax';
            $this->data['response'] = ResponseInterface::HTTP_CONFLICT;
            $this->data['data'] = '';
        }
        echo json_encode($this->data);
    }

    public function forgerPassword(){
        try{
            if ($this->request->isAJAX()){
                $email = $this->request->getVar('User_user');
                $user = $this->loginModel->where('User_user',$email)->first();
                if(is_null($user)){
                    $this->data[] = 'Error Ajax';
                    $this->data['response'] = ResponseInterface::HTTP_UNAUTHORIZED;
                    $this->data['data'] = '';
                }else{
                    $this->data[] = 'Error Ajax';
                    $this->data['response'] = ResponseInterface::HTTP_OK;
                    $this->data['data'] = '';
                }
            }else{
                $this->data['message'] = 'Error Ajax';
                $this->data['response'] = ResponseInterface::HTTP_CONFLICT;
                $this->data['data'] = '';
            }
        }catch(Exception $e){
            $this->data['message'] = $e->getMessage();
            $this->data['response'] = ResponseInterface::HTTP_CONFLICT;
            $this->data['data'] = '';
        }
        return json_encode($this->data);
    }
}   
