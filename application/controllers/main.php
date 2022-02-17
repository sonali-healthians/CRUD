<?php

class Main extends CI_Controller{
    public function login(){

        $this->load->library('form_validation');

          
        $this->form_validation->set_rules('username','Username','required');
       
        $this->form_validation->set_rules('password','Password','required');
        
        if($this->form_validation->run() == false){

            $this->load->view('login');

        } else {
            $this->load->model('main_model');
            $formArray=array();
         
            $formArray['username'] = $this->input->post('username');
           
            $formArray['password'] = $this->input->post('password');
            $formArray['created_at'] = date('Y-m-d H:i:s');
            

            $response_login =  $this->main_model->demo($formArray);
            if($response_login){
                $this->load->view('home');
            }else{
                $this->load->view('login');
            }

           // $this->session->set_flashdata('msg','Your account has been created successfully.');
            //redirect(base_url().'main/login');
        }
        
       
    }
    public function dashboard(){
        $this->load->view('home');
    }

    
        public function home(){
            $this->load->view('register');
        }

        function index(){
       
            $this->load->model('main_model');
            $users=$this->main_model->all();
            $data=array();
            $data['users']=$users;
            $this->load->view('list',$data);
    
        }
       
    
        function create(){
            $this->load->model('main_model');
            $this->form_validation->set_rules('image_path','Profile pic','required');
            $this->form_validation->set_rules('user_name','Name','required');
            $this->form_validation->set_rules('email','Email ID','required|valid_email');
            $this->form_validation->set_rules('contact_number','Contact_number','required');
            $this->form_validation->set_rules('address','Address','required');
            
            if($this->form_validation->run()==false){
                $this->load->view('create');
            }else{
                $formArray=array();
                $formArray['image_path'] = $this->input->post('image_path');
                $formArray['user_name'] = $this->input->post('user_name');
                $formArray['email'] = $this->input->post('email');
                $formArray['contact_number'] = $this->input->post('contact_number');
                $formArray['address'] = $this->input->post('address');
                $formArray['created_at'] = date('Y-m-d H:i:s');
                
    
                $this->main_model->create($formArray);
                $this->session->set_flashdata('success','Record added successfully');
                redirect(base_url().'main/index');
            }
            
        }
        function edit($userId){

            $this->load->model('main_model');
            $user=$this->main_model->getuser($userId);
            $data=array();
            $data['user']=$user;
    
            $this->form_validation->set_rules('image_path','Profile pic','required');
            $this->form_validation->set_rules('user_name','Name','required');
            $this->form_validation->set_rules('email','Email ID','required|valid_email');
            $this->form_validation->set_rules('contact_number','Contact_number','required');
            $this->form_validation->set_rules('address','Address','required');
    
    
            if($this->form_validation->run()==false){
                $this->load->view('edit',$data);
    
            }else{
                $formArray=array();
                $formArray['image_path'] = $this->input->post('image_path');
                $formArray['user_name'] = $this->input->post('user_name');
                $formArray['email'] = $this->input->post('email');
                $formArray['contact_number'] = $this->input->post('contact_number');
                $formArray['address'] = $this->input->post('address');
                $formArray['created_at'] = date('Y-m-d H:i:s');
    
                
                $this->main_model->updateuser($userId,$formArray);
                $this->session->set_flashdata('success','Record updated successfully!');
                redirect(base_url().'main/index');
    
            }
            
            
        }
    
        function delete($userId){
            $this->load->model('main_model');
            $user=$this->main_model->getuser($userId);
            if(empty($user)){
                $this->session->set_flashdata('failure','Record not found in database');
                redirect(base_url().'main/index');
            }
            else{
            $this->main_model->deleteuser($userId);
            $this->session->set_flashdata('success','Record deleted successfully!');
                redirect(base_url().'main/index');
            }
    
    
        }


       
        

        
        // public function showList(){
        //     $this->load->model('main_model');

        //     $data1['users'] = $this->main_model->getUserList();
        //    // $data1['status'] = "xyz";
        //    // $data1['page_no'] = "111111";
        //     $this->load->view('show',$data1);


        // }
       
    

}