<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table            = 'brands';
    protected $primaryKey       = 'Brand_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Brand_name','Brand_description','update_at'];

    protected bool $allowEmptyInserts = false;


    // Date
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
