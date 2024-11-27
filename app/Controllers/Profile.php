<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;

class Profile extends Controller
{

    private $primaryKey;
    private $profileModel;
    private $data;
    private $model;

    public function __construct()
    {
        $this->primaryKey = "Profile_id";
        $this->profileModel = new ProfileModel();
        $this->data = [];
        $this->model = "profiles";
    }

    public function index($id = null)
    {
        $this->data['title'] = "PROFILE";
        if ($this->request->isAjax()) {
            if ($data[$this->model] = $this->profileModel->where('User_fk', $id)->first()) {
                $data['message'] = 'Success';
                $data['response'] = ResponseInterface::HTTP_OK;
                $data['csrf'] = csrf_hash();
            } else {
                $data['message'] = 'Error create user';
                $data['response'] = ResponseInterface::HTTP_NO_CONTENT;
                $data['data'] = '';
            }
        } else {
            $data['message'] = 'Error Ajax';
            $data['response'] = ResponseInterface::HTTP_CONFLICT;
            $data['data'] = '';
        }
        echo json_encode($data);
        return view('profile/profile_view', $this->data);
    }

    public function create()
    {
        if ($this->request->isAjax()) {
            $dataModel = $this->getDataModel();
            if ($this->profileModel->insert($dataModel)) {
                $data['message'] = 'Success';
                $data['response'] = ResponseInterface::HTTP_OK;
                $data['data'] = $dataModel;
                $data['csrf'] = csrf_hash();
            } else {
                $data['message'] = 'Error create user';
                $data['response'] = ResponseInterface::HTTP_NO_CONTENT;
                $data['data'] = '';
            }
        } else {
            $data['message'] = 'Error Ajax';
            $data['response'] = ResponseInterface::HTTP_CONFLICT;
            $data['data'] = '';
        }
        echo json_encode($dataModel);
    }
    public function update()
    {
        if ($this->request->isAJAX()) {
            $profileData = $this->request->getVar();

            // Validar los datos
            $validation = \Config\Services::validation();
            if (!$validation->run($profileData, 'profile')) {
                return $this->response->setJSON([
                    'status' => 400,
                    'message' => $validation->getErrors()
                ]);
            }

            // Actualizar el perfil
            if ($this->profileModel->update($profileData['Profile_id'], $profileData)) {
                return $this->response->setJSON([
                    'status' => 200,
                    'message' => 'Profile updated successfully.'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 400,
                    'message' => 'Error updating profile.'
                ]);
            }
        } else {
            return $this->response->setJSON(['status' => 405, 'message' => 'Method Not Allowed']);
        }
    }


    public function delete($id = null)
    {
        try {
            if ($this->profileModel->where($this->primaryKey, $id)->delete($id)) {
                $data['message'] = 'Success';
                $data['response'] = ResponseInterface::HTTP_OK;
                $data['data'] = 'OK';
                $data['csrf'] = csrf_hash();
            } else {
                $data['message'] = 'Error Ajax';
                $data['response'] = ResponseInterface::HTTP_CONFLICT;
                $data['data'] = 'Error';
            }
        } catch (\Exception $e) {
            $data['message'] = $e;
            $data['response'] = ResponseInterface::HTTP_CONFLICT;
            $data['data'] = 'Error';
        }
        echo json_encode($data);
    }

    public function getDataModel()
    {
        $data = [
            'Profile_id' => $this->request->getVar('Profile_id'),
            'Profile_email' => $this->request->getVar('Profile_email'),
            'Profile_name' => $this->request->getVar('Profile_name'),
            'Profile_photo' => $this->request->getVar('Profile_photo'),
            'User_fk' => $this->request->getVar('User_fk'),
            'update_at' => $this->request->getVar('update_at'),
        ];
        return $data;
    }

    public function getProfile($id)
    {
        $profile = $this->profileModel->find($id);
        if ($profile) {
            return $this->response->setJSON([
                'status' => 200,
                'model' => 'profile',  // Puedes ajustar esta clave si lo necesitas
                'data' => $profile
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 404,
                'message' => 'Profile not found'
            ]);
        }
    }

    public function createProfile()
    {
        if ($this->request->isAJAX()) {
            $profileData = $this->request->getVar();

            // Validación de los datos del perfil
            $validation = \Config\Services::validation();
            if (!$validation->run($profileData, 'profile')) {
                return $this->response->setJSON([
                    'status' => 400,
                    'message' => $validation->getErrors()
                ]);
            }

            // Crear el nuevo perfil
            if ($this->profileModel->insert($profileData)) {
                return $this->response->setJSON([
                    'status' => 200,
                    'message' => 'Profile created successfully.'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 400,
                    'message' => 'Error creating profile.'
                ]);
            }
        } else {
            return $this->response->setJSON(['status' => 405, 'message' => 'Method Not Allowed']);
        }
    }


    public function updateProfile()
    {
        if ($this->request->isAJAX()) {
            $profileData = $this->request->getVar();

            // Validar los datos
            $validation = \Config\Services::validation();
            if (!$validation->run($profileData, 'profile')) {
                return $this->response->setJSON([
                    'status' => 400,
                    'message' => $validation->getErrors()
                ]);
            }

            // Actualizar el perfil
            if ($this->profileModel->update($profileData['Profile_id'], $profileData)) {
                return $this->response->setJSON([
                    'status' => 200,
                    'message' => 'Profile updated successfully.'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 400,
                    'message' => 'Error updating profile.'
                ]);
            }
        } else {
            return $this->response->setJSON(['status' => 405, 'message' => 'Method Not Allowed']);
        }
    }
}
