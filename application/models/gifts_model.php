<?php

class Gifts_model extends CI_Model {

    function getAll() {
        return   $this->db->select()
                ->from('gifts')
                ->order_by('date', 'desc')
                ->get()
                ->result();
    }

    function getById($id) {
        return $this->db->select()
                ->from('gifts')
                ->where('id',$id)
                ->get()
                ->row();
    }
    function updateById($data,$id) {
        $this->db
                ->where('id', $id)
                ->update('gifts', $data);

    }
    function save($data) {

        $query = $this->db->insert('gifts', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    function deleteById($id) {
        return  $this->db->where('id', $id)->delete('gifts');
    }
}