<?php

class Incoms_model extends CI_Model {

    function getAll() {
        return   $this->db->select()
                ->from('incoms')
                ->order_by('id', 'desc')
                ->get()
                ->result();
    }

    function getById($id) {
        return $this->db->select()
                ->from('incoms')
                ->where('id',$id)
                ->get()
                ->row();
    }
    function updateById($data,$id) {
        $this->db
                ->where('id', $id)
                ->update('incoms', $data);

    }
    function save($data) {
        $query = $this->db->insert('incoms', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    function deleteById($id) {
        return  $this->db->where('id', $id)->delete('incoms');
    }
}