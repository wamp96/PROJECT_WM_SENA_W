<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'User_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['User_documento','User_nombre','User_apellido_paterno','User_apellido_materno','User_telefono','User_correo','User_password','City_fk','Area_fk','Roles_fk','User_status_fk','update_at'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';

    public function sp_users()
    {
        try{
            $sql = "CALL sp_users();";
            $query = $this->db->query($sql);
            $result = $query->getResultArray();
        }catch(Exception $e){
            $result = null;
        }
        return $result;

    }

}
