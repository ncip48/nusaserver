<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Members extends CI_Controller {
	public function index(){
        $this->profile();
	}
	
	function foto(){
		cek_session_members();
		if (isset($_POST['submit'])){
			$this->model_members->modupdatefoto();
			redirect('members/profile');
		}else{
			redirect('members/profile');
		}
	}

	function profile(){
		cek_session_members();
		$data['title'] = 'Member Area';
		$data['row'] = $this->model_app->profile_konsumen($this->session->id_konsumen)->row_array();
		$data['kota'] = $this->model_app->view('rb_kota');
		$data['service'] = $this->db->query("SELECT * FROM rb_services a JOIN rb_konsumen b ON a.id_konsumen=b.id_konsumen JOIN rb_produk c ON a.id_produk=c.id_produk WHERE a.id_konsumen='".$this->session->id_konsumen."'")->result_array();
		$data['servis'] = $this->db->query("SELECT COUNT(*) as jumlah FROM rb_services WHERE id_konsumen='".$this->session->id_konsumen."'")->row_array();
		$data['domain'] = $this->db->query("SELECT *, COUNT(*) as jumlah FROM rb_domain WHERE id_konsumen='".$this->session->id_konsumen."'");
		$data['invoice'] = $this->db->query("SELECT COUNT(*) as jumlah FROM rb_invoice WHERE id_konsumen='".$this->session->id_konsumen."' AND status='0'")->row_array();
		$data['invoicee'] = $this->db->query("SELECT * FROM rb_invoice a JOIN rb_services b ON a.id_order=b.id_order JOIN rb_domain c ON a.id_domain=c.id_domain JOIN rb_produk d ON b.id_produk=d.id_produk WHERE a.id_konsumen='".$this->session->id_konsumen."'");
		$this->template->load('member/template','member/dashboard',$data);
	}

	function loader(){
		$this->template->load('phpmu-one/template','phpmu-one/loader');
	}

	function services(){
		cek_session_members();
		$data['title'] = 'Paket Anda';
		$data['service'] = $this->db->query("SELECT * FROM rb_services a JOIN rb_konsumen b ON a.id_konsumen=b.id_konsumen JOIN rb_produk c ON a.id_produk=c.id_produk WHERE a.id_konsumen='".$this->session->id_konsumen."'")->result_array();
		$this->template->load('member/template','member/services',$data);
	}

	function reseller(){
		cek_session_members();
		$data['title'] = 'Reseller Anda';
		#$data['service'] = $this->db->query("SELECT * FROM rb_services a JOIN rb_konsumen b ON a.id_konsumen=b.id_konsumen JOIN rb_produk c ON a.id_produk=c.id_produk WHERE a.id_konsumen='".$this->session->id_konsumen."'")->result_array();
		$data['reseller'] = $this->db->query("SELECT * FROM rb_reseller WHERE id_konsumen='".$this->session->id_konsumen."'")->row_array();
		$this->template->load('member/template','member/view_reseller',$data);
	}

	function domain(){
		cek_session_members();
		$data['title'] = 'Domain Anda';
		$data['domain'] = $this->db->query("SELECT * FROM rb_domain WHERE id_konsumen='".$this->session->id_konsumen."'");
		$this->template->load('member/template','member/domain',$data);
	}

	function tagihan(){
		cek_session_members();
		$data['title'] = 'Tagihan Anda';
		$data['invoicee'] = $this->db->query("SELECT * FROM rb_invoice a JOIN rb_services b ON a.id_order=b.id_order JOIN rb_domain c ON a.id_domain=c.id_domain JOIN rb_produk d ON b.id_produk=d.id_produk WHERE a.id_konsumen='".$this->session->id_konsumen."'");
		$this->template->load('member/template','member/invoice',$data);
	}

	function invoice(){
		cek_session_members();
		$txid = $this->uri->segment(3);
		$data['row'] = $this->model_app->profile_konsumen($this->session->id_konsumen)->row_array();
		$data['tagihan'] = $this->db->query("SELECT * FROM rb_invoice a JOIN rb_services b ON a.id_order=b.id_order JOIN rb_domain c ON a.id_domain=c.id_domain JOIN rb_produk d ON b.id_produk=d.id_produk WHERE a.no_tagihan='$txid'")->row_array();
		$this->load->view('phpmu-one/pengunjung/view_invoice', $data);
	}

	function editprofile(){
		cek_session_members();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_members->profile_update($this->session->id_konsumen);
			redirect('members/editprofile');
		}else{
			$data['title'] = 'Edit Profile Anda';
			$data['row'] = $this->model_app->profile_konsumen($this->session->id_konsumen)->row_array();
			$row = $this->model_app->profile_konsumen($this->session->id_konsumen)->row_array();
			$data['kota'] = $this->model_app->view('rb_kota');
			$this->template->load('member/template','member/edit_profile',$data);
		}
	}

    function history(){
		cek_session_members();
		$data['title'] = 'History Orderan anda';
		$data['record'] = $this->model_app->view_where_ordering('rb_penjualan',array('id_pembeli'=>$this->session->id_konsumen),'id_penjualan','DESC');
		$this->template->load('phpmu-one/template','phpmu-one/pengunjung/view_orders_report',$data);
	}

	function applyreseller(){
		cek_session_members();
		$data['title'] = 'Form Pengajuan Reseller';
		$data['row'] = $this->model_app->profile_konsumen($this->session->id_konsumen)->row_array();
		$row = $this->model_app->profile_konsumen($this->session->id_konsumen)->row_array();
		$data['kota'] = $this->model_app->view('rb_kota');
		$data['komunitas'] = $this->model_app->view_where('rb_komunitas', array('aktif'=>'1'));
		$this->template->load('member/template','member/apply_reseller',$data);
	}


	function tambahkomunitas(){
		cek_session_members();
		$komunitas = $this->input->post('kom');
		if (isset($_POST['submit'])){
			$data = array('nama_komunitas'=>$komunitas);
			$this->model_app->insert('rb_komunitas',$data);
			redirect('members/applyreseller');
		}else{
			redirect('members/applyreseller');
		}
	}

	function aksireseller(){
		if($this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			$kode_reff = random_string('alnum', 5);
			$id_komunitas = $this->input->post('komunitas');
			$nama_komunitas = $this->input->post('kom');
			$nama_bank = $this->input->post('c');
			$no_rek = $this->input->post('d');
			$cekreseller = $this->db->query("SELECT * FROM rb_reseller where id_konsumen='".$id."'")->num_rows();

			if ($id_komunitas=='0'){
				$idk = '0';
			}elseif ($id_komunitas=='1'){
				$idk = $nama_komunitas;
			}

			if ($cekreseller>0) {
				$error[] = 'Maaf Sudah Apply Reseller';
			}
			if ($idk=='') {
				$error[] = 'Tolong Pilih Komunitas';
			}
			if ($nama_bank=='') {
				$error[] = 'Tolong Pilih Bank';
			}
			if ($no_rek=='') {
				$error[] = 'Tolong Isi No Rekening';
			}
	  
			if (isset($error)) {
				$data = array('error'=>"<span class='badge badge-pill badge-danger'>!</span> <small class='text-danger'>".implode("</small><br /><span class='badge badge-pill badge-danger'>!</span> <small class='text-danger'>", $error));
				$this->output->set_output(json_encode($data));
			}else{
				$data = array('id_konsumen'=>$id,
							'id_komunitas'=>$idk,
							'kode_refferal'=>$kode_reff,
							'nama_bank'=>$nama_bank,
							'no_rek'=>$no_rek);
				$this->model_app->insert('rb_reseller',$data);
				$data = array('result'=>'0','error'=>"<span class='badge badge-pill badge-success'>o</span> <small class='text-dark'>Pengajuan berhasil, silahkan tunggu 24 jam</small>");
				$this->output->set_output(json_encode($data));
			}
		}
	}

	function logout(){
		cek_session_members();
		$this->session->sess_destroy();
		echo "<script>Swal.fire({
			icon: 'success',
			title: 'Berhasil Keluar, tunggu sebentar...',
			showConfirmButton: false,
			timer: 3000
		  }); $(document).ready(function () {
			// Handler for .ready() called.
			window.setTimeout(function () {
				location.href = '".base_url()."main';
			}, 3500);
		});</script>";
		//redirect('main');
	}

	function keluar(){
		cek_session_members();
		$this->session->sess_destroy();
		redirect('main');
	}



	public function username_check(){
        // allow only Ajax request    
        if($this->input->is_ajax_request()) {
	        // grab the email value from the post variable.
	        $username = $this->input->post('a');

            if(!$this->form_validation->is_unique($username, 'rb_konsumen.username')) {          
	         	$this->output->set_content_type('application/json')->set_output(json_encode(array('messageusername' => 'Maaf, Username ini sudah terdaftar,..')));
            }

        }
    }

    public function email_check(){
        // allow only Ajax request    
        if($this->input->is_ajax_request()) {
	        // grab the email value from the post variable.
	        $email = $this->input->post('d');

	        if(!$this->form_validation->is_unique($email, 'rb_konsumen.email')) {          
	         	$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => 'Maaf, Email ini sudah terdaftar,..')));
            }
        }
    }
}
