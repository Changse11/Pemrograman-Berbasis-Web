<!DOCTYPE html>
<html lang="id">
<head>
    <title>Soal 1</title>
</head>
<body>
    <hr>
    <?php include 'menu.php'; ?>
    <hr>
    <h2>Jawaban Soal 1</h2>
    <p>Buat program menggunakan switch untuk menentukan jenis kendaraan berdasarkan jumlah roda.</p>
    
    <div>
        <form method ="POST">
       <label for="roda">Jumlah Roda :</label>
        <input type="number" name="roda" id="roda" placeholder="Masukan jumlah roda" required>
        <input type="submit" name="submit" value="Proses">
        </form>
        <hr>
        <?php
        if (isset($_POST['submit'])) {
        $jumlah_roda = $_POST['roda']; 
        
        echo "<p><strong>Jumlah roda: $jumlah_roda</strong></p>";
        switch ($jumlah_roda) {
            case 1:
                echo "Jenis Kendaraan: Sepeda cirkus";
                break;
            case 2:
                echo "Jenis Kendaraan: sepeda atau motor";
                break;
            case 3:
                echo "Jenis Kendaraan: Becak atau Bajaj";
                break;
            case 4:
                echo "Jenis Kendaraan: Mobil";
                break;
            case 8:
                echo "Jenis Kendaraan: Truk atau Bus";
                break;
            default:
                echo "Jenis kendaraan dengan $jumlah_roda roda tidak terdaftar.";
                break;
        }
        }
        ?>
    </div>
</body>
</html>