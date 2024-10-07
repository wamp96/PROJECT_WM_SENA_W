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
    protected $allowedFields    = ['Request_id','Request_numero','Request_fecha','Request_title','Request_description','User_fk','Element_fk','Request_status_fk','update_at'];

    protected bool $allowEmptyInserts = false;


    // Dates
    protected $updatedField  = 'update_at';
    protected $deletedField  = 'delete_at';
}
