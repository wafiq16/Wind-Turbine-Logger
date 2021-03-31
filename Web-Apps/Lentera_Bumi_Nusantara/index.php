<!DOCTYPE html>
<html>
<head>
    <meta   charset = "utf-8">
    <meta   name    = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
    <link   rel     = "stylesheet" type  = "text/css" href = "bootstrap-4.5.0-dist/css/bootstrap.css">
    <script src     = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src     = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src     = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src     = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src     = "https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src     = "https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src     = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <style>
        .border {
            display: inline-block;
            width  : 100%;
            height : 100%;
        }
    </style>
    <title align = "center" >Yakin Jaya Data Logger</title>
    <link  rel   = "icon" href = "lentera_ikon.png">
</head>
    <body>
        <tbody>
            <nav    class = "navbar navbar-expand-md navbar-dark bg-dark">
            <a      class = "navbar-brand" href   = "https://lenterabumi.com/">Lentera Bumi Nusantara</a>
            <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarNavDropdown" aria-controls = "navbarNavDropdown" aria-expanded = "false" aria-label = "Toggle navigation">
            <span   class = "navbar-toggler-icon"></span>
                </button>
                <div class = "collapse navbar-collapse" id = "navbarNavDropdown" style = "padding-left:72%; padding-right:0%;">
                <ul  class = "navbar-nav">
                <li  class = "nav-item active" style       = "padding-left:0%; padding-right:0%;">
                <a   class = "nav-link" href               = "https://mywebwafiq16.000webhostapp.com/Lentera_Bumi_Nusantara/index.php?&time_stamp=GET_ALL">Home</a>
                        </li>
                        <li class = "nav-item active" style = "padding-left:0%; padding-right:0%;">
                        <a  class = "nav-link" href         = "https://mywebwafiq16.000webhostapp.com/Lentera_Bumi_Nusantara/about_us.php">About</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class = "custom-image-container text-center" style = "max-width:100%; max-height:50%; align:center;">
                <h5><br></br></h5>
                <!-- our custom header codes here -->
                <img src      = "lentera_ikon.png" class = "rounded">
                <!-- <img src = "lentera_ikon.jpg" alt   = "Navbar_Image" style = "width:50%; height:50%;"> -->
            </div>
            
            <!-- <span class = "border border-dark"> -->
            <div class       = "container">
            <div class       = 'bg-title'>
                    <h4><center><br><b>Data Logger Lentera Bumi Nusantara</b></br></center></h4>
                    <br>
                </div>                                          
                    <div    class = "dropdown" align = "center">
                    <button type  = "button" class   = "btn btn-outline-primary dropdown-toggle" data-toggle = "dropdown">
                            Pilih Waktu 
                        </button>
                            <div class = "dropdown-menu">
                            <div class = "dropdown-header">  Pilih Waktu  </div>
                            <a   class = "dropdown-item" href = "https://mywebwafiq16.000webhostapp.com/Lentera_Bumi_Nusantara/index.php?&time_stamp=GET_HOURS">Jam </a>
                            <a   class = "dropdown-item" href = "https://mywebwafiq16.000webhostapp.com/Lentera_Bumi_Nusantara/index.php?&time_stamp=GET_DAYS">Hari <?php $waktu_yang_dipilih    = "Hari"; ?></a>
                            <!-- <a   class = "dropdown-item" href = "http://192.168.43.231/Lentera_Bumi_Nusantara/index.php?&time_stamp=GET_WEEKS">Minggu <?php //$waktu_yang_dipilih = "Minggu"; ?></a> -->
                            <a   class = "dropdown-item" href = "https://mywebwafiq16.000webhostapp.com/Lentera_Bumi_Nusantara/index.php?&time_stamp=GET_MONTHS">Bulan <?php $waktu_yang_dipilih = "Bulan"; ?></a>
                            <a   class = "dropdown-item" href = "https://mywebwafiq16.000webhostapp.com/Lentera_Bumi_Nusantara/index.php?&time_stamp=GET_YEARS">Tahun <?php $waktu_yang_dipilih  = "Tahun"; ?></a>
                            </div> 
                    </div><br>
                    <div    align  = "center">
                    <form   action = "Export_To_Exel.php"  enctype = "multipart/form-data">
                    <button class  = "btn btn-primary" type        = "export_to_exel" style = "float:right align:center;" name = "export_to_exel">Export ke Exel</button</td>
                        <!-- btn <btn-link></btn-link> -->
                        </form>
                    </div>
            </div>
            <!-- </span> -->
            <?php
                include "koneksi.php";
                $action                = $_GET["time_stamp"];
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
                $arrayjson             = array();
                if($action == "GET_HOURS")
                {
                    $waktu_yang_dipilih = "Jam"; ?>
                    <br>
                    <h5 style = "text-align:center;"><b>Penggunaan <?php echo $waktu_yang_dipilih ?>Terakhir</b></h5>
                <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $date_now = date('Y-m-d H:i:s');
                    $tohour   = date('Y-m-d H');
                    $date     = "SELECT * FROM datalogger";
                    // echo " <br></br> <center><h3><b>Data Logger Lentera Bumi Nusantara</b></h3></center> <br> <br>";
                    $Time_From_Table = $connect_db->query($date);
                    if ($result = $Time_From_Table) {
                        while($row_Unsorted = $result->fetch_assoc()) {
                            // echo 'jojo'.$row_Unsorted["waktu"]."<br>";
                            $date        = strtotime($row_Unsorted["waktu"]);
                            $Sorted_Time = date('Y-m-d H', $date);
                            // echo $tohour." ".$Sorted_Time."<br>"; 
                            if($tohour == $Sorted_Time){             
                                // echo "Kws adalah = ".$row_Unsorted["Kws"]."<br>";
                                                      $nomor           = $row_Unsorted["nomor"];
                                                      $arah_angin      = $row_Unsorted["arah_angin"];
                                                      $kecepatan_angin = $row_Unsorted["kecepatan_angin"];
                                                      $suhu_udara      = $row_Unsorted["suhu_udara"];
                                                      $tekanan_udara      = $row_Unsorted["tekanan_udara"];
                                                      $tegangan        = $row_Unsorted["tegangan"];
                                                      if($tegangan<0){
                                                          $tegangan = 0;
                                                      }
                                                      $arus            = $row_Unsorted["arus"];
                                                      if($arus<0){
                                                          $arus = 0;
                                                      }
                                                      $Kws             = $row_Unsorted["Kws"];
                                                      $waktu           = $row_Unsorted["waktu"];
                                           $arrayjson[]                = $row_Unsorted;

                                    $arah_angin_total      = $arah_angin;
                                    $kecepatan_angin_total += $kecepatan_angin;
                                    $suhu_udara_total       += $suhu_udara;
                                    $tekanan_udara_total    += $tekanan_udara;
                                    $tegangan_total        += $tegangan;
                                    $arus_total            += $arus;
                                    $Kws_total             += $Kws;
                                    // $waktu_total += $waktu;
                                    $counter++;                     
                                }
                            }
                            if($counter == 0){
                                $counter = 1;
                            }
                            // $arah_angin_total      /= $counter;
                            $kecepatan_angin_total /= $counter;
                            $suhu_udara_total       /= $counter;
                            $tekanan_udara_total    /= $counter;
                            $tegangan_total        /= $counter;
                            $arus_total            /= $counter;
                            // $Kws_total *= 3600/$counter;               
                            ?>          
                            <h5 style = "text-align:center;"><b><?php echo date('H:i:s d-m-Y', $date) ?></b><br></h5>
                           <div class     = "card align-items-center " style        = "width: 15%; height=15%; margin-left: 5%; margin-right: 0%; float:left;">
                           <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">ARAH ANGIN</text></svg>
                           <div class     = "card-body">
                           <!-- <h5 class = "card-title">Arah Angin</h5> -->
                           <h5  class     = "card-title"><?php echo $arah_angin_total; ?> </h5>
                           <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>
                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">KECEPATAN ANGIN</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($kecepatan_angin_total, 2, '.', ''); ?> m/s</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">SUHU UDARA</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($suhu_udara_total, 2, '.', ''); ?> celcius</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">TEKANAN UDARA</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($tekanan_udara_total, 2, '.', ''); ?> mb</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "35%" y = "50%" fill = "#000000" dy = ".3em">TEGANGAN</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Tegangan</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($tegangan_total, 2, '.', ''); ?> Volt</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>
                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 30%; margin-right: 10%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "45%" y = "50%" fill = "#000000" dy = ".3em">ARUS</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Arus</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($arus_total, 2, '.', ''); ?> Ampere</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div div class = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 0%; margin-right: 0%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "45%" y = "50%" fill = "#000000" dy = ".3em">KWH</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kws</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($Kws_total, 2, '.', ''); ?> Watt</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>
                            <h2><br></h2>
                            <?php               
                // echo json_encode($arrayjson, JSON_NUMERIC_CHECK);
                $fp = fopen('result.json', 'w');
                fwrite($fp, json_encode($arrayjson));
                fclose($fp);
?>                 
            <script>
                //arah angin
            window.onload = function() {

            var dataPoints_Ar_Angin  = [];
            var dataPoints_Kec_Angin = [];
            var dataPoints_Suhu_Udara= [];
            var dataPoints_Tekanan_Udara= [];
            var dataPoints_Arus      = [];
            var dataPoints_Tegangan  = [];
            var dataPoints_Kws       = [];
            

            var Arah_Angin_Chart = new CanvasJS.Chart("Arah_Angin_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Arah Angin"
                },
                axisY: {
                    title        : "arah angin",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### arah angin",
                    dataPoints        : dataPoints_Ar_Angin
                }]
            });

            $.getJSON("result.json", addData_Ar_Angin);

            function addData_Ar_Angin(data) {
                // console.log(data);
                for (var i = 0; i < data.length; i++) {
                    // console.log(data.length);
                    // console.log(data[i].waktu);
                    // console.log(data[i].waktu);
                    console.log(data[i].arah_angin);
                    dataPoints_Ar_Angin.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arah_angin*1,
                        // x: data[i].arus,
                    });
                }
                Arah_Angin_Chart.render();
            }

            // kecepatan angin
            var Kecepatan_Angin_Chart = new CanvasJS.Chart("Kecepatan_Angin_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Kecepatan Angin"
                },
                axisY: {
                    title        : "kecepatan angin",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### kecepatan angin",
                    dataPoints        : dataPoints_Kec_Angin
                }]
            });

            $.getJSON("result.json", addData_Kec_Angin);

            function addData_Kec_Angin(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Kec_Angin.push({
                        x: new Date(data[i].waktu),
                        y: data[i].kecepatan_angin*1,
                        // x: data[i].arus,
                    });
                }
                Kecepatan_Angin_Chart.render();
            }

            var Suhu_Udara_Chart = new CanvasJS.Chart("Suhu_Udara_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Suhu Udara"
                },
                axisY: {
                    title        : "Suhu Udara",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Suhu Udara",
                    dataPoints        : dataPoints_Suhu_Udara
                }]
            });

            $.getJSON("result.json", addData_Suhu_Udara);

            function addData_Suhu_Udara(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Suhu_Udara.push({
                        x: new Date(data[i].waktu),
                        y: data[i].suhu_udara*1,
                        // x: data[i].arus,
                    });
                }
                Suhu_Udara_Chart.render();
            }

            var Tekanan_Udara_Chart = new CanvasJS.Chart("Tekanan_Udara_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Tekanan Udara"
                },
                axisY: {
                    title        : "Tekanan Udara",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Tekanan Udara (dalam 10 mb)",
                    dataPoints        : dataPoints_Tekanan_Udara
                }]
            });

            $.getJSON("result.json", addData_Tekanan_Udara);

            function addData_Tekanan_Udara(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Tekanan_Udara.push({
                        x: new Date(data[i].waktu),
                        y: data[i].tekanan_udara/10,
                        // x: data[i].arus,
                    });
                }
                Tekanan_Udara_Chart.render();
            }
            // Arus
            var Arus_Chart = new CanvasJS.Chart("Arus_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Arus"
                },
                axisY: {
                    title        : "Arus",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Arus",
                    dataPoints        : dataPoints_Arus
                }]
            });

            $.getJSON("result.json", addData_Arus);

            function addData_Arus(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Arus.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Arus_Chart.render();
            }
            // Tegangan
            var Tegangan_Chart = new CanvasJS.Chart("Tegangan_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Tegangan"
                },
                axisY: {
                    title        : "Tegangan",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Tegangan",
                    dataPoints        : dataPoints_Tegangan
                }]
            });

            $.getJSON("result.json", addData_Tegangan);

            function addData_Tegangan(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Tegangan.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Tegangan_Chart.render();
            }

            // KWS
            var Kws_Chart = new CanvasJS.Chart("Kws_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Kws"
                },
                axisY: {
                    title        : "Kws",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Kws",
                    dataPoints        : dataPoints_Kws
                }]
            });

            $.getJSON("result.json", addData_Kws);

            function addData_Kws(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Kws.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Kws_Chart.render();
            }
        }
            </script>
            <h1><br></br><h1>
                <div id = "Arah_Angin_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Kecepatan_Angin_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Suhu_Udara_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Tekanan_Udara_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Arus_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Tegangan_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Kws_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 4%; align:center"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
                            <!-- </table>    -->   
