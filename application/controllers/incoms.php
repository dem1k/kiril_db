<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class incoms extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('incoms_model','',true);
        $this->load->helper('form');

    }

    public function index() {
        $data['title']='Приходы';
        $data['template']='frontend/incoms/list';

        $data['objects']=$this->incoms_model->getAll();
        $this->load->view('main',$data);
    }
    public function create() {
        $data['title']='Приходы';
        $this->load->library('form_validation');
        $data['template']='frontend/incoms/create';
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
                $this->incoms_model->save($result);
                redirect('/incoms/');
            }
        }else {
            $this->load->view('main',$data);
        }

    }
    public function edit() {
        $data['title']='Приходы';
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            $this->load->library('form_validation');
            $data['template']='frontend/incoms/edit';
//        $data['res'] = $this->router->fetch_class();
            $data['object']=$this->incoms_model->getById($id);
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
                    $this->incoms_model->updateById($result,$id);
                    redirect('/incoms/');
                }
            }else {
                $this->load->view('main',$data);
            }
        }else {
            redirect('/');
        }
    }
    public function delete() {
        $data['title']='Приходы';
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $this->incoms_model->deleteById($id);
             redirect('/incoms/');
        }else {
            redirect('/');
        }
    }
}
