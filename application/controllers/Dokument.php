<?php
Class Dokument extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_dokument');
        $this->load->model('m_customer');
        $this->load->helper(array('url'));
    }
	
	public function detail($id = NULL) {
		$dokumen = $this->m_dokument->get_where(array('id'=>$id))->row();
		
		if (!$dokumen) show_404();
		
		$data['pageTitle'] = 'Detail Dokumen';
		$data['dokumen'] = $dokumen;
		$data['pageContent'] = $this->load->view('coba/detail', $data, TRUE);
		
		$this->load->view('coba/konten');
	
	}

    //Fungsi untuk Menambahkan kegiatan
    public function dokument_input() {
        if(!is_auth()) {redirect('discover/keluar');}

        $profile                    = get_profile();

        $subdata['action']          = site_url('dokument/dokument_proses_input');
        // $subdata['hasil']           = $this->m_desa->get_all_desa();
        $data['title']              = 'Tambah Dokument';
        $data['meta_title']         = "Tambah Dokument";
        $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['content']            = render_view('coba/input_doc', $subdata, true);
        render_view('coba/konten', $data);
    }

    public function dokument_proses_input() {
        if(!is_auth()) {redirect('discover/keluar');}

        $profile = get_profile();
        $today               = date('Y-m-d H:i:s');
		//$tahun = date('Y');
		//$judul = $judul."-".$tahun;

        //untuk validasi ketika required = belum keisi maka nnti akan di peringati
        $this->form_validation->set_rules('judul', 'Judul', 'required|max_length[40]');
        $this->form_validation->set_rules('nama_doc', 'Nama Dokument', 'trim|required');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required');
        //$doc_status          = inject($this->input->post('doc_status'));
        //$tanggal         		= inject($this->input->post('tanggal'));
        //$waktu_sekarang        	= strtotime($today);
        //$tanggal_docBaru     	= strtotime($tanggal)-$waktu_sekarang;

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', render_error('Validasi Error!', validation_errors()));
            $this->session->set_flashdata('last_posting', $_POST);
            redirect('dokument/dokument_input');
        }/*else if($tanggal_docBaru <= 0){
              $this->session->set_flashdata('message', render_error('Peringatan!', 'Tanggal Kegiatan tidak valid'));
              $this->session->set_flashdata('last_posting', $_POST);
              redirect('dokument/dokument_input');*/
        else{
          $judul          = inject($this->input->post('judul'));
		      $tahun = date('Y');
          $nama_doc           = inject($this->input->post('nama_doc'));
		      $nama_doc = $nama_doc." - ".$tahun." - ".$judul;
          // $file              = inject($this->input->post('file'));
          $file = $this->input->post('file');
		      $divisi              = inject($this->input->post('divisi'));
          $doc_status        = 0;

          $config['upload_path']    = './uploads/dokument';
          $config['allowed_types']  = 'pdf|jpg|png';
          $config['max_size']       = 100000;
          $config['overwrite']      = false;
          $config['encrypt_name']   = true;
          $path                       = $config['upload_path'];
          $this->load->library('upload', $config);
		  
		      // $uploadData = $this->upload->data();
		  
	
			// $uploadData = $this->upload->do_upload('file');
		  
		  $data           = array(
                                'judul'      		=> $judul,
                                'nama_doc'          => $nama_doc,
                                'file'            	=> $_FILES['file']['name'],
                                'divisi'      		=> $divisi,
                                'create_date'       => $today,
                                'create_by'         => $profile['id_user'],
                                'doc_status'      	=> $doc_status,
          );

          if ($this->m_dokument->insert_dokument($data)) {
            
            $this->session->set_flashdata('message', render_success('Input Berhasil', "Berhasil Menambahkan Dokument"));
            redirect('dokument/dokument_input');
			
            }
			    else {
              $this->session->set_flashdata('message', render_error('Peringatan!', 'Gagal mengupload file'));
              $this->session->set_flashdata('last_posting', $_POST);
              redirect('dokument/dokument_input');
            }
          
          
        }
      }

    public function dokument_list(){
        if(!is_auth()) {redirect('discover/keluar');}

        //$subdata['hasil']       = $this->m_dokument->get_all_dokument();
        //$subdata['username']    = $this->session->userdata('username');
		$subdata['dokumen'] = $this->m_dokument->get_all_dokument();
		//dumper($subdata['dokumen']);		
        $data['title']              = 'Daftar Dokument';
        $data['meta_title']         = "Daftar Dokument";
        // $data['meta_description']   = "Daftar Pengguna Antenatal Care";
        // $data['breadcrumb']         = "Antenatal Care~Pengguna~Daftar";

        if(level() == 1){
          $data['content']            = render_view('coba/doc_list', $subdata, true);
          render_view('coba/konten',$data);
        }else if(level() == 2){
          $data['content']            = render_view('staff/list_event', $subdata, true);
          render_view('staff/konten',$data);
        }else if(level() == 3){
          $data['content']            = render_view('staff/list_event', $subdata, true);
          render_view('staff/konten',$data);
        }else if(level() == 4){
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

    public function dokument_list_done(){
        if(!is_auth()) {redirect('discover/keluar');}

        $subdata['hasil']       = $this->m_dokument->get_doc_done();
        $subdata['username']    = $this->session->userdata('username');

        $data['title']              = 'Daftar Event Sudah Dilaksanakan';
        $data['meta_title']         = "Daftar Event Sudah Dilaksanakan";
        // $data['meta_description']   = "Daftar Pengguna Antenatal Care";
        // $data['breadcrumb']         = "Antenatal Care~Pengguna~Daftar";
        $data['content']            = render_view('coba/list_doc_done', $subdata, true);
        render_view('coba/konten', $data);
    }
	
	public function doc_list(){
        if(!is_auth()) {redirect('discover/keluar');}

        $subdata['hasil']       = $this->m_dokument->get_all_dokument();
        $subdata['username']    = $this->session->userdata('username');
		//$subdata['doc'] = $this->m_dokument->get_all_dokument();

        $data['title']              = 'Daftar Pengguna Aktif';
        $data['meta_title']         = "Daftar Pengguna";
        // $data['meta_description']   = "Daftar Pengguna Antenatal Care";
        // $data['breadcrumb']         = "Antenatal Care~Pengguna~Daftar";
        $data['content']            = render_view('coba/doc_list', $subdata, true);

        render_view('coba/konten', $data);
    }

    public function dokument_edit($id = ''){
        if(!is_auth()) {redirect('discover/keluar');}

        $id = inject($id);
        $id    = simple_decrypt($id);
        $dokumen        = $this->m_dokument->get_doc_by_id($id);

        if($id == ""){ redirect('dokument/dokument_list');}
        if(empty($dokumen)){ redirect('dokument/dokument_list');}

        if ($id != '') {
            $subdata['action']      = site_url('dokument/dokument_proses_edit/'.$id);
            $subdata['get']		     	= $dokumen;

            $data['title']              = 'Ubah Data ';
            $data['meta_title']         = "Ubah Data ";
            // $data['meta_description']   = "Ubah Data Pengguna Antenatal Care";
            // $data['breadcrumb']         = "Antenatal Care~Pengguna~Edit";
            $data['content']            = render_view('coba/edit_doc', $subdata, true);

            render_view('staff/konten',$data);
        } else{
            redirect('dokument/dokument_list');
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

    public function dokument_delete($id = '') {
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
