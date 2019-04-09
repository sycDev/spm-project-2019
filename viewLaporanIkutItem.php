<?php
    require "header.php";
    // connect to the database
    include 'includes/dbh.inc.php';

    // get results from database
    $kodItem = $_GET['select-item'];

    $sql = "SELECT * FROM `item` WHERE `KodItem` = '$kodItem'";
    $hasil = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($hasil);
    $namaItemSelected = $row['NamaItem'];
?>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "css/paparLaporan-style.css">
        <title>Papar Laporan Ikut Nama Item</title>
    </head>

    <body>
    <div class = "container">
        <h1>Laporan Ikut Nama Item <?php echo $namaItemSelected; ?></h1>
        <?php
            /*Displays all data from 'jualan' table by item selected*/
            $sql2 = "SELECT * FROM `jualan` WHERE `KodItem` = '$kodItem'";
            $hasil2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_num_rows($hasil2);

            // output the rekod jualan where got nama item selected
            if ($row2 > 0) {
                echo "<table align = 'center' border='1' cellpadding='10'>";

                echo "<tr> <th>Kod Jualan</th> <th>Tarikh Jualan</th> <th>Kuantiti</th> <th>Harga Jualan</th> </tr>";

                // loop through results of database query, displaying them in the table
                while($row3 = mysqli_fetch_array($hasil2)) {
                    $kodJualan = $row3['KodJualan'];
                    $tarikhJualan = $row3['TarikhJualan'];
                    $kuantiti = $row3['KuantitiItemDijual'];
                    $hargaJualan = $row3['HargaJualan'];

                    // echo out the contents of each row into a table
                    echo "<tr>";

                    echo '<td>' . $kodJualan . '</td>';

                    echo '<td>' . $tarikhJualan . '</td>';

                    echo '<td>' . $kuantiti . '</td>';

                    echo '<td>' . $hargaJualan . '</td>';

                    echo "</tr>";


                }
            } else {
                echo "<script>
                        alert('Data tidak berjaya dipaparkan. Sila papar semula.');
                      </script>";
                echo "Tidak terdapat rekod dalam pangkalan data.<br>";
            }

            echo "</table>";

            $sql3 = "SELECT SUM(KuantitiItemDijual) FROM `jualan` WHERE KodItem = '$kodItem'";
            $hasil3 = mysqli_query($conn, $sql3);
            $row4 = mysqli_fetch_assoc($hasil3);
            $sum = $row4['SUM(KuantitiItemDijual)'];

            echo "<br>Jumlah Kuantiti Item yang dijual: " .$sum;

            $sql4 = "SELECT SUM(HargaJualan) FROM `jualan` WHERE KodItem = '$kodItem'";
            $hasil4 = mysqli_query($conn, $sql4);
            $row5 = mysqli_fetch_assoc($hasil4);
            $sum2 = $row5['SUM(HargaJualan)'];

            echo "<br>Jumlah Jualan: RM" .$sum2;
        ?>
        <table align = "center">
            <tr class = "row">
                <td></td>
                <td></td>
                <td></td>
                <td colspan = "2">
                    <input type = 'submit' value = 'Cetak' onclick = 'window.print()'>
                </td>
            </tr>
        </table>
    </div>
<?php
require 'footer.php';
?>