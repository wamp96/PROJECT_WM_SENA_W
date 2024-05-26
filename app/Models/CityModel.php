<?php

namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model
{
    protected $table            = 'cities';
    protected $primaryKey       = 'City_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['City_name','City_description','update_at'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
