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
        $this->data['title'] = 'Dashboard';
        $this->data['dashboard'] = $this->dashboardModel->findAll();
        $this->data['roleModules'] = $this->roleModulesModel->findAll();
        $this->data['profile'] = $this->profileModel->where('User'));
        echo view('templates/header', $this->data);
        echo view('dashboard/index', $this->data);
        echo view('templates/footer', $this->data);
    }


}




?>