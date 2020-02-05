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
        $hargasatu = explode(';', $row['harga_satu']);
        $hargaenam = explode(';', $row['harga_enam']);
        $hargaduabelas = explode(';', $row['harga_duabelas']);
        if ($row[id_produk] == '17'){
          if ($kons['ph']=='0'){
            $hargafix = $hargasatu[1];
            $hargafixenam = $hargaenam[1];
            $hargafixduabelas = $hargaduabelas[1];
            $one = "<del>Rp ".rupiah($hargasatu[0])."</del><br><small> Rp ".rupiah($hargasatu[1])."</small>";
            $six = "<del>Rp ".rupiah($hargaenam[0])."</del><br><small> Rp ".rupiah($hargaenam[1])."</small>";
            $twelve = "<del>Rp ".rupiah($hargaduabelas[0])."</del><br><small> Rp ".rupiah($hargaduabelas[1])."</small>";
            $diskon = '0';
          }else{
            $hargafix = $hargasatu[0];
            $hargafixenam = $hargaenam[0];
            $hargafixduabelas = $hargaduabelas[0];
            $one = "<span>Rp ".rupiah($hargasatu[0])."</span>";
            $six = "<span>Rp ".rupiah($hargaenam[0])."</span>";
            $twelve = "<span>Rp ".rupiah($hargaduabelas[0])."</span>";
            $diskon = "1";
          }
          /* echo "Harga 1 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[0])."</span><br>
          Harga 6 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[2])."</span> ( Hemat ".rupiah((6*$harga[0])-$harga[2])." )<br>
          Harga 12 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[3])."</span> ( Hemat ".rupiah((12*$harga[0])-$harga[3])." )<br>"; */
          //echo $hargasatu.";".rupiah($harga[2]).";".rupiah($harga[2]/6).";".rupiah($harga[3]).";".rupiah($harga[3]/12).";".rupiah($hargafix).";".rupiah($harga[2]).";".rupiah($harga[3]).";".$row['nama_produk'];
          $data = array();
          $data['nama_paket'] = $row['nama_produk'];
          $data['diskon'] = $diskon;
          $data['satu'] = $one;
          $data['enam'] = $six;
          $data['duabelas'] = $twelve;
          $data['satufix'] = $hargafix;
          $data['enamfix'] = $hargafixenam;
          $data['duabelasfix'] = $hargafixduabelas;
          $data['rpsatufix'] = rupiah($hargafix);
          $data['rpenamfix'] = rupiah($hargafixenam);
          $data['rpduabelasfix'] = rupiah($hargafixduabelas);
          $this->output->set_output(json_encode($data));
        }elseif($row[id_produk] == '18'){
          if ($kons['pt']=='0'){
            $hargafix = $hargasatu[1];
            $hargafixenam = $hargaenam[1];
            $hargafixduabelas = $hargaduabelas[1];
            $one = "<del>Rp ".rupiah($hargasatu[0])."</del><br><small> Rp ".rupiah($hargasatu[1])."</small>";
            $six = "<del>Rp ".rupiah($hargaenam[0])."</del><br><small> Rp ".rupiah($hargaenam[1])."</small>";
            $twelve = "<del>Rp ".rupiah($hargaduabelas[0])."</del><br><small> Rp ".rupiah($hargaduabelas[1])."</small>";
            $diskon = '0';
          }else{
            $hargafix = $hargasatu[0];
            $hargafixenam = $hargaenam[0];
            $hargafixduabelas = $hargaduabelas[0];
            $one = "<span>Rp ".rupiah($hargasatu[0])."</span>";
            $six = "<span>Rp ".rupiah($hargaenam[0])."</span>";
            $twelve = "<span>Rp ".rupiah($hargaduabelas[0])."</span>";
            $diskon = "1";
          }
          //echo $hargasatu.";".rupiah($harga[2]).";".rupiah($harga[2]/6).";".rupiah($harga[3]).";".rupiah($harga[3]/12).";".rupiah($hargafix).";".rupiah($harga[2]).";".rupiah($harga[3]).";".$row['nama_produk'];
          $data = array();
          $data['nama_paket'] = $row['nama_produk'];
          $data['diskon'] = $diskon;
          $data['satu'] = $one;
          $data['enam'] = $six;
          $data['duabelas'] = $twelve;
          $data['satufix'] = $hargafix;
          $data['enamfix'] = $hargafixenam;
          $data['duabelasfix'] = $hargafixduabelas;
          $data['rpsatufix'] = rupiah($hargafix);
          $data['rpenamfix'] = rupiah($hargafixenam);
          $data['rpduabelasfix'] = rupiah($hargafixduabelas);
          $this->output->set_output(json_encode($data));
        }elseif($row[id_produk] == '19'){
          if ($kons['pb']=='0'){
            $hargafix = $hargasatu[1];
              $hargafixenam = $hargaenam[1];
              $hargafixduabelas = $hargaduabelas[1];
              $one = "<del>Rp ".rupiah($hargasatu[0])."</del><br><small> Rp ".rupiah($hargasatu[1])."</small>";
              $six = "<del>Rp ".rupiah($hargaenam[0])."</del><br><small> Rp ".rupiah($hargaenam[1])."</small>";
              $twelve = "<del>Rp ".rupiah($hargaduabelas[0])."</del><br><small> Rp ".rupiah($hargaduabelas[1])."</small>";
              $diskon = '0';
            }else{
              $hargafix = $hargasatu[0];
              $hargafixenam = $hargaenam[0];
              $hargafixduabelas = $hargaduabelas[0];
              $one = "<span>Rp ".rupiah($hargasatu[0])."</span>";
              $six = "<span>Rp ".rupiah($hargaenam[0])."</span>";
              $twelve = "<span>Rp ".rupiah($hargaduabelas[0])."</span>";
              $diskon = "1";
            }
            //echo $hargasatu.";".rupiah($harga[2]).";".rupiah($harga[2]/6).";".rupiah($harga[3]).";".rupiah($harga[3]/12).";".rupiah($hargafix).";".rupiah($harga[2]).";".rupiah($harga[3]).";".$row['nama_produk'];
            $data = array();
            $data['nama_paket'] = $row['nama_produk'];
            $data['diskon'] = $diskon;
            $data['satu'] = $one;
            $data['enam'] = $six;
            $data['duabelas'] = $twelve;
            $data['satufix'] = $hargafix;
            $data['enamfix'] = $hargafixenam;
            $data['duabelasfix'] = $hargafixduabelas;
            $data['rpsatufix'] = rupiah($hargafix);
            $data['rpenamfix'] = rupiah($hargafixenam);
            $data['rpduabelasfix'] = rupiah($hargafixduabelas);
            $this->output->set_output(json_encode($data));
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
        $tgldaftar = date('Y-m-d H-i-s');
        $durasi = $this->input->post('e');
        $harga_final = $this->input->post('f');

        $bank = $this->input->post('g');
        $rek = $this->model_app->view_where('rb_rekening',array('nama_bank'=>$bank))->row_array();
        $pemilikrek = $rek['pemilik_rekening'];
        $norek = $rek['no_rekening'];
        
        $pilihandomain = $this->input->post('l');

        $subdomain = $this->input->post('h');
        $tld = $this->input->post('i');
        $durasidomain = $this->input->post('j');
        $hargadomain = $this->input->post('k');
        $rowd = $this->model_app->view_where('rb_produk',array('id_produk'=>$id_produk))->row_array();
        $namaproduk = $rowd['nama_produk'];

        $totalpay = $harga_final+$hargadomain;
        $aktif = '0';
        $kodetx = $this->input->post('kodetrx');

        $identitas = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
        $row = $this->db->query("SELECT * FROM rb_konsumen where id_konsumen='".$this->session->id_konsumen."'")->row_array();
        if ($row['jenis_kelamin']=='Laki-laki'){ $panggill = 'Bpk.'; }else{ $panggill = 'Ibuk.'; }

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

          $data2 = array('id_konsumen'=>$id_konsumen,
	        			  'nama_domain'=>$subdomain,
	        			  'tld'=>$tld,
	        			  'tgl_daftar'=>$tgldaftar,
	        			  'durasi_domain'=>$durasidomain,
	        			  'harga_domain'=>$hargadomain,
						      'aktif'=>$aktif);
          $this->db->insert('rb_domain',$data2);
          $id_domain = $this->db->insert_id();

          $datab = array('id_konsumen'=>$id_konsumen,
                  'id_produk'=>$id_produk,
                  'id_domain'=>$id_domain,
                  'tipe'=>$tipe,
                  'tgl_daftar'=>$tgldaftar,
	        			  'durasi'=>$durasi,
	        			  'harga'=>$harga_final,
	        			  'aktif'=>$aktif);
          $this->db->insert('rb_services',$datab);
          $id_order = $this->db->insert_id();

          $data3 = array('no_tagihan'=>$kodetx,
	        			  'id_konsumen'=>$id_konsumen,
	        			  'id_order'=>$id_order,
	        			  'id_domain'=>$id_domain,
	        			  'total'=>$totalpay,
	        			  'ppn'=>$aktif,
                  'tanggal'=>$tgldaftar,
                  'status'=>$aktif,
                  'bank'=>$bank);
          $this->db->insert('rb_invoice',$data3);

          if ($pilihandomain=='1'){
            $data4 = array('nama_subdomain'=>$subdomain.".".$tld);
          $this->db->insert('subdomain',$data4);
          }
          /*$data = array();
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

          $data['bank'] = $bank;
          $data['namarek'] = $pemilikrek;
          $data['norek'] = $norek;

          $data['totalpay'] = $totalpay; */

          $email_tujuan = $row['email'];
          $subject      = 'Order Diterima';
          $message      = "<html><body>Halooo! <b>$panggill ".$row['nama_lengkap']."</b> ... <br> Hari ini pada tanggal <span style='color:red'>".tgl_jam($tgldaftar)."</span> Anda Melakukan Order Dengan detail sbb:
            <table style='width:100%; margin-left:25px'>
                <tr><td style='background:#337ab7; color:#fff; pading:20px' cellpadding=6 colspan='2'><b>Berikut Data Order Anda : </b></td></tr>
              <tr><td><b>Nama Lengkap</b></td>			<td> : ".$row['nama_lengkap']."</td></tr>
              <tr><td><b>Nama Paket</b></td>			<td> : ".$namaproduk." ($durasi Hari) Template ke $tipe</td></tr>
              <tr><td><b>Harga Paket</b></td>				<td> : ".rupiah($harga_final)."</td></tr>
              <tr><td><b>Nama Domain</b></td>			<td> : ".$subdomain.".".$tld." </td></tr>
              <tr><td><b>Harga Domain</b></td>				<td> : ".rupiah($hargadomain)." </td></tr>
              <tr><td><b>Total</b></td>			<td> : ".rupiah($totalpay)." </td></tr>
            </table>
            <br> Silahkan Konfirmasi di : <a href='".$identitas['url']."/konfirmasi/".$kodetx."'>Sini</a> <br>
            Admin, $identitas[nama_website] </body></html> \n";
          
          $this->email->from($identitas['email'], $identitas['nama_website']);
          $this->email->to($email_tujuan);
          $this->email->cc('');
          $this->email->bcc('');

          $this->email->subject($subject);
          $this->email->message($message);
          $this->email->set_mailtype("html");
          $this->email->send();
          
          $config['protocol'] = 'sendmail';
          $config['mailpath'] = '/usr/sbin/sendmail';
          $config['charset'] = 'utf-8';
          $config['wordwrap'] = TRUE;
          $config['mailtype'] = 'html';
          $this->email->initialize($config);

          $data = array('error'=>'0','error'=>"<span class='badge badge-pill badge-success'>o</span> <small class='text-dark'>Pembelian Berhasil, silahkan cek di dashboard anda dan email anda untuk konfirmasi pembayaran, kode trx : ".$kodetx."</small>");
          $this->output->set_output(json_encode($data));
        }
      }
    }

}