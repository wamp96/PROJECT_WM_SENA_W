<?php 

namespace App\Controllers;

use App\Models\RoleModulesModel;
use App\Models\ModuleModel;
use App\Models\PermissionModel;
use App\Models\ProfileModel;
use App\Models\RoleModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;

class RoleModule extends Controller
{
    private $primaryKey;
    private $roleModuleModel;
    private $moduleModel;
    private $roleModel;
    private $permissionModel;
    private $profileModel;
    private $data;
    private $model;

    public function __construct()
    {
        $this->primaryKey = "RoleModules_id";
        $this->roleModuleModel = new RoleModulesModel();
        $this->moduleModel = new ModuleModel();
        $this->roleModel = new RoleModel();
        $this->profileModel = new ProfileModel();
        $this->permissionModel = new PermissionModel();
        $this->data = [];
        $this->model = "roleModules";
    }

    public function index()
    {
        $this->data['title'] = "ROLE MODULES";
        $this->data['titlePermissions'] = "MODULE PERMISSIONS";
        $this->data[$this->model] = $this->roleModuleModel->sp_role_modules();
        $this->data['roles'] = $this->roleModel->orderBy('Roles_id', 'ASC')->findAll();
        $this->data['modules'] = $this->moduleModel->orderBy('Modules_id', 'ASC')->findAll();
        $this->data['permissions'] = $this->permissionModel->orderBy('Permissions_id', 'ASC')->findAll();
        $this->data['profiles'] = $this->profileModel->where('User_fk',(int)$this->getSessionIdUser()['User_id'])->first();
        $this->data['userModules'] = $this->roleModuleModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);
        return view('roleModule/roleModules_view', $this->data);
    }

    public function create()
    {
        if($this->request->isAJAX()){
            $dataModel = $this->getDataModel();

            if($this->roleModuleModel->insert($dataModel)){
                $data['message']= 'success';
                $data['response']= ResponseInterface::HTTP_OK;
                $data['data']=  $dataModel ;
                $data['csrf']= csrf_hash();
            }else{
                $data['message'] = 'Error create rol';
                $data['response'] = ResponseInterface::HTTP_NO_CONTENT;
                $data['data'] = '';
            }
        }else{
            $data['message'] = 'Error Ajax';
            $data['response'] = ResponseInterface::HTTP_CONFLICT;
            $data['data'] = '';
        }
        echo json_encode($dataModel);

    }
    
    public function singleRoleModule($id = null)
    {
        if($this->request->isAJAX()){
            if($data[$this->model] = $this->roleModuleModel->where($this->primaryKey, $id)->first()){
                $data['message'] = 'Success';
                $data['response'] = ResponseInterface::HTTP_OK;
                $data['csrf'] = csrf_hash();
            }else{
                $data['message'] = 'Error create user';
                $data['response'] = ResponseInterface::HTTP_NO_CONTENT;
                $data['data'] = '';
            }
        }else{
            $data['message'] = 'Success';
            $data['response'] = ResponseInterface::HTTP_CONFLICT;
            $data['data'] = '';
        }
        echo json_encode($data);
    }
    
    public function singleRoleModuleId($id = null)
    {
        if($this->request->isAJAX()){
            if($data[$this->model] = $this->roleModuleModel->sp_role_module_id($id)){
                $data['message'] = 'Success';
                $data['response'] = ResponseInterface::HTTP_OK;
                $data['csrf'] = csrf_hash();
            }else{
                $data['message'] = 'Error create user';
                $data['response'] = ResponseInterface::HTTP_NO_CONTENT;
                $data['data'] = '';
            }
        }else{
            $data['message'] = 'Success';
            $data['response'] = ResponseInterface::HTTP_CONFLICT;
            $data['data'] = '';
        }
        echo json_encode($data);
    }
    
    
    public function singlePermissionsModuleId($id = null)
    {
        if($this->request->isAJAX()){
            if($data[$this->model] = $this->roleModuleModel->sp_role_module_id($id)){
                $data['message'] = 'Success';
                $data['response'] = ResponseInterface::HTTP_OK;
                $data['csrf'] = csrf_hash();
            }else{
                $data['message'] = 'Error create user';
                $data['response'] = ResponseInterface::HTTP_NO_CONTENT;
                $data['data'] = '';
            }
        }else{
            $data['message'] = 'Success';
            $data['response'] = ResponseInterface::HTTP_CONFLICT;
            $data['data'] = '';
        }
        echo json_encode($data);
    }
    
    

    public function update(){
        if($this ->request->isAJAX()){
            $today = date("Y-m-d H:i:s");
            $id = $this->request->getVar($this->primaryKey);
            $dataModel=[
                'Modules_fk' => $this->request->getVar('Modules_fk'),
                'Roles_fk' => $this->request->getVar('Roles_fk'),
                'update_at' => $today                 
            ];
            if($this->roleModuleModel->update($id, $dataModel)){
                $data['message'] = 'success' ;
                $data['response'] = ResponseInterface::HTTP_OK;
                $data['data'] = $dataModel;
                $data['csrf'] = csrf_hash();
            }else{
                $data['message'] = 'Error create user' ;
                $data['response'] = ResponseInterface::HTTP_NO_CONTENT;
                $data['data'] = '';
            }
        }else{
            $data['message'] = 'Error create user' ;
            $data['response'] = ResponseInterface::HTTP_CONFLICT;
            $data['data'] = '';
        }
        echo json_encode($dataModel);
    }

    public function delete($id = null)
    {   
        try{
            if($this->roleModuleModel->where($this->primaryKey, $id)->delete($id)){
                $data['message'] = 'success' ;
                $data['response'] = ResponseInterface::HTTP_OK;
                $data['data'] = "OK";
                $data['csrf'] = csrf_hash();
            }else{
                $data['message'] = 'Error Ajax' ;
                $data['response'] = ResponseInterface::HTTP_CONFLICT;
                $data['data'] = 'error';
            }
        }catch(\Exception $e){
            $data['message'] = 'Error create user' ;
            $data['response'] = ResponseInterface::HTTP_CONFLICT;
            $data['data'] = 'Error';
        }
        echo json_encode($data);
    }    


    public function getDataModel()
    {
        $data = [
            'RoleModules_id' => $this->request->getVar('RoleModules_id'),
            'Modules_fk' => $this->request->getVar('Modules_fk'),
            'Roles_fk' => $this->request->getVar('Roles_fk'),
            'update_at' => $this->request->getVar('update_at'),
        ];
        return $data;
    }
}

?>