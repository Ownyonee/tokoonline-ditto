<?php
include 'db.php';

$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."'");
$p = mysqli_fetch_object($produk);
?>

<?php
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pembayaran</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>

</head>
<body>

<!-- header -->


<?php include('header.php')?>

<!-- script -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  // Tangkap klik pada tombol "Beli Produk"
  $('form[action="keranjang.php"] input[name="beli_produk"]').on('click', function(e) {
    e.preventDefault(); // Hindari tindakan default form
    
    var product_name = $(this).closest('.box').find('h3').text(); // Ambil nama produk
    var product_price = $(this).closest('.box').find('h4').text(); // Ambil harga produk
    
    // Buat item produk di dalam dropdown keranjang
    var cart_item = '<li><strong>' + product_name + '</strong> - ' + product_price + '</li>';
    $('.dropdown-menu').append(cart_item);
  });
});
</script>


<!-- search -->

<div class="search">
  <div class="container">
    <form action="produk.php" method="GET">
      <input type="text" name="search" placeholder="Cari Produk" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8') : '' ?>" >
      <input type="submit" name="cari" value="Cari Produk">
    </form>
  </div>
</div>

<!-- produk detail -->
<div class="section">
    <div class="container">
        <h3>Detail Produk</h3>
        <div class="box">
            <div class="col-2">
                <img class="gambar-produk" src="uploads/<?php echo $p->product_image ?>">
            </div>
            <div class="col-2">
            <form action="konfirmasi_pembayaran.php?id=<?=$_GET['id'];?>"  method="post">
                <h3><?php echo $p->product_name?></h3>
                <h4>Rp. <?php echo number_format($p->product_price) ?>/pcs</h4><br>
                <label class='label-pembelian'>Nama</label><br>
                <input type="text" name="nama" placeholder="Nama" value='<?=$_SESSION['nama_admin']?>' class="input-pembelian" disabled><br>
                <label class='label-pembelian'>Alamat</label><br>
                <input type="text" name="alamat" placeholder="Alamat" class="input-pembelian" required><br>
                <label class='label-pembelian'>No Telp.</label><br>
                <input type="number" name="no_telp" placeholder="No Telepon" class="input-pembelian" required><br>
                <label class='label-pembelian'>Qty.</label><br>
                <input type="number" name="qty" class="input-pembelian" required><br>
                <input type="hidden" name="harga" value="<?=$p->product_price?>">
                <input type="submit" name="lanjut" value="Lanjut" class='tombol-beli-produk'><br>
                <!-- <a href='konfirmasi_pembayaran.php?id=' class='tombol-beli-produk'>Lanjut</a> -->
                </form>
            </div>
        </div>
    </div>
</div>
<!--script -->

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


<!-- footer -->
<footer>
        <div class="container">
          <h4>Alamat</h4>
          <p><?php echo $a->admin_address ?></p><br>

          <h4>Email</h4>
          <p><?php echo $a->admin_email ?></p><br>

          <h4>No. HP</h4>
          <p><?php echo $a->admin_telp ?></p><br>
          
            <small>Copyright &copy; 2024 - Bukawarung</small>
        </div>
    </footer>
</div>
</body>
</html>