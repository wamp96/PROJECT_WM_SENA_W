<?php
//Description:  Esta clase es el controlador para gestionar el estado del usuario

//Nombre del archivo segun su ruta
namespace App\Controllers;

//Clases Utilizadas en este controlador
use App\Models\ElementModel;
use App\Models\CategoryModel;
use App\Models\ModelModel;
use App\Models\BrandModel;
use App\Models\ElementStatusModel;
use App\Models\ProfileModel;
use App\Models\RoleModulesModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;


class Element extends BaseController 
{

    //Variables
    use ResponseTrait;
    private $primarykey;
    private $elementModel;
    private $categoryModel;
    private $modelModel;
    private $brandModel;
    private $elementStatusModel;
    private $profileModel;
    private $roleModulesModel;
    private $data;
    private $model;

    //Metodo Constructor
    public function __construct()
    {
        $this->primarykey = "Element_id";
        $this->elementModel = new ElementModel();
        $this->categoryModel = new CategoryModel();                
        $this->modelModel = new ModelModel();        
        $this->brandModel = new BrandModel();         
        $this->elementStatusModel = new ElementStatusModel();
        $this->profileModel = new ProfileModel();
        $this->roleModulesModel = new roleModulesModel();
        $this->data = [];
        $this->model = "elements";
    } 

    //Metodo index se inicia la vista y se establecen los parametros para enviar los datos en la vista del renderizado html
    public function index()
    {
        $this->data['title'] = "ELEMENTS";
        $this->data[$this->model] = $this->elementModel->sp_elements();
        $this->data['categories'] = $this->categoryModel->orderBy('Category_id', 'ASC')->findAll();
        $this->data['brands'] = $this->brandModel->orderBy('Brand_id', 'ASC')->findAll();
        $this->data['models'] = $this->modelModel->orderBy('Model_id', 'ASC')->findAll();
        $this->data['element_status'] = $this->elementStatusModel->orderBy('Element_status_id', 'ASC')->findAll();
        $this->data['profile'] = $this->profileModel->where('user_fk', (int)$this->getSessionIdUser()['User_id'])->first();
        $this->data['userModules'] = $this->roleModulesModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);
        return view('element/element_view', $this->data);
    }


    
    public function viewList(){
        return $this->respond(['elements'=>  $this->elementModel->findAll()], 200);
    }

    public function create()
    {
        if($this->request->isAJAX()){
            $dataModel = $this->getDataModel();

            if($this->elementModel->insert($dataModel)){
                $data['message']= 'success';
                $data['response']= ResponseInterface::HTTP_OK;
                $data['data']=  $dataModel ;
                $data['csrf']= csrf_hash();
            }else{
                $data['message'] = 'Error create element';
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

    public function singleElement($id = null)
    {
        if($this->request->isAJAX()){
            if($data[$this->model] = $this->elementModel->where($this->primarykey, $id)->first()){
                $data['message'] = 'Success';
                $data['response'] = ResponseInterface::HTTP_OK;
                $data['csrf'] = csrf_hash();
            }else{
                $data['message'] = 'Error create Element';
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
                'Element_nombre' => $this->request->getVar('Element_nombre'),
                'Element_imagen' => $this->request->getVar('Element_imagen'),
                'Element_serial' => $this->request->getVar('Element_serial'),
                'Element_procesador' => $this->request->getVar('Element_procesador'),
                'Element_memoria_ram' => $this->request->getVar('Element_memoria_ram'),
                'Element_disco' => $this->request->getVar('Element_disco'),
                'Element_valor' => $this->request->getVar('Element_valor'),
                'Element_stock' => $this->request->getVar('Element_stock'),
                'Category_fk' => $this->request->getVar('Category_fk'),
                'Element_status_fk' => $this->request->getVar('Element_status_fk'),
                //
                'Brand_fk' => $this->request->getVar('Brand_fk'),
                'Model_Brand_fk' => $this->request->getVar('Model_Brand_fk'),
                //
                'update_at' => $today                 
            ];
            if($this->elementModel->update($id, $dataModel)){
                $data['message'] = 'success' ;
                $data['response'] = ResponseInterface::HTTP_OK;
                $data['data'] = $dataModel;
                $data['csrf'] = csrf_hash();
            }else{
                $data['message'] = 'Error create Element' ;
                $data['response'] = ResponseInterface::HTTP_NO_CONTENT;
                $data['data'] = '';
            }
        }else{
            $data['message'] = 'Error create Element' ;
            $data['response'] = ResponseInterface::HTTP_CONFLICT;
            $data['data'] = '';
        }
        echo json_encode($dataModel);
    }

    public function delete($id = null)
    {   
        try{
            if($this->elementModel->where($this->primarykey, $id)->delete($id)){
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
            $data['message'] = 'Error create Element' ;
            $data['response'] = ResponseInterface::HTTP_CONFLICT;
            $data['data'] = 'Error';
        }
        echo json_encode($data);
    }

    public function getDataModel(){
        $data =[
            'Element_nombre' => $this->request->getVar('Element_nombre'),
            'Element_imagen' => $this->request->getVar('Element_imagen'),
            'Element_serial' => $this->request->getVar('Element_serial'),
            'Element_procesador' => $this->request->getVar('Element_procesador'),
            'Element_memoria_ram' => $this->request->getVar('Element_memoria_ram'),
            'Element_disco' => $this->request->getVar('Element_disco'),
            'Element_valor' => $this->request->getVar('Element_valor'),
            'Element_stock' => $this->request->getVar('Element_stock'),
            'Category_fk' => $this->request->getVar('Category_fk'),
            'Element_status_fk' => $this->request->getVar('Element_status_fk'),
            //
            'Brand_fk' => $this->request->getVar('Brand_fk'),
            'Model_Brand_fk' => $this->request->getVar('Model_Brand_fk'),
            //
            'update_at' => $this->request->getVar('update_at'),     
        ];
        return $data;

    }
}


?>