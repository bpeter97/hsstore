<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();

        // Load the models needed.
        $this->load->model('user_model');
    }

    public function login()
    {
        // Do validation
        $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');

        // If validation is good, post data.
        if($this->form_validation->run()) {

            // Traditional way of posting data.
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password');

            // Assign the user ID to the $user_id variable, or it will be false, then
            // create the user session.
            if($user_id = $this->user_model->login_user($username, $password)) {

                // Fetch user data
                $this->user_model->fetch_user_data($user_id);

                //Create the user's session
                $this->user_model->create_user_session();

                // Send them to the home page, logged in.
                redirect('home/index');

            } else {

                // Redirect with errors.
                $this->session->set_flashdata('error_msg','Incorrect Username/Password.');
                redirect('users/login');

            }

        } else {

            // Redirect with errors.
            $this->session->set_flashdata('error_msg', validation_errors());

            // Go back to home page and display errors.
            $data['main_view'] = 'users/login';
            $this->load->view('layout/main', $data);

        }
    }

    public function logout()
    {
        // Log the user out.
        session_destroy();

        // Logout flash message.
        $this->session->set_flashdata('success_msg','You have successfully been logged out.');
        redirect('home/index');

    }

}

?>