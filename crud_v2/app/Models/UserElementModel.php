<?php

namespace App\Models;

use CodeIgniter\Model;

class UserElementModel extends Model
{
    protected $table            = 'user_elements';
    protected $primaryKey       = 'User_element_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['User_element_id','User_element_fecha','User_fk','Element_fk','update_at'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';

}
