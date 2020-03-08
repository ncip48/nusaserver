<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_admin extends CI_Model{

    function update_toko(){
        $datadb = array('nama_toko'=>$this->db->escape_str($this->input->post('a')),
                        'alamat_toko'=>$this->db->escape_str($this->input->post('b')),
                        'jam_buka'=>$this->db->escape_str($this->input->post('c')),
                        'jam_tutup'=>$this->db->escape_str($this->input->post('d')),
                        'interval'=>$this->db->escape_str($this->input->post('e')));
        $this->db->where('id_toko',1);
        $this->db->update('rb_toko',$datadb);
    }

    public function view_booking(){
        return $this->db->query("SELECT * FROM rb_booking a JOIN rb_konsumen b ON a.id_user=b.id_user JOIN rb_karyawan c ON a.id_karyawan=c.id_karyawan JOIN rb_services d ON a.id_services=d.id_services");
    }

}