<?php 

namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\RoleModulesModel;
use App\Models\ProfileModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Message;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Dashboard extends BaseController
{
    private $dashboardModel;
    private $roleModulesModel;
    private $profileModel;
    private $data;

    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
        $this->roleModulesModel = new RoleModulesModel();
        $this->profileModel = new ProfileModel();
        $this->data = [];
    }

    public function index()
    {
        $this->data['title'] = 'DASHBOARD';
        $this->data['profile'] = $this->profileModel->where('User_id_fk',(int)$this->getSessionIdUser()['User_id'])->first();
        $this->data['userModule'] = $this->roleModulesModel->sp_role_module_id((int)$this->getSessionIdUser()['Roles_fk']);
        echo view('dashboard/dashboard-index', $this->data);        
    }
}

?>