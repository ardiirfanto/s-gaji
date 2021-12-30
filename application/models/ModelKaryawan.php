<?php

class ModelKaryawan extends CI_Model
{

    private $table = 'karyawan';
    private $sub_table = 'potongan_karyawan';

    function m_all()
    {
        $this->db->select('a.*,b.nama_unit,c.username');
        $this->db->from($this->table . ' AS a');
        $this->db->join('unit AS b', 'a.unit_id = b.id');
        $this->db->join('pengguna AS c', 'a.user_id = c.id');
        return $this->db->get()->result();
    }
    function m_row($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }
    function m_store($post)
    {
        return $this->db->insert($this->table, $post);
    }
    function m_update($post, $id)
    {
        return $this->db->update($this->table, $post, array('id' => $id));
    }
    function m_destroy($id)
    {
        return $this->db->delete($this->table, array('id' => $id));
    }
    function m_potongan_all($id){
        $this->db->select('a.*,b.potongan');
        $this->db->from($this->sub_table . ' AS a');
        $this->db->join('potongan AS b', 'a.potongan_id = b.id');
        $this->db->where(array('karyawan_id' => $id));
        return $this->db->get()->result();
    }
    function m_potongan_store($post){
        return $this->db->insert($this->sub_table, $post);
    }
    function m_potongan_update($post, $id)
    {
        return $this->db->update($this->sub_table, $post, array('id' => $id));
    }
    function m_potongan_destroy($id)
    {
        return $this->db->delete($this->sub_table, array('id' => $id));
    }
}
