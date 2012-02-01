<?php

class Distributors_model extends CI_Model {

    function getAll() {
        return   $this->db->select()
                ->from('distributors')
                ->order_by('date', 'desc')
                ->get()
                ->result();
    }

    function getById($id) {
        return $this->db->select()
                ->from('distributors')
                ->where('id',$id)
                ->get()
                ->row();
    }
    function updateById($data,$id) {
        $this->db
                ->where('id', $id)
                ->update('distributors', $data);

    }
    function save($data) {

        $query = $this->db->insert('distributors', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    function deleteById($id) {
        return  $this->db->where('id', $id)->delete('distributors');
    }
}