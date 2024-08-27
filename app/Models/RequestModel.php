<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestModel extends Model
{
    protected $table            = 'requests';
    protected $primaryKey       = 'Request_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Request_id','Request_fecha','Request_title','Request_description','User_fk','Request_status_fk','update_at'];

    protected bool $allowEmptyInserts = false;


    // Dates
    protected $updatedField  = 'update_at';
    protected $deletedField  = 'delete_at';

    public function sp_requests()
    {
        try{
            $sql = "CALL sp_requests();";
            $query = $this->db->query($sql);
            $result = $query->getResultArray();
        }catch(Exception $e){
            $result = null;
        }
        return $result;
    }
    public function sp_requests_id($id)
    {
        try{    
            $sql = "CALL sp_requests_id(?);";
            $query = $this->db->query($sql,$id);
            $result = $query->getResultArray();
        }catch(Exception $e){
            $result = null;
        }
        return $result;
    }
}
