<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {


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
        delete user 
        Owner: Nars
    */
    function delete_user_by_id($id)
    { 
        $query = "DELETE FROM `users` WHERE `users`.`id` = ?";
        return $this->db->query($query, $id);
    }


    /*  
        Add user functions. validate first then add
        Owner: Nars
    */
    function validate_add_user($email) 
    {
        $this->form_validation->set_rules('usertype', 'Usertype', 'trim|required');
        $this->form_validation->set_rules('fullname', 'Full name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else if($this->is_email_exist($email)) {
            return "Email already exist. Please input different email";
        }
    }

    function add_user($user)
    {
        $query = "INSERT INTO Users (email, fullname, password, created_at, usertype) VALUES (?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($user['email']), 
            $this->security->xss_clean($user['fullname']), 
            md5($this->security->xss_clean($user["password"])),
            date('y-m-d h:i:s A'),
            $this->security->xss_clean($user['usertype'])
        );
        
        return $this->db->query($query, $values);
    }

    /*  
        edit user functions. validate first then edit
        Owner: Nars
    */
    function validate_edit_user() 
    {
        $this->form_validation->set_rules('fullname', 'Full name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('usertype', 'Usertype', 'trim|required');
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
    }

    function edit_user($user)
    {
        $query = "UPDATE `users` SET `email` = ?, `fullname` = ?, `usertype` = ? WHERE `users`.`id` = ?";
        $values = array(
            $this->security->xss_clean($user['email']), 
            $this->security->xss_clean($user['fullname']), 
            $this->security->xss_clean($user['usertype']),
            $this->security->xss_clean($user['id'])
        );
        return $this->db->query($query, $values);
        
    }


    /*  
        changing the password. validate then change
        Owner: Nars
    */
    function validate_edit_user_password() 
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
    }

    function edit_user_password($user)
    {
        $query = "UPDATE `users` SET `password` = ? WHERE `users`.`id` = ?";
        $values = array(
            md5($this->security->xss_clean($user["password"])),
            $this->security->xss_clean($user['id'])
        );
        return $this->db->query($query, $values);
        
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
}

?>