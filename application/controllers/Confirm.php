<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Confirm extends CI_Controller {

    public function index(){
        //echo random_string('alnum', 35);
    }

    public function kode(){
        $kode = $this->uri->segment(3);
        $id = $this->session->id_konsumen_temp;

        $cek = $this->db->query("SELECT * FROM rb_konsumen where id_konsumen='$id' AND kode_konfirmasi='$kode'");
		$row = $cek->row_array();
        $total = $cek->num_rows();
        
        if ($total > 0){
            $this->db->query("UPDATE rb_konsumen SET confirm='1'  where id_konsumen='$id'");
            $this->session->unset_userdata('id_konsumen_temp');
            $this->session->set_userdata(array('id_konsumen'=>$row['id_konsumen'], 'level'=>'konsumen'));
            //redirect('members/profile');
            echo "<script type='text/javascript'>
                var count = 6;
                var redirect = '". base_url()."members/profile';
                 
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
                </span>";
        }else{
            $aktif = $this->db->query("SELECT * FROM rb_konsumen where kode_konfirmasi='$kode'")->row_array();
            if ($aktif['confirm']=='1'){
                echo "<script type='text/javascript'>
                var count = 6;
                var redirect = '". base_url()."members/profile';
                 
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
                </span>";
            }else{
                echo "Kirim aktivasi lagi?";
            }
        }
        //echo $kode;
        //echo $id;
    }
}