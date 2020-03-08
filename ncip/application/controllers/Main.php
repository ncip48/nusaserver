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
		$data['title'] = 'Aplikasi Demo SPA';
		//$this->load->view('main');
		$this->template->load('template','main',$data);
	}

	public function tgl_plus(){
		$hari = $this->input->post("hari");
		$tgl = $this->input->post("tgl");
        if (namahari($tgl)=='Sabtu') {
            $custom_date = strtotime( date($tgl). ' - 1 days' ); 
        }elseif (namahari($tgl)=='Minggu') {
            $custom_date = strtotime( date($tgl). ' + 1 days' ); 
        }else{
            $custom_date = strtotime(date($tgl)); 
        } 
		$week_start = date('d-m-Y', strtotime('this week last sunday', $custom_date));
		$week_end = date('d-m-Y', strtotime('this week next saturday', $custom_date));
		$data['tgltuju'] = date('d-m-Y', strtotime($tgl. ' + '.$hari.' days'));
		$data['tglawal'] = date('d-m-Y', strtotime($week_start. ' + '.$hari.' days'));
		$data['tglakhir'] = date('d-m-Y', strtotime($week_end. ' + '.$hari.' days'));
		$this->output->set_output(json_encode($data));
	}

	public function tgl_min(){
		$hari = $this->input->post("hari");
		$tgl = $this->input->post("tgl");
		if (namahari($tgl)=='Sabtu') {
            $custom_date = strtotime( date($tgl). ' - 1 days' ); 
        }elseif (namahari($tgl)=='Minggu') {
            $custom_date = strtotime( date($tgl). ' + 1 days' ); 
        }else{
            $custom_date = strtotime(date($tgl)); 
        }
		$week_start = date('d-m-Y', strtotime('this week last sunday', $custom_date));
		$week_end = date('d-m-Y', strtotime('this week next saturday', $custom_date));
		$data['tgltuju'] = date('d-m-Y', strtotime($tgl. ' - '.$hari.' days'));
		$data['tglawal'] = date('d-m-Y', strtotime($week_start. ' - '.$hari.' days'));
		$data['tglakhir'] = date('d-m-Y', strtotime($week_end. ' - '.$hari.' days'));
		$this->output->set_output(json_encode($data));
	}

	public function validasi_tgl(){
		$tgl = $this->input->post("tgl");
		if (namahari($tgl)=='Sabtu') {
            $custom_date = strtotime( date($tgl). ' - 1 days' ); 
        }elseif (namahari($tgl)=='Minggu') {
            $custom_date = strtotime( date($tgl). ' + 1 days' ); 
        }else{
            $custom_date = strtotime(date($tgl)); 
        } 
		$week_start = date('d-m-Y', strtotime('this week last sunday', $custom_date));
		$week_end = date('d-m-Y', strtotime('this week next saturday', $custom_date));

		$awal_minggu = $week_start;
		$akhir_minggu = date('d-m-Y', strtotime($week_end. ' + 1 days'));

		$begin = new DateTime($awal_minggu);
		$end = new DateTime($akhir_minggu);

		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($begin, $interval, $end);

		$jam = $this->model_main->getTimeOpenClose();
		//echo date('H:i', strtotime($jam['jam_buka']));
		$open_time = strtotime(date('H:i', strtotime($jam['jam_buka']))); //strtotime("08:00");
		$close_time = strtotime(date('H:i', strtotime($jam['jam_tutup'])));//strtotime("17:00");

		$diff    =$close_time - $open_time;
		$colspan    =floor($diff / (60 * 60));
		$interval_jam = $jam['interval'] * 60;

		$now = time();
		$output = "";
		echo ""
                    . "<div class='table-responsive'>"
                    . "<table align='center' class = 'table table table-bordered'>"
                    . "<thead align='center'><tr><th>Hari</th><th>Tanggal</th><th colspan='".$colspan."'>Jam</th></tr></thead>";
                  
                
                foreach ($period as $dt) {
                    $namahari = namahari($dt->format("d-m-Y"));
                    $tgl = $dt->format("Y-m-d");
                    $label = tgl_bulan_indo($dt->format("d-m"));
                    
                    echo "<tbody align='center'>"
                        ."<tr><th>".$namahari."</th><td>".$label."</td>";

                    for( $i=$open_time; $i<$close_time; $i+=$interval_jam) {
						$full = $this->model_main->getjamfull($tgl, $i);
                            //if( $i < $now) continue;
                            //$output .= "<a href='#'>".date("H:i",$i)."</a><br>";
                        if ($full > 0 ) {
                            $namahari = "<td><button id='btnjam' class='btn btn-full btn-sm' value='".$tgl." ".date("H:i",$i)."'>".date("H:i",$i)."</button></td>";
                        }else{
                            $namahari = "<td><button id='btnjam' class='btn btn-outline-primary btn-sm' value='".$tgl." ".date("H:i",$i)."'>".date("H:i",$i)."</button></td>";
                        }
                        echo $namahari;
                    }
                    echo "</tr>"
                        . "</tbody>";
                    //echo namahari($dt->format("d-m-Y"));
                    //echo tgl_bulan_indo($dt->format("d-m"));
                    //echo "<input type='radio' id='tgl' name='tgl' value='".$dt->format("d-m-Y")."'>
                    //<label for='tgl'>".tgl_bulan_indo($dt->format("d-m"))."</label>";
                }

                echo "</table>"
                    . "</div>"
                    . ""; 
		//echo "<a href='#' id='prev'><<</a><b> Bulan  ". bulan_indo(date('d-m-Y')). "</b> <a href='#' id='next'>>></a><br>";
		//echo "<b>Bulan = ". bulan_indo(date('d-m-Y')). "<br></b>";
		//echo tgl_indo($week_start) ." - ". tgl_indo($week_end) ."<br>";
		/*$result = array();
		foreach ($period as $dt) {
			//$data['output'] = "<input type='radio' id='tgl' name='tgl' value='".$dt->format("d-m-Y")."'><label for='tgl'>".tgl_bulan_indo($dt->format("d-m"))."</label>";
			//$data['status'] = 'OK';
			//$data['output'] = $dt->format("d-m-Y");
			//$data['label'] = tgl_bulan_indo($dt->format("d-m"));
			//echo json_encode($data, true);
			//$this->output->set_output(json_encode($data));
			$result[] = array("output" => $dt->format("d-m-Y"), "label" => tgl_bulan_indo($dt->format("d-m")), "nama_hari" => namahari($dt->format("d-m-Y")));
			//$result[] = array("hasil" => 'ok', "output" => "<input type='radio' id='tgl' name='tgl' value='".$dt->format("d-m-Y")."'><label for='tgl'>".tgl_bulan_indo($dt->format("d-m"))."</label>");
		}
		$this->output->set_output(json_encode($result));*/
	}

}
