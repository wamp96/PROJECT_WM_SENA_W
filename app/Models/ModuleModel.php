<?php

namespace App\Models;

use CodeIgniter\Model;
<<<<<<< Updated upstream
use Exception;
=======
>>>>>>> Stashed changes

class ModuleModel extends Model
{
    protected $table            = 'modules';
    protected $primaryKey       = 'Modules_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Modules_name','Modules_description','Modules_route','Modules_icon','Modules_submodule','Modules_parent_module','update_at'];

    protected bool $allowEmptyInserts = false;
<<<<<<< Updated upstream

    // Dates

    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';

   
=======
    
    // Dates
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';
>>>>>>> Stashed changes
}
