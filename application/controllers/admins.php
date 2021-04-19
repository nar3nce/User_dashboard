<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class admins extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin');
        $this->check_usertype();
    }
    
    public function index() 
    {
        $users = $this->admin->select_users();
        $this->load->view('admin/index', array('users' => $users));
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('../');
    }

    /*  
        function to check the usertype. Only Admin can access
        Owner: Nars
    */
    public function check_usertype()
    {
        if($usertype = $this->session->userdata('user'))
        {
            foreach($usertype as $usertype_){
                if($usertype_['usertype'] != 'admin')
                {
                    echo"Only Admin can access This account";
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
        add user functions
        Owner: Nars
    */
    public function add_user()
    {
        $this->check_usertype();
        $this->load->view('admin/admin_add_user');
    }

    public function process_add_user() 
    {
        $reg = $this->admin->validate_add_user($this->input->post('email'));
        if($reg != null)
        {
            $this->session->set_flashdata('register_error', $reg);
            redirect(base_url()."admin/add_user");
        }
        else
        {
            $form_data = $this->input->post();
            $this->admin->add_user($form_data);
            redirect(base_url()."admin");
        }
    }

    /*  
        Edit user functions
        Owner: Nars
    */
    function edit_user($user)
    {
        $info = $this->admin->select_user_by_id($user);
        $this->load->view('admin/admin_edit_user', array('info' => $info));
    }

    public function process_edit_user() 
    {
        $form_data = $this->input->post();
        if($this->input->post('edit_user'))
        { 
            $reg = $this->admin->validate_edit_user();
            if($reg != null)
            {
                $this->session->set_flashdata('register_error', $reg);
                redirect(base_url()."admin/edit_user/".$form_data['id']);
            }
            else
            {
                $this->admin->edit_user($form_data);
                redirect(base_url()."admin");
            }
        }
        if($this->input->post('change_password'))
        {
            $reg = $this->admin->validate_edit_user_password();
            if($reg != null)
            {
                $this->session->set_flashdata('register_error', $reg);
                redirect(base_url()."admin/edit_user/".$form_data['id']);
            }
            else
            {
                $this->admin->edit_user_password($form_data);
                redirect(base_url()."admin");
            }
        }
    }


    /*  
        delete user functions
        Owner: Nars
    */
    function edit_profile()
    {
        $this->load->view('admin/admin_edit_profile');
    }

    function process_delete_user($user)
    {
        $this->admin->delete_user_by_id($user);
        redirect(base_url()."admin");
    }

}
