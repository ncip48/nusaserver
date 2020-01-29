<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
	function index(){
		//redirect(base_url());
		$data['title'] = title();
		$data['description'] = description();
		$data['keywords'] = keywords();
		$data['record'] = $this->db->query("SELECT * FROM rb_produk");
		$this->template->load('phpmu-one/template','phpmu-one/homeview',$data);
	}

	function notfound(){
		$this->load->view('notfound');
	}
}
