<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materials extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('materials_model','',true);
        $this->load->helper('form');

    }

    public function index() {
        $data['title']='Материаллы';
        $data['template']='frontend/materials/list';

        $data['objects']=$this->materials_model->getAll();
        $this->load->view('main',$data);
    }
    public function create() {
        $data['title']='Материаллы';
        $this->load->library('form_validation');
        $data['template']='frontend/materials/create';
//        $data['res'] = $this->router->fetch_class();
        $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[255]|xss_clean');
        $this->form_validation->set_rules('units', 'Ед. изм.', 'trim|required|min_length[1]|max_length[32]|xss_clean');
        $this->form_validation->set_rules('price', 'Цена', 'trim|required|min_length[1]|max_length[32]|xss_clean');
        $this->form_validation->set_rules('date', 'Дата', 'trim|xss_clean');
        if ($this->input->post('action', '') == 'save') {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/main', $data);
            }else {
                $date=explode('.',set_value('date'));
                $result=array(
                        'name'=>set_value('name'),
                        'price'=>set_value('price'),
                        'units'=>set_value('units'),
                        'date'=>mktime(0, 0, 0, $date[1], $date[0], $date[2])
                );
//                var_dump($result);
//                die;
                $this->materials_model->save($result);
                redirect('/materials/');
            }
        }else {
            $this->load->view('main',$data);
        }

    }
    public function edit() {
        $data['title']='Материаллы';
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            $this->load->library('form_validation');
            $data['template']='frontend/materials/edit';
//        $data['res'] = $this->router->fetch_class();
            $data['object']=$this->materials_model->getById($id);
//            var_dump($data);die;
            $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[255]|xss_clean');
            $this->form_validation->set_rules('units', 'Ед. изм.', 'trim|required|min_length[1]|max_length[32]|xss_clean');
            $this->form_validation->set_rules('price', 'Цена', 'trim|required|min_length[1]|max_length[32]|xss_clean');
            $this->form_validation->set_rules('date', 'Дата', 'trim|xss_clean');
            if ($this->input->post('action', '') == 'save') {
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/main', $data);
                }else {
                    $date=explode('.',set_value('date'));
                    $result=array(
                            'name'=>set_value('name'),
                            'price'=>set_value('price'),
                            'units'=>set_value('units'),
                            'date'=>mktime(0, 0, 0, $date[1], $date[0], $date[2])
                    );
//                    var_dump($result);
//                    die;
                    $this->materials_model->updateById($result,$id);
                    redirect('/materials/');
                }
            }else {
                $this->load->view('main',$data);
            }
        }else {
            redirect('/');
        }
    }
    public function delete() {
        $data['title']='Материаллы';
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $this->materials_model->deleteById($id);
             redirect('/materials/');
        }else {
            redirect('/');
        }
    }
}
