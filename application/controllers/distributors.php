<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributors extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('distributors_model','',true);
        $this->load->helper('form');

    }

    public function index() {
        $data['title']='Поставщики';
        $data['template']='frontend/distributors/list';

        $data['objects']=$this->distributors_model->getAll();
        $this->load->view('main',$data);
    }
    public function create() {
        $data['title']='Поставщики';
        $this->load->library('form_validation');
        $data['template']='frontend/distributors/create';
//        $data['res'] = $this->router->fetch_class();
        $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[255]|xss_clean');
        $this->form_validation->set_rules('date', 'Дата', 'trim|xss_clean');
        if ($this->input->post('action', '') == 'save') {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('main', $data);
            }else {
                $date=explode('.',set_value('date'));
                $result=array(
                        'name'=>set_value('name'),
                        'date'=>mktime(0, 0, 0, $date[1], $date[0], $date[2])
                );
//                var_dump($result);
//                die;
                $this->distributors_model->save($result);
                redirect('/distributors/');
            }
        }else {
            $this->load->view('main',$data);
        }

    }
    public function edit() {
        $data['title']='Поставщики';
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            $this->load->library('form_validation');
            $data['template']='frontend/distributors/edit';
//        $data['res'] = $this->router->fetch_class();
            $data['object']=$this->distributors_model->getById($id);
//            var_dump($data);die;
            $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[255]|xss_clean');
            $this->form_validation->set_rules('date', 'Дата', 'trim|xss_clean');
            if ($this->input->post('action', '') == 'save') {
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('main', $data);
                }else {
                    $date=explode('.',set_value('date'));
                    $result=array(
                            'name'=>set_value('name'),
                            'date'=>mktime(0, 0, 0, $date[1], $date[0], $date[2])
                    );
//                    var_dump($result);
//                    die;
                    $this->distributors_model->updateById($result,$id);
                    redirect('/distributors/');
                }
            }else {
                $this->load->view('main',$data);
            }
        }else {
            redirect('/');
        }
    }
    public function delete() {
        $data['title']='Поставщики';
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $this->distributors_model->deleteById($id);
            redirect('/distributors/');
        }else {
            redirect('/');
        }
    }
}
