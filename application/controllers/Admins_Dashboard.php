<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins_Dashboard extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->logged_in();
        $this->load->model('Admins_model');

    }

public function addproduct(){
   
        $this->form_validation->set_rules('qty','Quantity','required');
        $this->form_validation->set_rules('price','Price','required');
        $this->form_validation->set_rules('pname','Product','required');
        $this->form_validation->set_rules('coupon','Coupon','required');
        
         if($this->form_validation->run()==false){
            $this->load->view('layout/header');
            $this->load->view('admin/addproduct');
           
         }
else{
    $data = array(

'qty'=>$this->input->post('qty'),
'pname'=>$this->    input->post('pname'),
'price'=>$this->input->post('price'),
'coupon'=>$this->input->post('coupon')
    );
    
     $this->db->insert('products',$data);
    redirect('Admins_Dashboard/addproduct');
    echo "success";




    
}
}
    private function logged_in() {
        if(! $this->session->userdata('authenticate')) {
            redirect('admins/login');
        }
//    else if( $this->session->userdata('authenticated')) {
//             redirect('dashboard');
//         }

// else{

// }
    }
     public function delete(){
        $id = $this->input->get('id');
        $delete = $this->Admins_model->del($id);

        redirect('Admins_dashboard/showpost');

    }

    public function enroluser(){
        $user=$this->Admins_model->enrolu();
        echo '<pre>';
        print_r($user);
        echo '</pre>';
    }

     public function addcourse(){
 
 
    $this->form_validation->set_rules('cid', 'Cid', 'trim|required');
    $this->form_validation->set_rules('cname', 'cname', 'trim|required');
    $this->form_validation->set_rules('ch', 'ch', 'required');
  
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
     
     if($this->form_validation->run()==false){
        $this->load->view('layout/header');
        $this->load->view('admin/addcourse');
        $this->load->view('layout/footer');
  

     }
     else{
    $data = array(

'cid'=>$this->input->post('cid'),
'cname'=>$this->input->post('cname'),
'ch'=>$this->input->post('ch'),
'admin_id'=>$this->session->userdata('id'), 
    );
    
     $this->db->insert('courses',$data);
    redirect('Admins_Dashboard/addcourse');
     }
    }   
 

    

    public function index()
    {
        $data['title'] = "AAdmin Dashboard";
      
        $this->load->view('layout/header', $data);
        $this->load->view('layout/footer', $data);
        

    }
public function showpost()
    {
           
            $this->load->model('users_model');
            $result['data']=$this->users_model->showpost();

               
        $data['title'] = "Show post";
      
        $this->load->view('layout/header');
        $this->load->view('admin/showpost', $result);
        $this->load->view('layout/footer');
        

    }



    public function post(){
        
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('contact','Contact','required');
        $this->form_validation->set_rules('message','Message','required');
        $this->form_validation->set_rules('issue','Issue','required');
        
        $user=$this->session->userdata('id');
        echo $user;
         if($this->form_validation->run()==false){
        $this->load->view('layout/header');
        $this->load->view('User/post',$user);
        $this->load->view('layout/footer');

         }
else{
    $data = array(
'user_id'=>$this->session->userdata('id'), 
'title'=>$this->input->post('title'),
'contact'=>$this->input->post('contact'),
'message'=>$this->input->post('message'),
'issue'=>$this->input->post('issue')
    );
    
     $this->db->insert('post',$data);
    redirect('Dashboard/post');
    echo "success";
}

    }
}
?>