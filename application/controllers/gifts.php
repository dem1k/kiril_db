<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gifts extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('gifts_model','',true);
        $this->load->helper('form');

    }

    public function index() {
        $data['title']='Подарки';
        $data['template']='frontend/gifts/list';

        $data['objects']=$this->gifts_model->getAll();
        $this->load->view('main',$data);
    }
    public function create() {
        $data['title']='Подарки';
        $this->load->library('form_validation');
        $data['template']='frontend/gifts/create';
//        $data['res'] = $this->router->fetch_class();
        $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[255]|xss_clean');
        $this->form_validation->set_rules('price', 'Ед. изм.', 'trim|required|min_length[1]|max_length[32]|xss_clean');
        $this->form_validation->set_rules('date', 'Дата', 'trim|xss_clean');
        if ($this->input->post('action', '') == 'save') {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('main', $data);
            }else {
                $date=explode('.',set_value('date'));
                $result=array(
                        'name'=>set_value('name'),
                        'price'=>set_value('price'),
                        'date'=>mktime(0, 0, 0, $date[1], $date[0], $date[2])
                );
//                var_dump($result);
//                die;
                $this->gifts_model->save($result);
                redirect('/gifts/');
            }
        }else {
            $this->load->view('main',$data);
        }

    }
    public function edit() {
        $data['title']='Подарки';
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            $this->load->library('form_validation');
            $data['template']='frontend/gifts/edit';
//        $data['res'] = $this->router->fetch_class();
            $data['object']=$this->gifts_model->getById($id);
//            var_dump($data);die;
            $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[255]|xss_clean');
            $this->form_validation->set_rules('price', 'Цена', 'trim|required|min_length[1]|max_length[32]|xss_clean');
            $this->form_validation->set_rules('date', 'Дата', 'trim|xss_clean');
            if ($this->input->post('action', '') == 'save') {
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('main', $data);
                }else {
                    $date=explode('.',set_value('date'));
                    $result=array(
                            'name'=>set_value('name'),
                            'price'=>set_value('price'),
                            'date'=>mktime(0, 0, 0, $date[1], $date[0], $date[2])
                    );
//                    var_dump($result);
//                    die;
                    $this->gifts_model->updateById($result,$id);
                    redirect('/gifts/');
                }
            }else {
                $this->load->view('main',$data);
            }
        }else {
            redirect('/');
        }
    }
    public function delete() {
        $data['title']='Подарки';
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $this->gifts_model->deleteById($id);
            redirect('/gifts/');
        }else {
            redirect('/');
        }
    }
}