<?php               }
                }   
                    else if($action == "GET_DAYS")
                    {
                        $waktu_yang_dipilih = "Hari";
?>
                        <br>
                        <h5 style = "text-align:center;"><b>Penggunaan <?php echo $waktu_yang_dipilih ?> Terakhir</b></h5>
                        <br>
<?php
        
                        date_default_timezone_set('Asia/Jakarta');
                        $date_now = date('Y-m-d H:i:s');
                        $tohour   = date('Y-m-d');
                        $date     = "SELECT * FROM datalogger";
                        // echo " <br></br> <center><h3><b>Data Logger Lentera Bumi Nusantara</b></h3></center> <br> <br>";
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
                                                      $tekanan_udara      = $row_Unsorted["tekanan_udara"];
                                                      $tegangan        = $row_Unsorted["tegangan"];
                                                      if($tegangan<0){
                                                          $tegangan = 0;
                                                      }
                                                      $arus            = $row_Unsorted["arus"];
                                                      if($arus<0){
                                                          $arus = 0;
                                                      }
                                                      $Kws             = $row_Unsorted["Kws"];
                                                      $waktu           = $row_Unsorted["waktu"];
                                           $arrayjson[]                = $row_Unsorted;

                                    $arah_angin_total      = $arah_angin;
                                    $kecepatan_angin_total += $kecepatan_angin;
                                    $suhu_udara_total       += $suhu_udara;
                                    $tekanan_udara_total    += $tekanan_udara;
                                    $tegangan_total        += $tegangan;
                                    $arus_total            += $arus;
                                    $Kws_total             += $Kws;
                                    // $waktu_total += $waktu;
                                    $counter++;                     
                                }
                            }
                            if($counter == 0){
                                $counter = 1;
                            }
                            // $arah_angin_total      /= $counter;
                            $kecepatan_angin_total /= $counter;
                            $suhu_udara_total       /= $counter;
                            $tekanan_udara_total    /= $counter;
                            $tegangan_total        /= $counter;
                            $arus_total            /= $counter;
                            // $Kws_total *= 3600/$counter;                
