<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Dashboard extends Controller{
    public function index(){
        return view('user_account/dashboard');
    }
    public function account(){
        echo view('settings');
    }
    public function accountSettings(){
    }
}
?>