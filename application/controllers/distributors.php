<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('distributors_model','',true);
        $this->load->helper('form');

    }

    public function index() {
        $data['template']='frontend/distributors/list';

        $data['objects']=$this->distributors_model->getAll();
        $this->load->view('main',$data);
    }
    public function create() {
        $data['template']='frontend/distributors/create';

        $this->load->view('main',$data);
    }
    public function edit() {
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $data['template']='frontend/distributors/edit';
            $data['object']=$this->distributors_model->getById($id);
            $this->load->view('main',$data);
        }else {
            redirect('/');
        }
    }
    public function delete() {
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $data['template']='frontend/distributors/list';

            $this->load->view('main',$data);
        }else {
            redirect('/');
        }
    }
}