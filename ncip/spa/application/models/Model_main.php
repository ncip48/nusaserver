<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_main extends CI_Model{

    public function getjamfull($tgl, $i){
        $this->db->where("jam_booking='".$tgl." ".date("H:i",$i)."' AND status != '2'");
        return $this->db->get('rb_booking')->num_rows();
        //$this->db->query("SELECT * FROM rb_booking WHERE jam_booking='".$tgl." ".date("H:i",$i)."'")->num_rows();
    }

    public function getjamku($id){
        $this->db->where("id_booking='".$id."'");
        return $this->db->get('rb_booking')->row_array();
        //$this->db->query("SELECT * from rb_booking WHERE id_booking='2'")->row_array();
    }

    public function getTimeOpenClose(){
        return $this->db->get('rb_toko')->row_array();
    }

    function getDayOpen(){
        return $this->db->get('rb_toko')->row_array();
    }

    
}