<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestStatusModel extends Model
{
    protected $table            = 'request_status';
    protected $primaryKey       = 'Request_status_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Request_status_name','Request_status_description','update_at'];

    protected bool $allowEmptyInserts = false;
    
    // Dates
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';

}
