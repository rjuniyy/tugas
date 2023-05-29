<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('File_model');
    }

	public function index()
    {
        $data['title'] = 'Upload Soal UAS';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')] 
        ) -> row_array();
        $data['soal'] = $this->File_model->get_tbl('tbl_file_soal')->result();
        $data['get'] = $this->File_model->get_tbl('tbl_file_soal')->row_array();
        // $data['get'] = $this->db->get_where('tbl_file_soal', ['n_id' => $id]) -> row_array();
        $data['prodi'] = $this->File_model->get_prodi();
        $data['fakultas'] = $this->File_model->get_fakultas();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('soal/index', $data);
        $this->load->view('templates/footer');
    }
    

    public function upload()
    {
        $config['upload_path']          = './uploads/soal/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['max_size']             = 2048;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('filename'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('soal/error', $error);
        }
        else
        {
            $upload_data = $this->upload->data();
            $data = array(
                'filename'  => $upload_data['file_name'],
                'n_id'      => $this->session->userdata('n_id'),
                'matkul'    => $this->input->post('matkul'),
                'fakultas'    => $this->input->post('fakultas'),
                'prodi'    => $this->input->post('prodi'),
                'thn'    => $this->input->post('thn'),
                'name'      => $this->session->userdata('name')                
            );

            // print_r($data);
            
            $this->File_model->insert_soal($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di upload</div>');
            redirect('soal');
        }
    }

    public function hapus($id)
    {
        // $data['get'] =  $this->db->get_where('tbl_file_soal', ['id' => $id])->result();
        $fileinfo = $this->File_model->download('tbl_file_soal', $id);
        unlink(FCPATH.'/uploads/soal/'.$fileinfo['filename']);
              
        $where = array ('id'    => $id);
        $this->File_model->hapus($where, 'tbl_file_soal');
        // print_r($fileinfo);
        redirect('soal/index');
    }

    public function download($id){
        $fileinfo = $this->File_model->download('tbl_file_soal', $id);
        $file = 'uploads/soal/'.$fileinfo['filename'];
        force_download($file, NULL);
    }

    public function edit($id){
        $data['user'] = $this->db->get_where('user', ['n_id' => $this->session->userdata('n_id')]) -> row_array();
        $data['get'] = $this->db->get_where('tbl_file_soal', ['id' =>$id])->row_array();
        $this->form_validation->set_rules('editMatkul', 'Mata Kuliah', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('soal/index', $data);
            $this->load->view('templates/footer');         
        }else{
            $fakultas = $this->input->post('editFakultas');
            $prodi = $this->input->post('editProdi');
            $matkul = $this->input->post('editMatkul');            
            $thn = $this->input->post('editThn');            
            // print_r($n_id);
            $upload_file = $_FILES['filename']['name'];

            if($upload_file){
                $config['allowed_types']    = 'pdf|doc|docx';
                $config['max_size'] = '1024';
                $config['upload_path'] = './uploads/soal/';
                $this->load->library('upload', $config);

               if ($this->upload->do_upload('filename')) {
                $old_file = $data['get']['filename'];
                if ($old_file != $old_file ) {
                    unlink(FCPATH.'uploads/soal/'.$old_file);
                }         
                   $new_file = $this->upload->data('file_name');
                   $this->db->set('filename', $new_file);

               }else{
                   echo $this->upload->display_errors();
               }
            }
            $this->db->set('fakultas', $fakultas);
            $this->db->set('prodi', $prodi);
            $this->db->set('matkul', $matkul);        
            $this->db->set('thn', $thn);        
            $this->db->where('id', $id);
            $this->db->update('tbl_file_soal');
            // print_r($_FILES);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data has been updated!</div>');
            redirect('soal');          
        }
    }
    
    public function view_edit($id){
        $data['title'] = 'Upload Soal UAS';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $data['get'] = $this->db->get_where('tbl_file_soal', ['id' =>$id])->row_array();
        $data['prodi'] = $this->File_model->get_prodi();
        $data['fakultas'] = $this->File_model->get_fakultas();
  
        // $this->form_validation->set_rules('editMatkul','Mata Kuliah', 'required');
        // $this->form_validation->set_rules('editFakultas','Fakultas', 'required');
        // $this->form_validation->set_rules('editProdi','Program Studi', 'required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('soal/edit', $data);
        $this->load->view('templates/footer');
    }  

} 