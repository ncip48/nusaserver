<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/Api.php';

Class Kecamatan extends Api {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->verify_request();
        $this->cek_level('2');
    }   

    function index_get(){
        $kab = $this->uri->segment('2');
        $kec = $this->uri->segment('3');

        if ($kab === null && $kec === null) {
            $kecamatan = $this->model_api->getKecamatan();
        } elseif ($kec === null) {
            $kecamatan = $this->model_api->getKecamatan($kab);
        } else {
            $kecamatan = $this->model_api->getKecamatan($kab, $kec);
        }

        if ($kecamatan) {
            $this->response([
                'status' => true,
                'data' => $kecamatan
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id kabupaten/kecamatan tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

}

