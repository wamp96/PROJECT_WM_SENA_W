<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'Category_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Category_nombre','Category_descripcion','updated_at'];

    protected bool $allowEmptyInserts = false;
    

    // Dates
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';
}
