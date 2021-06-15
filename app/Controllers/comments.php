<?php
    namespace App\controllers;
    use App\Models\commentsModel;
    
    class Comments extends BaseController{
        public function create($id){
              //include helper form
            helper(['form']);
            //set rules validation form 
            $rules = [
                'comment'=> 'required|min_length[3]|max_length[20]'
            ];
        
            if($this->validate($rules)){
                $session = session();
                $data = [
                    'commenterId' => $session->user_id,
                    'blogId' => $id,
                    'commentBody' => $this->request->getVar('comment'),
                ];
                $comment = new commentsModel();
                $comment->save($data);
                return redirect()->to('/Blog/readMore/'.$id);
            }
            else{
                $data['validation']=$this->validator;
                return redirect()->to('/Blog/readMore/'.$id)->back()->withInput();
            }
        }

        public function edit($commentId){
            $session=\Config\Services::session();
            helper('form');
            $model=new commentsModel();
            $comment=$model->getRow($commentId);
            if(empty($comment)){
                $session->setFlashdata('error', 'Comment not found');
                return redirect()->to('Comments');
            }
            $data=[];
            $data['comment']=$comment;
            if($this->request->getMethod()=='post'){
                $input=$this->validate([
                    'commentBody'=>'required'
                ]);
                if($input==true){
                    //form validate ok to update
                    $model=new CommentsModel();
                    $model->update($commentId,[
                        'commentBody'=>$this->request->getPost('commentBody')
                    ]);
                    $session->setFlashdata('success','Comment updated successfully','data inserted');
                    return redirect()->to('Comments');
                }
            }
            else{
                $data['validation']=$this->validator;
            }
            return View("Comments/editComment", $data);
        }
        public function delete($commentId){
            $session=\Config\Services::session();
            $model=new CommentsModel();
            $comment=$model->getRow($commentId);
            if(empty($comment)){
                $session->setFlashdata('error', 'Comment not found');
                return redirect()->to('/Comments');
            }

        }
    }

?>