<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Products extends CI_Controller 
    {

        private $per_page = 6;

        public function index()
        {
            $count = $this->product_model->count_products();
            
            if(!empty($this->input->get("page"))){
                $start = ceil($this->input->get("page") * $this->per_page);             

                $data['products'] = $this->product_model->fetch_products_limited($start, $start - $this->per_page);
                $result = $this->load->view('products/product_listing', $data);

                echo json_encode($result);
            }
            else
            {
                $data['products'] = $this->product_model->fetch_products_limited(6, 0);

                $data['main_view'] = 'products/index';
                $this->load->view('layout/main', $data);
            
            }
        }

    }