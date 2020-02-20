<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

Class Kabupaten Extends REST_Controller{
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }   

    function index_get(){
        $prov = $this->uri->segment('2');
        $kab = $this->uri->segment('3');

        if ($prov === null && $kab === null) {
            $kabupaten = $this->model_api->getKabupaten();
        } elseif ($kab === null) {
            $kabupaten = $this->model_api->getKabupaten($prov);
        } else {
            $kabupaten = $this->model_api->getKabupaten($prov, $kab);
        }

        if ($kabupaten) {
            $this->response([
                'status' => true,
                'data' => $kabupaten
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id provinsi/kabupaten tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

}
