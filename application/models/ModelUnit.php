<?php

class ModelUnit extends CI_Model
{

    private $table = 'unit';

    function m_all()
    {
        return $this->db->get($this->table)->result();
    }
    function m_row($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }
    function m_store($post)
    {
        return $this->db->insert($this->table, $post);
    }
    function m_update($post,$id)
    {
        return $this->db->update($this->table, $post, array('id' => $id));
    }
    function m_destroy($id){
        return $this->db->delete($this->table, array('id' => $id));
    }
}
