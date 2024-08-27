<?php

namespace App\Controllers;

use App\Models\RequestModel;
use App\Models\RoleModulesModel;
use App\Models\RequestStatusModel;
use App\Models\ProfileModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\CLI\Console; 

class RequestUser extends Controller{
    
    use ResponseTrait;
    private $primarykey;
    private $requestModel;
    private $requestStatusModel;
    private $roleModulesModel;
    private $profileModel;
    private $data;
    private $model;


    public function __construct(){
        $this->primarykey = "Request_id";
        $this->requestModel = new RequestModel();
        $this->requestStatusModel = new RequestStatusModel();
        $this->roleModulesModel = new RoleModulesModel();
        $this->profileModel = new ProfileModel();
        $this->data = [];
        $this->model = "requests";
    }

    public function index()
    {
        $this->data['title'] = "REQUEST USER";
        $this->data[$this->model] = $this->requestModel->where('User_fk',(int)$this->getSessionIdUser()['User_id'])->first();
        $this->data['request_status'] = $this->requestStatusModel->orderBy('Request_status_id', 'ASC')->findAll();
        $this->data['profile'] = $this->profileModel->where('User_fk',(int)$this->getSessionIdUser()['User_id'])->first();
        $this->data['userModules'] = $this->roleModuleModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);
        return view('requestUser/requestUser_view', $this->data);
    }




}

?>