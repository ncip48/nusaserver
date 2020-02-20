<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

Class Desa Extends REST_Controller{
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get(){
        $kec = $this->uri->segment('2');
        $desa = $this->uri->segment('3');

        if ($kec === null && $desa === null) {
            $desa = $this->model_api->getDesa();
        } elseif ($desa === null) {
            $desa = $this->model_api->getDesa($kec);
        } else {
            $desa = $this->model_api->getDesa($kec, $desa);
        }

        if ($desa) {
            $this->response([
                'status' => true,
                'data' => $desa
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id kecamatan/desa tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

}

