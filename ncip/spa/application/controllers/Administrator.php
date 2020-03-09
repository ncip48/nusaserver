<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    function login(){
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
				redirect('administrator');
			}else{
				$data['title'] = 'Administrator &rsaquo; Log In';
				$this->load->view('administrator/view_login',$data);
			}
		}else{
			$data['title'] = 'Administrator &rsaquo; Log In';
			$this->load->view('administrator/view_login',$data);
		}
	}

	function index(){
		if ($this->session->id_session){
			$this->template->load('administrator/template','administrator/view_home');
		}else{
			redirect('administrator/login');
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
			redirect('administrator/login');
		}
	}
	
	function logo(){
		if ($this->session->id_session){
            if (isset($_POST['submit'])){
                $this->model_admin->update_logo();
                redirect('administrator/logo');
            }else{
                $data['record'] = $this->db->query("SELECT * FROM rb_logo")->row_array();
                $this->template->load('administrator/template','administrator/mod_web/view_logo',$data);
            }
		}else{
			redirect('administrator/login');
		}
	}

	function services(){
		if ($this->session->id_session){
            $data['record'] = $this->model_admin->view_services()->result_array();
            $this->template->load('administrator/template','administrator/mod_services/view_services',$data);
		}else{
			redirect('administrator/login');
		}
	}

	function tambah_services(){
		if ($this->session->id_session){
            if (isset($_POST['submit'])){
                $this->model_admin->tambah_services();
                redirect('administrator/services');
            }else{
                $data['record'] = $this->db->query("SELECT * FROM rb_services")->row_array();
                $this->template->load('administrator/template','administrator/mod_services/tambah_services',$data);
            }
		}else{
			redirect('administrator/login');
		}
	}

	function edit_services(){
		$id = decrypt_url($this->uri->segment(3));
		if ($this->session->id_session){
            if (isset($_POST['submit'])){
                $this->model_admin->edit_services();
                redirect('administrator/services');
            }else{
                $data['record'] = $this->db->query("SELECT * FROM rb_services WHERE id_services='".$id."'")->row_array();
                $this->template->load('administrator/template','administrator/mod_services/edit_services',$data);
            }
		}else{
			redirect('administrator/login');
		}
	}

	function hapus_services(){
		$id = decrypt_url($this->uri->segment(3));
		if ($this->session->id_session){
            $this->model_admin->hapus_services($id);
            redirect('administrator/services');
		}else{
			redirect('administrator/login');
		}
	}

	function staff(){
		if ($this->session->id_session){
            $data['record'] = $this->model_admin->view_staff()->result_array();
            $this->template->load('administrator/template','administrator/mod_staff/view_staff',$data);
		}else{
			redirect('administrator/login');
		}
	}

	function edit_staff(){
		$id = decrypt_url($this->uri->segment(3));
		if ($this->session->id_session){
            if (isset($_POST['submit'])){
                $this->model_admin->edit_karyawan();
                redirect('administrator/staff');
            }else{
                $data['record'] = $this->db->query("SELECT * FROM rb_karyawan WHERE id_karyawan='".$id."'")->row_array();
                $this->template->load('administrator/template','administrator/mod_staff/edit_staff',$data);
            }
		}else{
			redirect('administrator/login');
		}
	}

	function tambah_staff(){
		if ($this->session->id_session){
            if (isset($_POST['submit'])){
                $this->model_admin->tambah_staff();
                redirect('administrator/staff');
            }else{
                $data['record'] = $this->db->query("SELECT * FROM rb_karyawan")->row_array();
                $this->template->load('administrator/template','administrator/mod_staff/tambah_staff',$data);
            }
		}else{
			redirect('administrator/login');
		}
	}

	function hapus_staff(){
		$id = decrypt_url($this->uri->segment(3));
		if ($this->session->id_session){
            $this->model_admin->hapus_staff($id);
            redirect('administrator/staff');
		}else{
			redirect('administrator/login');
		}
	}

	function supervisor(){
		if ($this->session->id_session){
            $data['record'] = $this->model_admin->view_supervisor()->result_array();
            $this->template->load('administrator/template','administrator/mod_supervisor/view_supervisor',$data);
		}else{
			redirect('administrator/login');
		}
	}

	function edit_supervisor(){
		$id = decrypt_url($this->uri->segment(3));
		if ($this->session->id_session){
            if (isset($_POST['submit'])){
                $this->model_admin->edit_supervisor();
                redirect('administrator/supervisor');
            }else{
                $data['record'] = $this->db->query("SELECT * FROM rb_supervisor WHERE id_supervisor='".$id."'")->row_array();
                $this->template->load('administrator/template','administrator/mod_supervisor/edit_supervisor',$data);
            }
		}else{
			redirect('administrator/login');
		}
	}

	function tambah_supervisor(){
		if ($this->session->id_session){
            if (isset($_POST['submit'])){
                $this->model_admin->tambah_supervisor();
                redirect('administrator/supervisor');
            }else{
                $data['record'] = $this->db->query("SELECT * FROM rb_supervisor")->row_array();
                $this->template->load('administrator/template','administrator/mod_supervisor/tambah_supervisor',$data);
            }
		}else{
			redirect('administrator/login');
		}
	}

	function hapus_supervisor(){
		$id = decrypt_url($this->uri->segment(3));
		if ($this->session->id_session){
            $this->model_admin->hapus_supervisor($id);
            redirect('administrator/supervisor');
		}else{
			redirect('administrator/login');
		}
	}

	function edit_profile(){
		$username = decrypt_url($this->uri->segment(3));
		if ($this->session->id_session){
            if (isset($_POST['submit'])){
                $this->model_admin->edit_profile();
                redirect('administrator/edit_profile/'.encrypt_url($this->session->username));
            }else{
                $data['record'] = $this->db->query("SELECT * FROM users WHERE username='".$username."'")->row_array();
                $this->template->load('administrator/template','administrator/edit-profile',$data);
            }
		}else{
			redirect('administrator/login');
		}
	}

    function booking(){
        if ($this->session->id_session){
            $data['record'] = $this->model_admin->view_booking()->result_array();
            $this->template->load('administrator/template','administrator/mod_booking/view_booking',$data);
		}else{
			redirect('administrator/login');
		}
	}
	
	function edit_booking(){
		$id = decrypt_url($this->uri->segment(3));
		if ($this->session->id_session){
            if (isset($_POST['submit'])){
                $this->model_admin->edit_booking($id);
                redirect('administrator/booking');
            }else{
				$data['record'] = $this->model_admin->view_booking_edit($id)->row_array();
				//$data['record'] = $this->db->query("SELECT * FROM rb_booking a JOIN rb_konsumen b ON a.id_user=b.id_user JOIN rb_karyawan c ON a.id_karyawan=c.id_karyawan JOIN rb_services d ON a.id_services=d.id_services WHERE a.id_booking='".$id."'")->row_array();
                $this->template->load('administrator/template','administrator/mod_booking/edit_booking',$data);
            }
		}else{
			redirect('administrator/login');
		}
	}
    
    function logout(){
		$this->session->sess_destroy();
		redirect('main');
	}

}