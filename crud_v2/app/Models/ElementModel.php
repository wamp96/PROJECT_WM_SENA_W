<?php

namespace App\Models;

use CodeIgniter\Model;

class ElementModel extends Model
{
    protected $table            = 'elements';
    protected $primaryKey       = 'Element_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Element_id','Element_nombre','Element_imagen','Element_serial','Element_marca','Element_modelo','Element_procesador','Element_memoria_ram','Element_disco','Element_valor','Element_stock','User_fk','Category_fk','Element_status_fk','update_at'];

    protected bool $allowEmptyInserts = false;
    

    // Dates
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';
    
}
