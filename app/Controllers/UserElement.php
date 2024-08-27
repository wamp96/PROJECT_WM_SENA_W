<?php
//Description:  Esta clase es el controlador para gestionar el estado del usuario

//Nombre del archivo segun su ruta
namespace App\Controllers;

//Clases Utilizadas en este controlador
use App\Models\UserElementModel;
use App\Models\UserModel;
use App\Models\ElementModel;
use App\Models\ProfileModel;
use App\Models\RoleModulesModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;


class UserElement extends Controller {

    
    //Variables
    private $primarykey;
    private $userElementModel;
    private $userModel;
    private $elementModel;
    private $roleModulesModel;
    private $profileModel;
    private $data;
    private $model;

    //Metodo Constructor
    public function __construct()
    {
        $this->primarykey = "User_element_id";
        $this->userElementModel  = new UserElementModel();
        $this->userModel = new UserModel();
        $this->elementModel = new ElementModel();
        $this->profileModel = new ProfileModel();
        $this->roleModulesModel = new RoleModulesModel();
        $this->data = [];
        $this->model = "user_elements";
    } 

    public function index()
    {
        $this->data['title'] = "USER ELEMENTS";
        $this->data[$this->model] = $this->userElementModel->sp_users_elements();
        $this->data['profile'] = $this->profileModel->where('User_fk',(int)$this->getSessionIdUser()['User_id'])->first();
        $this->data['userModules'] = $this->roleModulesModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);
        return view('userElement/userElement_view', $this->data);
    }
    public function viewElement()
    {
        $this->data['title'] = "MY ELEMENTS";
        $this->data[$this->model] =  $this->userElementModel->sp_users_elements_id((int)$this->getSessionIdUser()['User_id']);
        $this->data['profile'] = $this->profileModel->where('User_fk',(int)$this->getSessionIdUser()['User_id'])->first();
        $this->data['userModules'] = $this->roleModulesModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);
        return view('userElement/userElement_view', $this->data);
    }
}