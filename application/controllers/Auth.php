<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
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

	public function register(){
		if (isset($_POST['submit'])){
			

		}elseif (isset($_POST['submit2'])){
			$cek  = $this->model_app->view_where('rb_reseller',array('username'=>$this->input->post('a')))->num_rows();
			if ($cek >= 1){
				$username = $this->input->post('a');
				echo "<script>window.alert('Maaf, Username $username sudah dipakai oleh orang lain!');
                                  window.location=('".base_url()."/auth/register')</script>";
			}else{
				$route = array('administrator','agenda','auth','berita','contact','download','gallery','konfirmasi','main','members','page','produk','reseller','testimoni','video');
				if (in_array($this->input->post('a'), $route)){
					$username = $this->input->post('a');
					echo "<script>window.alert('Maaf, Username $username sudah dipakai oleh orang lain!');
	                                  window.location=('".base_url()."/".$this->input->post('i')."')</script>";
				}else{
				$data = array('username'=>$this->input->post('a'),
		        			  'password'=>hash("sha512", md5($this->input->post('b'))),
		        			  'nama_reseller'=>$this->input->post('c'),
		        			  'jenis_kelamin'=>$this->input->post('d'),
		        			  'alamat_lengkap'=>$this->input->post('e'),
		        			  'no_telpon'=>$this->input->post('f'),
							  'email'=>$this->input->post('g'),
							  'kode_pos'=>$this->input->post('h'),
							  'referral'=>$this->input->post('i'),
							  'tanggal_daftar'=>date('Y-m-d H:i:s'),
							  'kode_konfirmasi' => random_string('alnum', 35));
				$this->model_app->insert('rb_reseller',$data);
				$id = $this->db->insert_id();
				$this->session->set_userdata(array('id_reseller'=>$id, 'level'=>'reseller'));
				redirect('reseller/home');
				}
			}
		}else{
			$data['title'] = 'Formulir Pendaftaran';
			$data['kota'] = $this->model_app->view_ordering('rb_kota','kota_id','ASC');
			$this->load->view('phpmu-one/view_register',$data);
		}
	}

	public function aksiregister(){
			$data = array('username'=>$this->input->post('a'),
	        			  'password'=>hash("sha512", md5($this->input->post('b'))),
	        			  'nama_lengkap'=>$this->input->post('c'),
	        			  'email'=>$this->input->post('d'),
	        			  'alamat_lengkap'=>$this->input->post('e'),
	        			  'kota_id'=>$this->input->post('h'),
						  'no_hp'=>$this->input->post('j'),
						  'tanggal_daftar'=>date('Y-m-d H:i:s'),
						  'kode_konfirmasi' => random_string('alnum', 35));
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

			$message      = "<html><body>Hallo ".$rowd['nama_lengkap']." Silahkan Klik Link Aktivasi berikut : <a href='".base_url()."confirm/kode/".$rowd['kode_konfirmasi']."'>klik disini</a> </body></html> \n";
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
                                    <div class='col text-center'>
                                    <h5>Silahkan cek email <i>".$rows['email']."</i> untuk konfirmasi email. Terimakasih</h5>
                                    </div>
                                </div>
                            </div>";
			} else {
				show_error($this->email->print_debugger());
			}
			//redirect('auth/confirm');
	}

	public function login(){
		if (isset($_POST['login'])){
				$username = strip_tags($this->input->post('a'));
				$password = hash("sha512", md5(strip_tags($this->input->post('b'))));
				$cek = $this->db->query("SELECT * FROM rb_konsumen where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."'");
			    $row = $cek->row_array();
			    $total = $cek->num_rows();
				if ($total > 0){
					if ($row['confirm']=='0'){
						echo "Maaf konfirmasi email dahulu";
					}else{
					$this->session->set_userdata(array('id_konsumen'=>$row['id_konsumen'], 'level'=>'konsumen'));
					redirect('members/profile');
					}
				}else{
					$data['title'] = 'Gagal Login';
					$this->template->load('phpmu-one/template','phpmu-one/view_login_error',$data);
				}
		}else{
			$data['title'] = 'User Login';
			$this->load->view('phpmu-one/view_login',$data);
		}
	}

	public function aksilogin(){
				$username = strip_tags($this->input->post('a'));
				$password = hash("sha512", md5(strip_tags($this->input->post('b'))));
				$cek = $this->db->query("SELECT * FROM rb_konsumen where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."'");
			    $row = $cek->row_array();
			    $total = $cek->num_rows();
				if ($total > 0){
					if ($row['confirm']=='0'){
						echo "<script>Swal.fire({
							icon: 'error',
							title: 'Maaf, Konfirmasi email dahulu!',
							showConfirmButton: false,
							timer: 3000
						  });</script>";
					}else{
						$this->session->set_userdata(array('id_konsumen'=>$row['id_konsumen'], 'level'=>'konsumen'));
						echo "<script>Swal.fire({
							icon: 'success',
							title: 'Berhasil Login, tunggu sebentar...',
							showConfirmButton: false,
							timer: 3000
						}); $(document).ready(function () {
							// Handler for .ready() called.
							window.setTimeout(function () {
								location.href = '".base_url()."members/profile';
							}, 3500);
						});</script>";
					}
				}else{
					echo "<script>Swal.fire({
						icon: 'error',
						title: 'Maaf, Username atau password salah!',
						showConfirmButton: false,
						timer: 3000
					  });</script>";
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
