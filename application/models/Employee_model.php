<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model{
    
    public function del($id)
    {
        $this->db->where('id', $id);
        $del = $this->db->delete('post');
        return $del;
    }

 public function getloginuser($id){
        
        $this->db->where('id',$id);
        
        return $this->db->get();
         // $query=$query->result();
         // echo '<pre>';
         // print_r($query);
         // echo '</pre>';
    }
   


    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password',$password);
    
        $query = $this->db->get('admins');

        if($query->num_rows() == 1) {
            return $query->row();
        }

        return false;
    }


//     public function showpost(){
        
//         $this->db->select('*');
//         $this->db->from('users', 'users_profiles');
//         $this->db->join('post', 'users.id = post.user_id');
        
//         return $this->db->get();
//          // $query=$query->result();
//          // echo '<pre>';
//          // print_r($query);
//          // echo '</pre>';
//     }
 
 function enrolu(){

    $this->db->select('courses.cname','enrol.user');
    $this->db->from('courses','enrol');
    $this->db->join('enrol','courses.admin_id = enrol.admin'); 
    $query = $this->db->get();
    return $query->result();

}
}
 ?>