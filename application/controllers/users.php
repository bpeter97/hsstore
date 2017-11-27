<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function index()
    {
        $user_id = $this->user_model->login_user('blpeter','123');
        $this->user_model->fetch_user_data($user_id);

        $data['user'] = $this->user_model;

        $data['main_view'] = 'home/index';
        $this->load->view('layout/main', $data);
    }

}

?>