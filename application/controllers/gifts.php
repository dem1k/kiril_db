<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gifts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('gifts_model','',true);
        $this->load->helper('form');

    }

    public function index() {
        $data['template']='frontend/gifts/list';

        $data['objects']=$this->gifts_model->getAll();
        $this->load->view('main',$data);
    }
    public function create() {
        $data['template']='frontend/gifts/create';

        $this->load->view('main',$data);
    }
    public function edit() {
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $data['template']='frontend/gifts/edit';
            $data['object']=$this->gifts_model->getById($id);
            $this->load->view('main',$data);
        }else {
            redirect('/');
        }
    }
    public function delete() {
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $data['template']='frontend/gifts/list';

            $this->load->view('main',$data);
        }else {
            redirect('/');
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */