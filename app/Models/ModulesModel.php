<?php

namespace App\Models;

use CodeIgniter\Model;

class ModulesModel extends Model
{
    protected $table            = 'modules';
    protected $primaryKey       = 'Modules_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Module_name','Module_description','Module_route','Module_icon','Module_submodule','Module_parent_module','update_at'];

    protected bool $allowEmptyInserts = false;
    
    // Dates
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';
}
