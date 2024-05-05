<?php

namespace App\Controller;

use App\Controller\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class User extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $users = new UserModel;
        return $this->respond(['users' => $users->findAll()],200);
    }
}