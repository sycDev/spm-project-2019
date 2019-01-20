<?php
    require "header.php";
?>

<head>
    <link rel = "stylesheet" type = "text/css" href = "css/tambahRekod-style.css">
    <meta nama = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Tambah Rekod</title>
</head>

<body>
<div class = "container">  
    <h1>Tambah Rekod Jualan</h1>

    <form action = "includes/tambahRekod.inc.php" method = "POST">
        <table align = "center">
            <tr class = "row">
                <td class = "col-25">
                    <label for = "kod_jualan">Kod Jualan</label>
                </td>

                <td class = "col-75">
                    <input type = "text" id = "kod_jualan" name = "kodjualan">
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "tarikh_jualan">Tarikh Jualan: </label>
                </td>

                <td class = "col-75">
                    <input type = "date" id = "tarikh_jualan" name = "tarikhjualan">
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "nama_item">Nama Item: </label>
                </td>

                <td class = "col-75">
                    <select id = "nama_item" name = "namaitem">
                        <option value=""></option>
                        <option value="Item 1">Item 1</option>
                        <option value="Item 1">Item 2</option>
                        <option value="Item 1">Item 3</option>
                    </select>
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "quantiti_item_dijual">Quantiti Item Dijual: </label>
                </td>

                <td class = "col-75">
                    <input type = "number" id = "quantiti_item_dijual" name = "quantiti" value = "1" min = "1">
                </td>
            </tr>

            <tr class = "row">
                <td class = "col-25">
                    <label for = "harga_jualan">Harga Jualan: </label>
                </td>

                <td class = "col-75">
                    <input type = "number" id = "harga_jualan" name = "hargajualan" min="0.00" step="0.01" value = "0.00">
                </td>
            </tr>

            <tr class = "row">
                <td></td>
                
                <td>
                    <input type="submit" value = "Tambah">
                </td>
            </tr>
        </table>
    </form>
</div> 
</body>

<?php
    require "footer.php";
?>