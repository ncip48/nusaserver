<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Artikel extends CI_Controller {

	public function index(){
		$jumlah= $this->model_app->view('berita')->num_rows();
		$config['base_url'] = base_url().'artikel/index';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 9; 	
		if ($this->uri->segment('3')==''){
			$dari = 0;
		}else{
			$dari = $this->uri->segment('3');
		}

		if (is_numeric($dari)) {
			if ($this->input->post('cari')!=''){
				$data['title'] = title();
				$data['judul'] = "Hasil Pencarian keyword - ".filter($this->input->post('cari'));
				$data['berita'] = $this->model_app->cari_produk(filter($this->input->post('cari')));
			}else{
				$data['title'] = title();
				$data['judul'] = 'Semua Informasi/Artikel';
				$data['berita'] = $this->model_app->view_ordering_limit('berita','id_berita','DESC',$dari,$config['per_page']);
				$this->pagination->initialize($config);
			}
			$this->template->load('phpmu-one/template','phpmu-one/view_semua_berita',$data);
		}else{
			redirect('main');
		}
	}

	public function page($hal){
		$jumlah= $this->model_app->view('berita')->num_rows();
		$config['base_url'] = base_url().'artikel/index';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 9; 	
		if ($hal==''){
			$dari = 0;
		}else{
			$dari = $hal;
		}

		if (is_numeric($dari)) {
			if ($this->input->post('cari')!=''){
				$data['title'] = title();
				$data['judul'] = "Hasil Pencarian keyword - ".filter($this->input->post('cari'));
				$data['berita'] = $this->model_app->cari_produk(filter($this->input->post('cari')));
			}else{
				$data['title'] = title();
				$data['judul'] = 'Semua Informasi/Artikel';
				$data['berita'] = $this->model_app->view_ordering_limit('berita','id_berita','DESC',$dari,$config['per_page']);
				$this->pagination->initialize($config);
			}
			$this->template->load('phpmu-one/template','phpmu-one/view_semua_berita',$data);
		}else{
			redirect('main');
		}
	}

	public function detail($judul){
		$ids = $judul;
		//$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM berita where judul_seo='$ids' OR id_berita='$ids'");
	    $row = $dat->row();
	    $total = $dat->num_rows();
	        if ($total == 0){
	        	redirect('main');
	        }
		$data['title'] = $row->judul;
		$data['record'] = $this->model_berita->berita_detail($ids)->row_array();
		$data['infoterbaru'] = $this->model_berita->info_terbaru(6);
		$this->model_berita->berita_dibaca_update($ids);
		$this->template->load('phpmu-one/template','phpmu-one/view_berita',$data);
	}

	public function kategori(){
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM kategori where kategori_seo='$ids' OR id_kategori='$ids'");
	    $row = $dat->row();
	    $total = $dat->num_rows();
	        if ($total == 0){
	        	redirect('main');
	        }
		$data['title'] = $row->nama_kategori;
		$data['kategori'] = $this->model_berita->detail_kategori($row->id_kategori, 9);
		$this->template->load('phpmu-one/template','phpmu-one/view_kategori',$data);
	}

	public function kebijakan(){
		$data['row'] = $this->db->query("SELECT * FROM privacy")->row_array();
		$data['title'] = 'Kebijakan Privasi - NusaServer';
		$this->template->load('phpmu-one/template','phpmu-one/view_kebijakan',$data);
	}
}
