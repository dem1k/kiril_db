<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function index() {
        redirect('/jobs');
        $data['template']='auth';
        $this->load->view('main',$data);
    }
}