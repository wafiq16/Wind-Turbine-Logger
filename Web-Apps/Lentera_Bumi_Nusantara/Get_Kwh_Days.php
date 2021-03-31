<?php
    include "koneksi.php";
    date_default_timezone_set('Asia/Jakarta');
    //kwh nanti diambil per jam
    //kwh per hari sortir perhari
    //kwh per minggu diambil sortir modulus 30 modulus tanggal
    //kwh per bulan ambil perbulan

    //menu slider sebagai handler pengambil data yang di tampilkan dan KWH

    $tohour = date('d');
    // $tohour = date('d', $date_now);

    $date = "SELECT * FROM datalogger";// WHERE HOUR(waktu) == '$tohour'";
    $Time_From_Table = $connect_db->query($date);
    
    // echo "date: " . $date["waktu"]. "<br>";

    if ($Time_From_Table->num_rows >0) {
    // output data of each row
        echo "bismillah<br>";
        while($row_Unsorted = $Time_From_Table->fetch_assoc()) {
            // echo $row_Unsorted["waktu"]."<br>";
            $date = strtotime($row_Unsorted["waktu"]);
            $Sorted_Time = date('d', $date);
            // echo 'sorted_days = '.$Sorted_Time."<br>";
            // echo 'days_now = '.$tohour."<br>";
            if($tohour == $Sorted_Time){
                echo "Kws adalah = ".$row_Unsorted["Kws"]."<br>";
            }
        }
    }   
    else 
    {
        echo "0 Sorted Times";
    }
?>