?>          
                            <h5 style = "text-align:center;"><b><br><?php echo date('l d-m-Y', strtotime($date_now)); ?></b></h5>
                           <div class     = "card align-items-center " style        = "width: 15%; height=15%; margin-left: 5%; margin-right: 0%; float:left;">
                           <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">ARAH ANGIN</text></svg>
                           <div class     = "card-body">
                           <!-- <h5 class = "card-title">Arah Angin</h5> -->
                           <h5  class     = "card-title"><?php echo $arah_angin_total; ?> </h5>
                           <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>
                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">KECEPATAN ANGIN</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($kecepatan_angin_total, 2, '.', ''); ?> m/s</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">SUHU UDARA</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($suhu_udara_total, 2, '.', ''); ?> celcius</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">TEKANAN UDARA</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($tekanan_udara_total, 2, '.', ''); ?> mb</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "35%" y = "50%" fill = "#000000" dy = ".3em">TEGANGAN</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Tegangan</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($tegangan_total, 2, '.', ''); ?> Volt</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 30%; margin-right: 10%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "45%" y = "50%" fill = "#000000" dy = ".3em">ARUS</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Arus</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($arus_total, 2, '.', ''); ?> Ampere</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div div class = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 0%; margin-right: 0%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "45%" y = "50%" fill = "#000000" dy = ".3em">KWH</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kws</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($Kws_total, 2, '.', ''); ?> Watt</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>
                            <h2><br></h2>
                            <?php               
                // echo json_encode($arrayjson, JSON_NUMERIC_CHECK);
                $fp = fopen('result.json', 'w');
                fwrite($fp, json_encode($arrayjson));
                fclose($fp);
