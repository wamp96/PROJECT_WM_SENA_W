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
        $this->data['title'] = "USER ELEMENTS";
        $this->data[$this->model] = $this->userElementModel->orderBy($this->primarykey, 'ASC')->findAll();
        $this->data['profile'] = $this->profileModel->where('User_fk', (int)$this->getSessionIdUser()['User_id'])->first();
        $this->data['userModules'] = $this->roleModulesModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);

        // Obtener usuarios y elementos para el formulario
        $this->data['users'] = $this->userModel->findAll(); // Asegúrate de que 'profileModel' tenga la relación correcta con los usuarios
        $this->data['elements'] = $this->elementModel->findAll(); // O el modelo adecuado para los elementos

        return view('userElement/userElement_view', $this->data);
    }

    public function assignElementToUser()
    {
        $userElementModel = new UserElementModel();

        $data = [
            'User_fk' => $this->request->getPost('User_fk'), // ID del usuario
            'Element_fk' => $this->request->getPost('Element_fk'), // ID del elemento
            'User_element_fecha' => $this->request->getPost('User_element_fecha'), // Fecha de asignación
            'create_at' => $this->request->getPost('create_at'), // Fecha de creación
            'update_at' => $this->request->getPost('update_at')  // Fecha de actualización
        ];

        // Guardar la asignación en la base de datos
        if ($userElementModel->insert($data)) {
            // Redirigir o mostrar mensaje de éxito
            return redirect()->to('/success');
        } else {
            // En caso de error
            return redirect()->back()->with('error', 'There was an error assigning the element.');
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
