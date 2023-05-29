<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();      
        is_logged_in();
        $this->load->model('File_model');
    }
    public function index(){
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $data['selamat']    = 'Selamat datang ' .$this->session->userdata('name');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');

        $this->session->set_flashdata('message', 'Selamat datang '  .$this->session->userdata('name'));
        
    }

    public function edit(){
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required');

        if($this->form_validation->run()==false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');    
        }else{
            $name = $this->input->post('name');
            $n_id = $this->input->post('n_id');
            $email = $this->input->post('email');

            $upload_image = $_FILES['image']['name'];

            if($upload_image){
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

               if ($this->upload->do_upload('image')) {
                $old_image=$data['user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH.'assets/img/profile/'.$old_image);
                }       
                   $new_image = $this->upload->data('file_name');
                   $this->db->set('image', $new_image);

               }else{
                   echo $this->upload->display_errors();
               }

            }
            

            $this->db->set('name', $name);
            $this->db->set('n_id', $n_id);
            $this->db->set('editable', 0);
            $this->db->where('email', $email);
            $this->db->update('user');

            // print_r($_FILES);
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
       
        
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

        $this->form_validation->set_rules('current', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newpassword1', 'New Password', 'required|trim|min_length[3]|matches[newpassword2]');
        $this->form_validation->set_rules('newpassword2', 'Confirm password', 'required|trim|min_length[3]|matches[newpassword2]');

        if ($this->form_validation->run()==false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer'); 
        }else{
            $current = $this->input->post('current');
            $newpassword = $this->input->post('newpassword1');
            if (!password_verify($current, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            }else{
                if ($newpassword == $current) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be old password</div>');
                    redirect('user/changepassword');
                }else{
                    $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your change password has been succesful.</div>');
                    redirect('user');
                }
            }
        }
    }

    
}