?>                 
            <script>
                //arah angin
            window.onload = function() {

            var dataPoints_Ar_Angin  = [];
            var dataPoints_Kec_Angin = [];
            var dataPoints_Suhu_Udara= [];
            var dataPoints_Tekanan_Udara= [];
            var dataPoints_Arus      = [];
            var dataPoints_Tegangan  = [];
            var dataPoints_Kws       = [];
            

            var Arah_Angin_Chart = new CanvasJS.Chart("Arah_Angin_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Arah Angin"
                },
                axisY: {
                    title        : "arah angin",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### arah angin",
                    dataPoints        : dataPoints_Ar_Angin
                }]
            });

            $.getJSON("result.json", addData_Ar_Angin);

            function addData_Ar_Angin(data) {
                // console.log(data);
                for (var i = 0; i < data.length; i++) {
                    // console.log(data.length);
                    // console.log(data[i].waktu);
                    // console.log(data[i].waktu);
                    console.log(data[i].arah_angin);
                    dataPoints_Ar_Angin.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arah_angin*1,
                        // x: data[i].arus,
                    });
                }
                Arah_Angin_Chart.render();
            }

            // kecepatan angin
            var Kecepatan_Angin_Chart = new CanvasJS.Chart("Kecepatan_Angin_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Kecepatan Angin"
                },
                axisY: {
                    title        : "kecepatan angin",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### kecepatan angin",
                    dataPoints        : dataPoints_Kec_Angin
                }]
            });

            $.getJSON("result.json", addData_Kec_Angin);

            function addData_Kec_Angin(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Kec_Angin.push({
                        x: new Date(data[i].waktu),
                        y: data[i].kecepatan_angin*1,
                        // x: data[i].arus,
                    });
                }
                Kecepatan_Angin_Chart.render();
            }

            var Suhu_Udara_Chart = new CanvasJS.Chart("Suhu_Udara_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Suhu Udara"
                },
                axisY: {
                    title        : "Suhu Udara",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Suhu Udara",
                    dataPoints        : dataPoints_Suhu_Udara
                }]
            });

            $.getJSON("result.json", addData_Suhu_Udara);

            function addData_Suhu_Udara(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Suhu_Udara.push({
                        x: new Date(data[i].waktu),
                        y: data[i].suhu_udara*1,
                        // x: data[i].arus,
                    });
                }
                Suhu_Udara_Chart.render();
            }

            var Tekanan_Udara_Chart = new CanvasJS.Chart("Tekanan_Udara_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Tekanan Udara "
                },
                axisY: {
                    title        : "Tekanan Udara",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Tekanan Udara (dalam 10 mb)",
                    dataPoints        : dataPoints_Tekanan_Udara
                }]
            });

            $.getJSON("result.json", addData_Tekanan_Udara);

            function addData_Tekanan_Udara(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Tekanan_Udara.push({
                        x: new Date(data[i].waktu),
                        y: data[i].tekanan_udara/10,
                        // x: data[i].arus,
                    });
                }
                Tekanan_Udara_Chart.render();
            }

            // Arus
            var Arus_Chart = new CanvasJS.Chart("Arus_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Arus"
                },
                axisY: {
                    title        : "Arus",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Arus",
                    dataPoints        : dataPoints_Arus
                }]
            });

            $.getJSON("result.json", addData_Arus);

            
            function addData_Arus(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Arus.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Arus_Chart.render();
            }
            // Tegangan
            var Tegangan_Chart = new CanvasJS.Chart("Tegangan_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Tegangan"
                },
                axisY: {
                    title        : "Tegangan",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Tegangan",
                    dataPoints        : dataPoints_Tegangan
                }]
            });

            $.getJSON("result.json", addData_Tegangan);

            function addData_Tegangan(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Tegangan.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Tegangan_Chart.render();
            }

            // KWS
            var Kws_Chart = new CanvasJS.Chart("Kws_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Kws"
                },
                axisY: {
                    title        : "Kws",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Kws",
                    dataPoints        : dataPoints_Kws
                }]
            });

            $.getJSON("result.json", addData_Kws);

            function addData_Kws(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Kws.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Kws_Chart.render();
            }
        }
            </script>
            <h1><br></br><h1>
                <div id = "Arah_Angin_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Kecepatan_Angin_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Suhu_Udara_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Tekanan_Udara_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Arus_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Tegangan_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Kws_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 4%; align:center"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
