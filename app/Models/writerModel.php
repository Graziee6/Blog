<?php
namespace App\Models;
use CodeIgniter\Model;
class WriterModel extends Model{
protected $table='users';
protected $primaryKey="userId";
protected $allowedFields=['username','email','profilePic','password'];

public function getUsers(){
    return $this->orderBy('userId','DESC')->findAll();
}
}
?>