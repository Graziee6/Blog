<?php
namespace App\Controllers;
use App\Models\BlogModel;
use App\Models\WriterModel;

class Blog extends BaseController{
public function index(){
    $session=\Config\Services::session();
    $data['session']=$session;
     $model=new BlogModel();
    $m=new WriterModel();
    $b=$m->getUsers();
    $data['users']=$b;
    $blogArray=$model->getRecords();
    $data['blogs']=$blogArray;
    echo View("blogs/list.php",$data);   
    }
public function create(){
    $session=\Config\Services::session();
    helper('form');
    $data=[];
    $data['session']=$session;
    if($this->request->getMethod()=='post'){
        $input=$this->validate([
            'blogTitle'=>'required|min_length[5]',
            'blogDescription'=>'required|min_length[5]'
        ]);
    if($input==true){
       $model=new BlogModel();
       $model->insert([
        'writerId'=>$this->request->getPost('writerId'),    
        'blogTitle'=>$this->request->getPost('blogTitle'),
            'blogDescription'=>$this->request->getPost('blogDescription'),
            'blogContent'=>$this->request->getPost('blogContent')
                    
            ]);
        $session->setFlashdata('success','data added successfully');
        return redirect()->to('blogs');
    }
    else{
        $data['validation']=$this->validator;
    }
}

return View('blogs/create',$data);
    }
     public function edit($blogId){
             $session=\Config\Services::session();
             helper('form');
             $model=new BlogModel();
             $na=$session->get('blogId');

             $blog=$model->getRow($blogId);
             if(empty($blog)){
                $session->setFlashdata('error','Data not around');
                return redirect()->to('/blogs'); 
             };
        $data=[];
$data['blog']=$blog;

        if($this->request->getMethod() == 'post'){
            $input=$this->validate([
                'blogTitle'=>'required|min_length[5]',
                'blogDescription'=>'required|min_length[5]'
            ]);
            if($input==true){
                //form validate ok to update
                $model=new BlogModel();
                $model->update($blogId,[
                    'blogTitle'=>$this->request->getPost('blogTitle'),
                    'blogDescription'=>$this->request->getPost('blogDescription'),
                    'blogContent'=>$this->request->getPost('blogContent')
                ]);
                $session->setFlashdata('success','winner winner data updated successfull','data inserted');
                return redirect()->to('blogs');
            }else{
                //form not validated
                $data['validation']=$this->validator;
            }
        }
        return View("blogs/edit",$data);
    }
    public function delete($blogId){
        $session=\Config\Services::session();
        $model = new BlogModel();
        $blog=$model->getRow($blogId);
        if(empty($blog)){
              $session->setFlashdata('error','Data not around');
                return redirect()->to('/blogs'); 
        }
            $model = new BlogModel();
            $model->delete($blogId);
            $session->setFlashdata('success','Data deleted well');
           return redirect()->to('/blogs');
        
    }
 }
?>