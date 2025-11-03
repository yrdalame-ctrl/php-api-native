<?php
try {
  // buat koneksi dengan database
  $dbh = new PDO('mysql:host=localhost;dbname=db_admin', "root", "");
  
  // set error mode
  $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

   echo "Koneksi berhasil ke database db_admin ✅<br>";
  
  // hapus koneksi
  $dbh = null;
}
catch (PDOException $e) {
  // tampilkan pesan kesalahan jika koneksi gagal
  print "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
  die();
}
?>