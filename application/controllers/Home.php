<?php

Class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_event');
    }

    public function index() {
        $subdata['hasil']           = $this->m_event->get_all_event();

        $data['title']              = 'Event';
        $data['meta_title']         = "Event";
        $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['content']            = render_view('front_end/coba', $subdata, true);
        render_view('front_end/konten', $data);
    }

    public function alur_pendaftaran() {
        $subdata['hasil']           = $this->m_event->get_all_event();

        $data['title']              = 'Alur Pendaftaran';
        $data['meta_title']         = "Alur Pendaftaran";
        $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['content']            = render_view('front_end/alur_pendaftaran', $subdata, true);
        render_view('front_end/konten', $data);
    }

      public function about_us() {
          $subdata['hasil']           = $this->m_event->get_all_event();

          $data['title']              = 'About Us';
          $data['meta_title']         = "About Us";
          $data['meta_description']   = "Tambah Pengguna Antenatal Care";
          $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
          $data['content']            = render_view('front_end/about_us', $subdata, true);
          render_view('front_end/konten', $data);
      }


}


 ?>
