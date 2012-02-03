<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materials extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('materials_model','',true);
        $this->load->helper('form');

    }

    public function index() {
        $data['template']='frontend/materials/list';

        $data['objects']=$this->materials_model->getAll();
        $this->load->view('main',$data);
    }
    public function create() {
        $data['template']='frontend/materials/create';

        $this->load->view('main',$data);
    }
    public function edit() {
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $data['template']='frontend/materials/edit';
            $data['object']=$this->materials_model->getById($id);
            $this->load->view('main',$data);
        }else {
            redirect('/');
        }
    }
    public function delete() {
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $data['template']='frontend/materials/list';

            $this->load->view('main',$data);
        }else {
            redirect('/');
        }
    }
}
