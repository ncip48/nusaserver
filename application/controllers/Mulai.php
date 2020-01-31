<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mulai extends CI_Controller {


    public function index(){
        //echo random_string('alnum', 35);
        $this->main();
    }

    public function main(){
        $data['title'] = 'NusaServer';
		$data['row'] = $this->model_app->profile_konsumen($this->session->id_konsumen)->row_array();
		$row = $this->model_app->profile_konsumen($this->session->id_konsumen)->row_array();
        $data['produk'] = $this->model_app->view('rb_produk');

		$this->template->load('phpmu-one/template','phpmu-one/gettingstarted',$data);
    }

    public function validasi(){
      if($this->input->is_ajax_request()) {
        $produk_id = $this->input->post('produk_id');
        $row = $this->model_app->view_where('rb_produk',array('id_produk'=>$produk_id))->row_array();
        $kons = $this->model_app->view_where('rb_konsumen',array('id_konsumen'=>$this->session->id_konsumen))->row_array();
        $harga = explode(';', $row['harga_konsumen']);
                          if ($row[id_produk] == '17'){
                            if ($kons['ph']=='0'){
                              $hargafix = $harga[1];
                              $hargasatu = "<del>Rp ".rupiah($harga[0])."</del><br><small> Rp ".rupiah($harga[1])."</small>";
                              //$this->output->set_output(json_encode($harga[1]));
                            }else{
                              $hargafix = $harga[0];
                              $hargasatu = "<span>Rp ".rupiah($harga[0])."</span><br>";
                            }
                            /* echo "Harga 1 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[0])."</span><br>
                            Harga 6 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[2])."</span> ( Hemat ".rupiah((6*$harga[0])-$harga[2])." )<br>
                            Harga 12 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[3])."</span> ( Hemat ".rupiah((12*$harga[0])-$harga[3])." )<br>"; */

                            echo $hargasatu.";".rupiah($harga[2]).";".rupiah($harga[2]/6).";".rupiah($harga[3]).";".rupiah($harga[3]/12).";".rupiah($hargafix).";".rupiah($harga[2]).";".rupiah($harga[3]).";".$row['nama_produk'];
                          }elseif($row[id_produk] == '18'){
                            if ($kons['pt']=='0'){
                              $hargafix = $harga[1];
                              $hargasatu = "<del>Rp ".rupiah($harga[0])."</del><br><small> Rp ".rupiah($harga[1])."</small>";
                            }else{
                              $hargafix = $harga[0];
                              $hargasatu = "<span>Rp ".rupiah($harga[0])."</span><br>";
                            }
                            echo $hargasatu.";".rupiah($harga[2]).";".rupiah($harga[2]/6).";".rupiah($harga[3]).";".rupiah($harga[3]/12).";".rupiah($hargafix).";".rupiah($harga[2]).";".rupiah($harga[3]).";".$row['nama_produk'];
                          }elseif($row[id_produk] == '19'){
                            if ($kons['pb']=='0'){
                              $hargafix = $harga[1];
                              $hargasatu = "<del>Rp ".rupiah($harga[0])."</del><br><small> Rp ".rupiah($harga[1])."</small>";
                            }else{
                              $hargafix = $harga[0];
                              $hargasatu = "<span>Rp ".rupiah($harga[0])."</span><br>";
                            }
                            echo $hargasatu.";".rupiah($harga[2]).";".rupiah($harga[2]/6).";".rupiah($harga[3]).";".rupiah($harga[3]/12).";".rupiah($hargafix).";".rupiah($harga[2]).";".rupiah($harga[3]).";".$row['nama_produk'];
                          }
                        }
    }

    public function pembayaran(){
      if($this->input->is_ajax_request()) {
        $bank = $this->input->post('bank');
        $row = $this->model_app->view_where('rb_rekening',array('nama_bank'=>$bank))->row_array();
        $data = array();
        $data['norek'] = $row['no_rekening'];
        $data['nama'] = $row['pemilik_rekening'];
        $this->output->set_output(json_encode($data));
      }
    }

    public function ceksubdomain(){
      if($this->input->is_ajax_request()) {
        $subdomain = $this->input->post('subdomain');
        $cek = $this->model_app->view_where('subdomain',array('nama_subdomain'=>$subdomain));
        $row = $cek->row_array();
        $total = $cek->num_rows();
        
        if ($total > 0){
          $data = array();
          $data['error'] = "1";
          $data['pesan'] = "Subdomain Sudah Dipakai, Pilih Subdomain Lain";
          $this->output->set_output(json_encode($data));
        }else{
          $data = array();
          $data['error'] = "0";
          $data['pesan'] = "Subdomain ".$subdomain." Tersedia, Pakai?";
          $this->output->set_output(json_encode($data));
        }
        
      }
    }

    public function beli(){
      if($this->input->is_ajax_request()) {
        $id_konsumen = $this->input->post('a');
        $id_produk = $this->input->post('b');
        $tipe = $this->input->post('c');
        $tgldaftar = $this->input->post('d');
        $durasi = $this->input->post('e');
        $harga_final = $this->input->post('f');

        $bank = $this->input->post('g');

        $pilihandomain = $this->input->post('l');
        $subdomain = $this->input->post('h');
        $tld = $this->input->post('i');
        $durasidomain = $this->input->post('j');
        $hargadomain = $this->input->post('k');
        $row = $this->model_app->view_where('rb_produk',array('id_produk'=>$id_produk))->row_array;
        $namaproduk = $row['nama_produk'];

        if ($id_produk=='') {
          $error[] = 'Tolong Pilih Paket';
        }
        if ($durasi=='') {
          $error[] = 'Tolong Pilih Durasi Paket';
        }
        if ($tipe=='') {
          $error[] = 'Tolong Pilih Tipe Produk';
        }
        if ($subdomain=='') {
          $error[] = 'Tolong Pilih Nama Domain';
        }
        if ($bank=='') {
          $error[] = 'Tolong Pilih Metode Pembayaran';
        }

        if (isset($error)) {
          $data = array('error'=>"<span class='badge badge-pill badge-danger'>!</span> <small class='text-danger'>".implode("</small><br /><span class='badge badge-pill badge-danger'>!</span> <small class='text-danger'>", $error));
          $this->output->set_output(json_encode($data));
        }else{
          $data = array();
          $data['error'] = '0';
          $data['id_konsumen'] = $id_konsumen;
          $data['id_produk'] = $id_produk;
          
          $data['nama_produk'] = $namaproduk;
          $data['tipe'] = $tipe;
          $data['tgldaftar'] = $tgldaftar;
          $data['durasi'] = $durasi;
          $data['hargafinal'] = $harga_final;

          $data['pilihan_domain'] = $pilihandomain;
          $data['subdomain'] = $subdomain;
          $data['tld'] = $tld;
          $data['tgldaftar_domain'] = $tgldaftar;
          $data['durasi_domain'] = $durasidomain;
          $data['harga_domain'] = $hargadomain;
          $this->output->set_output(json_encode($data));
        }
      }
    }

}