<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_tgl extends CI_Model{

    function getTabelTgl($tgl = null, $idku = null){
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
		echo "<p class='text-center'><a href='#' id='prevmo'><<</a><b> Bulan  ". bulan_tahun($tgl). "</b> <a href='#' id='nextmo'>>></a></p>"
                    //echo "<b>Bulan = ". bulan_indo(date('d-m-Y')). "<br></b>";
                    . "<p class='text-center'><a href='#' id='prev'>< Prev Week </a>".$week_start ." - ". $week_end ."<a href='#' id='next'> Next Week ></a><br>"
                    . "<div class='table-responsive'>"
                    . "<table align='center' class = 'table table table-bordered'>"
                    . "<thead align='center'><tr><th>Hari</th><th>Tanggal</th><th colspan='".$colspan."'>Jam</th></tr></thead>";
                    
                    $day = $this->model_main->getDayOpen();
                    $dayy = explode(";" , $day['toko_tutup']);
                    
                    foreach ($dayy as $d){
                        if ($d=='1'){
                            $b='Senin';
                        }elseif ($d=='2') {
                            $b='Selasa';
                        }elseif ($d=='3') {
                            $b='Rabu';
                        }elseif ($d=='4') {
                            $b='Kamis';
                        }elseif ($d=='5') {
                            $b='Jumat';
                        }elseif ($d=='6') {
                            $b='Sabtu';
                        }elseif ($d=='7') {
                            $b='Minggu';
                        }
                        //echo $b;
                    }

                    foreach ($period as $dt) {
                        $namahari = namahari($dt->format("d-m-Y"));
                        $tgl = $dt->format("Y-m-d");
                        $label = tgl_bulan_indo($dt->format("d-m"));
                        
                        echo "<tbody align='center'>"
                            ."<tr><th>".$namahari."</th><td>".$label."</td>";

                        for( $i=$open_time; $i<$close_time; $i+=$interval_jam) {
                            $full = $this->model_main->getjamfull($tgl, $i);
                            $jamku = $this->model_main->getjamku($idku);
                            //$jamku = $this->db->query("SELECT * from rb_booking WHERE id_booking='".decrypt_url($this->uri->segment('3'))."'")->row_array();
                            //echo date('Y-m-d H:i', strtotime($jamku['jam_booking']));
                            //echo $jamku['jam_booking'];
                                //if( $i < $now) continue;
                                //$output .= "<a href='#'>".date("H:i",$i)."</a><br>";
                            if ($full > 0 ) {
                                if ($tgl." ".date("H:i",$i) == date('Y-m-d H:i', strtotime($jamku['jam_booking']))){
                                    $btnjam = "<td><button id='btnjam' class='btn btn-primary btn-sm' value='".$tgl." ".date("H:i",$i)."'>".date("H:i",$i)."</button></td>";
                                }else{
                                    $btnjam = "<td><button id='btnjam' class='btn btn-full btn-sm' value='".$tgl." ".date("H:i",$i)."'>".date("H:i",$i)."</button></td>";
                                }
                            }else{
                                $btnjam = "<td><button id='btnjam' class='genric-btn primary-border circle' value='".$tgl." ".date("H:i",$i)."'>".date("H:i",$i)."</button></td>";
                            }
                            echo $btnjam;
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
    }
}