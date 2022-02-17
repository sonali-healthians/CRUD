<?php  
 class Main_model extends CI_Model  
 {  
     public function demo($formArray){
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          $this->db->select("username,password");
          $this->db->from("login");
          $this->db->where("username",$username);
          
          $query = $this->db->get();
          $data  = $query->row();
          //echo "<pre>";
          //print_r($this->input->post());
          // print_r($data);
            if($data){
               if($data->password == $password){
                   return true;
                    
               }else{
                    return false;
               }
            }else{
               return false;
                    }
               
          
               
         //die;
          
          // $query =$this->db->query("SELECT  * FROM  login WHERE username='. $username. ' AND password='. $password.'"); // Query modify as per ur requirement

          // if($query->count() ==1){
          //     echo  'login';
          // }else{
          //      echo "failed";
          // }


      
     }
     function create($formArray){
          $this->db->insert('users',$formArray);
      }
  
      function all(){
      return $users=$this->db->get('users')->result_array();
      }
  
      function getuser($userId){
      $this->db->where('user_id',$userId);
      return $users=$this->db->get('users')->row_array();
  
      }
      function updateuser($userId,$formArray){
          $this->db->where('user_id',$userId);
          $this->db->update('users',$formArray);
      }
  
      function deleteuser($userId){
          $this->db->where('user_id',$userId);
          $this->db->delete('users');
  
  
      }
}