<?php                   }
                    }
                    else if($action == "GET_MONTHS")
                    {
                        $waktu_yang_dipilih = "Bulan";
?>
                        <br>
                        <h5 style = "text-align:center;"><b>Penggunaan <?php echo $waktu_yang_dipilih; ?> Terakhir</b></h5>
                        <br>
<?php
                        date_default_timezone_set('Asia/Jakarta');
                        $date_now        = date('Y-m-d H:i:s');
                        $tohour          = date('Y-m');
                        $date            = "SELECT * FROM datalogger";
                        $Time_From_Table = $connect_db->query($date);

                        if ($result = $Time_From_Table) {
                            while($row_Unsorted = $result->fetch_assoc()) {
                                // echo 'jojo'.$row_Unsorted["waktu"]."<br>";
                                $date        = strtotime($row_Unsorted["waktu"]);
                                $Sorted_Time = date('Y-m', $date);
                                // echo $tohour." ".$Sorted_Time."<br>"; 
                                if($tohour == $Sorted_Time){             
                                    // echo "Kws adalah = ".$row_Unsorted["Kws"]."<br>";
                                    $nomor           = $row_Unsorted["nomor"];
                                                      $arah_angin      = $row_Unsorted["arah_angin"];
                                                      $kecepatan_angin = $row_Unsorted["kecepatan_angin"];
                                                      $suhu_udara      = $row_Unsorted["suhu_udara"];
                                                      $tekanan_udara      = $row_Unsorted["tekanan_udara"];
                                                      $tegangan        = $row_Unsorted["tegangan"];
                                                      if($tegangan<0){
                                                          $tegangan = 0;
                                                      }
                                                      $arus            = $row_Unsorted["arus"];
                                                      if($arus<0){
                                                          $arus = 0;
                                                      }
                                                      $Kws             = $row_Unsorted["Kws"];
                                                      $waktu           = $row_Unsorted["waktu"];
                                           $arrayjson[]                = $row_Unsorted;

                                    $arah_angin_total      = $arah_angin;
                                    $kecepatan_angin_total += $kecepatan_angin;
                                    $suhu_udara_total       += $suhu_udara;
                                    $tekanan_udara_total    += $tekanan_udara;
                                    $tegangan_total        += $tegangan;
                                    $arus_total            += $arus;
                                    $Kws_total             += $Kws;
                                    // $waktu_total += $waktu;
                                    $counter++;                     
                                }
                            }
                            if($counter == 0){
                                $counter = 1;
                            }
                            // $arah_angin_total      /= $counter;
                            $kecepatan_angin_total /= $counter;
                            $suhu_udara_total       /= $counter;
                            $tekanan_udara_total    /= $counter;
                            $tegangan_total        /= $counter;
                            $arus_total            /= $counter;
                            // $Kws_total *= 3600/$counter;            
?>
                            <h5 style = "text-align:center;"><b><?php echo date('F Y', strtotime($Sorted_Time)) ?></b><br></h5>          
                            <div class     = "card align-items-center " style        = "width: 15%; height=15%; margin-left: 5%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">ARAH ANGIN</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Arah Angin</h5> -->
                            <h5  class     = "card-title"><?php echo $arah_angin_total; ?> </h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>
                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">KECEPATAN ANGIN</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($kecepatan_angin_total, 2, '.', ''); ?> m/s</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">SUHU UDARA</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($suhu_udara_total, 2, '.', ''); ?> celcius</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">TEKANAN UDARA</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($tekanan_udara_total, 2, '.', ''); ?> mb</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "35%" y = "50%" fill = "#000000" dy = ".3em">TEGANGAN</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Tegangan</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($tegangan_total, 2, '.', ''); ?> Volt</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 30%; margin-right: 10%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "45%" y = "50%" fill = "#000000" dy = ".3em">ARUS</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Arus</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($arus_total, 2, '.', ''); ?> Ampere</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div div class = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 0%; margin-right: 0%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "45%" y = "50%" fill = "#000000" dy = ".3em">KWH</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kws</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($Kws_total, 2, '.', ''); ?> Watt</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>
                            <h2><br></h2>
<?php  
                // echo json_encode($arrayjson, JSON_NUMERIC_CHECK);
                $fp = fopen('result.json', 'w');
                fwrite($fp, json_encode($arrayjson));
                fclose($fp);
?>                 
            <script>
                //arah angin
            window.onload = function() {

            var dataPoints_Ar_Angin  = [];
            var dataPoints_Kec_Angin = [];
            var dataPoints_Suhu_Udara= [];
            var dataPoints_Tekanan_Udara= [];
            var dataPoints_Arus      = [];
            var dataPoints_Tegangan  = [];
            var dataPoints_Kws       = [];
            
            var Arah_Angin_Chart = new CanvasJS.Chart("Arah_Angin_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Arah Angin"
                },
                axisY: {
                    title        : "arah angin",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### arah angin",
                    dataPoints        : dataPoints_Ar_Angin
                }]
            });

            $.getJSON("result.json", addData_Ar_Angin);

            function addData_Ar_Angin(data) {
                // console.log(data);
                for (var i = 0; i < data.length; i++) {
                    // console.log(data.length);
                    // console.log(data[i].waktu);
                    // console.log(data[i].waktu);
                    console.log(data[i].arah_angin);
                    dataPoints_Ar_Angin.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arah_angin*1,
                        // x: data[i].arus,
                    });
                }
                Arah_Angin_Chart.render();
            }
            // kecepatan angin
            var Kecepatan_Angin_Chart = new CanvasJS.Chart("Kecepatan_Angin_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Kecepatan Angin"
                },
                axisY: {
                    title        : "kecepatan angin",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### kecepatan angin",
                    dataPoints        : dataPoints_Kec_Angin
                }]
            });

            $.getJSON("result.json", addData_Kec_Angin);

            function addData_Kec_Angin(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Kec_Angin.push({
                        x: new Date(data[i].waktu),
                        y: data[i].kecepatan_angin*1,
                        // x: data[i].arus,
                    });
                }
                Kecepatan_Angin_Chart.render();
            }

            var Suhu_Udara_Chart = new CanvasJS.Chart("Suhu_Udara_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Suhu Udara"
                },
                axisY: {
                    title        : "Suhu Udara",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Suhu Udara",
                    dataPoints        : dataPoints_Suhu_Udara
                }]
            });

            $.getJSON("result.json", addData_Suhu_Udara);

            function addData_Suhu_Udara(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Suhu_Udara.push({
                        x: new Date(data[i].waktu),
                        y: data[i].suhu_udara*1,
                        // x: data[i].arus,
                    });
                }
                Suhu_Udara_Chart.render();
            }

            var Tekanan_Udara_Chart = new CanvasJS.Chart("Tekanan_Udara_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Tekanan Udara"
                },
                axisY: {
                    title        : "Tekanan Udara",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Tekanan Udara (dalam 10 mb)",
                    dataPoints        : dataPoints_Tekanan_Udara
                }]
            });

            $.getJSON("result.json", addData_Tekanan_Udara);

            function addData_Tekanan_Udara(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Tekanan_Udara.push({
                        x: new Date(data[i].waktu),
                        y: data[i].tekanan_udara/10,
                        // x: data[i].arus,
                    });
                }
                Tekanan_Udara_Chart.render();
            }

            // Arus
            var Arus_Chart = new CanvasJS.Chart("Arus_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Arus"
                },
                axisY: {
                    title        : "Arus",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Arus",
                    dataPoints        : dataPoints_Arus
                }]
            });

            $.getJSON("result.json", addData_Arus);

            function addData_Arus(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Arus.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Arus_Chart.render();
            }
            // Tegangan
            var Tegangan_Chart = new CanvasJS.Chart("Tegangan_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Tegangan"
                },
                axisY: {
                    title        : "Tegangan",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Tegangan",
                    dataPoints        : dataPoints_Tegangan
                }]
            });

            $.getJSON("result.json", addData_Tegangan);

            function addData_Tegangan(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Tegangan.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Tegangan_Chart.render();
            }

            // KWS
            var Kws_Chart = new CanvasJS.Chart("Kws_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Kws"
                },
                axisY: {
                    title        : "Kws",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Kws",
                    dataPoints        : dataPoints_Kws
                }]
            });

            $.getJSON("result.json", addData_Kws);

            function addData_Kws(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Kws.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Kws_Chart.render();
            }
        }
            </script>
            <h1><br></br><h1>
                <div id = "Arah_Angin_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Kecepatan_Angin_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Suhu_Udara_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Tekanan_Udara_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Arus_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Tegangan_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Kws_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 4%; align:center"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
                            <!-- </table>    -->
