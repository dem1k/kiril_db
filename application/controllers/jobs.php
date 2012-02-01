<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jobs_model','',true);
        $this->load->helper('form');

    }

    public function index() {
        $data['template']='frontend/jobs/list';

        $data['objects']=$this->jobs_model->getAll();
        $this->load->view('main',$data);
    }
    public function create() {
        $data['template']='frontend/jobs/create';

        $this->load->view('main',$data);
    }
    public function edit() {
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $data['template']='frontend/jobs/edit';
            $data['object']=$this->jobs_model->getById($id);
            $this->load->view('main',$data);
        }else {
            redirect('/');
        }
    }
    public function delete() {
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $data['template']='frontend/jobs/list';

            $data['jobs']=$this->jobs_model->getAll();
            $this->load->view('main',$data);
        }else {
            redirect('/');
        }
    }
}