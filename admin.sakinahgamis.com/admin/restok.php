<?php 
    include 'koneksi.php';

   // if(isset($_POST['id_produk'])) {
      

  $id_produk = $_POST['id_produk'];
  $stok     = $_POST['stok'];
  
    
      $edit = mysqli_query($conn, "UPDATE tb_produk SET  stok = '$stok' WHERE id_produk = '$id_produk'");

      // Versi 2 $edit
      // $tambah = mysqli_query($conn, "UPDATE mahasiswa SET produk = '".$_POST['produk']."', harga = '".$_POST['harga']."', satuan_barang = '".$_POST['satuan_barang']."' WHERE nim = '$nim'");

      if ($edit) {
        echo "<script language='javascript'>alert('Berhasil Mengedit Data'); document.location.href='data_produk.php'; </script>";
      } else {
        echo "<script language='javascript'>alert('Gagal Mengedit Data'); document.location.href='data_produk.php'; </script>";
      }
   // }
   ?>




