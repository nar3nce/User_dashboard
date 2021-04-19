<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {

    function __construct()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div>','</div>');
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
        register user functions
        Owner: Nars
    */
    function validate_register($email) 
    {
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

    function register_user($user)
    {
        $query = "SELECT * FROM users";
        $count = $this->db->query($query)->result_array();
        if($count == null)
        {
            $query = "INSERT INTO Users (email, fullname, password, created_at, usertype) VALUES (?,?,?,?,?)";
            $values = array(
            $this->security->xss_clean($user['email']), 
            $this->security->xss_clean($user['fullname']), 
            md5($this->security->xss_clean($user["password"])),
            date('y-m-d h:i:s A'),
            'admin'
            );
            return $this->db->query($query, $values);
        }
        else
        {
            {
                $query = "INSERT INTO Users (email, fullname, password, created_at, usertype) VALUES (?,?,?,?,?)";
                $values = array(
                $this->security->xss_clean($user['email']), 
                $this->security->xss_clean($user['fullname']), 
                md5($this->security->xss_clean($user["password"])),
                date('y-m-d h:i:s A'),
                'normal'
                );
                return $this->db->query($query, $values);
            }
        }
        var_dump($count);
    }


    /*  
        Sign in
        Owner: Nars
    */
    function signin($email, $password)
    {
        $pw = md5($this->security->xss_clean($password));
        $query = "SELECT * FROM users WHERE email = ? and password = ?";
        return $this->db->query($query, array($this->security->xss_clean($email), $this->security->xss_clean($pw)))->result_array();
    }
    
}

?>