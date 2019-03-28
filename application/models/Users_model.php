<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{
    
    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password',$password);
    
        $query = $this->db->get('users');

        if($query->num_rows() == 1) {
            return $query->row();
        }

        return false;
    }


    public function showpost(){
        
        $this->db->select('*');
        $this->db->from('users', 'users_profiles');
        $this->db->join('post', 'users.id = post.user_id');
        
        return $this->db->get();
         // $query=$query->result();
         // echo '<pre>';
         // print_r($query);
         // echo '</pre>';
    }
       
    public function getcourse(){
        
        $this->db->select('*');
        $this->db->from('admins',);
        $this->db->join('courses', 'admins.id = courses.admin_id');
        
        return $this->db->get();
         // $query=$query->result();
         // echo '<pre>';
         // print_r($query);
         // echo '</pre>';
    }


 public function getloginuser($id){
        
        $this->db->where('id',$id);
        $this->db->from('users');
        $query = $this->db->get();
        $query = $query->row();
        return $query; 
         // $query=$query->result();
         // echo '<pre>';
         // print_r($query);
         // echo '</pre>';
    }
   

    public function getCurrPassword($userid){
  $query = $this->db->where(['id'=>$userid])
                    ->get('users');
    if($query->num_rows() > 0){
        return $query->row();
    } }

  public function updatePassword($new_password, $userid){
  $data = array(
      'password'=> $new_password
      );
      return $this->db->where('id', $userid)
                      ->update('users', $data); }
}
?>  