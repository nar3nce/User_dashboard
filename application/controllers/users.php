<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Users extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->check_usertype();
    }

    public function index() 
    {
        $users = $this->user->select_users();
        $this->load->view('user/index', array('users' => $users));
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('../');
    }

    /*  
        function to check the usertype. Admin , normal or not yet log in
        Owner: Nars
    */
    public function check_usertype()
    {
        if($usertype = $this->session->userdata('user'))
        {
            foreach($usertype as $usertype_){
                if($usertype_['usertype'] != 'normal')
                {
                    echo"Only Users can access This account";
                    exit();
                }
            }
        }
        else
        {
            echo "not logged in";
            exit();
        }
        
    }
    

    /*  
        edit profile functions
        Owner: Nars
    */
    public function edit_profile() 
    {
        $users = $this->session->userdata('user');
        $this->load->view('user/edit_profile', array('users' => $users));
    }

    public function process_edit_profile() 
    {
        $form_data = $this->input->post();
        if($this->input->post('change_info'))
        { 
            $reg = $this->user->validate_edit_profile();
            if($reg != null)
            {
                $this->session->set_flashdata('register_error', $reg);
                redirect(base_url()."user/edit_profile");
            }
            else
            {
                $this->user->edit_profile($form_data);
                redirect(base_url()."user");
            }
        }
        if($this->input->post('change_password'))
        {
            $reg = $this->user->validate_edit_profile_password();
            if($reg != null)
            {
                $this->session->set_flashdata('register_error', $reg);
                redirect(base_url()."user/edit_profile");
            }
            else
            {
                $this->user->edit_profile_password($form_data);
                redirect(base_url()."user");
            }
        }
    }
}