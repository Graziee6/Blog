<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\BlogModel;
class Dashboard extends Controller{
    public function index(){
                if (empty(session()->user_id)) {
            return redirect()->to('/Login');
        }
        else{
        $session = session();
        $session=\Config\Services::session();
    $data['session']=$session;
    $model=new BlogModel();
    $blogArray=$model->getRecords();
    $data['blogs']=$blogArray;
        echo view('dashboard/index',$data);
    }
}
    
    public function viewProfile(){
         if (empty(session()->user_id)) {
            return redirect()->to('/Login');
        }
        else{
        return view("user_account/viewProfile");
    }
}
    public function analytics(){
         if (empty(session()->user_id)) {
            return redirect()->to('/Login');
        }
        else{
        $session = session();
        $session=\Config\Services::session();
    $data['session']=$session;
    $model=new BlogModel();
    $blogArray=$model->getRecords();
    $data['blogs']=$blogArray;
        echo view('dashboard/analytics',$data);
    }
}
}
?>