<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->view('halaman_main');
	}

	public function login()
    {
        $this->load->model('loginmodel');
        $username = $this->input->post('username');
        $user = $this->loginmodel->is_valid_num($username);
        $hitung = $this->loginmodel->hitung_user($username);

        if ($hitung>0) {
			$result['status'] = true;
			$result['data'] = $user;
			$this->output->set_output(json_encode($result, true));
        } else {
			$result['status'] = false;
			$result['message'] = 'API Key belum dibuat';
			$this->output->set_output(json_encode($result, true));
        }
    }

	public function cek()
	{
		if($this->input->is_ajax_request()) {
		//$this->load->helper('url');
		//$valid_logins = $this->model_api->getValidLogins();
		//$this->load->view('welcome_message');
		// API key
		$tipe = $this->input->post('tipe');
		$x = $this->input->post('c');

		if ($x==''){
			$apiKey = 'no';
		} else {
			$apiKey = $x;
		}

		// API URL
		//Ganti dengan URL apiwilayah.iniherly.xyz
		$url = base_url().$tipe;

		// Create a new cURL resource
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: " . $apiKey));
		#curl_setopt($ch, CURLOPT_USERPWD, "$apiUser:$apiPass");

		$result = curl_exec($ch);
		//echo $result;
		//$json = json_decode($result, true);
		//$this->output->set_output(json_encode($result, true));
		$this->output->set_output($result);
		//echo $json['error'];

		/*if ($json['status']==false) {
			echo $json['error'];
		} else {
			echo "<select>";
			foreach ($json['data'] as $r) {
				echo "<option>".$r['nama_provinsi']."</option>";
			}
			echo "</select>";
		}*/

		// Close cURL resource
		curl_close($ch);
		}
	}
}
