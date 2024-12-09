<?php
include 'db.php';
session_start();
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."'");
$p = mysqli_fetch_object($produk);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tagihan</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>

</head>
<body>

<!-- header -->


<?php include('header.php')?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>A simple, clean, and responsive HTML invoice template</title>

		<style>
      .container {
				max-width: 800px;
				margin: auto;
        margin-top: 50px;
				border: 1px solid #eee;
				font-size: 16px;
				line-height: 40px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}
		</style>
	</head>

	<body>
    <div class='container'>
      <h1>Terima Kasih</h1>
      <h3>Silahkan Melakukan Pembyaran ke Rekening dibawah Ini</h3>
      <h3>Bank Central Asia (BCA)</h3>
      <h2>543123456 - a/n Dito Rachman</h2>
      <h3>Sertakan Bukti Transfer ke</h3>
      <input class='btn-upload_bukti btn-wa' type="submit" name="upload_bukti_transfer" value="Kirim Bukti Transfer" onclick="beliProdukWhatsApp()"> 
      <a href="daftar_pembelian.php" class='btn-upload_bukti btn-lihat-pesanan'> Lihat Pesanan </a> 
    </div>
		

</body>

<script>

function beliProdukWhatsApp() {
  // Ganti nomor telepon WhatsApp dengan nomor yang sesuai
  var nomorWhatsApp = '628998186613'; // Contoh nomor WhatsApp

  // Buat URL WhatsApp dengan nomor telepon dan pesan yang dituju
  var urlWhatsApp = 'https://wa.me/' + nomorWhatsApp + '?text=Apakah%20Barang%20Ini%20Ready?%20Saya Ingin membelinya%20';

  // Buka URL WhatsApp
  window.open(urlWhatsApp);
}
</script>

</html>