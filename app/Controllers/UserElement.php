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
use App\Models\UserModel;
use App\Models\ElementModel;


class UserElement extends Controller
{


    //Variables
    private $primarykey;
    private $userElementModel;
    private $roleModulesModel;
    private $profileModel;
    private $data;
    private $model;

    private $userModel;

    private $elementModel;


    //Metodo Constructor
    public function __construct()
    {
        $this->primarykey = "User_element_id";
        $this->profileModel = new ProfileModel();
        $this->roleModulesModel = new RoleModulesModel();
        $this->userElementModel  = new UserElementModel();
        $this->data = [];
        $this->model = "user_elements";
        $this->userModel = new UserModel();
        $this->elementModel = new ElementModel();
    }

    public function index()
{
    // Título de la página
    $data['title'] = 'User Elements';

    // Obtener los datos usando el procedimiento almacenado
    $data['user_elements'] = $this->userElementModel->getUserElementDetails();

    // Obtener los módulos del usuario
    $data['userModules'] = $this->roleModulesModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);

    // Obtener los módulos del usuario
    $data['users'] = $this->userModel->findAll();

    $data['elements'] = $this->elementModel->findAll();

    // Pasar los datos a la vista
    return view('userElement/userElement_view', $data);
}







    public function assignElementToUser()
    {
        $data = $this->getDataModel();  // Usar getDataModel para obtener los datos

        // Verificar que los valores no sean nulos
        if (empty($data['User_fk']) || empty($data['Element_fk'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'User_fk and Element_fk are required.'
            ]);
        }

        if ($this->userElementModel->insert($data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Element assigned successfully!'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to assign element. Please try again.'
            ]);
        }
    }




    public function create()
    {
        // Cargar los modelos necesarios
        $userModel = new UserModel();
        $elementModel = new ElementModel();

        // Obtener todos los usuarios y elementos
        $users = $userModel->findAll();
        $elements = $elementModel->findAll();

        // Pasar los datos a la vista
        return view('userElement/form', [
            'users' => $users,
            'elements' => $elements,
        ]);
    }

    public function getElementDetails($id)
    {
        $userElement = $this->userElementModel
            ->where('User_element_id', $id)
            ->first();

        if ($userElement) {
            return $this->response->setJSON([
                'success' => true,
                'userElement' => $userElement
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Element assignment not found.'
            ]);
        }
    }




    public function getDataModel()
    {
        $data = [
            'User_fk' => $this->request->getVar('User_fk'),
            'Element_fk' => $this->request->getVar('Element_fk'),
            'User_element_fecha' => date('Y-m-d H:i:s'), // Corrige la obtención de fecha
            'update_at' => date('Y-m-d H:i:s')
        ];
        return $data;
    }
}
