<!DOCTYPE html>
<html lang="id">
<head>
    <title>Soal 2</title>
</head>
<body>
    <hr>
    <?php include 'menu.php'; ?>
    <hr>
    <h2>Jawaban Soal 2</h2>
    <p>Gunakan for untuk mencetak bilangan genap dari 2 sampai 10.</p>
    
    <form method ="POST">
       <label for="batasbawah">Batas Bawah :</label>
        <input type="number" name="batasbawah" id="batasbawah" placeholder="Masukan batas bawahh" required>
        <br>
        <label for="batasatas">Batas Atas :</label>
        <input type="number" name="batasatas" id="batas atas" placeholder="Masukan batas atas" required>
        <input type="submit" name="submit" value="Proses">
        </form>
        <hr>
    <div>
        <strong>Hasil cetak: </strong>
        <?php
        if (isset($_POST['submit'])) {
        $batas_bawah = $_POST['batasbawah'];
        $batas_atas = $_POST['batasatas'];
        for ($i = $batas_bawah; $i <= $batas_atas; $i += 2) {
            echo $i . " ";
        }
         if ($batas_bawah < 2) {
                echo "<em>Tidak ada bilangan genap. Masukkan angka 2 atau lebih besar.</em>";
            }
        }
        ?>
    </div>
</body>
</html>

