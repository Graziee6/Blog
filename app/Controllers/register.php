<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller{
    public function index(){
        //include helper form
        
        if(session()->user_id){
            return redirect()->to('/dashboard');
        }
        helper(['form']);
        $data = [];
        echo view('user_account/register', $data);
    }
    public function updateAccount(){
        if(empty(session()->user_id)){
            return redirect()->to('user_account/login');
        }
        echo view("user_account/updateAccount");
    }
    public function update(){
        helper(['form']);
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'district'     => 'required',
            'sector'       => 'required'
        ];
        if ($this->validate($rules)) {
            $data = [
                'user_name' => $this->request->getVar('name'),
                'user_email' => $this->request->getVar('email'),
                'districtId' => $this->request->getVar('district'),
                'sectorId' => $this->request->getVar('sector'),
            ];
            $model = new UserModel();
            $id = session()->user_id;
            $model->update($id, $data);
            return redirect()->to('/dashboard');
        }
        else{
            $data['validation'] = $this->validator;
            echo view('user_account/updateAccount',$data);
        }
    }
    public function save(){
        //include helper form
        helper(['form']);
        //set rules validation form 
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
            'district'     => 'required',
            'sector'       => 'required',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];

        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'user_name' => $this->request->getVar('name'),
                'user_email' => $this->request->getVar('email'),
                'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'districtId' => $this->request->getVar('district'),
                'sectorId' => $this->request->getVar('sector'),
            ];
            $model->save($data);
            return redirect()->to('/register/profile');
        }
        else{
            $data['validation'] = $this->validator;
            echo view('user_account/home',$data);
        }
    }
    public function profile(){
        if(empty(session()->user_id)){
            return redirect()->to('user_account/login');
        }
        return view('user_account/uploadProfile');
    }

    public function uploadProfile()
    {
        if ($this->request->getMethod() == "post") {

            $rules = [
              "profile_image" => [
                "rules" => "uploaded[profile]|max_size[profile,1024]|is_image[profile]|mime_in[profile,image/jpg,image/jpeg,image/gif,image/png]",
                "label" => "profile",
              ],
            ];
            if (!$this->validate($rules)) {

                return view("user_account/uploadProfile", [
                  "validation" => $this->validator,
                ]);
              } else {
                $file = $this->request->getFile("profile");
          
                $session = session();
                $profile_image = $file->getRandomName();
          
                if ($file->move("assets/images/profiles", $profile_image)) {
          
                  $userModel = new UserModel();
                    $upload = $userModel->setProfile($profile_image, $session->user_id);
                  if($upload){
                    // session()->user_profile = $profile_image;
                    return redirect()->to('/dashboard');
                  }
                  else{
                      return view("user_account/uploadProfile", [
                        "validation" => $this->validator,
                      ]);;
                  }
            }
        }
    }
    }
    public function deleteProfile()
    {
        $session = session();
        $file = 'assets/images/profiles/'.$session->user_profile;
        if (is_readable($file) && unlink($file)) {
            $userModel = new UserModel();
            session()->user_profile = '';
            $userModel->deleteProfile(session()->user_id);
            return redirect()->to('/dashboard');
        }
        else{
            return view("user_account/uploadProfile", [
            "validation" => $this->validator,
          ]);;
        }
    }
}
?>