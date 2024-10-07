<?php

namespace App\Models;

use CodeIgniter\Model;

class AreaModel extends Model
{
    protected $table            = 'areas';
    protected $primaryKey       = 'Area_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Area_name','Area_description','update_at'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
