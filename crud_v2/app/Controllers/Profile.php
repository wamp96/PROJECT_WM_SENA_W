<?php
    namespace App\Controllers;

    use App\Models\ProfileModel;
    use CodeIgniter\Controller;

    class Profile extends BaseController
    {
        public function index()
        {
            $ProfileModel = new ProfileModel();
            $data['profiles'] = $ProfileModel->orderBy('id','DESC')->findAll();
            return view('profile_view', $data);
            console.log(view);
        }

        public function create()
        {
            return view('add_profile');
        }

        public function store()
        {
            $ProfileModel = new ProfileModel();
            $data = [              
                'email' => $this->request->getVar('email'),
                'photo' => $this->request->getVar('photo'),
                'name' => $this->request->getVar('name'),
            ];
            $ProfileModel->insert($data);
            return $this->response->redirect(site_url('/profiles-list'));
        }

        public function singleProfile($id = null)
        {
            $ProfileModel = new ProfileModel();
            $data['profile_obj'] = $ProfileModel->where('id',$id)->first();
            return view('edit_view', $data);
        }

        public function update()
        {
            $ProfileModel = new ProfileModel();
            $id = $this->request->getVar('id');
            $data = [
                'email' => $this->request->getVar('email'),
                'photo' => $this->request->getVar('photo'),
                'name' => $this->request->getVar('name'),
            ];
            $ProfileModel->update($id, $data);
            return $this->response->redirect(site_url('/profiles-list'));
        }

        public function delete($id = null)
        {
            $ProfileModel = new ProfileModel();
            $data['profile'] = $ProfileModel->where('id', $id)->delete($id);
            return $this->response->redirect(site_url('/profiles-list'));
        }
    }