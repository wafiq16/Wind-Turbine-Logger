<?php
    include "koneksi.php";
    // untuk Apps android
    $action = $_POST["action"];
    // pengujian untuk PC
    // $action = $_GET["action"];
    $counter               = 0;
    $nomor_total           = 0;
    $arah_angin_total      = 0;
    $kecepatan_angin_total = 0;
    $suhu_udara_total      = 0;
    $tekanan_udara_total   = 0;
    $tegangan_total        = 0;
    $arus_total            = 0;
    $Kws_total             = 0;
    $waktu_total           = 0;
    $waktu_sekarang        = 0;
    $arrayjson             = [];
    if($action == "GET_HOURS")
    {
        $waktu_yang_dipilih = "Jam";
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date('Y-m-d H:i:s');
        $tohour   = date('Y-m-d H');
        $date     = "SELECT * FROM datalogger";
        $Time_From_Table = $connect_db->query($date);
        if ($result = $Time_From_Table) 
        {
            while($row_Unsorted = $result->fetch_assoc()) 
            {
                $date        = strtotime($row_Unsorted["waktu"]);
                $Sorted_Time = date('Y-m-d H', $date);
                if($tohour == $Sorted_Time)
                {             
                    $nomor           = $row_Unsorted["nomor"];
                    $arah_angin      = $row_Unsorted["arah_angin"];
                    $kecepatan_angin = $row_Unsorted["kecepatan_angin"];
                    $suhu_udara      = $row_Unsorted["suhu_udara"];
                    $tekanan_udara   = $row_Unsorted["tekanan_udara"];
                    $tegangan        = $row_Unsorted["tegangan"];
                    if($tegangan<0){
                        $tegangan = 0;
                    }
                    $arus            = $row_Unsorted["arus"];
                    if($arus < 0){
                        $arus = 0;
                    }
                    $Kws             = $row_Unsorted["Kws"];
                    $waktu           = $row_Unsorted["waktu"];
                    $waktu_sekarang  = date('H:i:s d-m-Y', strtotime($date_now));

                    $arah_angin_total      = $arah_angin;
                    $kecepatan_angin_total += $kecepatan_angin;
                    $suhu_udara_total      += $suhu_udara;
                    $tekanan_udara_total   += $tekanan_udara;
                    $tegangan_total        += $tegangan;
                    $arus_total            += $arus;
                    $Kws_total             += $Kws;
                    // $waktu_total += $waktu;
                    $counter++;                     
                }
            }
            if($counter == 0)
                $counter = 1;
            // $arah_angin_total      /= $counter;
            $kecepatan_angin_total /= $counter;
            $suhu_udara_total      /= $counter;
            $tekanan_udara_total   /= $counter;
            $tegangan_total        /= $counter;
            $arus_total            /= $counter;

            $marks = array(
                array( 
            "arah_angin"=>$arah_angin_total,//number_format($arah_angin_total, 2, '.', ''),
            "kecepatan_angin"=>number_format($kecepatan_angin_total, 2, '.', ''), 
            "suhu_udara" => number_format($suhu_udara_total, 2, '.', ''),
            "tekanan_udara" => number_format($tekanan_udara_total, 2, '.', ''),
            "tegangan"=>number_format($tegangan_total, 2, '.', ''), 
            "arus"=>number_format($arus_total, 2, '.', ''), 
            "kws"=> number_format($Kws_total, 2, '.', ''),
            "waktu" => $waktu_sekarang
                )
            );
            echo json_encode($marks);
            $fp = fopen('result_f.json', 'w');
            fwrite($fp, json_encode($marks));
            fclose($fp);
            // $Kws_total *= 3600/$counter;                          
        }
        else 
            echo "empty data";
    }   
    else if($action == "GET_DAYS")
    {
        $waktu_yang_dipilih = "Hari";
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date('Y-m-d H:i:s');
        $tohour   = date('Y-m-d');
        $date     = "SELECT * FROM datalogger";
        $Time_From_Table = $connect_db->query($date);
        
        if ($result = $Time_From_Table) {
            while($row_Unsorted = $result->fetch_assoc()) {
                // echo 'jojo'.$row_Unsorted["waktu"]."<br>";
                $date        = strtotime($row_Unsorted["waktu"]);
                $Sorted_Time = date('Y-m-d', $date);
                // echo $tohour." ".$Sorted_Time."<br>"; 
                if($tohour == $Sorted_Time){             
                    // echo "Kws adalah = ".$row_Unsorted["Kws"]."<br>";
                    $nomor           = $row_Unsorted["nomor"];
                    $arah_angin      = $row_Unsorted["arah_angin"];
                    $kecepatan_angin = $row_Unsorted["kecepatan_angin"];
                    $suhu_udara      = $row_Unsorted["suhu_udara"];
                    $tekanan_udara   = $row_Unsorted["tekanan_udara"];
                    $tegangan        = $row_Unsorted["tegangan"];
                    if($tegangan<0){
                        $tegangan = 0;
                    }
                    $arus            = $row_Unsorted["arus"];
                    if($arus < 0){
                        $arus = 0;
                    }
                    $Kws             = $row_Unsorted["Kws"];
                    $waktu           = $row_Unsorted["waktu"];
                    $waktu_sekarang  = date('l d-m-Y', strtotime($Sorted_Time));//+ " , " + $tohour;

                    $arah_angin_total      = $arah_angin;
                    $kecepatan_angin_total += $kecepatan_angin;
                    $suhu_udara_total      += $suhu_udara;
                    $tekanan_udara_total   += $tekanan_udara;
                    $tegangan_total        += $tegangan;
                    $arus_total            += $arus;
                    $Kws_total             += $Kws;
                    // $waktu_total += $waktu;
                    $counter++;                     
                }
            }
            if($counter == 0)
                $counter = 1;
            // $arah_angin_total      /= $counter;
            $kecepatan_angin_total /= $counter;
            $suhu_udara_total      /= $counter;
            $tekanan_udara_total   /= $counter;
            $tegangan_total        /= $counter;
            $arus_total            /= $counter;

            $marks = array(
                array( 
            "arah_angin"=>$arah_angin_total,//number_format($arah_angin_total, 2, '.', ''),
            "kecepatan_angin"=>number_format($kecepatan_angin_total, 2, '.', ''), 
            "suhu_udara" => number_format($suhu_udara_total, 2, '.', ''),
            "tekanan_udara" => number_format($tekanan_udara_total, 2, '.', ''),
            "tegangan"=>number_format($tegangan_total, 2, '.', ''), 
            "arus"=>number_format($arus_total, 2, '.', ''), 
            "kws"=> number_format($Kws_total, 2, '.', ''),
            "waktu" => $waktu_sekarang
                )
            );
            echo json_encode($marks);
            $fp = fopen('result_f.json', 'w');
            fwrite($fp, json_encode($marks));
            fclose($fp);
                            // $Kws_total *= 3600/$counter;                             }
        }
        else 
            echo "empty data";
    }
    // else if($action == "GET_WEEKS")
    // {
    //     $waktu_yang_dipilih = "Minggu";
    //     date_default_timezone_set('Asia/Jakarta');
    //     $date_now        = date('Y-m-d H:i:s');
    //     $tohour          = date('Y-m');
    //     $date            = "SELECT * FROM datalogger";
    //     $Time_From_Table = $connect_db->query($date);

    //     if ($result = $Time_From_Table) {
    //         while($row_Unsorted = $result->fetch_assoc()) 
    //         {
    //             // echo 'jojo'.$row_Unsorted["waktu"]."<br>";
    //             $date        = strtotime($row_Unsorted["waktu"]);
    //             $Sorted_Time = date('Y-m', $date);
    //             // echo $tohour." ".$Sorted_Time."<br>"; 
    //             if($tohour == $Sorted_Time)
    //             {             
    //                 // echo "Kws adalah = ".$row_Unsorted["Kws"]."<br>";
    //                 $nomor           = $row_Unsorted["nomor"];
    //                 $arah_angin      = $row_Unsorted["arah_angin"];
    //                 $kecepatan_angin = $row_Unsorted["kecepatan_angin"];
    //                 $tegangan        = $row_Unsorted["tegangan"];
    //                 $arus            = $row_Unsorted["arus"];
    //                 $Kws             = $row_Unsorted["Kws"];
    //                 $waktu           = $row_Unsorted["waktu"];
    //                 $waktu_sekarang  = date('F Y', strtotime($Sorted_Time));

    //                 $arah_angin_total      += $arah_angin;
    //                 $kecepatan_angin_total += $kecepatan_angin;
    //                 $tegangan_total        += $tegangan;
    //                 $arus_total            += $arus;
    //                 $Kws_total             += $Kws;
    //                 // $waktu_total += $waktu;
    //                 $counter++;                     
    //             }
    //         }
    //         if($counter == 0){
    //             $counter = 1;
    //         }
    //         $arah_angin_total      /= $counter;
    //         $kecepatan_angin_total /= $counter;
    //         $tegangan_total        /= $counter;
    //         $arus_total            /= $counter;

    //         // $arrayjson["arah_angin"]      = number_format($arah_angin_total, 2, '.', '');
    //         // $arrayjson["kecepatan_angin"] = number_format($kecepatan_angin_total, 2, '.', ''); 
    //         // $arrayjson["tegangan"]        = number_format($tegangan_total, 2, '.', ''); 
    //         // $arrayjson["arus"]            = number_format($arus_total, 2, '.', '');
    //         // $arrayjson["kws"]             = number_format($Kws_total, 2, '.', '');
    //         // $arrayjson["waktu"]             = $waktu_sekarang;
    //         // echo json_encode($arrayjson);
    //         $marks = array(
    //             array( 
    //         "arah_angin"=>number_format($arah_angin_total, 2, '.', ''),
    //         "kecepatan_angin"=>number_format($kecepatan_angin_total, 2, '.', ''), 
    //         "tegangan"=>number_format($tegangan_total, 2, '.', ''), 
    //         "arus"=>number_format($arus_total, 2, '.', ''), 
    //         "kws"=> number_format($Kws_total, 2, '.', ''),
    //         "waktu" => $waktu_sekarang
    //             )
    //         );
    //         echo json_encode($marks);
    //         $fp = fopen('result_f.json', 'w');
    //         fwrite($fp, json_encode($marks));
    //         fclose($fp);
    //     }
    //     else 
    //         echo "empty data";
    // }
    else if($action == "GET_MONTHS")
    {
        $waktu_yang_dipilih = "Bulan";
        date_default_timezone_set('Asia/Jakarta');
        $date_now        = date('Y-m-d H:i:s');
        $tohour          = date('Y-m');
        $date            = "SELECT * FROM datalogger";
        $Time_From_Table = $connect_db->query($date);

        if ($result = $Time_From_Table) {
            while($row_Unsorted = $result->fetch_assoc()) 
            {
                // echo 'jojo'.$row_Unsorted["waktu"]."<br>";
                $date        = strtotime($row_Unsorted["waktu"]);
                $Sorted_Time = date('Y-m', $date);
                // echo $tohour." ".$Sorted_Time."<br>"; 
                if($tohour == $Sorted_Time)
                {             
                    // echo "Kws adalah = ".$row_Unsorted["Kws"]."<br>";
                    $nomor           = $row_Unsorted["nomor"];
                    $arah_angin      = $row_Unsorted["arah_angin"];
                    $kecepatan_angin = $row_Unsorted["kecepatan_angin"];
                    $suhu_udara      = $row_Unsorted["suhu_udara"];
                    $tekanan_udara   = $row_Unsorted["tekanan_udara"];
                    $tegangan        = $row_Unsorted["tegangan"];
                    if($tegangan<0){
                        $tegangan = 0;
                    }
                    $arus            = $row_Unsorted["arus"];
                    if($arus < 0){
                        $arus = 0;
                    }
                    $Kws             = $row_Unsorted["Kws"];
                    $waktu           = $row_Unsorted["waktu"];
                    $waktu_sekarang  = date('F Y', strtotime($Sorted_Time));

                    $arah_angin_total      = $arah_angin;
                    $kecepatan_angin_total += $kecepatan_angin;
                    $suhu_udara_total      += $suhu_udara;
                    $tekanan_udara_total   += $tekanan_udara;
                    $tegangan_total        += $tegangan;
                    $arus_total            += $arus;
                    $Kws_total             += $Kws;
                    // $waktu_total += $waktu;
                    $counter++;                     
                }
            }
            if($counter == 0)
                $counter = 1;
            // $arah_angin_total      /= $counter;
            $kecepatan_angin_total /= $counter;
            $suhu_udara_total      /= $counter;
            $tekanan_udara_total   /= $counter;
            $tegangan_total        /= $counter;
            $arus_total            /= $counter;

            $marks = array(
                array( 
            "arah_angin"=>$arah_angin_total,//number_format($arah_angin_total, 2, '.', ''),
            "kecepatan_angin"=>number_format($kecepatan_angin_total, 2, '.', ''), 
            "suhu_udara" => number_format($suhu_udara_total, 2, '.', ''),
            "tekanan_udara" => number_format($tekanan_udara_total, 2, '.', ''),
            "tegangan"=>number_format($tegangan_total, 2, '.', ''), 
            "arus"=>number_format($arus_total, 2, '.', ''), 
            "kws"=> number_format($Kws_total, 2, '.', ''),
            "waktu" => $waktu_sekarang
                )
            );
            echo json_encode($marks);
            $fp = fopen('result_f.json', 'w');
            fwrite($fp, json_encode($marks));
            fclose($fp);
        }
        else 
            echo "empty data";
    }            
    else if($action == "GET_YEARS")
    {
        $waktu_yang_dipilih = "Tahun";
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date('Y-m-d H:i:s');
        $tohour   = date('Y');
        $date     = "SELECT * FROM datalogger";
        // echo " <br></br> <center><h3><b>Data Logger Lentera Bumi Nusantara</b></h3></center> <br> <br>";
        $Time_From_Table = $connect_db->query($date);

        if ($result = $Time_From_Table) {
            while($row_Unsorted = $result->fetch_assoc()) {
                // echo 'jojo'.$row_Unsorted["waktu"]."<br>";
                $date        = strtotime($row_Unsorted["waktu"]);
                $Sorted_Time = date('Y', $date);
                // echo $tohour." ".$Sorted_Time."<br>"; 
                if($tohour == $Sorted_Time){             
                    // echo "Kws adalah = ".$row_Unsorted["Kws"]."<br>";
                    $nomor           = $row_Unsorted["nomor"];
                    $arah_angin      = $row_Unsorted["arah_angin"];
                    $kecepatan_angin = $row_Unsorted["kecepatan_angin"];
                    $suhu_udara      = $row_Unsorted["suhu_udara"];
                    $tekanan_udara   = $row_Unsorted["tekanan_udara"];
                    $tegangan        = $row_Unsorted["tegangan"];
                    if($tegangan<0){
                        $tegangan = 0;
                    }
                    $arus            = $row_Unsorted["arus"];
                    if($arus < 0){
                        $arus = 0;
                    }
                    $Kws             = $row_Unsorted["Kws"];
                    $waktu           = $row_Unsorted["waktu"];
                    $waktu_sekarang  = $tohour;

                   $arah_angin_total      = $arah_angin;
                    $kecepatan_angin_total += $kecepatan_angin;
                    $suhu_udara_total      += $suhu_udara;
                    $tekanan_udara_total   += $tekanan_udara;
                    $tegangan_total        += $tegangan;
                    $arus_total            += $arus;
                    $Kws_total             += $Kws;
                    // $waktu_total += $waktu;
                    $counter++;                     
                }
            }
            if($counter == 0)
                $counter = 1;
            // $arah_angin_total      /= $counter;
            $kecepatan_angin_total /= $counter;
            $suhu_udara_total      /= $counter;
            $tekanan_udara_total   /= $counter;
            $tegangan_total        /= $counter;
            $arus_total            /= $counter;

            $marks = array(
                array( 
            "arah_angin"=>$arah_angin_total,//number_format($arah_angin_total, 2, '.', ''),
            "kecepatan_angin"=>number_format($kecepatan_angin_total, 2, '.', ''), 
            "suhu_udara" => number_format($suhu_udara_total, 2, '.', ''),
            "tekanan_udara" => number_format($tekanan_udara_total, 2, '.', ''),
            "tegangan"=>number_format($tegangan_total, 2, '.', ''), 
            "arus"=>number_format($arus_total, 2, '.', ''), 
            "kws"=> number_format($Kws_total, 2, '.', ''),
            "waktu" => $waktu_sekarang
                )
            );
            echo json_encode($marks);
            $fp = fopen('result_f.json', 'w');
            fwrite($fp, json_encode($marks));
            fclose($fp);
        }
        else 
            echo "empty data";
    }               
    else if($action == "GET_ALL")
    {
        $waktu_yang_dipilih = "Seluruh Data Yang Ada";
        date_default_timezone_set('Asia/Jakarta');
        $date_now        = date('Y-m-d H:i:s');
        $tohour          = date('Y-m-d');
        $date            = "SELECT * FROM datalogger";
        $Time_From_Table = $connect_db->query($date);
        $arrayjson       = array();
        if ($result = $Time_From_Table) {
            while($row_Unsorted = $result->fetch_assoc()) {             
                // echo "Kws adalah = ".$row_Unsorted["Kws"]."<br>";
                $nomor           = $row_Unsorted["nomor"];
                $arah_angin      = $row_Unsorted["arah_angin"];
                $kecepatan_angin = $row_Unsorted["kecepatan_angin"];
                $suhu_udara      = $row_Unsorted["suhu_udara"];
                    $tekanan_udara   = $row_Unsorted["tekanan_udara"];
                $tegangan        = $row_Unsorted["tegangan"];
                if($tegangan<0){
                        $tegangan = 0;
                    }
                    $arus            = $row_Unsorted["arus"];
                    if($arus < 0){
                        $arus = 0;
                    }
                $Kws             = $row_Unsorted["Kws"];
                $waktu           = $row_Unsorted["waktu"];
                $db_data[]       = $row_Unsorted;
                $waktu_sekarang  = $tohour;
                $arrayjson[]     = $row_Unsorted;

                $arah_angin_total      = $arah_angin;
                    $kecepatan_angin_total += $kecepatan_angin;
                    $suhu_udara_total      += $suhu_udara;
                    $tekanan_udara_total   += $tekanan_udara;
                    $tegangan_total        += $tegangan;
                    $arus_total            += $arus;
                    $Kws_total             += $Kws;
                    // $waktu_total += $waktu;
                    $counter++;                     
                }
            if($counter == 0)
                $counter = 1;
            // $arah_angin_total      /= $counter;
            $kecepatan_angin_total /= $counter;
            $suhu_udara_total      /= $counter;
            $tekanan_udara_total   /= $counter;
            $tegangan_total        /= $counter;
            $arus_total            /= $counter;

            $marks = array(
                array( 
            "arah_angin"=>$arah_angin_total,//number_format($arah_angin_total, 2, '.', ''),
            "kecepatan_angin"=>number_format($kecepatan_angin_total, 2, '.', ''), 
            "suhu_udara" => number_format($suhu_udara_total, 2, '.', ''),
            "tekanan_udara" => number_format($tekanan_udara_total, 2, '.', ''),
            "tegangan"=>number_format($tegangan_total, 2, '.', ''), 
            "arus"=>number_format($arus_total, 2, '.', ''), 
            "kws"=> number_format($Kws_total, 2, '.', ''),
            "waktu" => $waktu_sekarang
                )
            );
            echo json_encode($marks);
            $fp = fopen('result_f.json', 'w');
            fwrite($fp, json_encode($marks));
            fclose($fp);
             
            // echo json_encode($arrayjson);
            // echo "\n\n";
            // echo json_encode($db_data);
            // echo "\n\n";
            // $Kws_total *= 3600/$counter;                                  
        }
        else 
            echo "empty data";
    }
    // if("GET_ALL" == $action){
    //     $date = "SELECT * FROM datalogger";// WHERE HOUR(waktu) == '$tohour'";
    //     $Data_To_Android = $connect_db->query($date);
    
    //     if ($Data_To_Android->num_rows >0) {
    //     // output data of each row
    //         // echo "bismillah<br>";
    //         while($row = $Data_To_Android->fetch_assoc()) {
    //             $db_data[] = $row;
    //         }
    //         // Send back the complete records as a json
    //         echo json_encode($db_data);
    //     }else{
    //         echo "error";
    //     }
    //     return;
    // }

?>
