<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Products extends CI_Controller 
    {

        public function index($type = null)
        {

            $per_page = 6;

            if($type === null)
            {
                
                $count = $this->product_model->count_products();
                
                if(!empty($this->input->get("page")))
                {
    
                    $start = ceil($this->input->get("page") * $per_page);             
    
                    $data['products'] = $this->product_model->fetch_products_limited($start, $start - $per_page);
                    $result = $this->load->view('products/product_listing', $data);
    
                }
                else
                {
                    $data['products'] = $this->product_model->fetch_products_limited(6, 0);
    
                    $data['main_view'] = 'products/index';
                    $this->load->view('layout/main', $data);
                
                }
            }
            else 
            {
                $count = $this->product_model->count_products($type);
                
                if(!empty($this->input->get("page")))
                {
    
                    $start = ceil($this->input->get("page") * $per_page);             
    
                    $data['products'] = $this->product_model->fetch_products_limited($start, $start - $per_page, $type);
                    $result = $this->load->view('products/product_listing', $data);
    
                }
                else
                {
                    $data['products'] = $this->product_model->fetch_products_limited(6, 0, $type);
    
                    $data['main_view'] = 'products/index';
                    $this->load->view('layout/main', $data);
                
                }
            }
            

        }

        public function view()
        {
            $this->form_validation->set_rules('id','ID','integer|trim|required|min_length[1]|max_length[5]');

            if( ! $this->form_validation->run() )
            {
                redirect('products');
            }
            else 
            {
                $this->product_model->fetch_product($this->input->post('id'));

                $data['product'] = $this->product_model;
                
                $data['main_view'] = 'products/product_info';
                $this->load->view('layout/main', $data);
            }
            
        }

    }