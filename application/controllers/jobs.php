<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('jobs_model','',true);
        $this->load->helper('form');

    }

    public function index() {
        $data['title']='Работы';
        $data['template']='frontend/jobs/list';

        $data['objects']=$this->jobs_model->getAll();
        $this->load->view('main',$data);
    }
    public function create() {
        $data['title']='Работы';
        $this->load->library('form_validation');
        $data['template']='frontend/jobs/create';
//        $data['res'] = $this->router->fetch_class();
        $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[255]|xss_clean');
        $this->form_validation->set_rules('units', 'Ед. изм.', 'trim|required|min_length[1]|max_length[32]|xss_clean');
        $this->form_validation->set_rules('rate', 'Цена', 'trim|required|min_length[1]|max_length[32]|xss_clean');
        $this->form_validation->set_rules('price1', 'Цена', 'trim|required|min_length[1]|max_length[32]|xss_clean');
        $this->form_validation->set_rules('price2', 'Цена', 'trim|required|min_length[1]|max_length[32]|xss_clean');
        $this->form_validation->set_rules('date', 'Дата', 'trim|xss_clean');
        if ($this->input->post('action', '') == 'save') {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('main', $data);
            }else {
                $date=explode('.',set_value('date'));
                $result=array(
                            'name'=>set_value('name'),
                            'rate'=>set_value('rate'),
                            'units'=>set_value('units'),
                            'price1'=>set_value('price1'),
                            'price2'=>set_value('price2'),
                            'date'=>mktime(0, 0, 0, $date[1], $date[0], $date[2])
                    );
//                var_dump($result);
//                die;
                $this->jobs_model->save($result);
                redirect('/jobs/');
            }
        }else {
            $this->load->view('main',$data);
        }

    }
    public function edit() {
        $data['title']='Работы';
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            $this->load->library('form_validation');
            $data['template']='frontend/jobs/edit';
//        $data['res'] = $this->router->fetch_class();
            $data['object']=$this->jobs_model->getById($id);
            $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[255]|xss_clean');
            $this->form_validation->set_rules('units', 'Ед. изм.', 'trim|required|min_length[1]|max_length[32]|xss_clean');
            $this->form_validation->set_rules('rate', 'Цена', 'trim|required|min_length[1]|max_length[32]|xss_clean');
            $this->form_validation->set_rules('price1', 'Цена', 'trim|required|min_length[1]|max_length[32]|xss_clean');
            $this->form_validation->set_rules('price2', 'Цена', 'trim|required|min_length[1]|max_length[32]|xss_clean');
            $this->form_validation->set_rules('date', 'Дата', 'trim|xss_clean');
            if ($this->input->post('action', '') == 'save') {
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('main', $data);
                }else {
                    $date=explode('.',set_value('date'));
                    $result=array(
                            'name'=>set_value('name'),
                            'rate'=>set_value('rate'),
                            'units'=>set_value('units'),
                            'price1'=>set_value('price1'),
                            'price2'=>set_value('price2'),
                            'date'=>mktime(0, 0, 0, $date[1], $date[0], $date[2])
                    );
//                    var_dump($result);
//                    die;
                    $this->jobs_model->updateById($result,$id);
                    redirect('/jobs/');
                }
            }else {
                $this->load->view('main',$data);
            }
        }else {
            redirect('/');
        }
    }
    public function delete() {
        $data['title']='Работы';
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $this->jobs_model->deleteById($id);
            redirect('/jobs/');
        }else {
            redirect('/');
        }
    }
}
