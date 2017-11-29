<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('run_validated'))
{
    function run_validated()
    {
        $CI =& get_instance();
        $CI->load->library('form_validation');
        if ($CI->form_validation->run() === FALSE)	throw new UnexpectedValueException();
        return TRUE;
    }   
}
if ( ! function_exists('error_msg'))
{
    function error_msg($msg)
    {
        throw new UnexpectedValueException($msg);
        return TRUE;
    }   
}