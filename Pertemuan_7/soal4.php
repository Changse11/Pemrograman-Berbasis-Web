<!DOCTYPE html>
<html lang="id">
<head>
    <title>Soal 4</title>
</head>
<body>
    <hr>
    <?php include 'menu.php'; ?>
    <hr>
    <h2>Jawaban Soal 4</h2>
    <p>Gunakan ternary operator untuk menentukan apakah angka adalah genap atau ganjil.</p>
    
    <div>
        <form method="POST">
            <label for="angka">Masukkan Angka :</label>
            <input type="number" name="angka" id="angka" placeholder="Contoh: 15" required>
            <input type="submit" name="submit" value="Proses">
        </form>
        <br><hr>

        <?php
        if (isset($_POST['submit'])) {
            $angka = $_POST['angka']; 
    
            echo "<p>Angka yang dicek: <strong>$angka</strong></p>";
            $status = ($angka % 2 == 0) ? "Genap" : "Ganjil";
            echo "Hasil: Angka $angka adalah bilangan $status</strong>.";
        }
        ?>
    </div>
</body>
</html>