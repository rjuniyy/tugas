<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct()
    {
        parent::__construct();      
        is_logged_in();
        $this->load->model('File_model');
    }

    public function insert_sidang_ta(){
        $this->_rules();
        
        if ($this->form_validation->run() == false) {
            $this->jsidang_ta();
        }else{
            $data = [
                'nama'          => htmlspecialchars($this->input->post('nama')),
                'npm'           => htmlspecialchars($this->input->post('npm')),
                'tanggal'       => date($this->input->post('tanggal')),
                'n_penguji1'    => $this->input->post('namapenguji1'),
                'n_penguji2'    => $this->input->post('namapenguji2'),
                'n_penguji3'    => $this->input->post('namapenguji3'),
                'n_pembimbing1' => $this->input->post('namapembimbing1'),
                'n_pembimbing2' => $this->input->post('namapembimbing2'),
                'jam_awal'      => $this->input->post('jamawal'),
                'jam_akhir'     => $this->input->post('jamakhir'),
                'ruangan'       => $this->input->post('ruangan'),
                'hari'          => $this->input->post('hari')
            ];
            $this->db->insert('tbl_jsidang_ta', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di upload</div>');
            redirect('jadwal/jsidang_ta');
        }
    
    }

    
    public function insert_sidang_skripsi(){
        
        $this->_rules();
        
        if ($this->form_validation->run() == false) {
            $this->jsidang_skripsi();
        }else{
            $data = [
                'nama'          => htmlspecialchars($this->input->post('nama')),
                'npm'           => htmlspecialchars($this->input->post('npm')),
                'tanggal'       => date($this->input->post('tanggal')),
                'n_penguji1'    => $this->input->post('namapenguji1'),
                'n_penguji2'    => $this->input->post('namapenguji2'),
                'n_penguji3'    => $this->input->post('namapenguji3'),
                'n_pembimbing1' => $this->input->post('namapembimbing1'),
                'n_pembimbing2' => $this->input->post('namapembimbing2'),
                'jam_awal'      => $this->input->post('jamawal'),
                'jam_akhir'     => $this->input->post('jamakhir'),
                'ruangan'       => $this->input->post('ruangan'),
                'hari'          => $this->input->post('hari')
            ];
            $this->db->insert('tbl_jsidang_skripsi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di upload</div>');
            redirect('jadwal/jsidang_skripsi');
        }
    
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => '%s harus diisi'
        ));
        $this->form_validation->set_rules('npm', 'NPM', 'required', array(
            'required' => '%s harus diisi'
        ));
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', array(
            'required' => '%s harus diisi'
        ));
        $this->form_validation->set_rules('namapenguji1', 'Nama Penguji 1', 'required', array(
            'required' => '%s harus diisi'
        ));
        $this->form_validation->set_rules('namapenguji2', 'Nama Penguji 2', 'required', array(
            'required' => '%s harus diisi'
        ));
        $this->form_validation->set_rules('jamawal', 'Jam Awal', 'required', array(
            'required' => '%s harus diisi'
        ));
        $this->form_validation->set_rules('jamakhir', 'Jam Akhir', 'required', array(
            'required' => '%s harus diisi'
        ));
        $this->form_validation->set_rules('namapembimbing1', 'Nama Pembimbing 1', 'required', array(
            'required' => '%s harus diisi'
        ));
        $this->form_validation->set_rules('namapembimbing2', 'Nama Pembimbing 2', 'required', array(
            'required' => '%s harus diisi'
        ));
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required', array(
            'required' => '%s harus diisi'                                              
        ));
        $this->form_validation->set_rules('hari', 'Hari', 'required', array(
            'required' => '%s harus diisi'                                              
        ));
    }

    public function jsidang_ta()
    {
        $data['title'] = 'Jadwal Sidang Tugas Akhir (TA)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        $var = $this->session->userdata('name');
        if ($this->session->userdata('role_id') == 1){
            $data['data'] = $this->File_model->get_tbl('tbl_jsidang_ta')->result();
        }elseif($this->session->userdata('role_id') == 2){
            $data['data'] = $this->db->get_where('tbl_jsidang_ta', ['n_penguji1' => $var])->result();
        }
         
        $data['get'] = $this->File_model->get_tbl('tbl_jsidang_ta')->row_array();

        $data['namadosen'] = $this->File_model->getdata();
        $data['ruang'] = $this->File_model->getruang();
        // printf($this->session->userdata('name'));
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jadwal/index', $data);
        $this->load->view('templates/footer');
    }

    public function jsidang_skripsi()
    {
        $data['title'] = 'Jadwal Sidang Skripsi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
 
        $data['data'] = $this->File_model->get_tbl('tbl_jsidang_skripsi')->result();

        $data['namadosen'] = $this->File_model->getdata();
        $data['ruang'] = $this->File_model->getruang();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);   
        $this->load->view('jadwal/index', $data);
        $this->load->view('templates/footer');
    }
    public function view_edit_ta($id){
        $data['title'] = 'Edit Jadwal Sidang TA';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();     
        $data['get'] = $this->db->get_where('tbl_jsidang_ta', ['id' =>$id])->row_array();        
        $data['dosen'] = $this->File_model->getdata();
        $data['ruang'] = $this->File_model->getruang();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jadwal/edit', $data);
        $this->load->view('templates/footer');
    }
    public function view_edit_skripsi($id){
        $data['title'] = 'Edit Jadwal Sidang Skripsi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();     
        $data['get'] = $this->db->get_where('tbl_jsidang_skripsi', ['id' =>$id])->row_array();
        $data['dosen'] = $this->File_model->getdata();
        $data['ruang'] = $this->File_model->getruang();

        
  
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jadwal/edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit_skripsi($id){
    $data['user'] = $this->db->get_where('user', ['n_id' => $this->session->userdata('n_id')]) -> row_array();
    
    $this->form_validation->set_rules('npm', 'NPM', 'required');
        if ($this->form_validation->run() == false) {     
       $this->jsidang_skripsi();
        }else{
        $data = [
            'nama'          => $this->input->post('nama'),
            'npm'           => $this->input->post('npm'),
            'tanggal'       => date($this->input->post('tanggal')),
            'n_penguji1'    => $this->input->post('n_penguji1'),
            'n_penguji2'    => $this->input->post('n_penguji2'),
            'n_penguji3'    => $this->input->post('n_penguji3'),
            'n_pembimbing1' => $this->input->post('n_pembimbing1'),
            'n_pembimbing2' => $this->input->post('n_pembimbing2'),
            'jam_awal'      => $this->input->post('jamawal'),
            'jam_akhir'     => $this->input->post('jamakhir'),
            'ruangan'       => $this->input->post('ruangan'),
            'hari'          => $this->input->post('hari')
        ];

        // print_r($_POST);
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('tbl_jsidang_skripsi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di perbarui</div>');
        redirect('jadwal/jsidang_skripsi');
        }
    }

    public function edit_ta($id){
    $data['user'] = $this->db->get_where('user', ['n_id' => $this->session->userdata('n_id')]) -> row_array();
    
    $this->form_validation->set_rules('npm', 'NPM', 'required');
        if ($this->form_validation->run() == false) {
        $this->jsidang_ta();
        }else{
            $data = [
                'nama'          => htmlspecialchars($this->input->post('nama')),
                'npm'           => htmlspecialchars($this->input->post('npm')),
                'tanggal'       => date($this->input->post('tanggal')),
                'n_penguji1'    => $this->input->post('n_penguji1'),
                'n_penguji2'    => $this->input->post('n_penguji2'),
                'n_penguji3'    => $this->input->post('n_penguji3'),
                'n_pembimbing1' => $this->input->post('n_pembimbing1'),
                'n_pembimbing2' => $this->input->post('n_pembimbing2'),
                'jam_awal'      => $this->input->post('jamawal'),
                'jam_akhir'     => $this->input->post('jamakhir'),
                'ruangan'       => $this->input->post('ruangan'),
                'hari'          => $this->input->post('hari')
            ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('tbl_jsidang_ta', $data);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di perbarui</div>');
        redirect('jadwal/jsidang_ta');
    }
}

public function hapus_jta($id)
{
$where = array ('id' => $id);

$this->File_model->hapus_jta($where, 'tbl_jsidang_ta');
redirect('jadwal/jsidang_ta');
}

public function hapus_jskripsi($id)
{
$where = array ('id' => $id);

$this->File_model->hapus_jskripsi($where, 'tbl_jsidang_skripsi');
redirect('jadwal/jsidang_skripsi');
}

}