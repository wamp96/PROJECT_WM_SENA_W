<?php
//Description:  Esta clase es el controlador para gestionar el estado del usuario

//Nombre del archivo segun su ruta
namespace App\Controllers;

//Clases Utilizadas en este controlador
use App\Models\BrandModel;
use App\Models\ProfileModel;
use App\Models\RoleModulesModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;


class Brand extends Controller 
{

    //Variables
    private $primarykey;
    private $brandModel;
    private $roleModulesModel;
    private $profileModel;
    private $data;
    private $model;

    //Metodo Constructor
    public function __construct()
    {
        $this->primarykey = "Brand_id";
        $this->profileModel = new ProfileModel();
        $this->roleModulesModel = new RoleModulesModel();
        $this->brandModel = new BrandModel();
        $this->data = [];
        $this->model = "cities";
    } 

    //Metodo index se inicia la vista y se establecen los parametros para enviar los datos en la vista del renderizado html
    public function index()
    {
        $this->data['title'] = "BRAND";
        $this->data[$this->model] = $this->brandModel->orderBy($this->primarykey, 'ASC')->findAll();
        $this->data['profile'] = $this->profileModel->where('User_fk',(int)$this->getSessionIdUser()['User_id'])->first();
        $this->data['userModules'] = $this->roleModulesModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);
        return view('brand/brand_view', $this->data);
    }

    public function create()
    {
        if($this->request->isAJAX()){
            $dataModel = $this->getDataModel();

            if($this->brandModel->insert($dataModel)){
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

    public function singleBrand($id = null)
    {
        if($this->request->isAJAX()){
            if($data[$this->model] = $this->brandModel->where($this->primarykey, $id)->first()){
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
                'Brand_name' => $this->request->getVar('Brand_name'),
                'Brand_description' => $this->request->getVar('Brand_description'),
                'update_at' => $today                 
            ];
            if($this->brandModel->update($id, $dataModel)){
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
            if($this->brandModel->where($this->primarykey, $id)->delete($id)){
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
            'Brand_id' => $this->request->getVar('Brand_id'),
            'Brand_name' => $this->request->getVar('Brand_name'),
            'Brand_description' => $this->request->getVar('Brand_description'),
            'update_at' => $this->request->getVar('update_at')
        ];
        return $data;
    }
}
?>