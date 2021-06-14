<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class CommentsModel extends Model{
        protected $table = 'comments';
        protected $primaryKey = 'commentId';
        protected $allowedFields=['commentBody'];
        public function getRecords(){
            return $this->orderBy('created_at', 'DESC')->findAll();
        }
        public function getRow($commentId){
            return $this->find($commentId);
        }
    }
?>