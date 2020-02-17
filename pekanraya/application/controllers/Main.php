<?php
/*
-- ---------------------------------------------------------------
-- MARKETPLACE MULTI BUYER MULTI SELLER + SUPPORT RESELLER SYSTEM
-- CREATED BY : ROBBY PRIHANDAYA
-- COPYRIGHT  : Copyright (c) 2018 - 2019, PHPMU.COM. (https://phpmu.com/)
-- LICENSE    : http://opensource.org/licenses/MIT  MIT License
-- CREATED ON : 2019-03-26
-- UPDATED ON : 2019-03-27
-- ---------------------------------------------------------------
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
	public function index(){
		$data['title'] = title();
		$data['description'] = description();
		$data['keywords'] = keywords();

		#$data['kategori'] = $this->db->query("SELECT * FROM (SELECT a.*,b.produk FROM (SELECT * FROM `rb_kategori_produk`) as a LEFT JOIN
		#								(SELECT id_kategori_produk, COUNT(*) produk FROM rb_produk GROUP BY id_kategori_produk HAVING COUNT(id_kategori_produk)) as b on a.id_kategori_produk=b.id_kategori_produk ORDER BY RAND()) as c WHERE produk>=1 ORDER BY c.id_kategori_produk DESC LIMIT 6");
		$this->template->load(template().'/template',template().'/content',$data);
	}

	function voucher(){
		$data['record'] = $this->model_app->view_ordering('rb_voucher','id_voucher','ASC');
		$this->template->load(template().'/template',template().'/voucher',$data);
    } 
}
