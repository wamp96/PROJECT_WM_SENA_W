<?php 

namespace App\Controllers;

use App\Models\ModuleModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RoleModulesModel;
use App\Models\ProfileModel;


class Module extends BaseController{
    private $primaryKey;
    private $moduleModel;
    private $profileModel;
    private $roleModulesModel;
    private $data;
    private $model;

    public function __construct()
    {
        $this->primaryKey = "Modules_id";
        $this->moduleModel = new ModuleModel();
        $this->roleModulesModel = new RoleModulesModel();
        $this->profileModel = new ProfileModel();
        $this->data = [];
        $this->model = "modules";
    }

    public function index(){
        $this->data['title'] = "MODULOS";
        $this->data[$this->model] = $this->moduleModel->orderBy($this->primaryKey, 'ASC')->findAll();
        $this->data['modulesParent'] = $this->ModuleModel->where('Modules_submodule', 0)->findAll();
        $this->data['profile'] =  $this->profileModel->where('User_id_fk', (int)$this->getSessionIdUser()['User_id'])->first();
        $this->data['userModules'] =  $this->roleModuleModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);
        return view('module/modules_view', $this->data);
    }

    public function create(){
        if ($this->request->isAJAX()){
            $dataModel = $this->getDataModel();

            if($this->moduleModel->insert($dataModel)){
                $data['message']= 'success';
                $data['response']= ResponseInterface::HTTP_OK;
                $data['data']=  $dataModel ;
                $data['csrf']= csrf_hash();
            }else{
                $data['message'] = 'Error create module';
                $data['response']= ResponseInterface::HTTP_NO_CONTENT;
                $data['data']=  '' ;
            }                
        }else{
            $data['message'] = 'Error Ajax';
            $data['response']= ResponseInterface::HTTP_CONFLICT;
            $data['data']=  '' ;
        }
        echo json_encode($dataModel);
    }


    public function singleModule($id = null)
    {
        if($this->requst->isAJAX()){
            if($data[$this->model] = $this->moduleModel->where($this->primaryKey, $id)->first()){
                $data['message'] = 'Success';
                $data['response'] = ResponseInterface::HTTP_OK;
                $data['csrf'] = csrf_hash();
            }else{
                $data['message'] = 'Error';
                $data['response'] = ResponseInterface::HTTP_NO_CONTENT;
                $data['data']='';
            }
        }else{
            $data['message'] = 'Error';
            $data['response'] = ResponseInterface::HTTP_NO_CONTENT;
            $data['data']='';
        }
        echo json_encode($data);
    }




} 







?>