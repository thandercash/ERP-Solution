<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_login
 *
 * @author T	thandercash
 */
class Admin_login extends CI_Controller{
   


    public function index(){
        $data=array();
        $data['title']= 'admin login';
        $this->load->view('admin_login',$data);
    }
    
    
    public function login(){
        $data=array();
        $email=$this->input->post('email');
        $pass=md5($this->input->post('pass'));
        
        $result=$this->user_model->check_login($email,$pass);
        if($result==TRUE){
            $sdata=array();

            $sdata['id']= $result->user_id;
            $sdata['type']= $result->user_status;
            $sdata['message'] = 'You are successfully login!';
            $this->session->set_userdata($sdata);
            redirect('super_admin');
       
        }
        
        else {
            $sdata['message'] = 'The email address or password that you entered is not valid !';
            $this->session->set_userdata($sdata);
            redirect('admin_login');
        }        
    }
}