<?php       }
                }
                    else if($action == "GET_YEARS")
                    {
                        $waktu_yang_dipilih = "Tahun";
?>
                        <br>
                        <h5 style = "text-align:center;"><b>Penggunaan <?php echo $waktu_yang_dipilih; ?> Terakhir</b></h5>
                        <br>
<?php
                        date_default_timezone_set('Asia/Jakarta');
                        $date_now = date('Y-m-d H:i:s');
                        $tohour   = date('Y');
                        $date     = "SELECT * FROM datalogger";
                        // echo " <br></br> <center><h3><b>Data Logger Lentera Bumi Nusantara</b></h3></center> <br> <br>";
                        $Time_From_Table = $connect_db->query($date);

                        if ($result = $Time_From_Table) {
?>
<?php
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
                                                      $tekanan_udara      = $row_Unsorted["tekanan_udara"];
                                                      $tegangan        = $row_Unsorted["tegangan"];
                                                      if($tegangan<0){
                                                          $tegangan = 0;
                                                      }
                                                      $arus            = $row_Unsorted["arus"];
                                                      if($arus<0){
                                                          $arus = 0;
                                                      }
                                                      $Kws             = $row_Unsorted["Kws"];
                                                      $waktu           = $row_Unsorted["waktu"];
                                           $arrayjson[]                = $row_Unsorted;

                                    $arah_angin_total      = $arah_angin;
                                    $kecepatan_angin_total += $kecepatan_angin;
                                    $suhu_udara_total       += $suhu_udara;
                                    $tekanan_udara_total    += $tekanan_udara;
                                    $tegangan_total        += $tegangan;
                                    $arus_total            += $arus;
                                    $Kws_total             += $Kws;
                                    // $waktu_total += $waktu;
                                    $counter++;                     
                                }
                            }
                            if($counter == 0){
                                $counter = 1;
                            }
                            // $arah_angin_total      /= $counter;
                            $kecepatan_angin_total /= $counter;
                            $suhu_udara_total       /= $counter;
                            $tekanan_udara_total    /= $counter;
                            $tegangan_total        /= $counter;
                            $arus_total            /= $counter;
                            // $Kws_total *= 3600/$counter;               
?>          
                            <h5 style = "text-align:center;"><b><?php echo date('Y', strtotime($Sorted_Time)) ?></b><br></h5>
                            <div class     = "card align-items-center " style        = "width: 15%; height=15%; margin-left: 5%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">ARAH ANGIN</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Arah Angin</h5> -->
                            <h5  class     = "card-title"><?php echo $arah_angin_total; ?></h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>
                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">KECEPATAN ANGIN</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($kecepatan_angin_total, 2, '.', ''); ?> m/s</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">SUHU UDARA</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($suhu_udara_total, 2, '.', ''); ?> celcius</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">TEKANAN UDARA</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($tekanan_udara_total, 2, '.', ''); ?> mb</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "35%" y = "50%" fill = "#000000" dy = ".3em">TEGANGAN</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Tegangan</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($tegangan_total, 2, '.', ''); ?> Volt</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 30%; margin-right: 10%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "45%" y = "50%" fill = "#000000" dy = ".3em">ARUS</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Arus</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($arus_total, 2, '.', ''); ?> Ampere</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div div class = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 0%; margin-right: 0%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "45%" y = "50%" fill = "#000000" dy = ".3em">KWH</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kws</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($Kws_total, 2, '.', ''); ?> Watt</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>
                            <h2><br></h2>
<?php        
                $fp = fopen('result.json', 'w');
                fwrite($fp, json_encode($arrayjson));
                fclose($fp);            
            
?>                 
            <script>
            //arah angin
            window.onload = function() {

            var dataPoints_Ar_Angin  = [];
            var dataPoints_Kec_Angin = [];
            var dataPoints_Suhu_Udara= [];
            var dataPoints_Tekanan_Udara= [];
            var dataPoints_Arus      = [];
            var dataPoints_Tegangan  = [];
            var dataPoints_Kws       = [];
            

            var Arah_Angin_Chart = new CanvasJS.Chart("Arah_Angin_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Arah Angin"
                },
                axisY: {
                    title        : "arah angin",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### arah angin",
                    dataPoints        : dataPoints_Ar_Angin
                }]
            });

            $.getJSON("result.json", addData_Ar_Angin);

            function addData_Ar_Angin(data) {
                // console.log(data);
                for (var i = 0; i < data.length; i++) {
                    // console.log(data.length);
                    // console.log(data[i].waktu);
                    // console.log(data[i].waktu);
                    console.log(data[i].arah_angin);
                    dataPoints_Ar_Angin.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arah_angin*1,
                        // x: data[i].arus,
                    });
                }
                Arah_Angin_Chart.render();
            }

            // kecepatan angin
            var Kecepatan_Angin_Chart = new CanvasJS.Chart("Kecepatan_Angin_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Kecepatan Angin"
                },
                axisY: {
                    title        : "kecepatan angin",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### kecepatan angin",
                    dataPoints        : dataPoints_Kec_Angin
                }]
            });

            $.getJSON("result.json", addData_Kec_Angin);

            function addData_Kec_Angin(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Kec_Angin.push({
                        x: new Date(data[i].waktu),
                        y: data[i].kecepatan_angin*1,
                        // x: data[i].arus,
                    });
                }
                Kecepatan_Angin_Chart.render();
            }

            var Suhu_Udara_Chart = new CanvasJS.Chart("Suhu_Udara_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Suhu Udara"
                },
                axisY: {
                    title        : "Suhu Udara",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Suhu Udara",
                    dataPoints        : dataPoints_Suhu_Udara
                }]
            });

            $.getJSON("result.json", addData_Suhu_Udara);

            function addData_Suhu_Udara(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Suhu_Udara.push({
                        x: new Date(data[i].waktu),
                        y: data[i].suhu_udara*1,
                        // x: data[i].arus,
                    });
                }
                Suhu_Udara_Chart.render();
            }

            var Tekanan_Udara_Chart = new CanvasJS.Chart("Tekanan_Udara_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Tekanan Udara"
                },
                axisY: {
                    title        : "Tekanan Udara",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Tekanan Udara (dalam 10 mb)",
                    dataPoints        : dataPoints_Tekanan_Udara
                }]
            });

            $.getJSON("result.json", addData_Tekanan_Udara);

            function addData_Tekanan_Udara(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Tekanan_Udara.push({
                        x: new Date(data[i].waktu),
                        y: data[i].tekanan_udara/10,
                        // x: data[i].arus,
                    });
                }
                Tekanan_Udara_Chart.render();
            }

            // Arus
            var Arus_Chart = new CanvasJS.Chart("Arus_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Arus"
                },
                axisY: {
                    title        : "Arus",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Arus",
                    dataPoints        : dataPoints_Arus
                }]
            });

            $.getJSON("result.json", addData_Arus);

            function addData_Arus(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Arus.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Arus_Chart.render();
            }
            // Tegangan
            var Tegangan_Chart = new CanvasJS.Chart("Tegangan_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Tegangan"
                },
                axisY: {
                    title        : "Tegangan",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Tegangan",
                    dataPoints        : dataPoints_Tegangan
                }]
            });

            $.getJSON("result.json", addData_Tegangan);

            function addData_Tegangan(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Tegangan.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Tegangan_Chart.render();
            }

            // KWS
            var Kws_Chart = new CanvasJS.Chart("Kws_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Kws"
                },
                axisY: {
                    title        : "Kws",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Kws",
                    dataPoints        : dataPoints_Kws
                }]
            });

            $.getJSON("result.json", addData_Kws);

            function addData_Kws(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Kws.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Kws_Chart.render();
            }
        }
            </script>
            <h1><br></br><h1>
                <div id = "Arah_Angin_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Kecepatan_Angin_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Suhu_Udara_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Tekanan_Udara_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Arus_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Tegangan_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Kws_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 4%; align:center"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
                            <!-- </table>    -->
