<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller 
    {

        public function index()
        {

            $data['featured_products'] = $this->product_model->fetch_featured_products();

            $data['main_view'] = 'home/index';
            $this->load->view('layout/main', $data);
        }

    }