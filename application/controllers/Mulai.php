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
                              $hargasatu = "<span style='color:green; font-size:20px'>Rp ".rupiah($harga[0])."</span><br>";
                            }
                            /* echo "Harga 1 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[0])."</span><br>
                            Harga 6 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[2])."</span> ( Hemat ".rupiah((6*$harga[0])-$harga[2])." )<br>
                            Harga 12 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[3])."</span> ( Hemat ".rupiah((12*$harga[0])-$harga[3])." )<br>"; */

                            echo $hargasatu.";".rupiah($harga[2]).";".rupiah($harga[2]/6).";".rupiah($harga[3]).";".rupiah($harga[3]/12).";".$harga[1].";".$harga[2].";".$harga[3];
                          }elseif($row[id_produk] == '18'){
                            if ($kons['pt']=='0'){
                              $hargafix = $harga[1];
                              $hargasatu = "<del>Rp ".rupiah($harga[0])."</del><br><small> Rp ".rupiah($harga[1])."</small>";
                            }else{
                              $hargafix = $harga[0];
                              $hargasatu = "<span style='color:green; font-size:20px'>Rp ".rupiah($harga[0])."</span><br>";
                            }
                            echo $hargasatu.";".rupiah($harga[2]).";".rupiah($harga[2]/6).";".rupiah($harga[3]).";".rupiah($harga[3]/12).";".$harga[1].";".$harga[2].";".$harga[3];
                          }elseif($row[id_produk] == '19'){
                            if ($kons['pb']=='0'){
                              $hargafix = $harga[1];
                              $hargasatu = "<del>Rp ".rupiah($harga[0])."</del><br><small> Rp ".rupiah($harga[1])."</small>";
                            }else{
                              $hargafix = $harga[0];
                              $hargasatu = "<span style='color:green; font-size:20px'>Rp ".rupiah($harga[0])."</span><br>";
                            }
                            echo $hargasatu.";".rupiah($harga[2]).";".rupiah($harga[2]/6).";".rupiah($harga[3]).";".rupiah($harga[3]/12).";".$harga[1].";".$harga[2].";".$harga[3];
                          }
                        }
    }
}