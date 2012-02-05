<?php

class Materials_model extends CI_Model {

    function getAll() {
        return   $this->db->select()
                ->from('materials')
                ->order_by('id', 'desc')
                ->get()
                ->result();
    }

    function getById($id) {
        return $this->db->select()
                ->from('materials')
                ->where('id',$id)
                ->get()
                ->row();
    }
    function updateById($data,$id) {
        $this->db
                ->where('id', $id)
                ->update('materials', $data);

    }
    function save($data) {
        $query = $this->db->insert('materials', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    function deleteById($id) {
        return  $this->db->where('id', $id)->delete('materials');
    }
}