<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Dashboard extends Controller{
    public function index(){
        $session = session();
        echo view('dashboard');
    }
    public function account(){
        echo view('settings');
    }
    public function accountSettings(){
    }
}
?>