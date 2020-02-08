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
		$this->template->load('phpmu-one/template','phpmu-one/homeview',$data);
	}

	function survey(){
		$data['title'] = "Survey - ".title();
		$data['iden'] = $this->model_app->view('identitas')->row_array();
		//$data['record'] = $this->db->query("SELECT * FROM rb_produk");
		$this->template->load('phpmu-one/template','phpmu-one/survey',$data);
	}

	function notfound(){
		$this->load->view('notfound');
	}
}
