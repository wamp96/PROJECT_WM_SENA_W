<?php
//Description:  Esta clase es el controlador para gestionar el estado del usuario

//Nombre del archivo segun su ruta
namespace App\Controllers;

//Clases Utilizadas en este controlador
use App\Models\UserElementModel;
use App\Models\ProfileModel;
use App\Models\RoleModulesModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;


class UserElement extends Controller {

    
    //Variables
    private $primarykey;
    private $userElementModel;
    private $roleModulesModel;
    private $profileModel;
    private $data;
    private $model;

    //Metodo Constructor
    public function __construct()
    {
        $this->primarykey = "User_element_id";
        $this->profileModel = new ProfileModel();
        $this->roleModulesModel = new RoleModulesModel();
        $this->userElementModel  = new UserElementModel();
        $this->data = [];
        $this->model = "user_elements";
    } 

    public function index()
    {
        $this->data['title'] = "USER ELEMENTS";
        $this->data[$this->model] = $this->userElementModel->orderBy($this->primarykey, 'ASC')->findAll();
        $this->data['profile'] = $this->profileModel->where('User_fk',(int)$this->getSessionIdUser()['User_id'])->first();
        $this->data['userModules'] = $this->roleModulesModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);
        return view('userElement/userElement_view', $this->data);
    }

    public function assignElement()
    {
        if($this->request->isAJAX()){
            $dataModel = $this->getDataModel();

            if($this->userElementModel->insert($dataModel)){
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

    public function getDataModel(){
        $data =[
            'User_fk' => $this->request->getVar('User_fk'),
            'Element_fk' => $this->request->getVar('Element_fk'),
            'User_element_fecha' => $this->request->getVar("Y-m-d H:i:s"),
            'update_at' => date('Y-m-d H:i:s')
        ];
        return $data;
    }

}