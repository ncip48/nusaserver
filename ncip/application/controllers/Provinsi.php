<?php

require APPPATH . '/libraries/REST_Controller.php';
Class Provinsi Extends REST_Controller{
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
    
    // untuk menampilkan data
    function index_get(){
        $provinsi = $this->uri->segment('2');
        if ($provinsi == '') {
            $data = $this->db->get('provinces')->result();
        } else {
            $this->db->where('provinsi_id', $provinsi);
            $data = $this->db->get('provinces')->result();
        }
        $this->response($data, 200);
    }
}
?>
