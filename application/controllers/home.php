<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller 
    {

        public function index()
        {
            $data['main_view'] = 'home/index';
            $this->load->view('layout/main', $data);
        }

    }

?>