<?php
    include "koneksi.php";
    date_default_timezone_set('Asia/Jakarta');      
    $arah_angin         = $_GET['arah_angin'];
    $kecepatan_angin    = $_GET['kecepatan_angin'];
    $suhu_udara         = $_GET['suhu_udara'];
    $tekanan_udara      = $_GET['tekanan_udara'];
    $tegangan           = $_GET['tegangan'];
    $arus               = $_GET['arus'];
    $kws                = $arus * $tegangan;
    $waktuku            = date("Y-m-d H:i:s");
    // while (1){
    $sql_simpan = mysqli_query($connect_db,"INSERT into datalogger(arah_angin,kecepatan_angin,suhu_udara,tekanan_udara, tegangan,arus,kws,waktu) VALUES ('$arah_angin','$kecepatan_angin','$suhu_udara','$tekanan_udara','$tegangan','$arus','$kws','$waktuku')");
    
    if($sql_simpan)
    {
        echo "data berhasil disimpan\n";
        echo $arah_angin."\n".$kecepatan_angin."\n".$suhu_udara."\n".$tekanan_udara."\n".$tegangan."\n".$arus."\n".$kws."\n".$waktuku."\n"; 
    }
    else
    {
        echo "\ndata gagal disimpan\n";
        echo $arah_angin."\n".$kecepatan_angin."\n".$tegangan."\n".$arus."\n".$kws."\n".$waktuku."\n";
    }
    // }
    mysqli_close($connect_db);
?>