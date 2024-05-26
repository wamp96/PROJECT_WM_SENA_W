<?php

namespace App\Models;

use CodeIgniter\Model;

class ElementStatusModel extends Model
{
    protected $table            = 'element_status';
    protected $primaryKey       = 'Element_status_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Element_status_name','Element_status_description','update_at'];

    protected bool $allowEmptyInserts = false;

    // Dates

    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';
}
