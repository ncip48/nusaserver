<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Confirm extends CI_Controller {

    public function index(){
        //echo random_string('alnum', 35);
    }

    public function kode($kode, $iduser){
        //$kode = $this->uri->segment(3);
        //$iduser = decrypt_url($this->uri->segment(4));

        if ($this->session->id_konsumen_temp == ''){
            $id = decrypt_url($iduser);
        }else{
            $id = $this->session->id_konsumen_temp;
        }

        $cek = $this->db->query("SELECT * FROM rb_konsumen where id_konsumen='$id' AND kode_konfirmasi='$kode'");
		$row = $cek->row_array();
        $total = $cek->num_rows();
        
        if ($total > 0){
            $this->db->query("UPDATE rb_konsumen SET confirm='1'  where id_konsumen='$id'");
            $this->session->unset_userdata('id_konsumen_temp');
            $this->session->set_userdata(array('id_konsumen'=>$row['id_konsumen'], 'level'=>'konsumen'));
            $data['error'] = '0';
            $data['title'] = "Aktivasi Sukses";
            //redirect('members/profile');
            /*echo "<script type='text/javascript'>
                var count = 6;
                var redirect = '". base_url()."mulai';
                 
                function countDown(){
                    var timer = document.getElementById('timer');
                    if(count > 0){
                        count--;
                        timer.innerHTML = 'Tunggu '+count+' detik.';
                        setTimeout('countDown()', 1000);
                    }else{
                        window.location.href = redirect;
                    }
                }
                </script>
                 
                Aktivasi berhasil.
                <br>
                 
                <span id='timer'>
                <script type='text/javascript'>countDown();</script>
                </span>";*/
        }else{
            $aktif = $this->db->query("SELECT * FROM rb_konsumen where kode_konfirmasi='$kode'")->row_array();
            if ($aktif['confirm']=='1'){
                $data['error'] = '2';
                $data['title'] = "Aktivasi Gagal";
                /*echo "<script type='text/javascript'>
                var count = 6;
                var redirect = '". base_url()."mulai';
                 
                function countDown(){
                    var timer = document.getElementById('timer');
                    if(count > 0){
                        count--;
                        timer.innerHTML = 'This page will redirect in '+count+' seconds.';
                        setTimeout('countDown()', 1000);
                    }else{
                        window.location.href = redirect;
                    }
                }
                </script>
                 
                User sudah aktif.
                <br>
                 
                <span id='timer'>
                <script type='text/javascript'>countDown();</script>
                </span>"; */
            }else{
                //echo "Kirim aktivasi lagi?";
                $data['error'] = '1';
                $data['title'] = "Aktivasi Gagal";
            }
        }
        $this->template->load('phpmu-one/template','phpmu-one/view_aktivasi',$data);
        //echo $kode;
        //echo $id;
    }
}