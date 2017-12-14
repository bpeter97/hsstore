<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * Admin Controller Class
     * 
     * @method index()      The main view of the admin page.
     * @method products()   Used to view, create, and edit products.
     */
    class Admin extends CI_Controller 
    {

        /**
         * Constructer
         */
        public function __construct()
        {
            parent::__construct();

            // Everytime the admin controller is called, check login to ensure user is admin.
            if($this->session->has_userdata('logged_in'))
            {
                check_perm($this->session->userdata('user_id'), 'Admin');
            }
        }

        /**
         * Index function
         * 
         * Loads the main view for the admin panel.
         *
         * @return void
         */
        public function index()
        {
            $data['main_view'] = 'admin/index';
            $this->load->view('layout/admin', $data);
        }

        /**
         * Products function
         *
         * This function is used to view, edit, delete, and create products for the project.
         * 
         * @param string $create
         * @return void
         */
        public function products($create = null)
        {
            // Check to see if create was passed in.
            if( ! is_null($create))
            {
                // Validate input when product is created.
                $this->form_validation->set_rules('name','Name','trim|required|min_length[3]');
                $this->form_validation->set_rules('price','Price','numeric|trim|required|min_length[3]');
                $this->form_validation->set_rules('quantity','Quantity','numeric|integer|trim|required|min_length[1]|max_length[3]');
                $this->form_validation->set_rules('featured','Featured','trim|min_length[2]|max_length[3]'); // Posts on or blank
                $this->form_validation->set_rules('description','Description','required|min_length[3]');

                // Check to see if validation is good or fails.
                if( ! $this->form_validation->run()) // Validation failed, send to main, and render errors.
                {
                
                    // Load all categories to create links.
                    $data['categories'] = $this->categories_model->fetch_all_categories();

                    // Create the main view.
                    $data['main_view'] = 'admin/create_product';
                    $this->load->view('layout/admin', $data);

                } 
                else // All validation passed, create the product.
                {
                    
                    // Create the options arrat for the image.
                    $upload = array(
                        'upload_path'   =>  'uploads/',
                        'allowed_types' =>  'jpg|jpeg|png',
                        'max_size'      =>  0,
                        'filename'      =>  url_title($this->input->post('image')),
                        'encrypt_name'  =>  TRUE
                    );
                    // Load the upload library.
                    $this->load->library('upload', $upload);

                    // If the image was successfully uploaded, process the input.
                    if($this->upload->do_upload('image'))
                    {
                        // Create the array to pass into the product_model for creation.
                        $data = array(
                            'name' =>   $this->input->post('name', TRUE),
                            'price' =>   $this->input->post('price', TRUE),
                            'quantity' =>   $this->input->post('quantity', TRUE),
                            'description' =>   $this->input->post('description', TRUE),
                            'featured' =>   $this->input->post('featured', TRUE),
                            'image' =>   $this->upload->file_name
                        );
    
                        // Check to see if the product was created properly.
                        if( ! $new_id = $this->product_model->create_product($data))
                        {
                            // if not, send home and display error_message.
                            $this->session->set_flashdata('error_msg', array('The product was unable to be created.'));
    
                            // Create the view.
                            $data['main_view'] = 'admin/create_product';
                            $this->load->view('layout/admin', $data);
                        } 
                        else 
                        {
                            // if it did create, create the products and categories links.
                            foreach($this->input->post('categories') as $category)
                            {
                                // Create the relationship.
                                $this->categories_model->create_relationship($new_id, $category);
                            }
                            
                            // Send home with success message.
                            $this->session->set_flashdata('success_msg', 'The product was created successfully!');
    
                            // Redirect to main page of products.
                            redirect('admin/products');
                        }
                    }
                    else 
                    {
                        // Send home with error showing image didn't upload.
                        $this->session->set_flashdata('error_msg', array('The was an issue uploading the image.'));
                        redirect('admin/products');
                    }

                    
                }

            }
            else
            {
                // Create was not passed in, so fetch all products.
                $data['products'] = $this->product_model->fetch_all_products();

                // Load the products page in the admin panel.
                $data['main_view'] = 'admin/products';
                $this->load->view('layout/admin', $data);
            }
        }

    }

?>