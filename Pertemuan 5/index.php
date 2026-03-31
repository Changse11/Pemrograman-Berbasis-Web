<?php
  define("PAJAK", 0.10);
  $barang = ["Keyboard" => 150000,"Mouse" => 50000,"Monitor" => 1200000, "Headset" => 80000];
  $nama_barang = "Headset";
  $harga_satuan = $barang[$nama_barang];
  $jumlah_beli = 3;
  $total_harga = $jumlah_beli * $harga_satuan;
  $pajak = $total_harga * PAJAK;

    echo "<h1>Perhitungan Total Pembelian (Dengan Array)</h1>";
    echo "<hr>";
    echo "Nama Barang: $nama_barang <br>";
    echo "Harga Satuan: Rp.$harga_satuan <br>";
    echo "Jumlah Beli: $jumlah_beli <br>";
    echo "Total Harga (Sebelum Pajak): Rp." . $total_harga .  "<br>";
    echo "Pajak (10%): Rp" . $pajak . "<br>";
    echo "<b>Total Bayar: Rp." . ($total_harga + $pajak) . "</b>";
    echo "<hr>";
    echo "<a href='../Pertemuan_6/latihan_nilai.php'> Menuju ke Tugas Selanjutnya (Latihan Nilai)</a>";
?>