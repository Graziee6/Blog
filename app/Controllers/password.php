<?php

namespace App\Controllers;

use CodeIgniter\Model;
use App\Models\UserModel;

use function PHPUnit\Framework\matches;

class Password extends BaseController
{
	public function index()
	{
        if(session()->user_id){
            return redirect()->to('/Dashboard');
        }
		return view('user_account/password');
	}

    public function displayCode(){
        if(session()->user_id){
            return redirect()->to('/Dashboard');
        }
        return view('user_account/code');
        return redirect()->to('user_account/code');
    }

    public function displayChangePassword(){
        // if (empty(session()->user_id)) {
        //     return redirect()->to('/Login');
        // }
        // else{
        return view('user_account/changePassword');
    // }
}

    public function changePassword(){
        $session = session();
        $to = $this->request->getVar('email');
        $model = new UserModel();
        $checkMail = $model->where("user_email", $to)->first();
        if($checkMail){
            $email = \config\Services::email();
            $subject = "Reset Password link";
            $email->setTo($to);
            $code = random_int(000001, 999999);
            $message = "Your code is ".$code;
            $email->setFrom('mugishakundasarah@gmail.com');
            $email->setSubject($subject);
            $email->setMessage($message);
            
            if($email->send()){
                // session()->setFlashdata('email', $to);
                $session->code = $code;
                $session->user_email = $to;
                return redirect()->to('/Password/displayCode');;
            } 
            else{
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }
        }
        else{
            $session->setFlashdata('msg','Email not registered');
            return redirect()->to('Password');
        }
    }

    public function checkCode(){
                if (empty(session()->user_email)) {
            return redirect()->to('/Login');
        }
        else{
        $session = session();
        $userCode = $this->request->getVar('code');
        if($userCode==$session->code){
            $session->code = NULL;
            return redirect()->to('/Password/displayChangePassword');
        }
        else{
            $session->setFlashdata('msg', 'wrong Code please try again!');
            return redirect()->to('/Password/displayCode');
        }
    }
    }
    function saveNewPassword(){
                if (empty(session()->user_id)) {
            return redirect()->to('/Login');
        }
        else{
        helper(['form']);
        $password = $this->request->getVar('password');
        $confPassword= $this->request->getVar('confPassword');
        $rules = [
            'password' => 'required|min_length[6]|max_length[200]',
            'confPassword' => 'matches[password]'
        ];
        if($this->validate($rules)){
            $db = \config\Database::connect();
            $user = new UserModel();   
            $session = session();         
            $email = $session->user_email;
            print_r($email);
            $user->where('user_email', $email)->first();
            $id = $user->userId;
            $data = [
                'user_password' => password_hash($password,PASSWORD_DEFAULT)
            ];
            if($user->update($id, $data)){
                return redirect()->to('/Login');
            }
            else{
                session()->setFlashdata('msg', 'failed to save password');
                return redirect()->to('/Password/displayChangePassword');
            }
        }
        else{
            $data['validation'] = $this->validator;
            return view('/Password/displayChangePassword',$data);
        }
    }
} 
}
