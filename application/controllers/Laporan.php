<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('File_model');
    }

	public function index()
    {
        $data['title'] = 'Upload Laporan Nilai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')] 
        ) -> row_array();
        $data['data'] = $this->File_model->get_tbl('tbl_file_laporan')->result();
        $data['prodi'] = $this->File_model->get_prodi();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    

    public function upload()
    {
        $config['upload_path']          = './uploads/laporan/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['max_size']             = 2048;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('filename'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('laporan/error', $error);
        }
        else
        {
            $upload_data = $this->upload->data();
            $data = array(
                'filename'  => $upload_data['file_name'],
                'n_id'      => $this->session->userdata('n_id'),
                'matkul'    => $this->input->post('matkul'),
                'thn'    => $this->input->post('thn'),
                'prodi'     => $this->input->post('prodi'),
                'name'      => $this->session->userdata('name')      
            );
            
            $this->File_model->insert_laporan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di upload</div>');
            redirect('laporan');
        }
    }
    public function hapus($id)
    {
        $fileinfo = $this->File_model->download('tbl_file_laporan', $id);
        unlink(FCPATH.'/uploads/laporan/'.$fileinfo['filename']);
              
        $where = array ('id'    => $id);
        $this->File_model->hapus($where, 'tbl_file_laporan');
        // print_r($fileinfo);
        redirect('laporan/index');
    }

    public function download($id){
        $fileinfo = $this->File_model->download('tbl_file_laporan',$id);
        $file = 'uploads/laporan/'.$fileinfo['filename'];
        force_download($file, NULL);
    }
    
    public function view_edit($id){
        $data['title'] = 'Edit Data Laporan Nilai Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();     
        $data['get'] = $this->db->get_where('tbl_file_laporan', ['id' =>$id])->row_array();
        $data['prodi'] = $this->File_model->get_prodi();

  
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/edit', $data);
        $this->load->view('templates/footer');
    }  

    public function edit($id){
        $data['user'] = $this->db->get_where('user', ['n_id' => $this->session->userdata('n_id')]) -> row_array();
        $data['get'] = $this->db->get_where('tbl_file_laporan', ['id' =>$id])->row_array();

        $data['data'] = $this->File_model->get_lap();


        $this->form_validation->set_rules('editMatkul', 'Mata Kuliah', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/index', $data);
            $this->load->view('templates/footer');         
        }else{
            $prodi = $this->input->post('editProdi');
            $matkul = $this->input->post('editMatkul');            
            $thn = $this->input->post('editThn');            
            // print_r($n_id);
            $upload_file = $_FILES['filename']['name'];

            if($upload_file){
                $config['allowed_types']    = 'pdf|doc|docx';
                $config['max_size'] = '1024';
                $config['upload_path'] = './uploads/laporan/';
                $this->load->library('upload', $config);

               if ($this->upload->do_upload('filename')) {
                $old_file = $data['get']['filename'];
                if ($old_file = $old_file ) {
                    unlink(FCPATH.'uploads/laporan/'.$old_file);
                }         
                   $new_file = $this->upload->data('file_name');
                   $this->db->set('filename', $new_file);

               }else{
                   echo $this->upload->display_errors();
               }
            }
            $this->db->set('prodi', $prodi);
            $this->db->set('matkul', $matkul);        
            $this->db->set('thn', $thn);        
            $this->db->where('id', $id);
            $this->db->update('tbl_file_laporan');
            // print_r($_FILES);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data has been updated!</div>');
            redirect('laporan');            
        }
    }
}