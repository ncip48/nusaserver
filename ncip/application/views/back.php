echo tgl_indo($week_start) ." - ". tgl_indo($week_end) ."<br>";
                echo "<div class='row'>"
                    . "<div class='table-responsive-xl'>"
                    . "<table class = 'table table-striped' style='width: 500px;'>"
                    . "<thead><tr>";
                  
                foreach ($period as $namahari) {
                    $hari = namahari($namahari->format("d-m-Y"));
                    echo "<th>". $hari . "</th>";
                }
                echo "</tr></thead><tbody><tr>";

                foreach ($period as $dt) {
                    //$namahari = namahari($dt->format("d-m-Y"));
                    $label = tgl_bulan_indo($dt->format("d-m"));
                    echo "<td>".$label."</td>";
                    //echo namahari($dt->format("d-m-Y"));
                    //echo tgl_bulan_indo($dt->format("d-m"));
                    //echo "<input type='radio' id='tgl' name='tgl' value='".$dt->format("d-m-Y")."'>
                    //<label for='tgl'>".tgl_bulan_indo($dt->format("d-m"))."</label>";
                }

                echo "</tr>";

                foreach ($period as $waktu) {
                    for( $i=$open_time; $i<$close_time; $i+=3600) {
                        //if( $i < $now) continue;
                        //$output .= "<a href='#'>".date("H:i",$i)."</a><br>";
                        echo "<tr><td><a href='#'>".date("H:i",$i)."</a></td></tr>";
                    }
                    //echo $output;
                }

                echo "</tbody></table>"
                    . "</div>"
                    . "</div>"; 