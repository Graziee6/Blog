<?php namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\userModel;

class Login extends Controller{
    public function index(){
        helper(['form']);
        echo view('login');
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
                    'user_id' => $data['userId'],
                    'user_name' => $data['user_name'],
                    'user_email' => $data['user_email'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
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