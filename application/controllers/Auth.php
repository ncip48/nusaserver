<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('ProvinsiModel');
		$this->load->model('KotaModel');
	}

	function state(){
		$country_id = $this->input->post('count_id');
		$data['provinsi'] = $this->model_app->view_where_ordering('rb_state',array('country_id' => $country_id),'state_id','DESC');
		$this->load->view('phpmu-one/view_state',$data);
	}

	function city(){
		$state_id = $this->input->post('stat_id');
		$data['kota'] = $this->model_app->view_where_ordering('rb_city',array('state_id' => $state_id),'city_id','DESC');
		$this->load->view('phpmu-one/view_city',$data);
	}

	public function listKota(){
		// Ambil data ID Provinsi yang dikirim via ajax post
		$id_provinsi = $this->input->post('id_provinsi');
		
		$kota = $this->KotaModel->viewByProvinsi($id_provinsi);
		
		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Pilih</option>";
		
		foreach($kota as $data){
		  $lists .= "<option value='".$data->kota_id."'>".$data->nama_kota."</option>"; // Tambahkan tag option ke variabel $lists
		}
		
		$callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	  }	

	public function register($kode_reff){
			$kode_reff = decrypt_url($kode_reff);
			$data['cekreff'] = $this->db->query("SELECT * FROM rb_reseller WHERE kode_refferal='".$kode_reff."' AND aktif='1'")->num_rows();
			$data['title'] = 'Formulir Pendaftaran';
			$data['provinsi'] = $this->ProvinsiModel->view();
			$data['kota'] = $this->model_app->view_ordering('rb_kota','kota_id','ASC');
			if ($kode_reff != ''){
				$data['refferal'] = $this->db->query("SELECT * FROM rb_reseller a JOIN rb_konsumen b ON a.id_konsumen=b.id_konsumen WHERE kode_refferal='".$kode_reff."'")->row_array();
			}
			$this->template->load('phpmu-one/template','phpmu-one/view_register',$data);
			//$this->load->view('phpmu-one/view_register3', $data);
	}

	public function aksiregister(){
			$data = array('username'=>$this->input->post('a'),
	        			  'password'=>hash("sha512", md5($this->input->post('b'))),
	        			  'nama_lengkap'=>$this->input->post('c'),
	        			  'email'=>$this->input->post('d'),
						  'alamat_lengkap'=>$this->input->post('e'),
						  'provinsi_id'=>$this->input->post('provinsi'),
	        			  'kota_id'=>$this->input->post('kota'),
						  'no_hp'=>$this->input->post('j'),
						  'tanggal_daftar'=>date('Y-m-d H:i:s'),
						  'kode_konfirmasi' => random_string('alnum', 35),
						  'refferal' => $this->input->post('reff'));
			$this->model_app->insert('rb_konsumen',$data);
			$id = $this->db->insert_id();
			$this->session->set_userdata(array('id_konsumen_temp'=>$id));
			$rowd = $this->model_app->profile_konsumen($this->session->id_konsumen_temp)->row_array();
			$identitas = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
				
			$config = Array(
				'protocol' => 'sendmail',
				'mailpath' => '/usr/sbin/sendmail',
				'charset' => 'utf-8',
				'wordwrap' => TRUE,
				'mailtype' => 'html',
			);

			$message      = "<html><body>Hallo ".$rowd['nama_lengkap']." Silahkan Klik Link Aktivasi berikut : <a href='".base_url()."confirm/".$rowd['kode_konfirmasi']."/".encrypt_url($rowd['id_konsumen'])."'>klik disini</a> </body></html> \n";
			$email_tujuan = $rowd['email'];

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
	
			$this->email->from($identitas['email'], $identitas['nama_website']);
			$this->email->to($email_tujuan);
			$this->email->subject('Konfirmasi Email');
			$this->email->set_mailtype("html");
			$this->email->message($message);
	
			if($this->email->send()){
				//redirect('auth/confirm');
				/*echo "<script>Swal.fire({
					icon: 'success',
					title: 'Pendaftaran berhasil, silahkan cek email untuk konfirmasi...',
					showConfirmButton: false,
					timer: 3000
				  }); $(document).ready(function () {
					window.setTimeout(function () {
						location.href = '".base_url()."';
					}, 3500);
				});</script>"; */
				//$data['title'] = "Pendaftaran Sukses";
				$id_temp = $this->session->id_konsumen_temp;
				$rows = $this->db->query("SELECT * FROM rb_konsumen where id_konsumen='$id_temp'")->row_array();
				//$this->load->view('phpmu-one/view_register_sukses',$data);
				echo "<div class='tab-pane fade show active' id='home' role='tabpanel' aria-labelledby='home-tab'>
                                <h3 class='register-heading'>Pendaftaran Sukses</h3>
                                <div class='row register-form align-items-center'>
                                    <div class='col text-center text-white'>
                                    <h5>Silahkan cek inbox / spam email <i>".$rows['email']."</i> untuk konfirmasi email. Terimakasih</h5>
                                    </div>
                                </div>
                            </div>";
			} else {
				show_error($this->email->print_debugger());
			}
			//redirect('auth/confirm');
	}

	public function login(){
			$data['title'] = 'User Login';
			$this->template->load('phpmu-one/template','phpmu-one/view_login',$data);
	}

	public function aksilogin(){
		if($this->input->is_ajax_request()) {
			$username = strip_tags($this->input->post('a'));
			$password = hash("sha512", md5(strip_tags($this->input->post('b'))));
			$cekusername = $this->db->query("SELECT * FROM rb_konsumen where username='".$this->db->escape_str($username)."'")->num_rows();
			$ceklogin = $this->db->query("SELECT * FROM rb_konsumen where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."'")->num_rows();
			
			$cek = $this->db->query("SELECT * FROM rb_konsumen where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."'");
			$row = $cek->row_array();
			$total = $cek->num_rows();

			if ($username=='') {
				$error[] = 'Masukkan Username';
			}
			if ($this->input->post('b')=='') {
				$error[] = 'Masukkan Password';
			}
			if ($cekusername=='0') {
				$error[] = 'Username tidak ditemukan';
			}
			if ($ceklogin=='0') {
				$error[] = 'Username/Password Salah';
			}
			if (isset($error)) {
				$data = array('result'=>'0','error'=>"<span class='badge badge-pill badge-danger'>!</span> <small class='text-white'>".implode("</small><br /><span class='badge badge-pill badge-danger'>!</span> <small class='text-white'>", $error));
				$this->output->set_output(json_encode($data));
			}else{
				if ($row['confirm']=='0'){
					$data = array('result'=>'0','error'=>"<span class='badge badge-pill badge-danger'>!</span> <small class='text-white'>Mohon konfirmasi email anda</small>");
					$this->output->set_output(json_encode($data));
				}else{
					$this->session->set_userdata(array('id_konsumen'=>$row['id_konsumen'], 'level'=>'konsumen'));
					$data = array('result'=>'1','error'=>"<span class='badge badge-pill badge-success'>o</span> <small class='text-white'>Berhasil Login</small>");
					$this->output->set_output(json_encode($data));
				}
			}
		}
	}

	public function confirm(){
		$data['title'] = 'Pendaftaran Berhasil';
		$id = $this->session->id_konsumen_temp;
        $data['row'] = $this->db->query("SELECT * FROM rb_konsumen where id_konsumen='$id'")->row_array();
		//$this->load->view('phpmu-one/template','phpmu-one/view_confirm',$data);
		echo "<script>Swal.fire({
			icon: 'success',
			title: 'Pendaftaran berhasil, silahkan cek email untuk konfirmasi...',
			showConfirmButton: false,
			timer: 3000
		  }); $(document).ready(function () {
			window.setTimeout(function () {
				location.href = '".base_url()."';
			}, 3500);
		});</script>";
	}

	public function lupass(){
		if (isset($_POST['lupa'])){
			$email = strip_tags($this->input->post('a'));
			$cek = $this->db->query("SELECT * FROM rb_konsumen where email='".$this->db->escape_str($email)."'");
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){
				$identitas = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
				$randompass = generateRandomString(10);
				$passwordbaru = hash("sha512", md5($randompass));
				$this->db->query("UPDATE rb_konsumen SET password='$passwordbaru' where email='".$this->db->escape_str($email)."'");

				if ($row['jenis_kelamin']=='Laki-laki'){ $panggill = 'Bpk.'; }else{ $panggill = 'Ibuk.'; }
				$email_tujuan = $row['email'];
				$tglaktif = date("d-m-Y H:i:s");
				$subject      = 'Permintaan Reset Password ...';
				$message      = "<html><body>Halooo! <b>$panggill ".$row['nama_lengkap']."</b> ... <br> Hari ini pada tanggal <span style='color:red'>$tglaktif</span> Anda Mengirimkan Permintaan untuk Reset Password
					<table style='width:100%; margin-left:25px'>
		   				<tr><td style='background:#337ab7; color:#fff; pading:20px' cellpadding=6 colspan='2'><b>Berikut Data Informasi akun Anda : </b></td></tr>
						<tr><td><b>Nama Lengkap</b></td>			<td> : ".$row['nama_lengkap']."</td></tr>
						<tr><td><b>Alamat Email</b></td>			<td> : ".$row['email']."</td></tr>
						<tr><td><b>No Telpon</b></td>				<td> : ".$row['no_hp']."</td></tr>
						<tr><td><b>Jenis Kelamin</b></td>			<td> : ".$row['jenis_kelamin']." </td></tr>
						<tr><td><b>Tempat Lahir</b></td>				<td> : ".$row['tempat_lahir']." </td></tr>
						<tr><td><b>Tanggal Lahir</b></td>			<td> : ".$row['tanggal_lahir']." </td></tr>
						<tr><td><b>Alamat Lengkap</b></td>			<td> : ".$row['alamat_lengkap']." </td></tr>
						<tr><td><b>Waktu Daftar</b></td>			<td> : ".$row['tanggal_daftar']."</td></tr>
					</table>
					<br> Username Login : <b style='color:red'>$row[username]</b>
					<br> Password Login : <b style='color:red'>$randompass</b>
					<br> Silahkan Login di : <a href='$identitas[url]'>$identitas[url]</a> <br>
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

				$data['email'] = $email;
				$data['title'] = 'Permintaan Reset Password Sudah Terkirim...';
				$this->template->load('phpmu-one/template','phpmu-one/view_lupass_success',$data);
			}else{
				$data['email'] = $email;
				$data['title'] = 'Email Tidak Ditemukan...';
				$this->template->load('phpmu-one/template','phpmu-one/view_lupass_error',$data);
			}
		}
	}
}
