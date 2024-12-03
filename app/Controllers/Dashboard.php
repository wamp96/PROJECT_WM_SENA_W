<?php

namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\RoleModulesModel;
use App\Models\ProfileModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Message;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use App\Models\UserElementModel;
use App\Models\ElementModel;

class Dashboard extends Controller
{
    private $dashboardModel;
    private $roleModulesModel;
    private $profileModel;
    private $data;
    private $userElementModel;
    private $elementModel;

    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
        $this->roleModulesModel = new RoleModulesModel();
        $this->profileModel = new ProfileModel();
        $this->data = [];
        $this->userElementModel = new UserElementModel();
        $this->elementModel = new ElementModel();
    }

    public function index()
    {
        $this->data['title'] = 'DASHBOARD';
        $this->data['profile'] = $this->profileModel->where('User_fk', (int)$this->getSessionIdUser()['User_id'])->first();
        $this->data['userModules'] = $this->roleModulesModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);
        // Obtener datos del procedimiento
        $this->data['user_assignments'] = $this->userElementModel->getUserElementCounts(); // Conteo de productos por usuario
        $this->data['elements_by_brand'] = $this->elementModel->sp_elements_by_brand();
        echo view('dashboard/dashboard_view', $this->data);
    }
}
