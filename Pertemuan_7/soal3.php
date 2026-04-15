<!DOCTYPE html>
<html lang="id">
<head>
    <title>Soal 3</title>
</head>
<body>
    <hr>
    <?php include 'menu.php'; ?>
    <hr>
    <h2>Jawaban Soal 3</h2>
    <p>Buat array daftar nama hewan dari inputan dan tampilkan menggunakan foreach.</p>
    <hr>
    
    <div>
        <form method="POST">
            <label for="hewan1">Hewan 1 :</label>
            <input type="text" name="hewan[]" id="hewan1" placeholder="Masukkan hewan 1" required>
            <br>
            
            <label for="hewan2">Hewan 2 :</label>
            <input type="text" name="hewan[]" id="hewan2" placeholder="Masukkan hewan 2" required>
            <br>

            <label for="hewan3">Hewan 3 :</label>
            <input type="text" name="hewan[]" id="hewan3" placeholder="Masukkan hewan 3" required>
            <br>

            <label for="hewan4">Hewan 4 :</label>
            <input type="text" name="hewan[]" id="hewan4" placeholder="Masukkan hewan 4" required>
            <br>

            <label for="hewan5">Hewan 5 :</label>
            <input type="text" name="hewan[]" id="hewan5" placeholder="Masukkan hewan 5" required>
            <br>

            <input type="submit" name="submit" value="Proses">
        </form>
        <br>
        <hr>
        <?php
        if (isset($_POST['submit'])) {
            $daftar_hewan = $_POST['hewan']; 

            echo "<b>Daftar Nama Hewan:</b> <br>";
            
            foreach ($daftar_hewan as $nama_hewan) {
                echo $nama_hewan . "<br>";
            }
            
        }
        ?>
    </div>
</body>
</html>