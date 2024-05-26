<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModulesModel extends Model
{
    protected $table            = 'role_modules';
    protected $primaryKey       = 'RoleModule_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Roles_fk','Modules_fk','update_at'];

    protected bool $allowEmptyInserts = false;
    

    // Dates
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';
}
