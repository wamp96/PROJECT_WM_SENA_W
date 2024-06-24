<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\ProfileModel;
use App\Models\RoleModulesModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;

class Role extends Controller
{

  private $primaryKey;
  private $roleModel;
  private $profileModel;
  private $roleModuleModel;
  private $data;
  private $model;

  

  public function __construct()
  {
    $this->primaryKey = "Roles_id";
    $this->roleModuleModel = new RoleModulesModel();
    $this->roleModel = new RoleModel();
    $this->profileModel = new ProfileModel();
    $this->data = [];
    $this->model = "roles";
  }

  public function index()
  {
    $this->data['title'] = "ROLES";
    $this->data[$this->model] = $this->roleModel->orderBy($this->primaryKey, 'ASC')->findAll();
    $this->data['profile'] =  $this->profileModel->where('User_fk', (int)$this->getSessionIdUser()['User_id'])->first();
    $this->data['userModules'] =  $this->roleModuleModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);
    return view('role/roles_view', $this->data);
  }


  public function create()
  {
    if ($this->request->isAJAX()) {
      $dataModel = $this->getDataModel();
      if ($this->roleModel->insert($dataModel)) {
        $data['message'] = 'success';
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

  public function singleRole($id = null)
  {  
    if ($this->request->isAJAX()) {

      if ($data[$this->model] = $this->roleModel->where($this->primaryKey, $id)->first()) {
        $data['message'] = 'success';
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
  }
  
  
  public function update()
  {
    if ($this->request->isAJAX()) {
      $today = date("Y-m-d H:i:s");
      $id = $this->request->getVar($this->primaryKey);
      $dataModel = [
        'Roles_name' => $this->request->getVar('Roles_name'),
        'Roles_description' => $this->request->getVar('Roles_description'),
        'update_at' => $today
      ];
      if ($this->roleModel->update($id, $dataModel)) {
        $data['message'] = 'success';
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
    //Change array to Json
    echo json_encode($dataModel);
  }
  //This method consists of delete status, obtains id the data from the GET method, return Json
  public function delete($id = null)
  {
    try {
      //Delete data model 
      if ($this->roleModel->where($this->primaryKey, $id)->delete($id)) {
        $data['message'] = 'success';
        $data['response'] = ResponseInterface::HTTP_OK;
        $data['data'] = "OK";
        $data['csrf'] = csrf_hash();
      } else {
        $data['message'] = 'Error Ajax';
        $data['response'] = ResponseInterface::HTTP_CONFLICT;
        $data['data'] = 'error';
      }
    } catch (\Exception $e) {
      $data['message'] = $e;
      $data['response'] = ResponseInterface::HTTP_CONFLICT;
      $data['data'] = 'Error';
    }
    //Change array to Json
    echo json_encode($data);
  }
  //This method consists of create is model the data in the array associative, return Array
  public function getDataModel()
  {
    $data = [
      'Roles_id' => $this->request->getVar('Roles_id'),
      'Roles_name' => $this->request->getVar('Roles_name'),
      'Roles_description' => $this->request->getVar('Roles_description'),
      'update_at' => $this->request->getVar('update_at'),
    ];
    return $data;
  }
}