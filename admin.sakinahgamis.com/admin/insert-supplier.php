<?php
include "../koneksi.php";


		$nama		= $_POST['nama'];
		$alamat		= $_POST['alamat'];
		$email		= $_POST['email'];
		$telp		= $_POST['telp'];

			
			$sql="INSERT INTO tb_supplier(nama,alamat,email,telp) VALUES
            ('$nama','$alamat','$email','$telp')";
			if($sql){echo"<script>alert('Data Berhasil'); window.location = 'datasupplier.php'</script>";	
			} else {
				
					echo "<script>alert('Data Gagal'); window.location = 'tambah-supplier.php'</script>";	
			}
		
		 
		
		?> 