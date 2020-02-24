<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'controllers/Api.php';

class Provinsi extends Api {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->verify_request();
    }
    
    function index_get(){
        
        $id = $this->uri->segment('2');
        
        if ($id === null) {
            $provinsi = $this->model_api->getProvinsi();
        } else {
            $provinsi = $this->model_api->getProvinsi($id);
        }

        if ($provinsi) {
            $this->response([
                'status' => true,
                'data' => $provinsi
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id provinsi tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

}
