<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Admins_model');
    }
    
    // private function logged_in()
    // {
    //     if( ! $this->session->userdata('authenticated')){
    //         redirect('users/login');
    //     }
    // }

//     public function register(){
  
//     $this->form_validation->set_rules('first_name', 'Name', 'trim|required');
//     $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
//     $this->form_validation->set_rules('password', 'password', 'required');
//     $this->form_validation->set_rules('cpassword', 'cpassword', 'required|matches[password]');
    
//     $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
     
//      if($this->form_validation->run()==false){
//             $data['title'] = "Register";
//             $this->load->view('layout/header', $data);
//             $this->load->view('user/signup', $data);
//             $this->load->view('layout/footer', $data);
    

//      }
//      else{
//     $data = array(

// 'first_name'=>$this->input->post('first_name'),
// 'email'=>$this->input->post('email'),
// 'password'=>$this->input->post('password')
//     );
    
//      $this->db->insert('users',$data);
//     redirect('Users/Login');
//      }
//     }   
   
    
    public function login()
    {
        $data['title'] = " Admin Login";
        
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        if($this->form_validation->run() == false){
            $this->load->view('layout/header', $data);
            $this->load->view('Admin/login', $data);
            $this->load->view('layout/footer', $data);
        } 
        else {
            $email =$this->input->post('email');
            $password = $this->input->post('password');
            
            $admin = $this->Admins_model->login($email, $password);
            
            if($admin){
                $admindata = array(
                    'id' => $admin->id,
                    'first_name' => $admin->email,
                    'last_name' => $admin->name,
                    'authenticate' => TRUE
                );
                
                $this->session->set_userdata($admindata);
                
                redirect('Admins_dashboard');
                echo 'users';
            }
            else {
                $this->session->set_flashdata('message', 'Invalid email or password');
                 redirect('admins/login');
                echo 'user not found';
            }
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admins/login');
    }
}
?>