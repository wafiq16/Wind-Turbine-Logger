<?php
    header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=DataLoggerbyYakinJaya.xls");
                include "koneksi.php";
                    $query = "SELECT * FROM datalogger";

                    echo " <br></br> <center><h3><b>Data Cuaca Lentera Bumi Site Ciheras</b></h3></center> <br> <br>";
                    if ($result = $connect_db->query($query)) {
                    ?>
                        <table class="table table-dark" width="200px">
                        <thead>
                            <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Arah Angin</th>
                                <th scope="col">Kecepatan Angin</th>
                                <th scope="col">Tegangan</th>
                                <th scope="col">Arus</th>
                                <th scope="col">Waktu</th>
                            </tr>
                        </thead>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                        
                            $nomor              = $row["nomor"];
                            $arah_angin         = $row["arah_angin"];
                            $kecepatan_angin    = $row["kecepatan_angin"];
                            $tegangan           = $row["tegangan"];
                            $arus               = $row["arus"];
                            $waktu              = $row["waktu"];
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $nomor ?></td>
                                    <td><?php echo $arah_angin ?></td>
                                    <td><?php echo $kecepatan_angin ?></td>
                                    <td><?php echo $tegangan ?></td>
                                    <td><?php echo $arus ?></td>
                                    <td><?php echo $waktu ?></td>
                                </tr>
                            </tbody>
                        <?php } ?>     
                    
                    </table>
                    <?php
                    /*freeresultset*/
                    $result->free();
                    }
?>