<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Rest extends REST_Controller {
    private $secretkey = 'NCIPUNYUHEHE';
    public function __construct(){
        parent::__construct();
        $this->load->helper(['jwt', 'authorization']);
    }
    // method untuk melihat token pada user
    public function generate_post(){
        $this->load->model('loginmodel');
        $date = new DateTime();
        $username = $this->post('username',TRUE);
        $pass = $this->post('password',TRUE);
        $dataadmin = $this->loginmodel->is_valid($username);
        if ($dataadmin) {
            if ($pass == $dataadmin->password) {
                $payload['id'] = $dataadmin->id_user;
                $payload['username'] = $dataadmin-> username;
                $payload['iat'] = $date->getTimestamp(); //waktu di buat
                $payload['exp'] = $date->getTimestamp() + 3600; //satu jam
                $output['token'] = JWT::encode($payload,$this->secretkey);
                return $this->response($output,REST_Controller::HTTP_OK);
            } else {
                $this->viewtokenfail($username);
            }
        } else {
            $this->viewtokenfail($username);
        }
    }

    public function viewtokenfail($username){
        $this->response([
          'status'=>FALSE,
          'username'=>$username,
          'message'=>'Invalid!'
          ],REST_Controller::HTTP_BAD_REQUEST);
    }

    public function cektoken(){
        $this->load->model('loginmodel');
        $jwt = $this->input->get_request_header('Authorization');
        try {
            $decode = JWT::decode($jwt,$this->secretkey,array('HS256'));
            if ($this->loginmodel->is_valid_num('$decode-> id')>0) {
                return true;
            }
        } catch (Exception $e) {
            $status = parent::HTTP_UNAUTHORIZED;
            $response = ['status' => $status, 'msg' => 'Token Salah! '];
            $this->response($response, $status);
        }
    }
}
