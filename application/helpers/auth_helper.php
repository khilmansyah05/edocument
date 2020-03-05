<?php
    function credential_administrator($level) {
        $ci     =& get_instance();
        $login  = $ci->session->userdata('pengguna');

        if ((!ISSET($login['username'])) || ($login['username'] == '')) {
            redirect('discover');
        } else {
            if (is_array($level)) {
                if (!in_array($login['level'], $level)) {
                    redirect('discover'.$level);
                }
            } else {
                $level = array($level);
                if (!in_array($login['level'], $level)) {
                    redirect('discover');
                }
            }
        }
    }


    function credential(){
        $ci     =& get_instance();
        $session  = $ci->session->userdata('pengguna');

        if(!ISSET($session) || count($session) <= 0) {
            redirect('');
        }
    }

    function get_profile(){
        $ci     =& get_instance();
        $session  = $ci->session->userdata('pengguna');

        if(ISSET($session) || count($session) <= 0) {
            return $session;
        }
        else {
            return [];
        }
    }

    function is_auth($level = []){
        $ci     =& get_instance();
        $session  = $ci->session->userdata('pengguna');

        if(!ISSET($session) || count($session) <= 0) {
            return false;
        } else {
            //dumper($session);
            if(empty($level)){ return true; }

            if (is_array($level)) {
                if (!in_array(level(), $level)) {
                    return false;
                }
            } else {
                $level = array($level);
                if (!in_array(level(), $level)) {
                    return false;
                }
            }
        }



        return true;
    }

    function id_user()      { $profile = get_profile();return $profile['id_user']; }
    function password()     { $profile = get_profile();return $profile['password']; }
    function nama()         { $profile = get_profile();return $profile['nama']; }
    function email()        { $profile = get_profile();return $profile['email']; }
    function username()     { $profile = get_profile();return $profile['username']; }
    function no_telpon()    { $profile = get_profile();return $profile['no_telpon']; }
    function level()        { $profile = get_profile();return $profile['level']; }
    function user_status()  { $profile = get_profile();return $profile['user_status']; }


?>
