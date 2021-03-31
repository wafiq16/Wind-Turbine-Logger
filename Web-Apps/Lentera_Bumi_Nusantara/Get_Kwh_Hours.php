<?php
    include "koneksi.php";
    date_default_timezone_set('Asia/Jakarta');

    $date_now = date('Y-m-d H:i:s');
    $tohour = date('H');

    $date = "SELECT * FROM datalogger";
    $Time_From_Table = $connect_db->query($date);

    if ($Time_From_Table->num_rows >0) {
    // output data of each row
        echo "bismillah<br>";
        while($row_Unsorted = $Time_From_Table->fetch_assoc()) {
            // echo $row_Unsorted["waktu"]."<br>";
            $date = strtotime($row_Unsorted["waktu"]);
            $Sorted_Time = date('H', $date);
            // echo 'dari database '.$Sorted_Time."<br>";
            // echo 'jam sekarang '.$tohour."<br>";
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