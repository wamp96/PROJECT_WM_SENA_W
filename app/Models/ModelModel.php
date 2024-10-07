<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelModel extends Model
{
    protected $table            = 'models';
    protected $primaryKey       = 'Model_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Model_name','Model_description','Brand_fk','update_at'];

    protected bool $allowEmptyInserts = false;

    // Dates 
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';
}
