<?php

require APPPATH . '/libraries/REST_Controller.php';
Class Kabupaten Extends REST_Controller{
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
    
    // untuk menampilkan data
    function index_get(){
        $this->db->select('provinces.provinsi_id,regencies.kota_id,provinces.nama_provinsi,regencies.nama_kabupaten');
        $this->db->from('regencies');
        $this->db->join('provinces', 'regencies.provinsi_id = provinces.provinsi_id');
        $data = array();
        $data['result'] = '1';
        $data['data'] = $this->db->get()->result();
        $this->response($data, 200);
    }

    function provinsi_get($provinsi){
        $this->db->select('provinces.provinsi_id,regencies.kota_id,provinces.nama_provinsi,regencies.nama_kabupaten');
        $this->db->from('regencies');
        $this->db->join('provinces', 'regencies.provinsi_id = provinces.provinsi_id');
        $this->db->where('provinces.provinsi_id', $provinsi);
        $data = array();
        $data['result'] = '1';
        $data['data'] = $this->db->get()->result();
        $this->response($data, 200);
    }

    function provinsikab_get($provinsi, $kabupaten){
        $this->db->select('provinces.provinsi_id,regencies.kota_id,provinces.nama_provinsi,regencies.nama_kabupaten');
        $this->db->from('regencies');
        $this->db->join('provinces', 'regencies.provinsi_id = provinces.provinsi_id');
        $this->db->where('regencies.kota_id', $kabupaten);
        $data = array();
        $data['result'] = '1';
        $data['data'] = $this->db->get()->result();
        $data['hasil'] = $this->db->count_all_results();
        $this->response($data, 200);
    }

    
}
?>
