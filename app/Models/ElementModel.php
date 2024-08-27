<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class ElementModel extends Model
{
    protected $table            = 'elements';
    protected $primaryKey       = 'Element_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Element_nombre','Element_imagen','Element_serial','Element_procesador','Element_memoria_ram','Element_disco','Element_valor','Element_stock','Category_fk','Element_status_fk','Brand_fk','update_at'];

    protected bool $allowEmptyInserts = false;
    

    // Dates
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';

    
    public function sp_elements()
    {
        try{
            $sql = "CALL sp_elements();";
            $query = $this->db->query($sql);
            $result = $query->getResultArray();
        }catch(Exception $e){
            $result = null;
        }
        return $result;
    }
    
}
