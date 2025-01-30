<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <style>
  body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            height: 120vh; /* Agar body memenuhi layar */
            
        }
        .sidebar{
          margin-top: 60px;
          height: 100%;

          padding-bottom: 60px; 
        }

        .containerkrs{
          padding: 20px;
          width: 100%;
          align-items: center;
          justify-content: center;
          
        }


        h2 {
            margin-top: -20px;
            text-align: center;
        }

        .table-container {
            width: 100%;
            overflow-x: auto; /* Allow horizontal scrolling */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: none;
        }

        th, td {
            border-bottom: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .button {
          width: 100%;
            display: block;
            margin: 20px auto;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .jumlah {
            width: 100%;
            border: 1px solid #000;
        }

        .button:hover {
            border: none;
            background-color: #0056b3;
        }

        .perhatian {
      padding: 15px;
      background-color: rgba(24, 23, 56, 0.4);
      text-align: start;
      border: 2px solid #181738;
      color:rgb(255, 255, 255);
      border-radius: 20px;
    }

    .qr1{
        width: 120px;
        height: 115px;
        align-items: center;
        margin-left: 17%;
    }
    .qr2{
        width: 120px;
        height: 115px;
        align-items: center;
        margin-left: 25%;
    }
    .qr3{
        width: 120px;
        height: 115px;
        align-items: center;
        margin-left: 21%;
    }

    .table2{
        border: 2px solid;

        margin-bottom: 20px;
    }

    .table2 tr td{
        border: 1px solid;
        margin-bottom: 20px;
    }
    .table2  td{
        align-items: center;
        justify-content: center;
       
    }

    .table2  td p{
        text-align: center;
    }
    

        @media (max-width: 600px) {
            .sidebar {
                width: 100%; /* Sidebar menjadi 100% pada layar kecil */
                height: auto;
                position: relative;
            }

            .containerkrs {
                margin-left: 0; /* Hilangkan margin kiri pada layar kecil */
                
            }

            .table-container {
                overflow-x: auto; /* Enable horizontal scrolling for small screens */
            }
        }
</style>

</head>
<body>



    <div class="containerkrs">
   
        <h2>Kartu Rencana Studi STMIK Kaputama</h2>

        <table class="table">
            <tr>
                <td>NPM</td>
                <td>23451039</td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>Dio Abiyyu Zidane Ginting</td>
            </tr>
            <tr>
                <td>Tahun Akademik</td>
                <td>2024/2025</td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>Gasal</td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>Teknik Informatika(S1)</td>
            </tr>
        </table>
        <div class="table-container">
        <table class="table">
            <thead>
                <tr class="header">
                    <th>No</th>
                    <th>Kode MK</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Dosen Pengampu</th>
                    <th>No WA</th>
                    <th>Hari</th>
                    <th>Pukul</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>MBPS45301</td>
                    <td>Jaringan Komputer</td>
                    <td>3</td>
                    <td>Husnul Khair. M.Kom</td>
                    <td>085261369545</td>
                    <td>SENIN</td>
                    <td>08.00-11.15</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>MBPS45302</td>
                    <td>Pemrograman Bergerak</td>
                    <td>3</td>
                    <td>Ratih Puspadini, S.T, M.Kom</td>
                    <td>081269911388</td>
                    <td>SENIN</td>
                    <td>11.30-14.45</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>MBPS45304</td>
                    <td>Pemrograman Web</td>
                    <td>3</td>
                    <td>Bendra Wardana, M.Kom</td>
                    <td>081261119686</td>
                    <td>JUMAT</td>
                    <td>08.00-11.00</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>MBPS45305</td>
                    <td>Rekayasa Perangkat Lunak</td>
                    <td>3</td>
                    <td>Marto Sihombing, M.Kom</td>
                    <td>-</td>
                    <td>RABU</td>
                    <td>10.30-13.00</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>MBRK45303	</td>
                    <td>Pemrograman Berorientasi Objek</td>
                    <td>3</td>
                    <td>Magdalena Simanjuntak, S. Kom, M. Kom</td>
                    <td>081376539184</td>
                    <td>Kamis</td>
                    <td>11.30-14.45</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>MBRK45306	</td>
                    <td>Teknik Riset Operasi</td>
                    <td>3</td>
                    <td>Anton Sihombing, SE, MM</td>
                    <td>081375110864</td>
                    <td>Rabu</td>
                    <td>08.00-10.30</td>
                </tr>
                </tbody>
        </table>
        </div>
        <table class="jumlah">
            <tr>
                <td style="font-weight: bold;">Total SKS</td>
                <td>18</td>
                <td style="font-weight: bold;">Jumlah Mata Kuliah</td>
                <td>6</td>
            </tr>
            <tr>
               
            </tr>
        </table>
        <table class="table2">
        <tr>
            <td><p>Ketua Prodi<img class="qr1" src="images/qr1.png" alt=""></p><p>Husnul Khair. M.Kom</p><p>NIDN:0107048505</p></td>
            <td><p>Pembimbing Akademik<img class="qr2" src="images/qr2.png" alt=""></p><p>Juliana Naftali Sitompul,M.Pd</p><p>NIDN:0111078701</p></td>
            <td><p>Mahasiswa<img class="qr3" src="images/qr3.png" alt=""></p><p>Dio Abiyyu Zidane Ginting</p><p>NPM:23451039</p></td>
            
        </tr>
        </table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script>
        // Fungsi untuk mencetak halaman secara otomatis saat halaman dimuat
        window.onload = function() {
            window.print(); // Memicu dialog print browser
        };
    </script>
</body>
</html>