<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bap extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('File_model');
    }

	public function index()
    {
        $data['title'] = 'BAP';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')] 
        ) -> row_array();
        // $data['data'] = $this->File_model->get_tbl('tbl_file_bap')->result();
        $data['prodi'] = $this->File_model->get_prodi();
        $data['fakultas'] = $this->File_model->get_fakultas();
        if ($this->session->userdata('role_id') == 1) {
            $data['data'] = $this->File_model->get_bap_admin();
        }else{
            $data['data'] = $this->File_model->get_bap();
        }; 
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bap/index', $data);
        $this->load->view('templates/footer');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('matkul', 'Mata Kuliah', 'required', array(
            'required' => '%s harus diisi'
        ));
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required', array(
            'required' => '%s harus diisi'
        ));
    }

    

    public function upload()
    {
        $this->_rules();
        $config['upload_path']          = './uploads/bap/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['max_size']             = 2048;
        // $config['max_width']         = 1024;
        // $config['max_height']        = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('filename'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('bap/gagal', $error);
        }
        else
        {
            $upload_data = $this->upload->data();
            $data = array(
                'filename'  => $upload_data['file_name'],
                'n_id'      => $this->session->userdata('n_id'),
                'name'      => $this->session->userdata('name'),
                'prodi'      => $this->input->post('prodi'),
                'matauji'      => $this->input->post('matauji'),
                'thn'   => $this->input->post('thn')      
            );
            
            $this->File_model->insert_bap($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di upload</div>');
            redirect('bap');
        }
    }
    public function hapus($id)
    {
        $fileinfo = $this->File_model->download('tbl_file_bap', $id);
        unlink(FCPATH.'/uploads/bap/'.$fileinfo['filename']);
              
        $where = array ('id'    => $id);
        $this->File_model->hapus($where, 'tbl_file_bap');
        // print_r($fileinfo);
        redirect('bap/index');
    }

    public function download($id){
        $fileinfo = $this->File_model->download('tbl_file_bap',$id);
        $file = 'uploads/bap/'.$fileinfo['filename'];
        force_download($file, NULL);
    }
    
    public function view_edit($id){
        $data['title'] = 'Edit Data BAP UAS';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();     
        $data['get'] = $this->db->get_where('tbl_file_bap', ['id' =>$id])->row_array();
        $data['prodi'] = $this->File_model->get_prodi();
        $data['fakultas'] = $this->File_model->get_fakultas();
  
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bap/edit', $data);
        $this->load->view('templates/footer');
    }  

    public function edit($id){
        $data['user'] = $this->db->get_where('user', ['n_id' => $this->session->userdata('n_id')]) -> row_array();
        $data['get'] = $this->db->get_where('tbl_file_bap', ['id' =>$id])->row_array();

        $data['data'] = $this->File_model->get_bap_admin();


        $this->form_validation->set_rules('editMatauji', 'Mata Uji', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bap/index', $data);
            $this->load->view('templates/footer');         
        }else{
            $prodi = $this->input->post('editProdi');
            $matauji = $this->input->post('editMatauji');            
            $thn = $this->input->post('editThn');            
            // print_r($n_id);
            $upload_file = $_FILES['filename']['name'];

            if($upload_file){
                $config['allowed_types']    = 'pdf|doc|docx';
                $config['max_size'] = '1024';
                $config['upload_path'] = './uploads/bap/';
                $this->load->library('upload', $config);

               if ($this->upload->do_upload('filename')) {
                $old_file = $data['get']['filename'];
                if ($old_file = $old_file ) {
                    unlink(FCPATH.'uploads/bap/'.$old_file);
                }         
                   $new_file = $this->upload->data('file_name');
                   $this->db->set('filename', $new_file);

               }else{
                   echo $this->upload->display_errors();
               }
            }
            $this->db->set('prodi', $prodi);
            $this->db->set('matauji', $matauji);        
            $this->db->set('thn', $thn);        
            $this->db->where('id', $id);
            $this->db->update('tbl_file_bap');
            // print_r($_FILES);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data has been updated!</div>');
            redirect('bap');            
        }
    }

    public function down_temp()
    {
        force_download('./downloads/bap/BAP Template.docx', NULL); 
    }
}