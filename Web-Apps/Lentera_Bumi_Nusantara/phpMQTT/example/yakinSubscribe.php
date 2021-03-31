<?php

require('/storage/ssd3/605/14305605/public_html/Lentera_Bumi_Nusantara/phpMQTT/phpMQTT.php');

date_default_timezone_set('Asia/Jakarta');

$server = 'l40840f6.en.emqx.cloud';     // change if necessary
$port = 12245;                     // change if necessary
$username = 'wafiq';                   // set your username
$password = '12345678';                   // set your password
$client_id = 'ESP32Client-yakinjaya'; // make sure this is unique for connecting to sever - you could use uniqid()
// $arah_angin = "1";
// $kecepatan_angin = "1";
// $suhu_udara = "1";
// $tekanan_udara = "1";
// $tegangan = "1";
// $kws = "1";
// $arus = "1";
// $waktuku = date("Y-m-d H:i:s");

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
if(!$mqtt->connect(true, NULL, $username, $password)) {
	exit(1);
}

// $mqtt->debug = true;

$topics['/yakinjaya/logger1'] = array('qos' => 0, 'function' => 'procMsgDemo1');
// $topics['/yakinjaya/logger2'] = array('qos' => 0, 'function' => 'procMsgDemo2');
$mqtt->subscribe($topics, 0);
    
$username = "id14305605_wafiq16";
$password = "@Kamaluddin123";
$database = "id14305605_feedback_demo";
$hostname = "localhost";

while($mqtt->proc()) {
    // $waktuku = date("Y-m-d H:i:s");
    // echo "waktuku = ".$waktuku."\n";
    // echo "arah angin = ".$arah_angin."\n";
    // echo "kecepatan_angin = ".$kecepatan_angin."\n";
    // $connect_db = new mysqli($hostname, $username, $password, $database);
    // // Check connection
    // if ($connect_db->connect_error) {
    //     die("Connection failed: " . $connect_db->connect_error);
    // }

    // $sql_simpan = "INSERT into datalogger(arah_angin,kecepatan_angin,suhu_udara,tekanan_udara, tegangan,arus,kws,waktu) VALUES ('$arah_angin','$kecepatan_angin','$suhu_udara','$tekanan_udara','$tegangan','$arus','$kws','$waktuku')";
    // // echo $sql_simpan;
    // if ($connect_db->query($sql_simpan) === TRUE) {
    //     echo "New record created successfully";
    // } else {
    //     echo "Error: " . $sql_simpan . "<br>" . $connect_db->error;
    // }
    sleep(2);
    // $connect_db->close();
}

$mqtt->close();

function procMsgDemo1($topic, $msg){
// 	echo 'Msg Recieved: ' . date('r') . "\n";
// 	echo "Topic: {$topic}\n\n";
// 	echo "\t$msg\n\n";
    
    $obj = json_decode($msg);

    // echo "device  = ".$obj->device."\t$msg\n\n";
    // echo "sensorType  = ".$obj->sensorType."\t$msg\n\n";
    $arah_angin = $obj->WD;
    $kecepatan_angin = $obj->WS;
    $suhu_udara = $obj->T;
    $tekanan_udara = $obj->P < 0 ? 0 : $obj->P;
    $tegangan = $obj->V < 0 ? 0 : $obj->V;
    $arus=$obj->I;
    $kws= $arus*$tegangan;
    $waktuku = date('Y-m-d H:i:s',strtotime($obj->DT));
    
    // $waktuku = date("Y-m-d H:i:s");
	saveToSql($arah_angin,$kecepatan_angin,$suhu_udara,$tekanan_udara,$tegangan,$arus,$kws,$waktuku);
}

function saveToSql($arah_angin,$kecepatan_angin,$suhu_udara,$tekanan_udara,$tegangan,$arus,$kws,$waktuku){
	$username = "id14305605_wafiq16";
	$password = "@Kamaluddin123";
	$database = "id14305605_feedback_demo";
	$hostname = "localhost";

	$connect_db = new mysqli($hostname, $username, $password, $database);
    // Check connection
    if ($connect_db->connect_error) {
        die("Connection failed: " . $connect_db->connect_error);
    }

    $sql_simpan = "INSERT into datalogger(arah_angin,kecepatan_angin,suhu_udara,tekanan_udara, tegangan,arus,kws,waktu) VALUES ('$arah_angin','$kecepatan_angin','$suhu_udara','$tekanan_udara','$tegangan','$arus','$kws','$waktuku')";
    // echo $sql_simpan;
    if ($connect_db->query($sql_simpan) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql_simpan . "<br>" . $connect_db->error;
    }
    // sleep(1);
    $connect_db->close();
}