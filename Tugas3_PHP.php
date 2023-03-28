<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLE LOOPING ARRAY PHP</title>
</head>
<body>
    <!-- Styling CSS Internal -->
    <style>
        body {
            background-color: navy;
            color: white;
            margin: 50px;
            padding: 10px;
        }

        h1 {
            text-align: center;
        }

        summary {
            font-size : 24px;
            font-weight: bold;
        }

        details{
            font-size : 18px;}

        table {
            border-collapse: collapse;
            margin: auto;
            font-family: Arial, sans-serif;
            font-size: 18px;
            table-layout: fixed;
            text-align: center; 
            border-style: solid;
            border-color: maroon;
            background-color: #FFFAFA;
            color: black;
        }

        td {
            padding: 10px;
            border: 1px solid black;
            width: 10%;
        }

        thead{
            background-color: gold;
        }

        th {
            border: 1px solid black;
        }
    </style>
    
    <!-- Bagian Header judul hanya pakai tag HTML -->
    <h1 align='center'>TABEL PENERAPAN LOOPING ARRAY<br>MENGGUNAKAN PHP</h1>
    <hr color='white'>
    
    <!-- Bagian tampilan soal hanya pakai tag HTML-->
    <details>
        <summary>Soal</summary>
        <P>
            Lanjutkan kode dari file latihanarray3.php , dengan ketentuan sebagai berikut:
            <ol type = '1'>
                <li>Buatkan grade</li>
                <li>Buatkan keterangan jumlah mahasiswa, nilai tertinggi, nilai terendah, dan rata-rata (masukan kedalam tfoot)</li>
                <li>Buatkan predikat  dari nilai menggunakan switch case</li>
            </ol>
        </P>
    </details>
    <hr color='white'>

    <?php
    // Data Mahasiswa menggunakan array scalar
    $m1 = ['NIM'=>'01111021', 'nama'=>'Andi', 'nilai'=>80];
    $m2 = ['NIM'=>'01111022', 'nama'=>'Ani', 'nilai'=>70];
    $m3 = ['NIM'=>'01111023', 'nama'=>'Ari', 'nilai'=>50];
    $m4 = ['NIM'=>'01111024', 'nama'=>'Aji', 'nilai'=>40];
    $m5 = ['NIM'=>'01111025', 'nama'=>'Ali', 'nilai'=>90];
    $m6 = ['NIM'=>'01111026', 'nama'=>'Ai', 'nilai'=>75];
    $m7 = ['NIM'=>'01111027', 'nama'=>'Budi', 'nilai'=>30];
    $m8 = ['NIM'=>'01111028', 'nama'=>'Bani', 'nilai'=>85];
    // Deklarasi Data Mahasiswa menggunakan array associative
    $mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8];
    // Deklarasi Data Mahasiswa menggunakan array associative
    $ar_judul = ['No','NIM','Nama','Nilai','Keterangan','Grade','Predikat']
    ?>

    <table>
        <!-- TABLE HEADER -->
        <thead>
            <tr>
                <th colspan="7">DAFTAR NILAI MAHASISWA</th>
            </tr>
            <tr>
                <?php 
                // menampilkan judul tabel dengan looping
                foreach($ar_judul as $judul){
                    ?>
                    <th><?= $judul ?></th>
                    <?php }?>
            </tr>
        </thead>

        <!-- TABLE BODY -->
        <tbody>
            <?php
                $no = 1;
                // menampilkan data mahasiswa dengan looping
                foreach($mahasiswa as $mhs){
                // keterangan lulus atau tidak lulus
                $ket = ($mhs['nilai']>= 60) ? 'Lulus' : 'Tidak lulus';
                    // menentukan grade berdasarkan nilai menggunakan if mulikondisi
                    if ($mhs['nilai'] >= 85 && $mhs['nilai'] <= 100) $grade = 'A';
                    else if ($mhs['nilai']>= 75 && $mhs['nilai'] < 85) $grade = 'B';
                    else if ($mhs['nilai']>= 60 && $mhs['nilai'] < 75) $grade = 'C';
                    else if ($mhs['nilai']>= 30 && $mhs['nilai'] < 60) $grade = 'D';
                    else if ($mhs['nilai']>= 0 && $mhs['nilai'] < 30) $grade = 'E';
                    else $grade = '';

                    // menentukan predikat berdasarkan grade menggunakan switch case
                    switch($grade){
                        case 'A':
                            $predikat = 'Sangat Memuaskan';
                            break;
                        case 'B':
                            $predikat = 'Memuaskan';
                            break;
                        case 'C':
                            $predikat = 'Cukup';
                            break;
                        case 'D':
                            $predikat = 'Kurang';
                            break;
                        case 'E':
                            $predikat = 'Sangat Kurang';
                            break;
                        default:
                            $predikat = '';
                            break;
                    }
            ?>
                    <!-- Bagianb untuk menampilkan data mahasiswa -->
                    <tr>
                        <td><?= $no ?> </td>
                        <td><?= $mhs['NIM']?></td>
                        <td><?= $mhs['nama']?></td>
                        <td><?= $mhs['nilai']?></td>
                        <td><?= $ket ?></td>
                        <td><?= $grade ?></td>
                        <td><?= $predikat ?></td>
                    </tr>
                <?php $no++; } ?>
        </tbody>

        <!-- TABLE FOOT -->
        <tfoot>
        <?php
            // jumlah mahasiswa menggunakan count
            $jumlah_mahasiswa = count($mahasiswa);
            
            //nilai tertinggi menggunakan foreach
            $nilai_tertinggi = $mahasiswa[0]['nilai'];
            foreach($mahasiswa as $mhs){
                if($mhs['nilai'] > $nilai_tertinggi){
                    $nilai_tertinggi = $mhs['nilai'];
                }
            }

            //nilai terendah menggunakan foreach
            $nilai_terendah = $mahasiswa[0]['nilai'];
            foreach($mahasiswa as $mhs){
                if($mhs['nilai'] < $nilai_terendah){
                    $nilai_terendah = $mhs['nilai'];
                }
            }

            //rata-rata nilai menggunakan foreach
            $total_nilai = 0;
            foreach($mahasiswa as $mhs){
                $total_nilai += $mhs['nilai'];
            }
            $rata_rata = $total_nilai / $jumlah_mahasiswa;
        ?>
        
            <!-- Bagian untuk menampilkan Informasi Lainnya -->
            <tr>
                    <td colspan="7" bgcolor="gold"><b>INFORMASI LAINNYA<b></td>
            </tr>
            <tr bgcolor="wheat">
                    <td colspan="4" ><b>Jumlah Mahasiswa</b></td>
                    <td colspan="3"><?= $jumlah_mahasiswa ?></td>
            </tr>
            <tr bgcolor="Moccasin">
                    <td colspan="4"><b>Nilai Tertinggi</b></td>
                    <td colspan="3"><?= $nilai_tertinggi ?></td>
            </tr>
            <tr bgcolor="wheat">
                    <td colspan="4"><b>Nilai Terendah</b></td>
                    <td colspan="3"><?= $nilai_terendah ?></td>
            </tr>
            <tr bgcolor="Moccasin">
                    <td colspan="4"><b>Rata-rata Nilai</b></td>
                    <td colspan="3"><?= $rata_rata ?></td>
            </tr>
        </tfoot>

    </table>
</body>
</html>
