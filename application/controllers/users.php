<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
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
                $this->session->set_flashdata('success_msg', 'You have successfully logged in.');
                redirect('home');

            } else {

                // Redirect with errors.
                $this->session->set_flashdata('error_msg',array('Incorrect Username/Password.'));
                redirect('home');

            }

        } else {

            // Redirect with errors.
            $this->session->set_flashdata('error_msg', $this->form_validation->error_array());

            // Go back to home page and display errors.
            $data['main_view'] = 'home';
            $this->load->view('layout/main', $data);

        }
    }

    public function register()
    {
        // Form validation
        $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|min_length[3]|matches[password]',
                        array('matches' => 'The passwords do not match!'));
        $this->form_validation->set_rules('first_name','First Name','trim|required|min_length[2]');
        $this->form_validation->set_rules('last_name','Last Name','trim|required|min_length[2]');
        $this->form_validation->set_rules('email','Email','trim|required|min_length[5]|valid_email');

        if( ! $this->form_validation->run()){
            $this->session->set_flashdata('error_msg', $this->form_validation->error_array());
            redirect('home');
        } else {
            $data = array(
                'username'  =>  $this->input->post('username', TRUE),
                'password'  =>  $this->input->post('password'),
                'first_name'  =>  $this->input->post('first_name', TRUE),
                'last_name'  =>  $this->input->post('last_name', TRUE),
                'email'  =>  $this->input->post('email', TRUE)
            );
            if($this->user_model->register_user($data)){
                $this->session->set_flashdata('success_msg', 'You have successfully registered, you may log in now.');
                redirect('home');
            } else {
                $this->session->set_flashdata('error_msg', array('There was an error during the registration process. Please try again later.'));
                redirect('home');
            }
        }
    }

    public function logout()
    {
        // Log the user out.
        $this->user_model->destroy_user_session();

        // Logout flash message.
        $this->session->set_flashdata('success_msg','You have successfully been logged out.');
        redirect('home');

    }

}