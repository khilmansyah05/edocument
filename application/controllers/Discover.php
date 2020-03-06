<?php
Class Discover extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('m_login');
        // $this->load->model('m_event');
        $this->load->model('m_user');
        $this->load->model('m_document');

    }

    //Index() : Untuk Akses Dashboard perlu login terlebih dahulu
    public function index() {
        if(is_auth()) {
            redirect('discover/dashboard');
        }else {
          // redirect('discover/masuk');
          $data['title'] = "Login";
          $data['action'] = site_url('discover/masuk');

          render_view('logins',$data);
          // $this->masuk();
        }
        // $this->masuk();
        // $this->load->view('login');
        // render_view('login');
        // dumper(is_auth());

    }

    //Masuk() : Fungsi Login, Create Session
    public function masuk() {
      $data['title'] = "Login";

        $akun = array(
            'username' => inject($this->input->post('username')),
            'password' => md5(inject($this->input->post('password')))
        );

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('message',render_error("Perhatian!", "Username dan Password tidak boleh kosong"));
            redirect('discover');
        } else {
            $query = $this->m_login->get_user($akun);
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $this->session->set_userdata('pengguna',$row );
                redirect('discover/dashboard');
            }else{
                $this->session->set_flashdata('message',render_error("Perhatian!", "Username / Password yang anda masukkan salah."));
                // $this->config->set_item('error',render_error("Perhatian!", "Username / Password yang anda masukkan salah."));
                redirect('discover');
            }
        }
        render_view('logins',$data);
    }

    //Keluar: Fungsi Logout
    public function keluar(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', render_success('Logout Berhasil', "Anda Berhasil Logout"));
        redirect('discover');
    }

    //Dashboard() : Menampilkan Dashboard Masing Masing User
    public function dashboard() {
        if(!is_auth(array(1,2,3,4))) { redirect('discover/keluar'); }

        // dumper(get_profile());
        $jdl = $this->input->post('judul');
        $dvs = $this->input->post('divisi');

        $dataku = get_profile();
        // $level = level();
        $level = $dataku['level'];

        $subdata['username']      = username();
        if(user_status()==0){
          if ($level == 1){
              $subdata['hasil']     = $this->m_user->get_user_aktif();
              $subdata['dt']        = $this->m_document->getAllDocument($jdl, $dvs);
              $data['title']        ='Selamat Datang '.$dataku['nama'];
              $data['content']      = render_view('coba/dashboard',$subdata,true);
              
              render_view('coba/konten', $data);
          }else if ($level == 2){
              // $subdata['hasil']        = $this->m_event->get_all_event();
			  $subdata['hasil']     = $this->m_user->get_user_aktif();
              $data['title']        = 'Selamat Datang '.$dataku['nama'];
              $data['content']      = render_view('spv/dashboard',$subdata, true);
              render_view('spv/kontens', $data);
          }else if ($level == 3){
            // $subdata['hasil']        = $this->m_event->get_all_event();
			$subdata['hasil']     = $this->m_user->get_user_aktif();
            $data['title']        = 'Selamat Datang '.$dataku['nama'];
            $data['content']      = render_view('staff/dashboard',$subdata, true);
            render_view('staff/kontens', $data);
        }else if ($level == 4){
            // $subdata['hasil']        = $this->m_event->get_all_event();
			$subdata['hasil']     = $this->m_user->get_user_aktif();
            $data['title']        = 'Selamat Datang '.$dataku['nama'];
            $data['content']      = render_view('manager/dashboard',$subdata, true);
            render_view('manager/kontens', $data);
        }
        }
        else {
          redirect('discover/keluar');
        }

        // dumper($subdata);
        $data['meta_title']       = "Dashboard";
        $data['meta_description'] = "Dahsboard Antenatal Care";
        $data['breadcrumb']       = "Antenatal Care~Dashboard";
        // dumper($data);

        //render_view('index', $data);
    }

}
