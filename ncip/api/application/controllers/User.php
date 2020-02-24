<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
#require APPPATH . 'controllers/Api.php';
require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller {
    function __construct($config = 'rest') {
        parent::__construct($config);
        #$this->verify_request();
    }
    /* index page */
    function index_get() {
            // baseurl/?table=nama_table (semua data)
            $this->db->select('user.id_user, user.username, user.password, keys.key, keys.level');
            $this->db->join('keys', 'user.id_user = keys.user_id');
            $result['status'] = true;
			$result['data'] = $this->db->get('user')->result();
            $this->response($result, 200);

    }

    function login_post() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->loginmodel->is_valid_num($username, $password);
        $cek_username = $this->loginmodel->cek_username($username);
        $cek_akun = $this->loginmodel->cek_akun($username, $password);
        $cek_key = $this->loginmodel->cek_key($username);

        if ($username=='' AND $password==''){
            $result['status'] = false;
			$result['message'] = 'Masukkan username dan password';
			$this->output->set_output(json_encode($result, true));
        } else if ($cek_username==0) {
			$result['status'] = false;
			$result['message'] = 'Username tidak ditemukan';
			$this->output->set_output(json_encode($result, true));
        } else if ($cek_akun==0) {
			$result['status'] = false;
			$result['message'] = 'Username/password salah';
			$this->output->set_output(json_encode($result, true));
        } else if ($cek_key==0) {
            $result['status'] = false;
			$result['message'] = 'API Key belum dibuat';
			$this->output->set_output(json_encode($result, true));
        } else {
            $result['status'] = true;
			$result['data'] = $user;
			$this->output->set_output(json_encode($result, true));
        }

    }

    function index_post($table = '') { // baseurl/?table=nama_table
        $insert = $this->db->insert($table, $this->post());
        $id = $this->db->insert_id();
        if ($insert) {
            $response = array(
                'data' => $this->post(),
                'table' => $table,
                'id' => $id,
                'status' => 'success'
                );
            $this->response($response, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put($table = '', $id = '') { // baseurl/nama_table/id
        $get_id = 'id_'.$table;
        $this->db->where($get_id, $id);
        $update = $this->db->update($table, $this->put());
        if ($update) {
            $response = array(
                'data' => $this->put(),
                'table' => $table,
                'id' => $id,
                'status' => 'success'
                );
            $this->response($response, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete($table = '', $id = '') {
        $get_id = 'id_'.$table;
        $this->db->where($get_id, $id);
        $delete = $this->db->delete($table);
        if ($delete) {
            $response = array(
                'table' => $table,
                'id' => $id,
                'status' => 'success'
                );
            $this->response($response, 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>