<?php               }
                }
                    else
                    {
                        $waktu_yang_dipilih = "Seluruh Data Yang Ada";
?>
                        <br>
                        <h5 style = "text-align:center;"><b>Penggunaan <?php echo $waktu_yang_dipilih; ?> Terakhir</b></h5>
                        <br>
<?php
                        date_default_timezone_set('Asia/Jakarta');
                        $date_now        = date('Y-m-d H:i:s');
                        $tohour          = date('Y-m-d');
                        $date            = "SELECT * FROM datalogger";
                        $Time_From_Table = $connect_db->query($date);
                        if ($result = $Time_From_Table) {
                            while($row_Unsorted = $result->fetch_assoc()) {             
                                    // echo "Kws adalah = ".$row_Unsorted["Kws"]."<br>";
                                                         $nomor           = $row_Unsorted["nomor"];
                                                      $arah_angin      = $row_Unsorted["arah_angin"];
                                                      $kecepatan_angin = $row_Unsorted["kecepatan_angin"];
                                                      $suhu_udara      = $row_Unsorted["suhu_udara"];
                                                      $tekanan_udara      = $row_Unsorted["tekanan_udara"];
                                                      $tegangan        = $row_Unsorted["tegangan"];
                                                      if($tegangan<0){
                                                          $tegangan = 0;
                                                      }
                                                      $arus            = $row_Unsorted["arus"];
                                                      if($arus<0){
                                                          $arus = 0;
                                                      }
                                                      $Kws             = $row_Unsorted["Kws"];
                                                      $waktu           = $row_Unsorted["waktu"];
                                           $arrayjson[]                = $row_Unsorted;

                                    $arah_angin_total      = $arah_angin;
                                    $kecepatan_angin_total += $kecepatan_angin;
                                    $suhu_udara_total       += $suhu_udara;
                                    $tekanan_udara_total    += $tekanan_udara;
                                    $tegangan_total        += $tegangan;
                                    $arus_total            += $arus;
                                    $Kws_total             += $Kws;
                                    // $waktu_total += $waktu;
                                    $counter++;                     
                                }
                            }
                            if($counter == 0){
                                $counter = 1;
                            }
                            // $arah_angin_total      /= $counter;
                            $kecepatan_angin_total /= $counter;
                            $suhu_udara_total       /= $counter;
                            $tekanan_udara_total    /= $counter;
                            $tegangan_total        /= $counter;
                            $arus_total            /= $counter;
                            // $Kws_total *= 3600/$counter;               
?>          
                            <div class     = "card align-items-center " style        = "width: 15%; height=15%; margin-left: 5%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">ARAH ANGIN</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Arah Angin</h5> -->
                            <h5  class     = "card-title"><?php echo $arah_angin_total; ?></h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>
                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">KECEPATAN ANGIN</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($kecepatan_angin_total, 2, '.', ''); ?> m/s</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">SUHU UDARA</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($suhu_udara_total, 2, '.', ''); ?> celcius</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float:left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "20%" y = "50%" fill = "#000000" dy = ".3em">TEKANAN UDARA</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kecepatan Angin</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($tekanan_udara_total, 2, '.', ''); ?> mb</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 4%; margin-right: 0%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "35%" y = "50%" fill = "#000000" dy = ".3em">TEGANGAN</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Tegangan</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($tegangan_total, 2, '.', ''); ?> Volt</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div class     = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 35%; margin-right: 10%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "45%" y = "50%" fill = "#000000" dy = ".3em">ARUS</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Arus</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($arus_total, 2, '.', ''); ?> Ampere</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>

                            <div div class = "card align-items-center" style         = "width: 15%; height=15%; margin-left: 0%; margin-right: 0%; float: left;">
                            <svg class     = "bd-placeholder-img card-img-top" width = "20%" height = "30" xmlns = "http://www.w3.org/2000/svg" aria-label = "Placeholder: Image cap" preserveAspectRatio = "xMidYMid slice" role = "img"><title>Placeholder</title><rect width = "100%" height = "100%" fill = "#E1E6ED"/><text x = "45%" y = "50%" fill = "#000000" dy = ".3em">KWH</text></svg>
                            <div class     = "card-body">
                            <!-- <h5 class = "card-title">Kws</h5> -->
                            <h5  class     = "card-title"><?php echo number_format($Kws_total, 2, '.', ''); ?> Watt</h5>
                            <!-- <a href   = "#" class                               = "btn btn-primary">Go somewhere</a> -->
                                        </div>
                            </div>
                            <h2><br></h2>   
<?php           
                // echo json_encode($arrayjson, JSON_NUMERIC_CHECK);
                $fp = fopen('result.json', 'w');
                fwrite($fp, json_encode($arrayjson));
                fclose($fp);
?>                 
            <script>
                //arah angin
            window.onload = function() {

            var dataPoints_Ar_Angin  = [];
            var dataPoints_Kec_Angin = [];
            var dataPoints_Suhu_Udara= [];
            var dataPoints_Tekanan_Udara= [];
            var dataPoints_Arus      = [];
            var dataPoints_Tegangan  = [];
            var dataPoints_Kws       = [];
            

            var Arah_Angin_Chart = new CanvasJS.Chart("Arah_Angin_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Arah Angin"
                },
                axisY: {
                    title        : "arah angin",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### arah angin",
                    dataPoints        : dataPoints_Ar_Angin
                }]
            });

            $.getJSON("result.json", addData_Ar_Angin);

            function addData_Ar_Angin(data) {
                // console.log(data);
                for (var i = 0; i < data.length; i++) {
                    // console.log(data.length);
                    // console.log(data[i].waktu);
                    // console.log(data[i].waktu);
                    console.log(data[i].arah_angin);
                    dataPoints_Ar_Angin.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arah_angin*1,
                        // x: data[i].arus,
                    });
                }
                Arah_Angin_Chart.render();
            }

            // kecepatan angin
            var Kecepatan_Angin_Chart = new CanvasJS.Chart("Kecepatan_Angin_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Kecepatan Angin"
                },
                axisY: {
                    title        : "kecepatan angin",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### kecepatan angin",
                    dataPoints        : dataPoints_Kec_Angin
                }]
            });

            $.getJSON("result.json", addData_Kec_Angin);

            function addData_Kec_Angin(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Kec_Angin.push({
                        x: new Date(data[i].waktu),
                        y: data[i].kecepatan_angin*1,
                        // x: data[i].arus,
                    });
                }
                Kecepatan_Angin_Chart.render();
            }

            var Suhu_Udara_Chart = new CanvasJS.Chart("Suhu_Udara_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Suhu Udara"
                },
                axisY: {
                    title        : "Suhu Udara",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Suhu Udara",
                    dataPoints        : dataPoints_Suhu_Udara
                }]
            });

            $.getJSON("result.json", addData_Suhu_Udara);

            function addData_Suhu_Udara(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Suhu_Udara.push({
                        x: new Date(data[i].waktu),
                        y: data[i].suhu_udara*1,
                        // x: data[i].arus,
                    });
                }
                Suhu_Udara_Chart.render();
            }

            var Tekanan_Udara_Chart = new CanvasJS.Chart("Tekanan_Udara_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Tekanan Udara"
                },
                axisY: {
                    title        : "Tekanan Udara",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Tekanan Udara (dalam 10 mb)",
                    dataPoints        : dataPoints_Tekanan_Udara
                }]
            });

            $.getJSON("result.json", addData_Tekanan_Udara);

            function addData_Tekanan_Udara(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Tekanan_Udara.push({
                        x: new Date(data[i].waktu),
                        y: data[i].tekanan_udara/10,
                        // x: data[i].arus,
                    });
                }
                Tekanan_Udara_Chart.render();
            }
            
            // Arus
            var Arus_Chart = new CanvasJS.Chart("Arus_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Arus"
                },
                axisY: {
                    title        : "Arus",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Arus",
                    dataPoints        : dataPoints_Arus
                }]
            });

            $.getJSON("result.json", addData_Arus);

            function addData_Arus(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Arus.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Arus_Chart.render();
            }
            // Tegangan
            var Tegangan_Chart = new CanvasJS.Chart("Tegangan_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Tegangan"
                },
                axisY: {
                    title        : "Tegangan",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Tegangan",
                    dataPoints        : dataPoints_Tegangan
                }]
            });

            $.getJSON("result.json", addData_Tegangan);

            function addData_Tegangan(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Tegangan.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Tegangan_Chart.render();
            }

            // KWS
            var Kws_Chart = new CanvasJS.Chart("Kws_Chart", {
                animationEnabled: true,
                theme           : "dark2",
                title           : {
                    text: "Data Kws"
                },
                axisY: {
                    title        : "Kws",
                    titleFontSize: 24,
                    includeZero  : true
                },
                data: [{
                    type              : "line",
                    yValueFormatString: "#,### Kws",
                    dataPoints        : dataPoints_Kws
                }]
            });

            $.getJSON("result.json", addData_Kws);

            function addData_Kws(data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    dataPoints_Kws.push({
                        x: new Date(data[i].waktu),
                        y: data[i].arus*1,
                        // x: data[i].arus,
                    });
                }
                Kws_Chart.render();
            }
        }
            </script>
            <h1><br></br><h1>
                <div id = "Arah_Angin_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Kecepatan_Angin_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Suhu_Udara_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Tekanan_Udara_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Arus_Chart" style = "height: 20%; width: 40%; margin-left: 4%; margin-right: 0%; float: left;"></div>
                <!-- <h1><br></br><br></br><br></br><br></br><br></br></h1> -->
                <div id = "Tegangan_Chart" style = "height: 20%; width: 40%; margin-left: 0%; margin-right: 4%; float: right;"></div>
                <h1><br></br><br></br><br></br><br></br><br></br></h1>
                <div id = "Kws_Chart" style = "height: 20%; width: 40%; margin-left: 30%; margin-right: 4%; align:center"></div>
                <!-- <h1><br></br><br></br><br></br><br></br></h1> -->
<?php                      
                        }
                    
?>
            </tbody>
    </body>
</html>