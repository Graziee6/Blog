<?php namespace App\Models;

use CodeIgniter\Model;
class UserModel extends Model{
    protected $table = 'users';
    protected $primaryKey = 'Id';
    protected $allowedFields = ['Id','user_name', 'user_email', 'user_password', 'districtId', 'sectorId', 'user_profile ','user_created_at'];
    public function setProfile($profile, $id){
        return $this->db->query("update users set user_profile='$profile' where Id=$id");
    }
    public function deleteProfile($id)
    {
        return $this->db->query("update users set user_profile='' where Id = $id");
    }
}
?>