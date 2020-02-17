<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Prevent some security threats, per Kevin
		// Turn on IE8-IE9 XSS prevention tools
		$this->output->set_header('X-XSS-Protection: 1; mode=block');
		// Don't allow any pages to be framed - Defends against CSRF
		$this->output->set_header('X-Frame-Options: DENY');
		// prevent mime based attacks
		$this->output->set_header('X-Content-Type-Options: nosniff');		
	}

	function index(){
		//redirect(base_url());
		$data['title'] = title();
		$data['description'] = description();
		$data['keywords'] = keywords();
		$data['record'] = $this->db->query("SELECT * FROM rb_produk");
		$data['berita'] = $this->model_berita->semua_berita(0,3);
		$this->template->load('phpmu-one/template','phpmu-one/homeview',$data);
	}

	function survey(){
		$data['title'] = "Survey - ".title();
		$data['iden'] = $this->model_app->view('identitas')->row_array();
		//$data['record'] = $this->db->query("SELECT * FROM rb_produk");
		$this->template->load('phpmu-one/template','phpmu-one/survey',$data);
	}

	public function surveygo(){
		if($this->input->is_ajax_request()) {
			$nama = $this->input->post('a');
			$email = $this->input->post('b');
			$nohp = $this->input->post('c');

			$pil1 = $this->input->post('d');
			$pil2 = $this->input->post('e');
			$pil3 = $this->input->post('f');
			$pil4 = $this->input->post('g');
			$pil5 = $this->input->post('h');
			$pil6 = $this->input->post('i');
			$pil7 = $this->input->post('j');
			$pil8 = $this->input->post('k');

			if ($nama=='') {
				$error[] = 'Tolong Isi Nama';
			}
			if ($email=='') {
				$error[] = 'Tolong Isi Email';
			}
			if ($nohp=='') {
				$error[] = 'Tolong Isi No HP';
			}
			if ($pil1=='') {
				$error[] = 'Tolong Pilih Pilihan no 1';
			}
			if ($pil2=='') {
				$error[] = 'Tolong Pilih Pilihan no 2';
			}
			if ($pil3=='') {
				$error[] = 'Tolong Pilih Pilihan no 3';
			}
			if ($pil4=='') {
				$error[] = 'Tolong Pilih Pilihan no 4';
			}
			if ($pil5=='') {
				$error[] = 'Tolong Pilih Pilihan no 5';
			}
			if ($pil6=='') {
				$error[] = 'Tolong Pilih Pilihan no 6';
			}
			if ($pil7=='') {
				$error[] = 'Tolong Pilih Pilihan no 7';
			}
			if ($pil8=='') {
				$error[] = 'Tolong Pilih Pilihan no 8';
			}

			if (isset($error)) {
				$data = array('error'=>"<span class='badge badge-pill badge-danger'>!</span> <small class='text-white'>".implode("</small><br /><span class='badge badge-pill badge-danger'>!</span> <small class='text-white'>", $error));
				$this->output->set_output(json_encode($data));
			}else{
				$data = array('nama'=>$nama,
	        				'email'=>$email,
	        			  	'no_hp'=>$nohp,
	        			  	'a'=>$pil1,
	        			  	'b'=>$pil2,
	        			  	'c'=>$pil3,
							'd'=>$pil4,
							'e'=>$pil5,
	        			  	'f'=>$pil6,
	        			  	'g'=>$pil7,
							'h'=>$pil8);
		  		$this->db->insert('rb_survey',$data);
		  
				$data = array('result'=>'0','error'=>"<span class='badge badge-pill badge-success'>o</span> <small class='text-white'>Survey telah dikirim, terimakasih</small>");
				$this->output->set_output(json_encode($data));
			}
		}
	}

	function notfound(){
		$this->load->view('notfound');
	}
}
