<?php
namespace App\Models;
use CodeIgniter\Model;
class BlogModel extends Model{
protected $table='blogs';
protected $primaryKey='blogId';
protected $allowedFields=['blogTitle','blogDescription','blogContent','writerId'];
// protected $allowedFields=['blogTitle','blogDescription','blogContent'];
//    protected $allowedFields=['title','author','isb_no'];
public function getRecords(){
    return $this->orderBy('blogId','DESC')->findAll();
}
public function getRow($blogId){
    return $this->find($blogId);
}
// public function getRow($blogId){
//     return $this->where('blogId',$blogId)->first();
// }
}
?>