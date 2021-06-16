<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Dashboard extends Controller{
    public function index(){
        return view('user_account/dashboard');
    }
    public function viewProfile(){
        return view("user_account/viewProfile");
    }
}
?>