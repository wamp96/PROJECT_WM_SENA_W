<?php
namespace App\Controllers;


use App\Models\PermissionModel;
use App\Models\ProfileModel;
use App\Models\RoleModulesModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;


class Permission extends Controller 
{

    
    private $primarykey;
    private $PermissionModel;
    private $roleModuleModel;
    private $profileModel;
    private $data;
    private $model;

    
    public function __construct()
    {
        $this->primarykey = "Permissions_id";
        $this->PermissionModel = new PermissionModel();
        $this->roleModuleModel = new RoleModulesModel();
        $this->profileModel = new ProfileModel();
        $this->data = [];
        $this->model = "Permissions";
    } 

    public function index()
    {
        $this->data['title'] = "PERMISSION";
        $this->data[$this->model] = $this->PermissionModel->orderBy($this->primarykey, 'ASC')->findAll();
        $this->data['profile'] = $this->profileModel->where('User_fk', (int) $this->getSessionIdUser()['User_id'])->first();
        $this->data['userModules']= $this->roleModuleModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);
        return view('Permissions/permission_view', $this->data);
    }

    public function create()
    {
        if($this->request->isAJAX()){
            $dataModel = $this->getDataModel();

            if($this->PermissionModel->insert($dataModel)){
                $data['message']= 'success';
                $data['response']= ResponseInterface::HTTP_OK;
                $data['data']=  $dataModel ;
                $data['csrf']= csrf_hash();
            }else{
                $data['message'] = 'Error create user';
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

    public function singlePermission($id = null)
    {
        if($this->request->isAJAX()){
            if($data[$this->model] = $this->PermissionModel->where($this->primarykey, $id)->first()){
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
            $id = $this->request->getVar($this->primarykey);
            $dataModel=[
                'Permissions_name' => $this->request->getVar('Permissions_name'),
                'Permissions_description' => $this->request->getVar('Permissions_description'),
                'Permissions_icon' => $this->request->getVar('Permissions_icon'),
                'update_at' => $today                 
            ];
            if($this->PermissionModel->update($id, $dataModel)){
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
            if($this->PermissionModel->where($this->primarykey, $id)->delete($id)){
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

    public function getDataModel(){
        $data =[
            'Permissions_id' => $this->request->getVar('Permissions_id'),
            'Permissions_name' => $this->request->getVar('Permissions_name'),
            'Permissions_description' => $this->request->getVar('Permissions_description'),
            'Permissions_icon' => $this->request->getVar('Permissions_icon'),
            'update_at' => $this->request->getVar('update_at')
        ];
        return $data;
    }
}
?>