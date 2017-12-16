<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * Products Controller class
     * 
     * @method index()      Load the main view of products, with infinite loading products.
     * @method view()       This is the individual product view page.
     */
    class Products extends CI_Controller 
    {

        /**
         * Index function
         *
         * Loads the main view of products page and utilizes infinite scrolling products.
         * 
         * @uses Product_model
         * @param int $type
         * @return void
         */
        public function index($type = null)
        {

            // Sets the number of products to load each page (scroll).
            $per_page = 6;

            // Checks to see if na ID was passed in as a parameter called $type.
            if($type === null)
            {
                
                // If no type, count the number of all products.
                $count = $this->product_model->count_products();
                
                // Check to see what page we are loading.
                if(!empty($this->input->get("page")))
                {
    
                    // Calculate the starting product to load.
                    $start = ceil($this->input->get("page") * $per_page);             
    
                    // Return the limited products based on the start and limit variables.
                    $data['products'] = $this->product_model->fetch_products_limited($start, $start - $per_page);
                    
                    // Return the result to the view.
                    $result = $this->load->view('products/product_listing', $data);
    
                }
                else
                {
                    // This means we are on the first page, load six products.
                    $data['products'] = $this->product_model->fetch_products_limited(6, 0);
    
                    // Load the main view.
                    $data['main_view'] = 'products/index';
                    $this->load->view('layout/main', $data);
                
                }
            }
            else // A $type was passed in as a parameter. 
            {
                // Count the number of products linked to that type.
                $count = $this->product_model->count_products($type);
                
                // Check to see what page we are loading.
                if(!empty($this->input->get("page")))
                {
    
                    // Calculate the starting product to load.
                    $start = ceil($this->input->get("page") * $per_page);             
    
                    // Return the limited products based on the start, limit, and type variables.
                    $data['products'] = $this->product_model->fetch_products_limited($start, $start - $per_page, $type);
                    
                    // Return the result to the view.
                    $result = $this->load->view('products/product_listing', $data);
    
                }
                else // This means we are on the first page and have a $type.
                {
                    // Fetch the products of that type with the limit of six products.
                    $data['products'] = $this->product_model->fetch_products_limited(6, 0, $type);
    
                    // Load the products view with that data.
                    $data['main_view'] = 'products/index';
                    $this->load->view('layout/main', $data);
                
                }
            }
            

        }

        /**
         * View function
         *
         * This function will load the view for the individual product.
         * 
         * @uses Product_model
         * @return void
         */
        public function view()
        {
            // Validation for the id being posted.
            $this->form_validation->set_rules('id','ID','integer|trim|required|min_length[1]|max_length[5]');

            // Check to see if validation successfully ran.
            if( ! $this->form_validation->run() )
            {
                // Redirect to the main page of products with errors.
                redirect('products');
            }
            else 
            {
                // Fetch the product information.
                $this->product_model->fetch_product($this->input->post('id'));

                // Return the product model to the view.
                $data['product'] = $this->product_model;
                
                // Create the view.
                $data['main_view'] = 'products/product_info';
                $this->load->view('layout/main', $data);
            }
            
        }

        /**
         * Contact function
         *
         * This function will send an email containing information that the user submits.
         * 
         * @return void
         */
        public function contact()
        {
            // Validate input when product is created.
            $this->form_validation->set_rules('name','Name','trim|required|min_length[3]');
            $this->form_validation->set_rules('email','Email','valid_email|trim|required|min_length[3]');
            $this->form_validation->set_rules('phone','Phone','trim|required|min_length[10]');
            $this->form_validation->set_rules('product','Product','trim|min_length[3]');
            $this->form_validation->set_rules('details','Details','required|min_length[3]');

            // Check to see if validation is good or fails.
            if( ! $this->form_validation->run() ) // Validation failed, send to main, and render errors.
            {
                // Send home with success message.
                $this->session->set_flashdata('error_msg', $this->form_validation->error_array());

                // Redirect to main page of products.
                redirect('products/index');
            }
            else
            {
                $this->load->library('email');

                $this->email->set_newline("\r\n"); 

                $this->email->from($this->input->post('email'), $this->input->post('name'));
                $this->email->to("snakekeeper97@gmail.com");
                $this->email->subject('test');
                $this->email->message(
                    'Customer Name: ' . $this->input->post('name') . ' (Phone: '. $this->input->post('phone') .'). I am interested in: ' . 
                    $this->input->post('product') . ' Additional Details: ' . $this->input->post('details')
                );
                if( $this->email->send() )
                {
                    // Send home with success message.
                    $this->session->set_flashdata('success_msg', 'Your message was sent!');
                    
                    // Redirect to main page of products.
                    redirect('products');
                }
                else
                {
                    // Send home with success message.
                    $this->session->set_flashdata('error_msg', array($this->email->print_debugger()));
                    // $this->session->set_flashdata('error_msg', array('The message was unable to be sent.'));

                    // Redirect to main page of products.
                    redirect('products');
                }
            }
        }

    }