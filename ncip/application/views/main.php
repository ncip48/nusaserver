<div class="container isi">
            <div class="row">
            <div class="col-md-12 col-xs-12">
            
            <?php
            $tgl = date('d-m-Y');
            if (namahari($tgl)=='Sabtu') {
                $custom_date = strtotime( date('d-m-Y'). ' - 1 days' ); 
            }elseif (namahari($tgl)=='Minggu') {
                $custom_date = strtotime( date('d-m-Y'). ' + 1 days' ); 
            }else{
                $custom_date = strtotime(date('d-m-Y')); 
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

            $diff=$close_time - $open_time;
            $colspan=floor($diff / (60 * 60));
            $interval_jam = $jam['interval'] * 60;

            $now = time();
            $output = "";
            
            ?>
            <input type='hidden' id='jmlplus' value='7'>
            <input type='hidden' id='tglnow' value='<?php echo date('d-m-Y') ?>'>
            <input type='hidden' id='jmlmin' value='7'>
            <div class="bungkus">
                <?php echo "<p class='text-center'><a href='#' id='prevmo'><<</a><b> Bulan  ". bulan_tahun(date('d-m-Y')). "</b> <a href='#' id='nextmo'>>></a></p>"; ?>
                <div id='sebelum'>
                    <?php 
                    //echo "<b>Bulan = ". bulan_indo(date('d-m-Y')). "<br></b>";
                    echo "<p class='text-center'><a href='#' id='prev'>< Prev Week </a>".$week_start ." - ". $week_end ."<a href='#' id='next'> Next Week ></a><br>";
                    echo ""
                        . "<div class='table-responsive'>"
                        . "<table align='center' class = 'table table-bordered'>"
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
                            if ($full > 0) {
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
                    ?>
                </div>
                <div id='bulan'></div>
                <div id='periode'></div>
                <div id='hasil'></div>
                <br>
                <p><button class='btn btn-full btn-sm active'> 08:00 </button> : Tidak Tersedia  <button class='btn btn-outline-primary btn-sm'> 08:00 </button> : Tersedia</p>
            </div>
            </div>
        </div>