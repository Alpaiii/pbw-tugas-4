<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .hasil-box { 
            border: 2px solid #000; 
            padding: 15px; 
            width: fit-content; 
            margin-top: 20px; 
        }
        .header-hasil { border-bottom: 1px solid #000; margin-bottom: 10px; font-weight: bold; }
    </style>
</head>
<body>
    <h3>Pembayaran UKT</h3>
    
    <form method="post" action="">
        <table>
            <tr>
                <td>NPM</td>
                <td>: <input type="text" name="npm" required></td>
            </tr>
            <tr>
                <td>Nama Mahasiswa</td>
                <td>: <input type="text" name="nama" required></td>
            </tr>
            <tr>    
                <td>Program Studi</td>
                <td>: <input type="text" name="prodi" required></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>: <input type="number" name="semester" required></td>
            </tr>
            <tr>
                <td>Biaya UKT (Rp)</td>
                <td>: <input type="number" name="biaya_ukt" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="hitung" value="Hitung Pembayaran"></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $npm      = $_POST['npm'];
        $nama     = strtoupper($_POST['nama']); 
        $prodi    = strtoupper($_POST['prodi']);
        $semester = $_POST['semester'];
        $biaya_ukt = $_POST['biaya_ukt'];

        if ($biaya_ukt >= 5000000 && $semester > 8) {
            $diskon = 15;
        } elseif ($biaya_ukt >= 5000000) {
            $diskon = 10;
        } else {
            $diskon = 0;
        }

        $nilai_diskon = ($diskon / 100) * $biaya_ukt;
        $total_bayar  = $biaya_ukt - $nilai_diskon;

        echo "<div class='hasil-box'>";
        echo "<div class='header-hasil'>LUARAN YANG DIHARUSKAN</div>";
        echo "NPM : $npm <br>";
        echo "NAMA : $nama <br>";
        echo "PRODI : $prodi <br>";
        echo "SEMESTER : $semester <br>";
        echo "BIAYA UKT : Rp $biaya_ukt <br>";
        echo "DISKON : $diskon% <br>";
        echo "<b>YANG HARUS DIBAYAR : Rp $total_bayar </b>";
        echo "</div>";
    }
    ?>
</body>
</html>