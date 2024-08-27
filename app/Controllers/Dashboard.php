<?php 

namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\RoleModulesModel;
use App\Models\ProfileModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Message;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Dashboard extends Controller
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
            $this->data['profile'] = $this->profileModel->where('User_fk',(int)$this->getSessionIdUser()['User_id'])->first();
            $this->data['userModules'] = $this->roleModulesModel->sp_role_modules_id((int)$this->getSessionIdUser()['Roles_fk']);
            echo view('dashboard/dashboard_view', $this->data);        
        }
}

?>