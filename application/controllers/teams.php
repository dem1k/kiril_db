<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teams extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('teams_model','',true);
        $this->load->helper('form');

    }

    public function index() {
        $data['template']='frontend/teams/list';

        $data['objects']=$this->teams_model->getAll();
        $this->load->view('main',$data);
    }
    public function create() {
        $data['template']='frontend/teams/create';

        $this->load->view('main',$data);
    }
    public function edit() {
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $data['template']='frontend/teams/edit';
            $data['object']=$this->teams_model->getById($id);
            $this->load->view('main',$data);
        }else {
            redirect('/');
        }
    }
    public function delete() {
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $data['template']='frontend/teams/list';

            $this->load->view('main',$data);
        }else {
            redirect('/');
        }
    }
}
