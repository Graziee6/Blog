<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\BlogModel;
class Dashboard extends Controller{
    public function index(){
        $session = session();
        $session=\Config\Services::session();
    $data['session']=$session;
    $model=new BlogModel();
    $blogArray=$model->getRecords();
    $data['blogs']=$blogArray;
        echo view('dashboard/index',$data);
    }
    public function viewProfile(){
        return view("user_account/viewProfile");
    }
    public function analytics(){
                $session = session();
        $session=\Config\Services::session();
    $data['session']=$session;
    $model=new BlogModel();
    $blogArray=$model->getRecords();
    $data['blogs']=$blogArray;
        echo view('dashboard/analytics',$data);
    }
}
?>