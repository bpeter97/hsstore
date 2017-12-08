<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_perm'))
{
    function check_perm($id, $type)
    {
        $CI =& get_instance();

        switch ($type) {
            case 'User':
                break;
            case 'Admin':
                    // check to see if the user is admin
                    if( ! $CI->user_model->check_user_type($id, 'Admin'))
                    {
                        $CI->session->set_flashdata('error_msg',array('You do not have the correct permissions to access that page.'));
                        log_message('error', $CI->session->userdata('username'). ' has attempted to access the admin page but was redirected.');
                        redirect('home');
                    }
                    else 
                    {
                        return TRUE;
                    }
                break;
            default:
        }
    }   
}