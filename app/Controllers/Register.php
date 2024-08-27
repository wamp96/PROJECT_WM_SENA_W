<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;

class Register extends Controller
{
    use ResponseTrait;

    public function index()
    {
        $rules = [
            'User_correo' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.User_correo]'],            
            'User_password' => ['rules' => 'required|min_length[8]|max_length[255]'],
            'confirm_password' => ['label' => 'confirm password', 'rules' => 'matches[User_password]']
        ];

        if ($this->validate($rules)){
            $model = new userModel();
            $data = [
                'User_documento' => $this->request->getVar('User_documento'),
                'User_nombre' => $this->request->getVar('User_nombre'),
                'User_apellido_paterno' => $this->request->getVar('User_apellido_paterno'),
                'User_apellido_materno' => $this->request->getVar('User_apellido_materno'),
                'User_telefono' => $this->request->getVar('User_telefono'),
                'User_correo' => $this->request->getVar('User_correo'),
                'User_password' => password_hash($this->request->getVar('User_password'),PASSWORD_DEFAULT),     
                'City_fk' => $this->request->getVar('City_fk'),
                'Area_fk' => $this->request->getVar('Area_fk'),
                'Roles_fk' => $this->request->getVar('Roles_fk'),
                'User_status_fk' => $this->request->getVar('User_status_fk'),            
                'update_at' => $this->request->getVar('update_at'),        
            ];
            $model->save($data);

            return $this->respond(['message' => 'Registered Successfully'], 200);
        }else{
            $response = [
                'errors' => $this->validator->getErrors(),
                'message' => 'Invalid Inputs'                
            ];
            return $this->fail($response, 409);
        }
    }
}

?>