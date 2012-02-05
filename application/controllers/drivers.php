<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Drivers extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('drivers_model','',true);
        $this->load->helper('form');

    }

    public function index() {
        $data['title']='Водители';
        $data['template']='frontend/drivers/list';

        $data['objects']=$this->drivers_model->getAll();
        $this->load->view('main',$data);
    }
    public function create() {
        $data['title']='Водители';
        $this->load->library('form_validation');
        $data['template']='frontend/drivers/create';
//        $data['res'] = $this->router->fetch_class();
        $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[255]|xss_clean');
        $this->form_validation->set_rules('rate', 'Ед. изм.', 'trim|required|min_length[1]|max_length[32]|xss_clean');
        $this->form_validation->set_rules('date', 'Дата', 'trim|xss_clean');
        if ($this->input->post('action', '') == 'save') {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('main', $data);
            }else {
                $date=explode('.',set_value('date'));
                $result=array(
                        'name'=>set_value('name'),
                        'rate'=>set_value('rate'),
                        'date'=>mktime(0, 0, 0, $date[1], $date[0], $date[2])
                );
//                var_dump($result);
//                die;
                $this->drivers_model->save($result);
                redirect('/drivers/');
            }
        }else {
            $this->load->view('main',$data);
        }

    }
    public function edit() {
        $data['title']='Водители';
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            $this->load->library('form_validation');
            $data['template']='frontend/drivers/edit';
//        $data['res'] = $this->router->fetch_class();
            $data['object']=$this->drivers_model->getById($id);
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
                    $this->drivers_model->updateById($result,$id);
                    redirect('/drivers/');
                }
            }else {
                $this->load->view('main',$data);
            }
        }else {
            redirect('/');
        }
    }
    public function delete() {
        $data['title']='Водители';
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $this->drivers_model->deleteById($id);
            redirect('/drivers/');
        }else {
            redirect('/');
        }
    }
}
