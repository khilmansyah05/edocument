<?php
Class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_user');
    }

    //User_input() :
    public function user_input() {
        if(!is_auth()) {redirect('discover/keluar');}

        $profile                    = get_profile();

        $subdata['action']          = site_url('user/user_proses_input');
        // $subdata['hasil']           = $this->m_desa->get_all_desa();

        $data['title']              = 'Tambah Pengguna';
        $data['meta_title']         = "Tambah Pengguna";
        $data['meta_description']   = "Tambah Pengguna Antenatal Care";
        $data['breadcrumb']         = "Antenatal Care~Pengguna~Tambah";
        $data['breadcrumb_icon']    = "fa-user";
        $data['content']            = render_view('coba/input_user', $subdata, true);
        render_view('coba/konten', $data);
        // dumper($subdata);
        // redirect('user/user_proses_input');

    }

    public function user_proses_input() {
        if(!is_auth()) {redirect('discover/keluar');}

        $profile = get_profile();
        // dumper(get_profile());

        //untuk validasi ketika required = belum keisi maka nnti akan di peringati
		$this->form_validation->set_rules('id_user', 'id_user', 'required|integer|max_length[10]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[40]');
        $this->form_validation->set_rules('NIK', 'NIK', 'required|integer|max_length[10]');
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[10]|callback_username_is_available');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[10]');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required|max_length[12]');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $level          = inject($this->input->post('level'));

        if ($this->form_validation->run() == FALSE) {
          $this->session->set_flashdata('message', render_error('Validasi Error!', validation_errors()));
          $this->session->set_flashdata('last_posting', $_POST);
          redirect('user/user_input/');
        }else{

          $id_user        = inject($this->input->post('id_user'));
		  $nama           = inject($this->input->post('nama'));
          $NIK            = inject($this->input->post('NIK'));
          $username       = inject($this->input->post('username'));
          $password       = inject($this->input->post('password'));
          $divisi      	  = inject($this->input->post('divisi'));
          $level          = inject($this->input->post('level'));
            $data           = array(
                                'id_user'       => $id_user,
								'nama'          => $nama,
                                'NIK'           => $NIK,
                                'username'      => $username,
                                'password'      => md5($password),
                                'divisi'        => $divisi,
                                'level'         => $level,
                                'create_date'   => date('Y-m-d H:i:s'),
                                'create_by'     => $profile['id_user']
                            );

            $this->m_user->insert_user($data);
            $this->session->set_flashdata('message', render_success('Input Berhasil', "Berhasil Menambahkan Data Pengguna"));
            redirect('user/user_input/');
        }
    }

    //cek ketersediaan username
    public function username_is_available($str){
      if($this->m_user->username_is_available($str)!=0){
        $this->form_validation->set_message('username_is_available','Username tidak tersedia');
        return false;
      }else{
        return true;
      }
    }

    //cek ketersediaan email
    /*public function email_is_available($str){
      if($this->m_user->email_is_available($str)!=0){
        $this->form_validation->set_message('email_is_available','Email sudah dipakai');
        return false;
      }else{
        return true;
      }
    }*/
	
	/*public function tampil_user()
    {
        $subdata['user'] = $this->m_user->getAll();
        $data['user'] = render_view('coba/users_list', $subdata);
		render_view('coba/konten', $data);
    }*/

    public function user_list(){
        if(!is_auth()) {redirect('discover/keluar');}

        //$subdata['hasil']       = $this->m_user->get_level();
        //$subdata['username']    = $this->session->userdata('username');
		$subdata['user'] = $this->m_user->getAll();

        $data['title']              = 'Daftar Pengguna Aktif';
        $data['meta_title']         = "Daftar Pengguna";
        // $data['meta_description']   = "Daftar Pengguna Antenatal Care";
        // $data['breadcrumb']         = "Antenatal Care~Pengguna~Daftar";
        $data['content']            = render_view('coba/list_users', $subdata, true);

        render_view('coba/konten', $data);
    }

    public function source_user_list(){
      $page     = inject($_POST['current_page']);

      /* Set Limit*/
      $limit   = 10;
      $limit   = ($limit * $page) - $limit;

      $content  = $this->m_user->get_all_user($_POST, $limit + 1 , $start);
      //dumper($content);
      //$level    = $this->m_user->get_level();

      $result['content']  = render_view('admin/ajax_user' , ['data' => $content, 'level' => $level, 'limit' => $limit], true);
      $result['page']     = $page;
      $result['hasPrev']  = ($page > 1) ? 'true' : 'false';
      $result['hasNext']  = (count($content) > $limit) ? 'true' : 'false';

      echo json_encode($result);

    }

    public function user_edit($id = ''){
        if(!is_auth()) {redirect('discover/keluar');}
        $id = inject($id);
        $id_user     = simple_decrypt($id);
        $user        = $this->m_user->get_user_by_id($id_user);
        if($id == ""){ redirect('user/user_list');}
        if(empty($user)){ redirect('user/user_list');}
        if ($id_user !='') {
            if($id_user != id_user()){
              $subdata['action']       = site_url('user/user_proses_edit/'.$id);
              $subdata['get']		     	= $user;
              $data['title']              = 'Ubah Data Pengguna';
              $data['meta_title']         = "Ubah Data Pengguna";
              // $data['meta_description']   = "Ubah Data Pengguna Antenatal Care";
              // $data['breadcrumb']         = "Antenatal Care~Pengguna~Edit";
              $data['content']            = render_view('coba/edit_user', $subdata, true);
              render_view('coba/konten',$data);

            }else {
              $subdata['action']       = site_url('user/profile_proses_edit/'.$id);
              $subdata['get']		     	= $user;
              $data['title']              = 'Ubah Profile';
              $data['meta_title']         = "Ubah Profile";
              // $data['meta_description']   = "Ubah Data Pengguna Antenatal Care";
              // $data['breadcrumb']         = "Antenatal Care~Pengguna~Edit";
              if(level()==1){
                $data['content']            = render_view('coba/edit_profile', $subdata, true);
                render_view('coba/konten',$data);
              }else if(level()==2){
                $data['content']            = render_view('coba/edit_profile', $subdata, true);
                render_view('spv/kontens',$data);
              }else if(level()==3){
                $data['content']            = render_view('coba/edit_profile', $subdata, true);
                render_view('staff/konten',$data);
              }else if(level()==4){
                $data['content']            = render_view('coba/edit_profile', $subdata, true);
                render_view('manager/kontens',$data);
              }
			  else {
                redirect('discover/keluar');
              }

            }
        }else{
            redirect('user/user_list');
        }
    }

    public function user_proses_edit($id = ''){
        if(!is_auth()) {redirect('discover/keluar');}

        $profile = get_profile();
        $id = inject($id);
        $id_user     = simple_decrypt($id);
        if($id == ""){ redirect('user/user_list');}

        if ($id != '') {
            $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[40]');
			$this->form_validation->set_rules('NIK', 'NIK', 'required|integer|max_length[10]');
			$this->form_validation->set_rules('username', 'Username', 'required|max_length[10]|callback_username_is_available');
			$this->form_validation->set_rules('password', 'Password', 'required|max_length[10]');
			$this->form_validation->set_rules('divisi', 'Divisi', 'required|max_length[12]');
            $this->form_validation->set_rules('level', 'Access Right', 'required');
            $this->form_validation->set_rules('user_status', 'User Status', 'required');
            $level          = inject($this->input->post('level'));

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', render_error('Validasi Error', validation_errors()));
                redirect('user/user_edit/'.$id);
            } else {

            $nama           = inject($this->input->post('nama'));
			$NIK            = inject($this->input->post('NIK'));
			$username       = inject($this->input->post('username'));
			$password       = inject($this->input->post('password'));
			$divisi      	= inject($this->input->post('divisi'));
			$level          = inject($this->input->post('level'));
            $user_status    = inject($this->input->post('user_status'));

              $data           = array(
									'nama'          => $nama,
									'NIK'           => $NIK,
									'username'      => $username,
									'password'      => md5($password),
									'divisi'        => $divisi,
									'level'         => $level,
									'edit_date'     => date('Y-m-d H:i:s'),
									'edit_by'       => $profile['id_user'],
									'user_status'   => $user_status
                              );
                $this->m_user->update_user($data, $id_user);
                $this->session->set_flashdata('message', render_success('Berhasil!', 'Data pengguna telah diubah.'));
                redirect('user/user_edit/'.$id);
            }
        } else{

            redirect('user/user_list');
        }
    }

    public function profile_proses_edit($id = ''){
        if(!is_auth()) {redirect('discover/keluar');}

        $profile = get_profile();
        $id = inject($id);
        $id_user     = simple_decrypt($id);
        if($id == ""){ redirect('user/user_list');}

        if ($id != '') {
            $this->form_validation->set_rules('nama', 'Name', 'required|max_length[40]');
            $this->form_validation->set_rules('NIK', 'NIK', 'required|integer|max_length[12]');
            $this->form_validation->set_rules('divisi', 'Divisi', 'required|max_length[12]');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', render_error('Validasi Error', validation_errors()));
                redirect('user/user_edit/'.$id);
            } else {

              $nama           = inject($this->input->post('nama'));
              $NIK         	  = inject($this->input->post('NIK'));
              $divisi      = inject($this->input->post('divisi'));

              $data           = array(
                                  'nama'          => $nama,
                                  'NIK'           => $NIK,
                                  'divisi'        => $divisi,
                                  'edit_date'     => date('Y-m-d H:i:s'),
                                  'edit_by'       => $profile['id_user'],
                              );
                $this->m_user->update_user($data, $id_user);
                $this->session->set_flashdata('message', render_success('Berhasil!', 'Profile telah diubah.'));
                redirect('user/user_edit/'.$id);
            }
        } else{

            redirect('user/user_list');
        }
    }

    public function user_delete($id = '') {
        if(!is_auth()) {redirect('discover/keluar');}

        $id = inject($id);
        $id_user     = simple_decrypt($id);
        if($id_user == ""){ redirect('user/user_list');}

        $profile = get_profile();

        // $user_id = simple_decrypt($id_user); //dumper($user_id);
        // $user    = $this->m_user->get_user_by_id($user_id);
        // if(empty($user)){ redirect('user/user_list');}

        if ($id_user !='') {
            $this->m_user->delete_user($id_user);
             $this->session->set_flashdata('message', render_success('Berhasil!', 'Data pengguna telah dihapus.'));
            redirect ('user/user_list');
        }else {
            redirect ('user/user_list');
        }
    }

    public function user_gantiPass($id = ''){
      if(!is_auth()) {redirect('discover/keluar');}

      $profile = get_profile();

      $id = inject($id);
      $id_user    = simple_decrypt($id);
      $user        = $this->m_user->get_user_by_id($id_user);
      if($id == ""){ redirect('discover/keluar');}
      if(empty($user)){ redirect('discover/keluar');}

      //belum tau untuk apa
      // $user_id = (int)$id_user; //dumper($user_id); ini apaan? aku ikuti yg edit kakak
      // $user    = $this->m_user->get_user_by_id($user_id);
      // if(empty($user)){ redirect('discover/dashboard');}

      if ($id != '') {
          $subdata['action']      = site_url('user/user_proses_gantiPass/'.$id);
          $subdata['get']		     	= $user;
          // $subdata['get']         = $user;

          $data['title']              = 'Ubah Password';
          $data['meta_title']         = "Ubah Password";
          // $data['meta_description']   = "Ubah Data Pengguna Antenatal Care";
          // $data['breadcrumb']         = "Antenatal Care~Pengguna~Edit";
          $data['content']            = render_view('admin/edit_password', $subdata, true);

          if(level() == 1){
            render_view('coba/konten',$data);
          }else if(level() == 2){
            render_view('spv/kontens',$data);
          }else if(level() == 3){
            render_view('staff/konten',$data);
          }else if(level() == 4){
            render_view('manager/kontens',$data);
          }

      } else{
          redirect('discover/keluar');
      }
  }

  public function user_proses_gantiPass($id = ''){
      if(!is_auth()) {redirect('discover/keluar');}

      $id = inject($id);
      $id_user     = simple_decrypt($id);
      if($id == ""){ redirect('discover/keluar');}

      if ($id !='') {
          $this->form_validation->set_rules('password', 'Password Lama', 'required');
          $this->form_validation->set_rules('passwordBaru', 'Password Baru', 'required|min_length[8]');
          $this->form_validation->set_rules('cpassword', 'Konfirmasi Password', 'required|matches[passwordBaru]');

          $password       = inject($this->input->post('password'));
          $pass           = md5($password);
          $passwordBaru   = inject($this->input->post('passwordBaru'));
          $cpassword      = inject($this->input->post('cpassword'));

          if ($this->form_validation->run() == FALSE) {
              $this->session->set_flashdata('message', render_error('Validasi Error', validation_errors()));
              redirect('user/user_gantiPass/'.$id);
          }
          else if ($pass != password()){
            $this->session->set_flashdata('message',render_error("Perhatian!", "Password salah"));
            redirect('user/user_gantiPass/'.$id);
          }
          else {
            $data           = array(
                                'password'    => md5($passwordBaru),
                                'edit_date'   => date('Y-m-d H:i:s'),
                                'edit_by'     => id_user(),
                            );
              $this->m_user->update_user($data, $id_user);
              $this->session->set_flashdata('message', render_success('Berhasil!', 'Password telah diubah.'));
              redirect('user/user_gantiPass/'.$id);
          }
      } else{
          redirect('discover/keluar');
      }
    }
}
