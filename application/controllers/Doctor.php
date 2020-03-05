<?php
Class Doctor extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_users');
    }

    //User_input() :
    public function user_input() {
        if(!is_auth()) {redirect('discover/keluar');}

        $profile                    = get_profile();

        $subdata['action']          = site_url('doctor/user_proses_input');
        $subdata['hasil']           = $this->m_desa->get_all_desa();

        $data['title']              = 'Tambah Pengguna';
        $data['meta_title']         = "Tambah Pengguna";
        $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['content']            = render_view('admin/input_user', $subdata, true);
        render_view('template', $data);
    }

    public function user_proses_input() {
        if(!is_auth()) {redirect('discover/keluar');}

        //untuk validasi ketika required = belum keisi maka nnti akan di peringati
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[35]');
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[25]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|integer|max_length[12]');
        $this->form_validation->set_rules('id_level', 'level', 'required');
        $level          = inject($this->input->post('id_level'));

        if($level == 2){
            $this->form_validation->set_rules('id_desa', 'Desa', 'required');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', render_error('Validasi Error!', validation_errors()));
            redirect('doctor/user_input/');
        }else{
            $nama           = inject($this->input->post('nama'));
            $username       = inject($this->input->post('username'));
            $password       = inject($this->input->post('password'));
            $no_telp        = inject($this->input->post('no_telp'));
            $level          = inject($this->input->post('id_level'));
            $id_desa        = inject($this->input->post('id_desa'));

            $data           = array(
                                'nama'          => $nama,
                                'username'      => $username,
                                'password'      => md5($password),
                                'no_telp'       => $no_telp,
                                'id_level'          => $level
                            );
            if ($id_desa != "") {
                    $data['id_desa']        = $id_desa;
                }

            $this->m_users->insert_user($data);
            $this->session->set_flashdata('message', render_success('Input Berhasil', "Berhasil Menambahkan Data Pengguna"));
            redirect('doctor/user_input/');
        }
    }

    public function user_daftar(){
        if(!is_auth()) {redirect('discover/keluar');}


        $subdata['hasil']       = $this->m_users->get_all_user();
        $subdata['username']    = $this->session->userdata('username');


        $data['title']              = 'Daftar Pengguna';
        $data['meta_title']         = "Daftar Pengguna";
        $data['meta_description']   = "Daftar Pengguna Antenatal Care";
        $data['breadcrumb']         = "Antenatal Care~Pengguna~Daftar";
        $data['content']            = render_view('admin/user', $subdata, true);

        render_view('template', $data);
    }

    public function user_edit($id = ''){
        if(!is_auth()) {redirect('discover/keluar');}

        $id = inject($id);
        if($id == ""){ redirect('doctor/user_daftar');}

        $user_id = simple_decrypt($id); dumper($user_id);
        $user    = $this->m_users->get_user_by_id($user_id);
        if(empty($user)){ redirect('doctor/user_daftar');}

        if ($id != '') {
            $subdata['action']      = site_url('doctor/user_proses_edit/'.$id);
            $subdata['get']         = $user;
            $subdata['desa']        = $this->m_desa->get_all_desa();

            $data['title']              = 'Ubah Data Pengguna';
            $data['meta_title']         = "Ubah Data Pengguna";
            $data['meta_description']   = "Ubah Data Pengguna Antenatal Care";
            $data['breadcrumb']         = "Antenatal Care~Pengguna~Edit";
            $data['content']            =render_view('admin/edit_user', $subdata, true);

            render_view('template',$data);
        } else{
            redirect('doctor/user_daftar');
        }
    }

    public function user_proses_edit($id = ''){
        if(!is_auth()) {redirect('discover/keluar');}

        $id = inject($id);
        if($id == ""){ redirect('doctor/user_daftar');}

        $user_id = simple_decrypt($id); dumper($user_id);
        $user    = $this->m_users->get_user_by_id($user_id);
        if(empty($user)){ redirect('doctor/user_daftar');}
        //dumper($user);
        if ($id != '') {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('no_telp', 'No Telepon', 'required');
            $this->form_validation->set_rules('id_level', 'Hak Akses', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', render_error('Validasi Error', validation_errors()));
                redirect('doctor/user_edit/'.$id);
            } else {
                $nama           = inject($this->input->post('nama'));
                $username       = inject($this->input->post('username'));
                $password       = inject($this->input->post('password'));
                $no_telp        = inject($this->input->post('no_telp'));
                $data           = array(
                                'nama'          => $nama,
                                'username'      => $username,
                                'no_telp'       => $no_telp
                );

                if ($password != "") {
                    $data['password']       = md5($password);
                }

                $this->m_users->update_user($data, $user_id);
                $this->session->set_flashdata('message', render_success('Berhasil!', 'Data pengguna telah diubah.'));
                redirect('doctor/user_edit/'.$id);
            }
        } else{

            redirect('doctor/user_daftar');
        }
    }

    public function user_delete($id = '') {
        if(!is_auth()) {redirect('discover/keluar');}

        $id = inject($id);
        if($id == ""){ redirect('doctor/user_daftar');}

        $user_id = simple_decrypt($id); //dumper($user_id);
        $user    = $this->m_users->get_user_by_id($user_id);
        if(empty($user)){ redirect('doctor/user_daftar');}


        if ($id !='') {
            $this->m_users->delete_user($user_id);

             $this->session->set_flashdata('message', render_success('Berhasil!', 'Data pengguna telah dihapus.'));
            redirect ('doctor/user_daftar');
        }else {
            redirect ('doctor/user_daftar');
        }
    }

}
