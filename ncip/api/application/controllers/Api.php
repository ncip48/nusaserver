<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'third_party/REST_Controller.php';
require APPPATH . 'third_party/Format.php';


class Api extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(['jwt', 'authorization']);
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
    }

    public function login_post()
    {
        $this->load->model('loginmodel');
        $date = new DateTime();
        $username = $this->post('username',TRUE);
        $pass = $this->post('password',TRUE);
        $dataadmin = $this->loginmodel->is_valid($username);
        if ($dataadmin) {
            if ($pass == $dataadmin->password) {
                $payload['id'] = $dataadmin->id_user;
                $payload['username'] = $dataadmin->username;
                $output['token'] = AUTHORIZATION::generateToken($payload);
                $this->loginmodel->insert_key($dataadmin->id_user, $output['token']);
                return $this->response($output,REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status'=>FALSE,
                    'username'=>$username,
                    'message'=>'Password salah'
                    ],REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response([
                'status'=>FALSE,
                'username'=>$username,
                'message'=>'Username / password tidak ditemukan, silahkan register di apiwilayah.inincip.xy'
                ],REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function verify_request()
    {
        $headers = $this->input->request_headers();
        $token = $headers['Authorization'];
        try {
            $data = AUTHORIZATION::validateToken($token);
            if ($data === false) {
                $this->response([
                    'status' => false,
                    'message' => 'API Key tidak ditemukan di database server'
                ], REST_Controller::HTTP_UNAUTHORIZED);
                exit();
            } else {
                return true;
            }
        } catch (Exception $e) {
            $this->response([
                'status' => false,
                'message' => 'Error Unknown'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function cek_level($num)
    {
        $this->load->model('loginmodel');
        $headers = $this->input->request_headers();
        $token = $headers['Authorization'];
        try {
            $data = AUTHORIZATION::validateToken($token);
            $level = $this->loginmodel->cek_level($data->id);
            if ($level->level=='3'){
                return true;
            } else if ($level->level=='2' OR $level->level=='1') {
                if ($level->level != $num) {
                    $this->response([
                        'status' => false,
                        'message' => 'Maaf, harus upgrade paket ke level '. $num
                    ], REST_Controller::HTTP_UNAUTHORIZED);
                    exit();
                } else {
                    return true;
                }
            }
            
        } catch (Exception $e) {
            $this->response([
                'status' => false,
                'message' => 'Error Unknown'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function cek_user_post()
    {
        $this->load->model('loginmodel');
        $username = $this->post('username');
        $user = $this->loginmodel->is_valid_num($username);
        $hitung = $this->loginmodel->hitung_user($username);

        if ($hitung>0) {
            $this->response([
                'status' => true,
                'data' => $user
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'API Key belum dibuat'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}