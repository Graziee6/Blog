<?php namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\userModel;

class Login extends Controller{
    public function index(){
        helper(['form']);
        
        if(session()->user_id){
            return redirect()->to('/dashboard');
        }
        echo View('user_account/login');
    }
    public function auth(){
        $session = session();
        $model = new userModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('user_email', $email)->first();
        if($data){
            $pass = $data['user_password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'user_id' => $data['Id'],
                    'user_name' => $data['user_name'],
                    'user_email' => $data['user_email'],
                    'user_district' => $data['districtId'],
                    'user_sector' => $data['sectorId'],
                    'user_profile'=>$data['user_profile'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/Dashboard');
            }else{
                $session->setFlashdata('msg', 'Wrong Password ');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email not found');
            return redirect()->to('/login');
        }
    }
    public function logout(){
        $session=session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
?>