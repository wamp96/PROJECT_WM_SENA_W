<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['User_correo','User_password'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $updatedField  = 'update_at';
    protected $deletedField  = 'delete_at';
}
