<?php
//Description:  Esta clase es el controlador para gestionar el estado del usuario

//Nombre del archivo segun su ruta
namespace App\Controllers;

//Clases Utilizadas en este controlador
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\UserStatusModel;
use App\Models\ProfileModel;
use App\Models\RoleModulesModel;
use App\Models\CityModel;
use App\Models\AreaModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;


class User extends Controller 
{

    //Variables   
    private $primarykey;
    private $userModel;
    private $roleModel;
    private $roleModulesModel;
    private $cityModel;
    private $areaModel;
    private $profileModel;
    private $userStatusModel;
    private $data;
    private $model;

    //Metodo Constructor
    public function __construct()
    {
        $this->primarykey = "User_id";
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
        $this->profileModel = new ProfileModel();
        $this->roleModulesModel = new roleModulesModel();
        $this->userStatusModel = new UserStatusModel();
        $this->cityModel = new CityModel();
        $this->areaModel = new AreaModel();
        $this->data = [];
        $this->model = "users";
    } 

    //Metodo index se inicia la vista y se establecen los parametros para enviar los datos en la vista del renderizado html
    public function index()
    {
        $this->data['title'] = "USERS";
        $this->data[$this->model] = $this->userModel->sp_users();
        $this->data['roles'] = $this->roleModel->orderBy('Roles_id', 'ASC')->findAll();
        $this->data['user_status'] = $this->userStatusModel->orderBy('User_status_id', 'ASC')->findAll();
        $this->data['cities'] = $this->cityModel->orderBy('City_id', 'ASC')->findAll();
        $this->data['areas'] = $this->areaModel->orderBy('Area_id', 'ASC')->findAll();
        $this->data['profile'] = $this->profileModel->where('user_fk', (int)$this->getSessionIdUser()['User_id'])->first();
        $this->data['userModules'] = $this->roleModulesModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);
        return view('user/user_view', $this->data);
        
    }

    /*
    public function viewList(){
        return $this->respond(['users'=>  $this->userModel->findAll()], 200);
    }
    */

    public function create()
    {
        if($this->request->isAJAX()){
            $dataModel = $this->getDataModel();

            if($this->userModel->insert($dataModel)){
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

    public function singleUser($id = null)
    {
        if($this->request->isAJAX()){
            if($data[$this->model] = $this->userModel->where($this->primarykey, $id)->first()){
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
                'User_documento' => $this->request->getVar('User_documento'),
                'User_nombre' => $this->request->getVar('User_nombre'),
                'User_apellido_paterno' => $this->request->getVar('User_apellido_paterno'),
                'User_apellido_materno' => $this->request->getVar('User_apellido_materno'),
                'User_telefono' => $this->request->getVar('User_telefono'),
                'User_correo' => $this->request->getVar('User_correo'),
                'City_fk' => $this->request->getVar('City_fk'),
                'Area_fk' => $this->request->getVar('Area_fk'),
                'Roles_fk' => $this->request->getVar('Roles_fk'),
                'User_password' => password_hash($this->request->getVar('User_password'),PASSWORD_DEFAULT),   
                'update_at' => $today                 
            ];
            if($this->userModel->update($id, $dataModel)){
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
            if($this->userModel->where($this->primarykey, $id)->delete($id)){
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
            'User_id' => $this->request->getVar('User_id'),
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
        return $data;
    }
}


?>