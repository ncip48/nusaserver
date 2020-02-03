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
		$data['record'] = $this->db->query("SELECT * FROM rb_produk ORDER BY id_produk DESC LIMIT 8");
		$data['berita'] = $this->model_berita->semua_berita(0,3);
		$this->template->load('phpmu-one/template','phpmu-one/homeview',$data);
	}

	function notfound(){
		$this->load->view('notfound');
	}

	function aboutus(){
		$data['title'] = "About Us";
		$data['description'] = description();
		$data['keywords'] = keywords();
		$data['record'] = $this->db->query("SELECT * FROM halamanstatis")->row_array();
		$this->template->load('phpmu-one/template','phpmu-one/about',$data);
	}
}
