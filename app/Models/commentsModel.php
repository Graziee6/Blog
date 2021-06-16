<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class CommentsModel extends Model{
        protected $table = 'comments';
        protected $primaryKey = 'commentId';
        protected $allowedFields=['commenterId', 'blogId','commentBody'];
        public function getRecords(){
            return $this->orderBy('created_at', 'DESC')->findAll();
        }
        public function getRow($commentId){
            return $this->find($commentId);
        }
        public function getCommentsByBlog($blogId){
            return $this->db->query("select * from comments where blogId=$blogId order by created_at desc")->getResult();
        }
    }
?>