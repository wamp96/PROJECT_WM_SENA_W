<?php
   
namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Message;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;


class Login extends Controller
{
   
  private $loginModel;
  private $data;

  
  public function __construct()
  {
    $this->loginModel = new LoginModel();
    $this->data = [];
  }


  public function index()
  {
    $this->data['title'] = "BIENVENIDO";
    return view('login/login_view', $this->data);
  }


  public function logIn()
  {
    
      if ($this->request->isAJAX()) {      
        try {
          $email = $this->request->getVar('User_correo');
          $password = $this->request->getVar('User_password');
          $user = $this->loginModel->where('User_correo', $email)->first();
          if (is_null($user)) {
            $this->data['message'] = 'Invalid username.';
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
        }catch (\Exception $e) {
          $this->data['message'] = $e->getMessage();
          $this->data['response'] = ResponseInterface::HTTP_CONFLICT;
          $this->data['data'] = '';
        }
      } else {
        $this->data['message'] = 'Error Ajax';
        $this->data['response'] = ResponseInterface::HTTP_CONFLICT;
        $this->data['data'] = '';
      }    
    echo json_encode($this->data);
  }


  public function singOff()
  {
    if ($this->request->isAJAX()) {
      $session = session();
      $this->data['message'] = 'Login successful';
      $this->data['response'] = ResponseInterface::HTTP_OK;
      $this->data['data'] = "";
      $session->remove(LOGGED_USER);
    } else {
      $this->data['message'] = 'Error Ajax';
      $this->data['response'] = ResponseInterface::HTTP_CONFLICT;
      $this->data['data'] = '';
    }
  
    echo json_encode($this->data);
  }

  
  public function forgerPassword()
  {
    try {
      if ($this->request->isAJAX()) {
        $email = $this->request->getVar('User_correo');
        $user = $this->loginModel->where('User_correo', $email)->first();
        if (is_null($user)) {
          $this->data['message'] = 'Invalid username.';
          $this->data['response'] = ResponseInterface::HTTP_UNAUTHORIZED;
          $this->data['data'] = '';
        } else {
          $this->data['message'] = 'Send Message Change Password';
          $this->data['response'] = ResponseInterface::HTTP_OK;
          $this->data['data'] = "";
        }
      } else {
        $this->data['message'] = 'Error Ajax';
        $this->data['response'] = ResponseInterface::HTTP_CONFLICT;
        $this->data['data'] = '';
      }
    } catch (Exception $e) {
      $this->data['message'] = $e->getMessage();
      $this->data['response'] = ResponseInterface::HTTP_CONFLICT;
      $this->data['data'] = '';
    }
    return json_encode($this->data);
  }
}