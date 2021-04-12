<?php
namespace App\Controllers;
//add
use App\Models\FlowerModel;

class FlowerController extends BaseController {
    
public function index()
    {
   $flowerModel=new FlowerModel;
   $data['flori']=$flowerModel->findAll();
   return view('flowers_view',$data);
    }
    public function upload()
    {
    return view('upload');    
    }
     public function store()
    {
        $flowerModel=new FlowerModel;
         $url=$this->do_upload();
         $title=$_POST["title"];
         $flowerModel->save([
             'title'=>$title, 
             'image'=>$url
                 ]);
         return $this->response->redirect(base_url('/'));
    }
    private function do_upload()
        {
            $type=explode('.',$_FILES["poza"]["name"]);
            $type=$type[count($type)-1];
            $url="./images/".uniqid(rand()).'.'.$type;
            if(in_array($type,array("jpg","jpeg","gif","png")))
                if(is_uploaded_file($_FILES["poza"]["tmp_name"]))
                    if(move_uploaded_file($_FILES["poza"]["tmp_name"], $url))
                        return $url;
            return "";
        }
     public function view($id=NULL)
    {
        $flowerModel=new FlowerModel;
        $data['flower']=$flowerModel->find($id);
        return view('flower_view',$data);
    }
    public function delete($id=NULL)
    {
        $flowerModel=new FlowerModel;
        $data=$flowerModel->find($id);
        //echo $data['image'];
        if($data['image'])
        unlink($data['image']);
        $flowerModel->where('id',$id)->delete($id);
       return $this->response->redirect(base_url('/'));
    }
    public function edit($id=NULL)
    {
        $flowerModel=new FlowerModel;
        $data['flower']=$flowerModel->find($id);
        return view('edit_view',$data);
    }
      public function update()
    {
        $flowerModel=new FlowerModel;
        $id=$this->request->getVar('id');
        $bau=$this->request->getFile('poza');
        
        $data=$flowerModel->find($id);
        //echo $data['image'];
       if($data['image'])
        unlink($data['image']);
        
        $url="./images/".uniqid(rand()).$bau->getName();
    $data=array(
        'title'=>$this->request->getVar('title'),
        'image'=>$url
    );
    move_uploaded_file($bau, $url);
    //update data
    $flowerModel->update($id,$data);
  return $this->response->redirect(base_url('/')); 
    }
}