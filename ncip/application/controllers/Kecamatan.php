<?php

require APPPATH . '/libraries/REST_Controller.php';
Class Kecamatan Extends REST_Controller{
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
    
    // untuk menampilkan data
    function index_get(){
        $this->db->select('regencies.kota_id,districts.kecamatan_id,regencies.nama_kabupaten,districts.nama_kecamatan');
        $this->db->from('districts');
        $this->db->join('regencies', 'districts.kota_id = regencies.kota_id');
        $data = array();
        $data['result'] = '1';
        $data['data'] = $this->db->get()->result();
        $this->response($data, 200);
    }

    function kabupaten_get($kabupaten){
        $this->db->select('regencies.kota_id,districts.kecamatan_id,regencies.nama_kabupaten,districts.nama_kecamatan');
        $this->db->from('districts');
        $this->db->join('regencies', 'districts.kota_id = regencies.kota_id');
        $this->db->where('regencies.kota_id', $kabupaten);
        $data = array();
        $data['result'] = '1';
        $data['data'] = $this->db->get()->result();
        $this->response($data, 200);
    }

    function kabupatenkec_get($kabupaten, $kecamatan){
        $this->db->select('regencies.kota_id,districts.kecamatan_id,regencies.nama_kabupaten,districts.nama_kecamatan');
        $this->db->from('districts');
        $this->db->join('regencies', 'districts.kota_id = regencies.kota_id');
        $this->db->where('districts.kecamatan_id', $kecamatan);
        $data = array();
        $data['result'] = '1';
        $data['data'] = $this->db->get()->result();
        $this->response($data, 200);
    }

    
}
?>
