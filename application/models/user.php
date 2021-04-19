<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {


    function __construct()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div>','</div>');
    }
    
    /*  
        Select Functions
        Owner: Nars
    */
    function select_users()
    { 
        $query = "SELECT * FROM Users order by id desc";
        return $this->db->query($query)->result_array();
    }

    function select_user_by_id($id)
    { 
        $query = "SELECT * FROM Users WHERE id = ?";
        return $this->db->query($query, $this->security->xss_clean($id))->row_array();
    }
    

    /*  
        check if the email os already exist
        Owner: Nars
    */
    function is_email_exist($email)
    { 
        $query = "SELECT * FROM Users WHERE email=?";
        return $this->db->query($query, $this->security->xss_clean($email))->result_array();
    }
    
    
    
    /*  
        validate User profile then update user profile
        Owner: Nars
    */
    function validate_edit_profile() 
    {
        $this->form_validation->set_rules('fullname', 'Full name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
    }
    
    function edit_profile($user)
    {
        $query = "UPDATE `users` SET `email` = ?, `fullname` = ? WHERE `users`.`id` = ?";
        $values = array(
            $this->security->xss_clean($user['email']), 
            $this->security->xss_clean($user['fullname']), 
            $this->security->xss_clean($user['id'])
        );
        return $this->db->query($query, $values);
    }


    /*  
        validate User Password then update user password
        Owner: Nars
    */
    function validate_edit_profile_password() 
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
    }

    function edit_profile_password($user)
    {
        $query = "UPDATE `users` SET `password` = ? WHERE `users`.`id` = ?";
        $values = array(
            md5($this->security->xss_clean($user["password"])),
            $this->security->xss_clean($user['id'])
        );
        return $this->db->query($query, $values);
        
    }
}

?>