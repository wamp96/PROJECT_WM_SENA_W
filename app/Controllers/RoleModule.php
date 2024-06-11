<?php 

namespace App\Controllers;

use App\Models\RoleModulesModel;
use App\Models\ModuleModel;
use App\Models\PermissionModel;
use App\Models\ProfileModel;
use App\Models\RoleModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;

class RoleModule extends Controller
{
    private $primaryKey;
    private $roleModuleModel;
    private $moduleModel;
    private $roleModel;
    private $permissionModel;
    private $profileModel;
    private $data;
    private $model;

    public function __construct()
    {
        $this->primaryKey = "Roles_id";
        $this->roleModuleModel = new RoleModulesModel();
        $this->moduleModel = new ModuleModel();
        $this->roleModel = new RoleModel();
        $this->profileModel = new ProfileModel();
        $this->permissionModel = new PermissionModel();
        $this->data = [];
        $this->model = "roleModules";
    }

    public function index()
    {
        $this->data['title'] = "ROLE MODULES";
        $this->data['titlePermissions'] = "MODULE PERMISSIONS";
        $this->data[$this->model] = $this->roleModuleModel->orderBy($this->primaryKey, 'ASC')->findAll();
        $this->data['modules'] = $this->moduleModel->orderBy('Modules_id', 'ASC')->findAll();
        $this->data['roles'] = $this->roleModel->orderBy('Roles_id', 'ASC')->findAll();
        $this->data['permissions'] = $this->permissionModel->orderBy('Permissions_id', 'ASC')->findAll();
        $this->data['profiles'] = $this->profileModel->orderBy('Profiles_id', 'ASC')->findAll();
        $this->data['roleModules'] = $this->roleModuleModel->orderBy('Roles_id', 'ASC')->findAll();
        return view('roleModule/roleModules_view', $this->data);

    }









}

?>