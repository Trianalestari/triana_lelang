<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan</title>
    <style>
        /* .title{
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        } */

        .title,
        .tanggal{
            text-align: center;
            font-size: 24px;
            font-family: sans-serif;
        }
/* 
        #table{
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        } */

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
    <table width="500" border="0">
       <tr>
           <td>
                  <center>
                    <h1>Laporan Masyarakat</h1>
                  </center>
           </td>

           </td>
           </tr>
           </table>
           <hr>
           <br><br>
           <table id="table" width="100%">
           <tr>
                 <th>Nama Lengkap</th>
                 <th>Username</th>
                 <th>No Telepon</th>
            </tr> 
            <?php
             $CI =& get_instance();
             foreach ($laporan as $l) : ?>
                     <tr>
                         <td><?= $l->nama_lengkap; ?></td>
                         <td><?= $l->username; ?></td>
                         <td><?= $l->telp; ?></td>
                     </tr>
             <?php endforeach; ?>
            