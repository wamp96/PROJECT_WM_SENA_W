<?php
//Description:  Esta clase es el controlador para gestionar el estado del usuario

//Nombre del archivo segun su ruta
namespace App\Controllers;

//Clases Utilizadas en este controlador
use App\Models\RequestModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;


class Request extends Controller 
{

    //Variables
    use ResponseTrait;
    private $primarykey;
    private $requestModel;
    private $data;
    private $model;

    //Metodo Constructor
    public function __construct()
    {
        $this->primarykey = "Request_id";
        $this->requestModel = new RequestModel();
        $this->data = [];
        $this->model = "requests";
    } 

    //Metodo index se inicia la vista y se establecen los parametros para enviar los datos en la vista del renderizado html
    public function index()
    {
        $this->data['title'] = "REQUEST";
        $this->data[$this->model] = $this->requestModel->sp_request();
        return view('request/request_view', $this->data);
    }


    
    public function viewList(){
        return $this->respond(['requests'=>  $this->requestModel->findAll()], 200);
    }

    public function create()
    {
        if($this->request->isAJAX()){
            $dataModel = $this->getDataModel();

            if($this->requestModel->insert($dataModel)){
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

    public function singleRequest($id = null)
    {
        if($this->request->isAJAX()){
            if($data[$this->model] = $this->requestModel->where($this->primarykey, $id)->first()){
                $data['message'] = 'Success';
                $data['response'] = ResponseInterface::HTTP_OK;
                $data['csrf'] = csrf_hash();
            }else{
                $data['message'] = 'Error create Request';
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
                'Request_fecha' => $this->request->getVar('Request_fecha'),
                'Request_description' => $this->request->getVar('Request_description'),
                'User_fk' => $this->request->getVar('User_fk'),
                'Element_fk' => $this->request->getVar('Element_fk'),
                'Request_status_fk' => $this->request->getVar('Request_status_fk'),
                'update_at' => $today                 
            ];
            if($this->requestModel->update($id, $dataModel)){
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
            if($this->requestModel->where($this->primarykey, $id)->delete($id)){
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
        $data=[
            'Request_fecha' => $this->request->getVar('Request_fecha'),
            'Request_description' => $this->request->getVar('Request_description'),
            'User_fk' => $this->request->getVar('User_fk'),
            'Element_fk' => $this->request->getVar('Element_fk'),
            'Request_status_fk' => $this->request->getVar('Request_status_fk'),
            'update_at' => $this->request->getVar('update_at'),                  
        ];
        return $data;
    }
}


?>