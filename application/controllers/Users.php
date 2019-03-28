<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('users_model');
    }
    
    private function logged_in()
    {
        if( ! $this->session->userdata('authenticated')){
            redirect('users/login');
        }
    }


    public function register(){
        $config['upload_path'] = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
              
                $this->load->library('upload', $config);

                if ( !$this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                 
                        echo 'fail';
                }
                else
                {
                        $data= array('upload_data' => $this->upload->data());

                        echo '<pre>';

                        print_r($data['upload_data']['raw_name']);
                        echo '</pre>';
                        $img_url =base_url("uploads/".$data['upload_data']['raw_name'].$data['upload_data']['file_ext']);
                        echo $img_url;          
                        $post['img_url']=$img_url;

                        echo 'success';
                }
  
    $this->form_validation->set_rules('first_name', 'Name', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'password', 'required');
    $this->form_validation->set_rules('cpassword', 'cpassword', 'required|matches[password]');
    
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
     
     if($this->form_validation->run()==false){
            $data['title'] = "Register";
            $this->load->view('layout/header', $data);
            $this->load->view('user/signup', $data);
            $this->load->view('layout/footer', $data);
    

     }
     else{
    $data = array(

'first_name'=>$this->input->post('first_name'),
'email'=>$this->input->post('email'),
'password'=>$this->input->post('password'),
'profile_photo'=>$img_url
    );
    
     $this->db->insert('users',$data);
    redirect('Users/Login');
     }
    }   
    
    public function login()
    {
        $data['title'] = "Login";
        
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        if($this->form_validation->run() == false){
            $this->load->view('layout/header', $data);
            $this->load->view('user/login', $data);
            $this->load->view('layout/footer', $data);
        } 
        else {
            $email =$this->input->post('email');
            $password = $this->input->post('password');
            
            $user = $this->users_model->login($email, $password);
            
            if($user){
                $userdata = array(
                    'id' => $user->id,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'authenticated' => TRUE
                );
                
                $this->session->set_userdata($userdata);
                
                redirect('dashboard');
            }
            else {
                $this->session->set_flashdata('message', 'Invalid email or password');
                redirect('users/login');
            }
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('users/login');
    }
}
?>