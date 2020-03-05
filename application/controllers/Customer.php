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
        $data['content']            = render_view('front_end/pendaftaran', $subdata, true);
        render_view('front_end/konten', $data);
    }

    public function proses_pendaftaran() {
        //untuk validasi ketika required = belum keisi maka nnti akan di peringati
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|max_length[40]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_is_available');
        $this->form_validation->set_rules('id_event', 'Pelatihan', 'required');
        $this->form_validation->set_rules('no_telpon', 'No. HP', 'required|integer|max_length[12]');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kedinasan', 'Kedinasan', 'required');
        $this->form_validation->set_rules('nama_klinik', 'Nama Klinik', 'required');
        $this->form_validation->set_rules('status_kepemilikan', 'Kepemilikan', 'required');
        $this->form_validation->set_rules('usg', 'Merk USG', 'required');
        $this->form_validation->set_rules('status_pelatihan', 'Pernah Pelatihan', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        // $nama_lengkap          = inject($this->input->post('nama_lengkap'));

        if ($this->form_validation->run() == FALSE) {
          // $this->config->set_item('error',render_error("Perhatian!", "Semua harus terisi"));
            $this->session->set_flashdata('message', render_error('Validasi Error!', validation_errors()));
            $this->session->set_flashdata('last_posting', $_POST);
            redirect('customer/pendaftaran');
        }else{

          $id_event               = inject($this->input->post('id_event'));
          $event                  = $this->m_event->get_event_by_id($id_event);
          $tanggal_event          = explode('-',$event['tanggal_event']);
          $tanggal_now            = explode('-',date(Y-m-d));
          $nama_lengkap           = inject($this->input->post('nama_lengkap'));
          $email                  = inject($this->input->post('email'));
          $no_telpon              = inject($this->input->post('no_telpon'));
          $tempat_lahir           = inject($this->input->post('tempat_lahir'));
          $tgl_lahir              = inject($this->input->post('tgl_lahir'));
          $alamat                 = inject($this->input->post('alamat'));
          $kedinasan              = inject($this->input->post('kedinasan'));
          $nama_klinik            = inject($this->input->post('nama_klinik'));
          $status_kepemilikan     = inject($this->input->post('status_kepemilikan'));
          $usg                    = inject($this->input->post('usg'));
          $status_pelatihan       = inject($this->input->post('status_pelatihan'));
          $pendidikan             = inject($this->input->post('pendidikan'));
          $ip                     = $this->input->ip_address();
          if($tanggal_event <= $tanggal_now){
            $this->session->set_flashdata('message', render_error('Peringatan!', 'Pelatihan Sudah Dilaksanakan'));
            $this->session->set_flashdata('last_posting', $_POST);
          redirect('customer/pendaftaran');
          }else{
              $data           = array(
                                  'id_event'            => $id_event,
                                  'nama_lengkap'        => $nama_lengkap,
                                  'email'               => $email,
                                  'no_telpon'           => $no_telpon,
                                  'tgl_lahir'           => $tgl_lahir,
                                  'tempat_lahir'        => $tempat_lahir,
                                  'alamat'              => $alamat,
                                  'kedinasan'           => $kedinasan,
                                  'nama_klinik'         => $nama_klinik,
                                  'status_kepemilikan'  => $status_kepemilikan,
                                  'usg'                 => $usg,
                                  'status_pelatihan'    => $status_pelatihan,
                                  'pendidikan'          => $pendidikan,
                                  'ip_address'          => $ip,
                                  'registrasi_date'     => date('Y-m-d H:i:s'),
                              );

              $this->m_customer->insert_pendaftaran($data);
              $this->session->set_flashdata('message', render_success('Input Berhasil', "Berhasil Mendaftar kegiatan"));
              redirect('customer/pendaftaran/');
            }
          }
    }

      public function email_is_available($str){
        if($this->m_customer->email_is_available($str)!=0){
          $this->form_validation->set_message('email_is_available','Email sudah dipakai');
          return false;
        }else{
          return true;
        }
      }

    public function list_pendaftaran_event($id = "") {
      if(!is_auth()) {redirect('discover/keluar');}
      $id           = inject($id);
      $id_event     = simple_decrypt($id);
      if ($id!= '') {
        $subdata['action']          = site_url('customer/verifikasi_peserta/'.$id);
        $subdata['hasil']           = $this->m_customer->get_peserta_by_id($id_event);
        $subdata['jumlah']          = $this->m_customer->hitung_verifikasi($id_event);
        $subdata['get']             = $this->m_event->get_event_by_id($id_event);
        $subdata['username']        = $this->session->userdata('username');

        $data['title']              = 'Peserta Kegitan';
        $data['meta_title']         = "Peserta Kegitan";
        $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        if(level() == 0){
          $data['content']            = render_view('admin/list_peserta_event', $subdata, true);
          render_view('admin/konten',$data);
        }else if(level() == 1){
          $data['content']            = render_view('staff/list_peserta_event', $subdata, true);
          render_view('staff/konten',$data);
        }
      }

    }

    public function list_pendaftaran_event_done($id = "") {
      if(!is_auth()) {redirect('discover/keluar');}
      $id = inject($id);
      $id_event     = simple_decrypt($id);
      if ($id_event!= '') {
        $subdata['action']          = site_url('customer/verifikasi_peserta/'.$id);
        $subdata['hasil']           = $this->m_customer->get_peserta_done($id_event);
        $subdata['jumlah']           = $this->m_customer->hitung_verifikasi($id_event);
        $subdata['get']             = $this->m_event->get_event_by_id($id_event);
        $subdata['username']        = $this->session->userdata('username');

        $data['title']              = 'Peserta Kegitan yang Telah Dilaksanakan';
        $data['meta_title']         = "Peserta Kegitan yang Telah Dilaksanakan";
        $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['content']            = render_view('staff/list_pendaftar_done', $subdata, true);
        render_view('staff/konten',$data);
      }
    }

    public function detail_peserta($id = "") {
      if(!is_auth()) {redirect('discover/keluar');}
      $id             = inject($id);
      $id_peserta     = simple_decrypt($id);
      $a              = $this->m_customer->get_peserta($id_peserta);
      if ($id_peserta!= '') {
        $subdata['hasil']           = $this->m_customer->get_peserta($id_peserta);
        $subdata['jumlah']           = $this->m_customer->hitung_verifikasi($a['id_event']);

        $data['title']              = 'Detail Peserta';
        $data['meta_title']         = "Detail Peserta";
        $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['content']            = render_view('staff/detail_peserta', $subdata, true);
        render_view('staff/konten', $data);
      // }else {
      //   echo "Tidak ada data pelatihan";
    } else {
      $id_event           = $this->m_customer->get_pelatihan($id_peserta);
      redirect('customer/list_pendaftaran_event/'.simple_encrypt($id_event));
    }
  }

    public function verifikasi_peserta($id = '') {
        if(!is_auth()) {redirect('discover/keluar');}
        $id             = inject($id);
        $id_peserta     = simple_decrypt($id);
        if($id_peserta== ""){ redirect('customer/list_pendaftaran_event/'.$j['id_event']);}

        $profile         = get_profile();

        $j              = $this->m_customer->get_pelatihan($id_peserta);
        $jumlah         = $this->m_customer->hitung_verifikasi($id_event);
        $a = 2;

        if ($id_peserta !='') {
          $data = array(
                      "verifikasi_by"      => $profile['id_user'],
                      "verifikasi_date"    => date('Y-m-d H:i:s'),
                      'verifikasi_status' => 1
          );
          // dumper($data);
            $h = $this->m_customer->verifikasi($data,$id_peserta);
            $this->session->set_flashdata('message', render_success('Berhasil!', 'Data peserta telah diverifikasi.'));
            redirect ('customer/list_pendaftaran_event/'.simple_encrypt($j['id_event']));
        }
        redirect ('customer/list_pendaftaran_event/'.simple_encrypt($j['id_event']));
    }

    public function tidak_verifikasi_peserta($id = '') {
        if(!is_auth()) {redirect('discover/keluar');}
        $id             = inject($id);
        $id_peserta     = simple_decrypt($id);
        if($id_peserta== ""){ redirect('customer/list_pendaftaran_event/'.$j['id_event']);}

        $profile         = get_profile();

        $j              = $this->m_customer->get_pelatihan($id_peserta);
        $jumlah         = $this->m_customer->hitung_verifikasi($id_event);
        $a = 2;

        if ($id_peserta !='') {
          $data = array(
                      "verifikasi_by"      => $profile['id_user'],
                      "verifikasi_date"    => date('Y-m-d H:i:s'),
                      'verifikasi_status' => 2
          );
          // dumper($data);
            $h = $this->m_customer->verifikasi($data,$id_peserta);
            $this->session->set_flashdata('message', render_success('Berhasil!', 'Data peserta tidak diverifikasi.'));
            redirect ('customer/list_pendaftaran_event/'.simple_encrypt($j['id_event']));
        }
        redirect ('customer/list_pendaftaran_event/'.simple_encrypt($j['id_event']));
    }

    public function list_all_pendaftar() {
      if(!is_auth()) {redirect('discover/keluar');}

        $subdata['hasil']           = $this->m_customer->get_all_peserta();
        $subdata['get']             = $this->m_event->get_all_event();
        $subdata['username']        = $this->session->userdata('username');
        $subdata['meta_title']      = "Semua Peserta";

        $data['title']              = 'Semua Peserta';
        // $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        // $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['content']            = render_view('staff/list_all_pendaftar', $subdata, true);
        render_view('staff/konten', $data);
    }

    public function list_all_pendaftar_terverifikasi() {
      if(!is_auth()) {redirect('discover/keluar');}

        $subdata['hasil']           = $this->m_customer->get_all_peserta_verifikasi();
        $subdata['get']             = $this->m_event->get_all_event();
        $subdata['username']        = $this->session->userdata('username');
        $subdata['meta_title']      = "Peserta Sudah Diverifikasi";

        $data['title']              = 'Peserta Sudah Diverifikasi';
        // $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        // $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['content']            = render_view('staff/list_all_pendaftar', $subdata, true);
        render_view('staff/konten', $data);
    }

    public function list_all_pendaftar_belum_diverifikasi() {
      if(!is_auth()) {redirect('discover/keluar');}

        $subdata['hasil']           = $this->m_customer->get_all_peserta_belum_verifikasi();
        $subdata['get']             = $this->m_event->get_all_event();
        $subdata['username']        = $this->session->userdata('username');
        $subdata['meta_title']      = "Peserta Belum Diverifikasi";

        $data['title']              = 'Peserta Tidak Diverifikasi';
        // $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        // $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['content']            = render_view('staff/list_all_pendaftar', $subdata, true);
        render_view('staff/konten', $data);
    }

    public function list_all_pendaftar_tidak_terverifikasi() {
      if(!is_auth()) {redirect('discover/keluar');}

        $subdata['hasil']           = $this->m_customer->get_all_peserta_tidak_verifikasi();
        $subdata['get']             = $this->m_event->get_all_event();
        $subdata['username']        = $this->session->userdata('username');
        $subdata['meta_title']      = "Peserta Tidak Diverifikasi";

        $data['title']              = 'Peserta Tidak Diverifikasi';
        // $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        // $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['content']            = render_view('staff/list_all_pendaftar', $subdata, true);
        render_view('staff/konten', $data);
    }

    public function notif_verifikasi($id=''){
      if(!is_auth()) {redirect('discover/keluar');}

      $id             = inject($id);
      $id_peserta    = simple_decrypt($id);
      $customer       = $this->m_customer->get_peserta($id_peserta);
      $event          = $customer['id_event'];

        // $hasil  = $this->m_customer->get_peserta_by_id($id_event);
        // $get    = $this->m_event->get_event_by_id($id_event);
        if($id != ''){
          $email_name	=('shivatwinandilla@gmail.com');
          $email_from	=('shivatwinandilla@gmail.com');
          $to  		= $customer['email'];
          // dumper($to);
          // dumper($email_name);
          $subject	=('TERVERIFIKASI');
          $content	= ('Selamat! Anda telah memenuhi syarat pendaftaran. Silahkan daftar ulang pada saat registrasi acara dimulai. Terimakasih.');
          // dumper($content);
          //$attach1	= inject($this->input->post('file1'));
          //$attach2	= inject($this->input->post('file2'));
          send_mail($email_name, $email_from, $to, $subject, $content);
          $this->session->set_flashdata('message', '<div class="alert alert-success"style="width:95%"><a class="close"></a><p>Berhasil Mengirim email</p></div>');
          $this->m_customer->update_statusinfo($id_peserta);
          redirect('customer/list_pendaftaran_event/'.simple_encrypt($event));
        }
    }


  }

?>
