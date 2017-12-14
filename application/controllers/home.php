<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * Home Controller Class
     * 
     * @method index() Loads the home veiw of the product.
     */
    class Home extends CI_Controller 
    {

        /**
         * index function
         *
         * Loads the home view of the project.
         * 
         * @uses Product_model to get featured products.
         * @return void
         */
        public function index()
        {

            // Set the featured products.
            $data['featured_products'] = $this->product_model->fetch_featured_products();

            // Load the main view.
            $data['main_view'] = 'home/index';
            $this->load->view('layout/main', $data);
        }

    }