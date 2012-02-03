<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Drivers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('drivers_model','',true);
        $this->load->helper('form');

    }

    public function index() {
        $data['template']='frontend/drivers/list';

        $data['objects']=$this->drivers_model->getAll();
        $this->load->view('main',$data);
    }
    public function create() {
        $data['template']='frontend/drivers/create';

        $this->load->view('main',$data);
    }
    public function edit() {
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $data['template']='frontend/drivers/edit';
            $data['object']=$this->drivers_model->getById($id);
            $this->load->view('main',$data);
        }else {
            redirect('/');
        }
    }
    public function delete() {
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $data['template']='frontend/drivers/list';

            $this->load->view('main',$data);
        }else {
            redirect('/');
        }
    }
}
