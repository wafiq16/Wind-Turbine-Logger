<?php

include '/storage/ssd3/605/14305605/public_html/Lentera_Bumi_Nusantara/phpMQTT/phpMQTT.php';

date_default_timezone_set('Asia/Jakarta');
    
$server = 'l40840f6.en.emqx.cloud';     // change if necessary
$port = 12245;                     // change if necessary
$username = 'wafiq';                   // set your username
$password = '12345678';                   // set your password
$client_id = 'ESP32Client-yakinjaya';// make sure this is unique for connecting to sever - you could use unique

$arah_angin = "1";
$kecepatan_angin = "1";
$suhu_udara = "1";
$tekanan_udara = "1";
$tegangan = "1";
$kws = "1";
$arus = "1";
$waktuku = date("Y-m-d H:i:s");

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
if(!$mqtt->connect(true, NULL, $username, $password)) {
	exit(1);
}
echo $mqtt->subscribeAndWaitForMessage('/yakinjaya/logger1', 0);
echo $mqtt->subscribeAndWaitForMessage('/yakinjaya/logger2', 0);
// $arah_angin =  $mqtt->subscribeAndWaitForMessage('/yakinjaya/logger2', 0);
// $kecepatan_angin = $mqtt->subscribeAndWaitForMessage('/yakinjaya/logger1', 0);
// echo "arah angin = ".$arah_angin."\n";
// echo "kecepatan_angin = ".$kecepatan_angin."\n";

$mqtt->close();

// $username = "id14305605_wafiq16";
// $password = "@Kamaluddin123";
// $database = "id14305605_feedback_demo";
// $hostname = "localhost";

// $connect_db = new mysqli($hostname, $username, $password, $database);
// // Check connection
// if ($connect_db->connect_error) {
//   die("Connection failed: " . $connect_db->connect_error);
// }

// $find_db = mysqli_select_db($connect_db,$database);

// $sql_simpan = "INSERT into datalogger(arah_angin,kecepatan_angin,suhu_udara,tekanan_udara, tegangan,arus,kws,waktu) VALUES ('$arah_angin','$kecepatan_angin','$suhu_udara','$tekanan_udara','$tegangan','$arus','$kws','$waktuku')";
//     // echo $sql_simpan;
// if ($connect_db->query($sql_simpan) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql_simpan . "<br>" . $connect_db->error;
// }

// $connect_db->close();
