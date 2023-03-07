<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan</title>
    <style>
        .title{
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        .title,
        .tanggal{
            text-align: center;
            font-size: 24px;
            font-family: sans-serif;
        }

        #table{
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th{
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 13px;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #558595;
            color: white;
            font-size: 13px;
        }

    </style>
</head>
<body>
    <table width="350" border="0">
        <tr>
            <td class="tanggal">
              Dari Tanggal <?= $this->session->userdata('tgl_lelang_awal') ?> Sampai Tanggal <?= $this->session->userdata('tgl_lelang_akhir') ;?>
            </td>
        </tr>
    </table>
    <br></br>
    <table id="table">
    <tr>
        <th>Nama Barang</th>
        <th>Nama Lelang</th>
        <!-- <th>Nama Petugas</th> -->
        <th>Tanggal Lelang</th>
        <th>Harga Awal</th>
        <th>Harga Akhir</th>
    </tr>
    <?php
    $CI =& get_instance();
    foreach($laporan as $l) : ?>
        <?php if ($l->status == "ditutup" && $l->harga_akhir != null) { ?>
            <tr>
                <td><?= $l->nama_barang; ?></td>
                <td><?= $CI->Lelang_model->max_bid($l->id_lelang)->nama_lengkap ?></td>
                <td><?= $l->tgl_lelang;?></td>
                <td>Rp. <?= number_format($l->harga_awal, 2, ',','.') ?></td>
                <td>Rp. <?= number_format($l->harga_akhir, 2, ',','.') ?></td>
            </tr>
        }
        <?php } ?>
    <?php endforeach; ?>
    </table>
</body>
</html>