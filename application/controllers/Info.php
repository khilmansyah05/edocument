<?php
Class Info extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function option_general() {
		// credential_administrator(1);
    if(!is_auth()) {redirect('discover/keluar');}
		    $subdata['action']  = site_url('info/option_proses_update');
        $subdata['title']   = 'Opsi Umum';
        $data['content']    = $this->load->view('admin/option_general', $subdata, true);
        $this->load->view('admin/konten', $data);
	}

	public function option_proses_update() {
    if(!is_auth()) {redirect('discover/keluar');}
		// credential_administrator(1);
		$this->form_validation->set_rules('web_name', 'Web Name', 'required');
		$this->form_validation->set_rules('tagline', 'Tagline', 'required');
		$this->form_validation->set_rules('short_desc', 'Short Desc', 'required');
		$this->form_validation->set_rules('address', 'Addres', 'required');
		$this->form_validation->set_rules('telp1', 'Telp 1', 'required');
		$this->form_validation->set_rules('telp2', 'Telp 2', 'required');
		$this->form_validation->set_rules('email1', 'Email 1', 'required|valid_email');
		$this->form_validation->set_rules('email2', 'Email 2', 'required|valid_email');
		$this->form_validation->set_rules('sosmed_fb', 'Sosmed Facebook', 'required');
		$this->form_validation->set_rules('profil_perusahaan', 'Profil Perusahaan', 'required');
		$this->form_validation->set_rules('visi', 'Visi', 'required');
		$this->form_validation->set_rules('misi', 'Misi', 'required');
		if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('message', render_error('Validasi Error!', validation_errors()));
            redirect('Info/option_general');
		} else {
			$input = $_POST;
			foreach($input as $k => $v) {
				$dd = inject($v);
				$this->db->update('options', array('value' => $dd),array('name' => $k));
			}
      $this->session->set_flashdata('message', render_success('Berhasil!', "Berhasil memperbaharui profile"));
            redirect('Info/option_general/');
		}

	}

	public function about_us() {
    if(!is_auth()) {redirect('discover/keluar');}

        $subdata['title']   = 'Tentang Kami';
        $subdata['action']  = site_url('info/aboutus_proses_update');
        $data['content']    = $this->load->view('admin/about_us', $subdata, true);
        $this->load->view('admin/konten', $data);
	}

	public function aboutus_proses_update() {
    if(!is_auth()) {redirect('discover/keluar');}
		// credential_administrator(1);
		$this->form_validation->set_rules('web_description', 'About Us', 'required');
		if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('message', render_error('Validasi Error!', validation_errors()));
            redirect('Info/about_us/');
		} else {
			$input = $_POST;
			foreach($input as $k => $v) {
				$dd = inject($v);
				$this->db->update('options', array('value' => $dd),array('name' => $k));
			}
      $this->session->set_flashdata('message', render_success('Berhasil!', "Berhasil memperbaharui profile"));
            redirect('Info/about_us/');
		}
	}

}
 ?>
