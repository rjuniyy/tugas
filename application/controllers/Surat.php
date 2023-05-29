<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('File_model');
    }
	
    public function index()
    {
        $data['title'] = 'Surat Survei';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])-> row_array(); 
        if($this->session->userdata('role_id')==1){
            $data['data'] = $this->db->get_where('tbl_file_surat')->result();
        }else{
            $data['data'] = $this->db->get_where('tbl_file_surat', ['n_id' => $this->session->userdata('n_id')])->result();
        }
        $data['get'] = $this->File_model->get_tbl('tbl_file_surat')->row_array();
        $data['check']=$this->db->get_where('tbl_file_surat', ['balasan' => 'empty'])->row_array();

        $data['prodi'] = $this->File_model->get_prodi();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat/index', $data);
        $this->load->view('templates/footer');

    }

   

    public function upload()
    {
        $config['upload_path']          = './uploads/surat/';
        $config['allowed_types']        = 'doc|docx|pdf';
        $config['max_size']             = 2048;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('filename'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('surat/error', $error);
            // $this->session->set_flashdata('error', '<div class="alert alert-success" role="alert"></div>');
        }
        else
        {
            $upload_data = $this->upload->data();
            $data = array(
                'filename'  => $upload_data['file_name'],
                'n_id'  => $this->input->post('npm'),
                'thn'  => $this->input->post('thn'),
                'balasan'  => $this->input->post('balasan'),
                'prodi'  => $this->input->post('prodi'),
                'name'      => $this->session->userdata('name')
            );

            $this->File_model->insert_surat($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di upload</div>');
            redirect('surat');
        }
    }
    public function download($id){
        $fileinfo = $this->File_model->download('tbl_file_surat',$id);
        $file = 'uploads/surat/'.$fileinfo['filename'];
        force_download($file, NULL);
    }
    
    public function hapus($id)
    {
        $fileinfo = $this->File_model->download('tbl_file_surat', $id);
        unlink(FCPATH.'/uploads/balasan/'.$fileinfo['balasan']);         
        $where = array ('id'    => $id);
        $this->File_model->hapus($where, 'tbl_file_surat');
        redirect('surat/index');
        
    }

    public function download_balasan($id){
        $fileinfo = $this->File_model->download('tbl_file_surat',$id);
        $file = 'uploads/balasan/'.$fileinfo['balasan'];
        force_download($file, NULL);    
    }
    

    public function down_survei()
    {
        force_download('./downloads/survei/Formulir Surat Survei Tugas Akhir.docx', NULL);
    }

    public function view_edit($id){
        $data['title'] = 'Edit Data Surat Pengajuan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();     
        $data['data'] = $this->db->get_where('tbl_file_surat', ['id' =>$id])->row_array();
        
        $data['prodi'] = $this->File_model->get_prodi();

  
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat/edit', $data);
        $this->load->view('templates/footer');
    }  

    public function edit($id){
        $data['user'] = $this->db->get_where('user', ['n_id' => $this->session->userdata('n_id')]) -> row_array();
        $data['get'] = $this->db->get_where('tbl_file_surat', ['id' =>$id])->row_array();


        if($this->session->userdata('role_id')==1){
            $config['upload_path']          = './uploads/balasan/';
            $config['allowed_types']        = 'doc|docx|pdf';
            $config['max_size']             = 2048;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('balasan'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('surat/error', $error);
            }
            else
            {
                $upload_data = $this->upload->data('file_name');
                
                $this->db->set('balasan', $upload_data);
                $this->db->where('id', $id);
                $this->db->update('tbl_file_surat');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Balasan telah di upload.</div>');
                redirect('surat');
            }
        }elseif($this->session->userdata('role_id') == 3){
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            if ($this->form_validation->run() == false) {
                $this->index();        
            }else{
                $prodi = $this->input->post('editProdi');         
                $thn = $this->input->post('editThn');            
                // print_r($n_id);
                $upload_file = $_FILES['filename']['name'];

                if($upload_file){
                    $config['allowed_types']    = 'pdf|doc|docx';
                    $config['max_size'] = '4096';
                    $config['upload_path'] = './uploads/surat/';
                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('filename')) {
                        $old_file = $data['get']['filename'];
                        if ($old_file != $old_file ) {
                            unlink(FCPATH.'uploads/surat/'.$old_file);
                        }         
                        $new_file = $this->upload->data('file_name');
                        $this->db->set('filename', $new_file);

                    }else{
                        echo $this->upload->display_errors();
                    }
                }
                $this->db->set('prodi', $prodi);     
                $this->db->set('thn', $thn);               
                $this->db->where('id', $id);
                $this->db->update('tbl_file_surat');
                // print_r($_FILES);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data has been updated!</div>');
                redirect('surat'); 
            }           
        }
    }


        
}