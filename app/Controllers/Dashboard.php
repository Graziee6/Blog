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
    public function account(){
        echo view('settings');
    }
    public function accountSettings(){
    }
}
?>