<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    function index(){
		if (isset($_POST['submit'])){
			$username = $this->input->post('a');
			$password = hash("sha512", md5($this->input->post('b')));
			$cek = $this->db->query("SELECT * FROM users where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."'");
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){
				$this->session->set_userdata('upload_image_file_manager',true);
				$this->session->set_userdata(array('id_users'=>$row['id_users'],
								   'username'=>$row['username'],
								   'level'=>$row['level'],
                                   'id_session'=>$row['id_session']));
				redirect('administrator/home');
			}else{
				$data['title'] = 'Administrator &rsaquo; Log In';
				$this->load->view('administrator/view_login',$data);
			}
		}else{
			$data['title'] = 'Administrator &rsaquo; Log In';
			$this->load->view('administrator/view_login',$data);
		}
	}

	function home(){
		if ($this->session->id_session){
			$this->template->load('administrator/template','administrator/view_home');
		}else{
			redirect('administrator');
		}
    }

    function setting(){
        if ($this->session->id_session){
            if (isset($_POST['submit'])){
                $this->model_admin->update_toko();
                redirect('administrator/setting');
            }else{
                $data['record'] = $this->db->query("SELECT * FROM rb_toko")->row_array();
                $this->template->load('administrator/template','administrator/mod_web/view_setting',$data);
            }
		}else{
			redirect('administrator');
		}
    }

    function booking(){
        if ($this->session->id_session){
            $data['record'] = $this->model_admin->view_booking()->result_array();
            $this->template->load('administrator/template','administrator/mod_booking/view_booking',$data);
		}else{
			redirect('administrator');
		}
    }
    
    function logout(){
		$this->session->sess_destroy();
		redirect('main');
	}

}