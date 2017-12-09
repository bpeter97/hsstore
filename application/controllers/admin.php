<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin extends CI_Controller 
    {

        public function __construct()
        {
            parent::__construct();
            if($this->session->has_userdata('logged_in'))
            {
                check_perm($this->session->userdata('user_id'), 'Admin');
            }
        }

        public function index()
        {
            $data['main_view'] = 'admin/index';
            $this->load->view('layout/admin', $data);
        }

        public function products($create = null)
        {
            if( ! is_null($create))
            {
                $this->form_validation->set_rules('name','Name','trim|required|min_length[3]');
                $this->form_validation->set_rules('price','Price','numeric|trim|required|min_length[3]');
                $this->form_validation->set_rules('quantity','Quantity','numeric|integer|trim|required|min_length[1]|max_length[3]');
                $this->form_validation->set_rules('featured','Featured','trim|min_length[2]|max_length[3]'); // Posts on or blank
                $this->form_validation->set_rules('description','Description','required|min_length[3]');

                if( ! $this->form_validation->run()){

                    $data['categories'] = $this->categories_model->fetch_all_categories();

                    $data['main_view'] = 'admin/create_product';
                    $this->load->view('layout/admin', $data);
                } else {

                    $upload = array(
                        'upload_path'   =>  'uploads/',
                        'allowed_types' =>  'jpg|jpeg|png',
                        'max_size'      =>  0,
                        'filename'      =>  url_title($this->input->post('image')),
                        'encrypt_name'  =>  TRUE
                    );
                    $this->load->library('upload', $upload);

                    if($this->upload->do_upload('image'))
                    {
                        $data = array(
                            'name' =>   $this->input->post('name', TRUE),
                            'price' =>   $this->input->post('price', TRUE),
                            'quantity' =>   $this->input->post('quantity', TRUE),
                            'description' =>   $this->input->post('description', TRUE),
                            'featured' =>   $this->input->post('featured', TRUE),
                            'image' =>   $this->upload->file_name
                        );
    
                        if( ! $new_id = $this->product_model->create_product($data))
                        {
                            $this->session->set_flashdata('error_msg', array('The product was unable to be created.'));
    
                            $data['main_view'] = 'admin/create_product';
                            $this->load->view('layout/admin', $data);
                        } 
                        else 
                        {

                            foreach($this->input->post('categories') as $category)
                            {
                                $this->categories_model->create_relationship($new_id, $category);
                            }
                            
                            $this->session->set_flashdata('success_msg', 'The product was created successfully!');
    
                            redirect('admin/products');
                        }
                    }
                    else 
                    {
                        $this->session->set_flashdata('error_msg', array('The was an issue uploading the image.'));
                        redirect('admin/products');
                    }

                    
                }

            }
            else
            {
                $data['products'] = $this->product_model->fetch_all_products();

                $data['main_view'] = 'admin/products';
                $this->load->view('layout/admin', $data);
            }
        }

        // public function post_test()
        // {
        //     echo '<pre>';
        //     var_dump($_POST);
        //     echo '</pre>';

        //     foreach($this->input->post('categories') as $category_id)
        //     {
        //         echo $category_id;
        //     }
        // }

    }

?>