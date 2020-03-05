<?php
Class Event extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_event');
        $this->load->model('m_customer');
        $this->load->helper(array('url'));
    }

    //Fungsi untuk Menambahkan kegiatan
    public function event_input() {
        if(!is_auth()) {redirect('discover/keluar');}

        $profile                    = get_profile();

        $subdata['action']          = site_url('event/event_proses_input');
        // $subdata['hasil']           = $this->m_desa->get_all_desa();
        $data['title']              = 'Tambah Event';
        $data['meta_title']         = "Tambah Event";
        $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['content']            = render_view('staff/input_event', $subdata, true);
        render_view('staff/konten', $data);
    }

    public function event_proses_input() {
        if(!is_auth()) {redirect('discover/keluar');}

        $profile = get_profile();
        $today               = date('Y-m-d H:i:s');

        //untuk validasi ketika required = belum keisi maka nnti akan di peringati
        $this->form_validation->set_rules('nama_event', 'Name of Event', 'required|max_length[40]');
        $this->form_validation->set_rules('deskripsi', 'Description', 'trim|required');
        $this->form_validation->set_rules('tanggal_event', 'Date of event', 'required');
        $event_status          = inject($this->input->post('event_status'));
        $tanggal_event         = inject($this->input->post('tanggal_event'));
        $waktu_sekarang        = strtotime($today);
        $tanggal_eventBaru     = strtotime($tanggal_event)-$waktu_sekarang;

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', render_error('Validasi Error!', validation_errors()));
            $this->session->set_flashdata('last_posting', $_POST);
            redirect('event/event_input');
        }else if($tanggal_eventBaru <= 0){
              $this->session->set_flashdata('message', render_error('Peringatan!', 'Tanggal Kegiatan tidak valid'));
              $this->session->set_flashdata('last_posting', $_POST);
              redirect('event/event_input');
        }else{
          $nama_event          = inject($this->input->post('nama_event'));
          $deskripsi           = inject($this->input->post('deskripsi'));
          $gambar              = inject($this->input->post('gambar'));
          $event_status        = 0;

          $config['upload_path']    = './uploads/event';
          $config['allowed_types']  = 'gif|jpg|png|jpeg';
          $config['max_size']       = 2048;
          $config['overwrite']      = false;
          $config['encrypt_name']   = true;
          $path                       = $config['upload_path'];
          $this->load->library('upload', $config);

          if ($this->upload->do_upload('gambar')) {
            $uploadData = $this->upload->data();
            $gambar = $uploadData['file_name'];
            } else {
              $this->session->set_flashdata('message', render_error('Peringatan!', 'Gagal mengupload file'));
              $this->session->set_flashdata('last_posting', $_POST);
              redirect('event/event_input');
            }
          $data           = array(
                                'nama_event'      => $nama_event,
                                'deskripsi'          => $deskripsi,
                                'gambar'             => $gambar,
                                'tanggal_event'      => $tanggal_event,
                                'create_date'        => $today,
                                'create_by'          => $profile['id_user'],
                                'event_status'       => $event_status,
                            );
            $this->m_event->insert_event($data);
            $this->session->set_flashdata('message', render_success('Input Berhasil', "Berhasil Menambahkan Data Pengguna"));
            redirect('event/event_input');
        }
      }

    public function event_list(){
        if(!is_auth()) {redirect('discover/keluar');}

        $subdata['hasil']       = $this->m_event->get_all_event();
        $subdata['username']    = $this->session->userdata('username');

        $data['title']              = 'Daftar Pelatihan yang Masih Dibuka';
        $data['meta_title']         = "Daftar Event yang Masih Dibuka";
        // $data['meta_description']   = "Daftar Pengguna Antenatal Care";
        // $data['breadcrumb']         = "Antenatal Care~Pengguna~Daftar";

        if(level() == 0){
          $data['content']            = render_view('admin/list_event', $subdata, true);
          render_view('admin/konten',$data);
        }else if(level() == 1){
          $data['content']            = render_view('staff/list_event', $subdata, true);
          render_view('staff/konten',$data);
        }
    }

    public function otomatis(){
      if(!is_auth()) {redirect('discover/keluar');}

      $get                   = $this->m_event->get_all_event();
      $today                  = date('Y-m-d H:i:s');
      $waktu_sekarang         = strtotime($today);
      // $j            = $this->m_event->event_today($waktu_sekarang);
      for($i=0; $i<count($get); $i++){
      if($waktu_sekarang==$get['tanggal_event']){
        $data           = array(
                              'event_status'      =>  1,
                          );
      }
      $this->m_event->update_event($data,$id_event);
      }
    }

    public function event_list_done(){
        if(!is_auth()) {redirect('discover/keluar');}

        $subdata['hasil']       = $this->m_event->get_event_done();
        $subdata['username']    = $this->session->userdata('username');

        $data['title']              = 'Daftar Event Sudah Dilaksanakan';
        $data['meta_title']         = "Daftar Event Sudah Dilaksanakan";
        // $data['meta_description']   = "Daftar Pengguna Antenatal Care";
        // $data['breadcrumb']         = "Antenatal Care~Pengguna~Daftar";
        $data['content']            = render_view('staff/list_event_done', $subdata, true);
        render_view('staff/konten', $data);
    }

    public function event_edit($id = ''){
        if(!is_auth()) {redirect('discover/keluar');}

        $id = inject($id);
        $id_event    = simple_decrypt($id);
        $event        = $this->m_event->get_event_by_id($id_event);

        if($id == ""){ redirect('event/event_list');}
        if(empty($event)){ redirect('event/event_list');}

        if ($id != '') {
            $subdata['action']      = site_url('event/event_proses_edit/'.$id);
            $subdata['get']		     	= $event;

            $data['title']              = 'Ubah Data Pelatihan';
            $data['meta_title']         = "Ubah Data Pelatihan";
            // $data['meta_description']   = "Ubah Data Pengguna Antenatal Care";
            // $data['breadcrumb']         = "Antenatal Care~Pengguna~Edit";
            $data['content']            = render_view('staff/edit_event', $subdata, true);

            render_view('staff/konten',$data);
        } else{
            redirect('event/event_list');
        }
    }

    public function event_proses_edit($id = ''){
        if(!is_auth()) {redirect('discover/keluar');}

        $profile = get_profile();

        $id = inject($id);
        $id_event     = simple_decrypt($id);
        if($id == ""){ redirect('event/list_event');}

        $today               = date('Y-m-d H:i:s');

        if ($id != '') {
            $this->form_validation->set_rules('nama_event', 'Name of Event', 'required|max_length[40]');
            $this->form_validation->set_rules('deskripsi', 'Description', 'required');
            $this->form_validation->set_rules('tanggal_event', 'Date of Event', 'required');
            $this->form_validation->set_rules('event_status', 'Status Event', 'required|integer|max_length[1]');
            $event_status          = inject($this->input->post('event_status'));
            $tanggal_event         = inject($this->input->post('tanggal_event'));
            $waktu_sekarang        = strtotime($today);
            $tanggal_eventBaru     = strtotime($tanggal_event)-$waktu_sekarang;

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', render_error('Validasi Error!', validation_errors()));
                redirect('event/event_edit/'.$id);
            }else if($tanggal_eventBaru <= 0){
                  $this->session->set_flashdata('message', render_error('Peringatan!', 'Tanggal Kegiatan tidak valid'));
                  redirect('event/event_edit/'.$id);
            }else{
              $nama_event          = inject($this->input->post('nama_event'));
              $deskripsi           = inject($this->input->post('deskripsi'));
              $gambar              = inject($this->input->post('gambar'));
              $event_status        = inject($this->input->post('event_status'));

              $config['upload_path']    = './uploads/event';
              $config['allowed_types']  = 'gif|jpg|png|jpeg';
              $config['max_size']       = 2048;
              $config['overwrite']      = false;
              $config['encrypt_name']   = true;
              $path                       = $config['upload_path'];
              $this->load->library('upload', $config);
              if ($this->upload->do_upload('gambar')) {
                $uploadData = $this->upload->data();
                $gambar = $uploadData['file_name'];
                } else {
                  $gambar="";
                }

              if($gambar == ""){
              $data           = array(
                                    'nama_event'         => $nama_event,
                                    'deskripsi'          => $deskripsi,
                                    'tanggal_event'      => $tanggal_event,
                                    'edit_date'          => $today,
                                    'edit_by'            => $profile['id_user'],
                                    'event_status'       => $event_status
                                );
                }else {
                  $data           = array(
                                        'nama_event'         => $nama_event,
                                        'deskripsi'          => $deskripsi,
                                        'gambar'             => $gambar,
                                        'tanggal_event'      => $tanggal_event,
                                        'edit_date'          => $today,
                                        'edit_by'            => $profile['id_user'],
                                        'event_status'       => $event_status
                                    );
                }
                $this->m_event->update_event($data,$id_event);
                $this->session->set_flashdata('message', render_success('Edit Berhasil', "Berhasil Mengubah Data Event"));
                redirect('event/event_edit/'.$id);
            }
            redirect('event/list_event');
          }
          redirect('event/list_event');
        }

    public function event_delete($id = '') {
        if(!is_auth()) {redirect('discover/keluar');}

        $id = inject($id);
        $id_event     = simple_decrypt($id);
        if($id_event == ""){ redirect('event/event_list');}

        $peserta          = $this->m_customer->get_peserta_by_id($id_event);
        $h                = count($peserta);
        $today            = date('Y-m-d H:i:s');
        $profile          = get_profile();

        if ($id_event !='') {
          if($h==NULL){
          $data = array(
                      "edit_by"      => $profile['id_user'],
                      "edit_date"    => $today,
                      'event_status' => 2
          );
            $this->m_event->delete_event($data,$id_event);
             $this->session->set_flashdata('message', render_success('Berhasil!', 'Data Event telah dihapus.'));
            redirect ('event/event_list');
        }else {
          $this->session->set_flashdata('message', render_error('Peringatan!', 'Pelatihan tidak dapat dihapus.'));
          redirect ('event/event_list');
        }
          redirect ('event/event_list');
      }
    }
}
