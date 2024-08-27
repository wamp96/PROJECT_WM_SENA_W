<?php
//Description:  Esta clase es el controlador para gestionar el estado del usuario

//Nombre del archivo segun su ruta
namespace App\Controllers;

//Clases Utilizadas en este controlador
use App\Models\ElementStatusModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;


class ElementStatus extends Controller 
{

    //Variables
    private $primarykey;
    private $ElementStatusModel;
    private $data;
    private $model;

    //Metodo Constructor
    public function __construct()
    {
        $this->primarykey = "Element_status_id";
        $this->ElementStatusModel = new ElementStatusModel();
        $this->data = [];
        $this->model = "ElementStatus";
    } 

    //Metodo index se inicia la vista y se establecen los parametros para enviar los datos en la vista del renderizado html
    public function index()
    {
        $this->data['title'] = "ELEMENT STATUS";
        $this->data[$this->model] = $this->ElementStatusModel->orderBy($this->primarykey, 'ASC')->findAll();
        return view('elementStatus/status_view', $this->data);
    }

    public function create()
    {
        if($this->request->isAJAX()){
            $dataModel = $this->getDataModel();

            if($this->ElementStatusModel->insert($dataModel)){
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

    public function singleElementStatus($id = null)
    {
        if($this->request->isAJAX()){
            if($data[$this->model] = $this->ElementStatusModel->where($this->primarykey, $id)->first()){
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
                'Element_status_name' => $this->request->getVar('Element_status_name'),
                'Element_status_description' => $this->request->getVar('Element_status_description'),
                'update_at' => $today                 
            ];
            if($this->ElementStatusModel->update($id, $dataModel)){
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
            if($this->ElementStatusModel->where($this->primarykey, $id)->delete($id)){
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
            'Element_status_id' => $this->request->getVar('Element_status_id'),
            'Element_status_name' => $this->request->getVar('Element_status_name'),
            'Element_status_description' => $this->request->getVar('Element_status_description'),
            'update_at' => $this->request->getVar('update_at')
        ];
        return $data;
    }
}


?>