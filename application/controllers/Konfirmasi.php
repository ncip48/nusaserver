<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Konfirmasi extends CI_Controller {

	//function index(){
		//$data['title'] = 'Konfirmasi Orderan anda';
		//$this->template->load('phpmu-one/template','phpmu-one/pengunjung/view_konfirmasi_pembayaran',$data);
	//}

	function cek(){
		if($this->input->is_ajax_request()) {
			$kode_transaksi = $this->input->post('a');
			$row = $this->db->query("SELECT * FROM `rb_invoice` where no_tagihan='$kode_transaksi'")->row_array();
			$rek = $this->model_app->view('rb_rekening');
			$ksm = $this->model_app->view_where('rb_konsumen',array('id_konsumen'=>$this->session->id_konsumen))->row_array();

			echo "ANJENGGG";
		}
	}

	function aksikonfirmasi() {
		if($this->input->is_ajax_request()) {
			$config['upload_path'] = 'asset/bukti_transfer/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '10000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('f');
			$hasil=$this->upload->data();
			
				$data = array('id_penjualan'=>$this->input->post('id'),
							'total_transfer'=>$this->input->post('b'),
							'id_rekening'=>$this->input->post('c'),
							'nama_pengirim'=>$this->input->post('d'),
							'tanggal_transfer'=>$this->input->post('e'),
							'bukti_transfer'=>$hasil['file_name'],
							'waktu_konfirmasi'=>date('Y-m-d H:i:s'));
				$this->model_app->insert('rb_konfirmasi',$data);
			
			$data = array('result'=>'0','error'=>"<span class='badge badge-pill badge-success'>o</span> <small class='text-dark'>Konfirmasi telah dikirim, tunggu sampai paket anda aktif. Terimakasih :)</small>");
			$this->output->set_output(json_encode($data));
		}
	}

	function kodetrx($kode){
		$data['title'] = 'Konfirmasi Orderan anda';
		$kode_transaksi = decrypt_url($kode);
		$data['rows'] = $this->db->query("SELECT * FROM rb_invoice a JOIN rb_services b ON a.id_order=b.id_order JOIN rb_produk c ON b.id_produk=c.id_produk JOIN rb_domain d ON a.id_domain=d.id_domain JOIN rb_rekening e ON a.bank=e.nama_bank where a.no_tagihan='$kode_transaksi'")->row_array();

		$data['ksm'] = $this->model_app->view_where('rb_konsumen',array('id_konsumen'=>$this->session->id_konsumen))->row_array();
		$this->template->load('phpmu-one/template','phpmu-one/pengunjung/view_konfirmasi_pembayaran',$data);
	}


	function tracking(){
		if (isset($_POST['submit1']) OR $this->uri->segment(3)!=''){
			if ($this->uri->segment(3)!=''){
				$kode_transaksi = filter($this->uri->segment(3));
			}else{
				$kode_transaksi = filter($this->input->post('a'));
			}

			$cek = $this->model_app->view_where('rb_penjualan',array('kode_transaksi'=>$kode_transaksi));
			if ($cek->num_rows()>=1){
				$data['title'] = 'Tracking Order '.$kode_transaksi;
				$data['kode_transaksi'] = $kode_transaksi;
				$data['rows'] = $this->db->query("SELECT * FROM rb_penjualan a JOIN rb_konsumen b ON a.id_pembeli=b.id_konsumen JOIN rb_kota c ON b.kota_id=c.kota_id where a.kode_transaksi='$kode_transaksi'")->row_array();
				$data['record'] = $this->db->query("SELECT a.kode_transaksi, b.*, c.nama_produk, c.satuan, c.berat, c.diskon, c.produk_seo FROM `rb_penjualan` a JOIN rb_penjualan_detail b ON a.id_penjualan=b.id_penjualan JOIN rb_produk c ON b.id_produk=c.id_produk where a.kode_transaksi='".$kode_transaksi."'");
				$data['total'] = $this->db->query("SELECT a.resi, a.kode_transaksi, a.kurir, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `rb_penjualan` a JOIN rb_penjualan_detail b ON a.id_penjualan=b.id_penjualan JOIN rb_produk c ON b.id_produk=c.id_produk where a.kode_transaksi='".$kode_transaksi."'")->row_array();
				$this->template->load('phpmu-one/template','phpmu-one/pengunjung/view_tracking_view',$data);
			}else{
				redirect('konfirmasi/tracking');
			}
		}else{
			$data['title'] = 'Tracking Order';
			$this->template->load('phpmu-one/template','phpmu-one/pengunjung/view_tracking',$data);
		}
	}
}
