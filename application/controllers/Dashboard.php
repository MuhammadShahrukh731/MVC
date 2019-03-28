<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->logged_in();
        $this->load->model('users_model');
       
    }

    private function logged_in() {
        if(! $this->session->userdata('authenticated')) {
            redirect('users/login');
            if(! $this->session->userdata('authenticate')) {
            redirect('admin/login');
        }

}
        

        
        
//    else if( $this->session->userdata('authenticated')) {
//             redirect('dashboard');
//         }

// else{

// }
    
    }
    public function index()
    {
        $data['title'] = "Dashboard";
      
        $this->load->view('layout/header', $data);
        $this->load->view('layout/footer', $data);
        

    }

    public function  upload_image(){
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
              
                $this->load->library('upload', $config);

                if ( !$this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('user/profile', $error);

                        echo 'fail';
                }
                else
                {
                        $data= array('upload_data' => $this->upload->data());

                        $this->load->view('user/profile', $data);
                        echo '<pre>';

                        print_r($data['upload_data']['raw_name']);
                        echo '</pre>';
                        $img_url =base_url("uploads/".$data['upload_data']['raw_name'].$data['upload_data']['file_ext']);
                        echo $img_url;          


                        echo 'success';
                }
        }
    
public function Enrol(){

//     $user = $this->session->userdata('id');
//     $admin = $this->input->get('id');


//  $data = array(

// 'user'=>$user,
// 'admin'=>$admin
//     );
    
//      $this->db->insert('enrol',$data);
//     redirect('Dashboard/course');
//     echo "success";
 $result=$this->users_model->getcourse();
 foreach($result=$result->result() as $row){

    echo $row->cname;
    echo "<br>";
 }

}

public function profile(){
$this->load->view('layout/header');
$this->load->view('user/profile');
$this->load->view('layout/footer');
}
public function changepassword(){

$this->load->view('layout/header');
$this->load->view('user/changepassword');
$this->load->view('layout/footer');

 $this->form_validation->set_rules('password', 'Current Password', 'required|alpha_numeric|min_length[6]|max_length[20]');
    $this->form_validation->set_rules('newpass', 'New Password', 'required|alpha_numeric|min_length[6]|max_length[20]');
    $this->form_validation->set_rules('confpassword', 'Confirm Password', 'required|alpha_numeric|min_length[6]|max_length[20]');

if($this->form_validation->run()==true){
     $cur_password = $this->input->post('password');
        $new_password = $this->input->post('newpass');
        $conf_password = $this->input->post('confpassword');
        $userid = $this->session->userdata('id');
        $passwd = $this->users_model->getCurrPassword($userid);
        if($passwd->password == $cur_password){
            if($new_password == $conf_password){
                if($this->users_model->updatePassword($new_password, $userid)){
                    echo 'Password updated successfully';
                }
                else{
                    echo 'Failed to update password';
                }
            }
            else{
                echo 'New password & Confirm password is not matching';
            }
        }
        else{
            echo'Sorry! Current password is not matching';

    }
}
else{
    echo validation_errors();
}
}


    public function course(){
    
    $result['data']=$this->users_model->getcourse();

               
        $data['title'] = "Show Course";
      
        $this->load->view('layout/header');
        $this->load->view('user/course', $result);
        $this->load->view('layout/footer');
        

    }
public function showpost()
    {
           
            
            $result['data']=$this->users_model->showpost();

               
        $data['title'] = "Show post";
      
        $this->load->view('layout/header');
        $this->load->view('user/showpost', $result);
        $this->load->view('layout/footer');
        

    }

    public function getproduct(){ 
        
        $this->load->view('layout/header');
       $this->db->select('*');
       $this->db->from('products');
       $data['products']= $this->db->get();

    



                // $id=$this->session->userdata('id');
        // $data['user']=$this->users_model->getloginuser($id);
        // $this->load->view('user/profile',$data);
        // // print_r($data);
// $data['products'] = array(
//         array(
//                 'id'      => 'abc',
//                 'qty'     => 1,
//                 'price'   => 5,
//                 'name'    => 'Glass'
        
// ),
// array(
        
//                 'id'      => 'def',
//                 'qty'     => 1,
//                 'price'   => '5',
//                 'name'    => 'bulb'
        
// ),
// array(
        
//                 'id'      => 'ghi',
//                 'qty'     => 1,
//                 'price'   => 5,
//                 'name'    => 'laptop'
        
// )
// );
//     $this->load->library('cart');
// if($this->input->get('id')!=''){

// foreach ($data['products']->result() as $row) {

//     $data['items']=array(


//       'id'=> $row->id,
//       'qty'=> $row->qty,
//     'name'=>$row->pname,
//     'coupon'=>$row->coupon

//     );
//        echo '<pre>';
//       echo $row->id;
//        echo $row->qty;
//        echo $row->pname;
//        echo $row->coupon;
// echo '</pre>';

// }
// $this->cart->insert($data['items'][$this->input->get('id')]);
  
$this->load->library('cart');
// if($this->input->get('id')!=''){
//         $this->cart->insert($data['items'][$this->input->get('id')]);
// }

$this->load->view('user/cart',$data);
}

//     $rowid =$this->cart->insert($data);


// $data1 = array(
//         'id'=>$this->session->userdata('id'),
//         'rowid'      => $rowid,
        
// );

// echo '<pre>';
// print_r($data1);
// echo '</pre>';
//   $updat=$this->cart->update($data1);
//   $this->load->view('user/cart');
//   print_r($updat);
 
// $this->cart->destroy();
// $del =$this->cart->remove($rowid);
//       echo $del; 
       
        

//             $data = array(
//         'rowid' => $rowid,
//         'qty'   => 3
// );

public function destroycart(){
  $this->load->library('cart');
  $this->cart->destroy();    
}
// $this->cart->update($data);
          

public function logout()
    {
        $this->session->sess_destroy();
        redirect('users/login');
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