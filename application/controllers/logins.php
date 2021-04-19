<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Logins extends CI_Controller {
    
    
    public function index() 
    {
        $this->load->view('index');
    }

    /*  
        register functions
        Owner: Nars
    */
    public function register() 
    {
        $this->load->view('register');
    }

    public function process_register() 
    {
        $this->load->model('login');
        $reg = $this->login->validate_register($this->input->post('email'));
        
        if($reg!=null)
        {
            $this->session->set_flashdata('register_error', $reg);
            redirect(base_url()."register");
        }
        else
        {
            $form_data = $this->input->post();
            $this->login->register_user($form_data);
            $new_user = $this->login->is_email_exist($form_data['email']);
            $this->session->set_userdata('user', $new_user);
            
            foreach($new_user as $result_){
                if($result_['usertype'] == 'admin')
                {
                    redirect(base_url()."admin");
                }
                else
                {
                    redirect(base_url()."user");
                }
            }
            
        }
    }

    
    /*  
        login functions
        Owner: Nars
    */
    public function login() 
    {
        $this->load->view('login');
    }
    
    public function process_login() 
    {
        $this->load->model('login');
        $result = $this->login->signin($this->input->post('email'), $this->input->post('password'));
        if(count($result) == 0 )
        {
            $this->session->set_flashdata('signin_error', "invalid username or password");
            redirect(base_url()."login");
        }
        else
        {
            $this->session->set_userdata('user', $result);
            foreach($result as $result_){
                if($result_['usertype'] == 'admin')
                {
                    redirect(base_url()."admin");
                }
                else
                {
                    redirect('user');
                }
            }
        }
    }
}