<?php

namespace App\Controllers;

use App\Models\LandingPageModel;
use CodeIgniter\Controller;

class LandingPageController extends Controller
{
    protected $landingPageModel;

    public function __construct()
    {
        $this->landingPageModel = new LandingPageModel();
    }

    // Mostrar la landing page
    public function index()
    {
        $landingPage = $this->landingPageModel->first(); // Obtener la primera fila de la tabla (puedes personalizar según sea necesario)
        return view('landing_page_view', ['landingPage' => $landingPage]);
    }

    // Crear una nueva landing page
    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $data = [
                'mission'   => $this->request->getPost('mission'),
                'vision'    => $this->request->getPost('vision'),
                'objective' => $this->request->getPost('objective'),
                'modules'   => json_encode($this->request->getPost('modules')),  // Guardamos los módulos como JSON
            ];

            $this->landingPageModel->insert($data);

            return redirect()->to('/landingpage');  // Redirige a la página de la landing page después de crear
        }

        return view('create_landing_page');
    }

    // Actualizar la landing page
    public function update($id)
    {
        $landingPage = $this->landingPageModel->find($id);

        if (!$landingPage) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Landing page no encontrada');
        }

        if ($this->request->getMethod() === 'post') {
            $data = [
                'mission'   => $this->request->getPost('mission'),
                'vision'    => $this->request->getPost('vision'),
                'objective' => $this->request->getPost('objective'),
                'modules'   => json_encode($this->request->getPost('modules')),
            ];

            $this->landingPageModel->update($id, $data);
            return redirect()->to('/landingpage');  // Redirige después de la actualización
        }

        return view('edit_landing_page', ['landingPage' => $landingPage]);
    }
}
