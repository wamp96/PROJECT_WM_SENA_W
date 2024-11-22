<?php

namespace App\Models;

use CodeIgniter\Model;

class LandingPageModel extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table            = 'landing_page';  
    // Clave primaria de la tabla
    protected $primaryKey       = 'id';
    // Tipo de datos que retorna (en este caso un arreglo)
    protected $returnType       = 'array';           
    // Habilitar la auto-incrementación para la clave primaria
    protected $useAutoIncrement = true;
    // Indicar que la tabla no utiliza borrado suave
    protected $useSoftDeletes   = false;             
    // Protege los campos para evitar inyecciones SQL
    protected $protectFields    = true;              
    // Campos que pueden ser modificados directamente
    protected $allowedFields    = ['mission', 'vision', 'objective', 'modules'];  

    // Permitir insertar datos vacíos (en este caso se desactiva)
    protected bool $allowEmptyInserts = false;         
    // Solo actualizar los campos que han cambiado
    protected bool $updateOnlyChanged = true;

    // Casts para manejar tipos de datos
    protected array $casts = [
        'modules' => 'array',  // Convierte el campo 'modules' a un array cuando se obtenga
    ];

    // Fechas de creación y actualización
    protected $useTimestamps = true;  // Utiliza los campos de timestamps
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';  // En caso de habilitar soft deletes

    // Validación
    protected $validationRules      = [
        'mission'   => 'required|string|max_length[255]',
        'vision'    => 'required|string|max_length[255]',
        'objective' => 'required|string|max_length[255]',
    ];
    protected $validationMessages   = [
        'mission'   => [
            'required' => 'The mission field is required.',
            'string'   => 'The mission must be a string.',
        ],
        'vision'    => [
            'required' => 'The vision field is required.',
            'string'   => 'The vision must be a string.',
        ],
        'objective' => [
            'required' => 'The objective field is required.',
            'string'   => 'The objective must be a string.',
        ],
    ];
    protected $skipValidation       = false;

    // Callbacks (en caso de necesitar procesar datos antes o después de ciertas operaciones)
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    /**
     * Obtener una landing page por su ID
     * 
     * @param int $id
     * @return array|null
     */
    public function getLandingPageById(int $id)
    {
        return $this->find($id);
    }

    /**
     * Crear una nueva landing page
     * 
     * @param array $data
     * @return bool
     */
    public function createLandingPage(array $data)
    {
        return $this->insert($data);
    }

    /**
     * Actualizar una landing page existente
     * 
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateLandingPage(int $id, array $data)
    {
        return $this->update($id, $data);
    }

    /**
     * Eliminar una landing page
     * 
     * @param int $id
     * @return bool
     */
    public function deleteLandingPage(int $id)
    {
        return $this->delete($id);
    }
}
