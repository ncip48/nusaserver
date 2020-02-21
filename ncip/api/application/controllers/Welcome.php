<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		//$this->load->helper('url');
		//$valid_logins = $this->model_api->getValidLogins();
		//$this->load->view('welcome_message');
		// API key
		$apiKey = 'woy';

		// API auth credentials
		$apiUser = "ncip";
		$apiPass = "123";

		// API URL
		$url = base_url().'provinsi';

		// Create a new cURL resource
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("token: " . $apiKey));
		curl_setopt($ch, CURLOPT_USERPWD, "$apiUser:$apiPass");

		$result = curl_exec($ch);
		//echo $result;
		$json = json_decode($result, true);
		//echo $json['error'];

		if ($json['status']==false) {
			echo $json['error'];
		} else {
			echo "<select>";
			foreach ($json['data'] as $r) {
				echo "<option>".$r['nama_provinsi']."</option>";
			}
			echo "</select>";
		}

		// Close cURL resource
		curl_close($ch);
	}
}
