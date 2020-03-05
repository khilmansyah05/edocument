<?php

Class Customer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_customer');
        $this->load->model('m_event');
    }

    public function pendaftaran() {

        $subdata['action']          = site_url('customer/proses_pendaftaran');
        $subdata['hasil']           = $this->m_event->get_all_event();

        $data['title']              = 'Registrasi Pendaftaran';
        $data['meta_title']         = "Registrasi Pendaftaran";
        $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['content']            = render_view('front_end/konten', $subdata, true);
        render_view('front_end/pendaftaran', $data);
    }

    public function proses_pendaftaran() {

        //untuk validasi ketika required = belum keisi maka nnti akan di peringati
        $this->form_validation->set_rules('nama_lengkap', 'name', 'required|max_length[40]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_email_is_available');
        $this->form_validation->set_rules('id_event', 'Pelatihan', 'required');
        $this->form_validation->set_rules('no_telpon', 'Phone Number', 'required|integer|max_length[12]');
        // $nama_lengkap          = inject($this->input->post('nama_lengkap'));

        if ($this->form_validation->run() == FALSE) {
          // $this->config->set_item('error',render_error("Perhatian!", "Semua harus terisi"));
            $this->session->set_flashdata('message', render_error('Validasi Error!', validation_errors()));
            redirect('customer/pendaftaran');
        }else{

          $id_event               = inject($this->input->post('id_event'));
          $nama_lengkap           = inject($this->input->post('nama_lengkap'));
          $email                  = inject($this->input->post('email'));
          $no_telpon              = inject($this->input->post('no_telpon'));
          $today                  = date('Y-m-d H:i:s');
          $file                   = inject($this->input->post('file'));
          $verifikasi_status      = 0;

          $config['upload_path']    = './uploads/pendaftaran';
          $config['allowed_types']  = 'pdf';
          $config['max_size']       = 2048;
          $config['overwrite']      = false;
          $config['encrypt_name']   = true;
          // $config['file_name'] = $_FILES['picture']['name'];
          // $config['remove_spaces']    = true;
          $path                       = $config['upload_path'];
          $this->load->library('upload', $config);
          // $this->upload->initialize($config);

          if ($this->upload->do_upload('file')) {
            $uploadData = $this->upload->data();
            $file = $uploadData['file_name'];
            } else {
              $this->session->set_flashdata('message', render_error('Peringatan!', 'Gagal mengupload file'));
              // set_last_input();
              redirect('event/event_input');
            }
            $data           = array(
                                'id_event'            => $id_event,
                                'nama_lengkap'        => $nama_lengkap,
                                'email'               => $email,
                                'no_telpon'           => $no_telpon,
                                'file'                => $file,
                                'registrasi_date'     => $today,
                                'verifikasi_status'   => $verifikasi_status
                            );

            $this->m_customer->insert_pendaftaran($data);
            $this->session->set_flashdata('message', render_success('Input Berhasil', "Berhasil Mendaftar kegiatan"));
            redirect('customer/pendaftaran/');
        }
        // render_view('admin/input_user');
        // render_view('user/user_input');
    }

    public function email_is_available($str){
      if($this->m_customer->email_is_available($str)!=0){
        $this->form_validation->set_message('email_is_available','Email sudah dipakai');
        return false;
      }else{
        return true;
      }
    }

    public function list_pendaftaran_event($id_event = "") {
      if(!is_auth()) {redirect('discover/keluar');}

      if ($id_event!= '') {
        $subdata['action']          = site_url('customer/verifikasi_peserta/'.$id_event);
        $subdata['hasil']           = $this->m_customer->get_peserta_by_id($id_event);
        $subdata['get']             = $this->m_event->get_event_by_id($id_event);
        $subdata['username']        = $this->session->userdata('username');

        $data['title']              = 'Peserta Kegitan';
        $data['meta_title']         = "Peserta Kegitan";
        $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['content']            = render_view('staff/konten', $subdata, true);
        render_view('staff/list_peserta_event', $data);
      // }else {
      //   echo "Tidak ada data pelatihan";
      }
    }

    public function detail_peserta($id_peserta = "") {
      if(!is_auth()) {redirect('discover/keluar');}

      if ($id_peserta!= '') {
        // $subdata['action']          = site_url('customer/verifikasi_peserta/'.$id_event);
        $subdata['hasil']           = $this->m_customer->get_peserta($id_peserta);
        $subdata['username']        = $this->session->userdata('username');

        $data['title']              = 'Detail Peserta';
        $data['meta_title']         = "Detail Peserta";
        $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['content']            = render_view('staff/konten', $subdata, true);
        render_view('staff/detail_peserta', $data);
      // }else {
      //   echo "Tidak ada data pelatihan";
      }
    }

    public function verifikasi_peserta($id_peserta = '') {
        if(!is_auth()) {redirect('discover/keluar');}

        $id_peserta = inject($id_peserta);
        if($id_peserta == ""){ redirect('customer/list_pendaftaran_event/'.$id_event);}

        $today               = date('Y-m-d H:i:s');

        $profile               = get_profile();

        if ($id_peserta !='') {
          $data = array(
                      "verifikasi_by"      => $profile['id_user'],
                      "verifikasi_date"    => $today,
                      'verifikasi_status' => 1
          );
          // dumper($data);
            $this->m_customer->verifikasi($data,$id_peserta);
             $this->session->set_flashdata('message', render_success('Berhasil!', 'Data Event telah dihapus.'));
            redirect ('customer/list_pendaftaran_event/'.$id_event);
        // }else {
        //     redirect ('customer/list_pendaftaran_event');
        // hubungi ke list pendaftar awal
        }
        redirect ('customer/list_pendaftaran_event/'.$id_event);
    }

    public function notif_verifikasi(){
      if(!is_auth()) {redirect('discover/keluar');}

      $subdata['action']	       	= site_url('customer/notif_proses_verifikasi/');
      $subdata['hasil']           = $this->m_customer->get_peserta_by_id($id_event);
      $subdata['get']             = $this->m_event->get_event_by_id($id_event);

      $data['title']              = 'Kirim Notifikasi Verifikasi';
      $data['meta_title']         = "Kirim Notifikasi Verifikasi";
      $data['meta_description']   = "Tambah Pengguna Antenatal Care";
      $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
      $data['content']            = render_view('admin/konten', $subdata, true);
      render_view('admin/verifikasi', $data);
    }

    public function notif_proses_verifikasi(){
      $this->form_validation->set_rules('judul', 'judul', 'required');
      $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');

      if ($this->form_validation->run() == FALSE) {
          $this->session->set_flashdata('message', render_error('Validasi Error!', validation_errors()));
          redirect('customer/notif_verifikasi');
      }else {

      $this->load->library('email');

        $emailConfig['protocol'] = 'smtp';
        $emailConfig['mailtype'] = 'html';
        $emailConfig['smtp_port'] = '465';
        $emailConfig['smtp_user'] = 'sanjiwani.com';
        $emailConfig['smtp_pass'] = '6iWqzA2V4E~[';
        $this->email->initialize($emailConfig);

        $this->email->from('no-reply@sanjiwani.com', 'Sanjiwani');

        $hasil  = $this->m_customer->get_peserta_by_id($id_event);
        $get    = $this->m_event->get_event_by_id($id_event);
        for($i=0; $i<count($hasil); $i++){
           				 $h = $hasil[$i];
           				 $this->email->from('admin@sanjiwanialkes.com', 'Sanjiwanialkes.com');
        				   $this->email->subject('Verifikasi Pendaftaran');
        				   $this->email->message('Selamat! Anda....');
           				 $this->email->to($h['email']);
                   $this->email->send();
                 }
    }

  }
}

?>
