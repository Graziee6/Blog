<?php
namespace App\Controllers;
use App\Models\BlogModel;
class Blog extends BaseController{
public function index(){
    $session=\Config\Services::session();
    $data['session']=$session;
    $model=new BlogModel();
    $blogArray=$model->getRecords();
    $data['blogs']=$blogArray;
    echo View("blogs/list.php",$data);   
    }
    public function readMore($blogId){
        $session = session();
        $session->setFlashdata('blogId', $blogId);
        return view('/blogs/read-more');
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
        $session = session();
       $model=new BlogModel();
       $model->insert([
            'blogTitle'=>$this->request->getPost('blogTitle'),
            'blogDescription'=>$this->request->getPost('blogDescription'),
            'blogContent'=>$this->request->getPost('blogContent'),
            'writerId'=> $session->user_id
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

    public function generatePDF(){
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('/blogs/read-more'));
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();
        $dompdf->stream();
        return redirect()->to(base_url('Blog/readmore'));
    }
}
?>