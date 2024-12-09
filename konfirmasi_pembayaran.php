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
    <title>Konfirmasi Pembayaran</title>
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
                <h3><?php echo $p->product_name?></h3>
                <h4>Rp. <?php echo number_format($p->product_price) ?>/pcs</h4><br>
                <label class='label-pembelian'>Nama</label><br>
                <p class='input-pemblian'><?=$_SESSION['nama_admin']?></p><br>
                <label class='label-pembelian'>Alamat</label><br>
                <p class='input-pemblian'> <?=$_POST['alamat'];?> <p><br>
                <label class='label-pembelian'>No Telp.</label><br>
                <p class='input-pemblian'> <?=$_POST['no_telp'];?> </p><br>
                <label class='label-pembelian'>Qty.</label><br>
                <p class='input-pemblian'> <?=$_POST['qty'];?> </p><br>
                <label class='label-pembelian'>Total Bayar.</label><br>
                <p class='input-pemblian total-bayar'> <?=number_format($_POST['harga']*$_POST['qty']);?></p><br>
                <form action="" method="POST">
                  <input type="hidden" name="user_id" value="<?=$_SESSION['id']?>">
                  <input type="hidden" name="product_id" value="<?=$_GET['id']?>">
                  <input type="hidden" name="qty" value="<?=$_POST['qty']?>">
                  <input type="hidden" name="no_telp" value="<?=$_POST['no_telp']?>">
                  <input type="hidden" name="alamat" value="<?=$_POST['alamat']?>">
                  <input type="submit" name="beli" value="Beli Sekarang" class='tombol-beli-produk'><br>
                </form>
                <?php
                  if (isset($_POST['beli'])) {
                    $user_id = $_POST['user_id'];
                    $product_id = $_POST['product_id'];
                    $qty = $_POST['qty'];
                    $no_telp = $_POST['no_telp'];
                    $alamat = $_POST['alamat'];

                    $sql = "INSERT INTO tb_pembelian (user_id, product_id, qty, no_telp, alamat,no_invoice,tgl_trx,status_trx) VALUES ('$user_id', '$product_id', '$qty', '$no_telp','$alamat',concat('INV/',$user_id,'/',date_format(NOW(),'%Y%m%d%H%i%s')),NOW(),1)";

                    if ($conn->query($sql) === TRUE) {
                      echo '<script>
                      window.location = "tagihan.php?id=' . $_GET["id"] . 
                      '&nama=' . $_SESSION["nama_admin"] . 
                      '&alamat=' . $_POST["alamat"] . 
                      '&notelp=' . $_POST["no_telp"] . 
                      '&qty=' . $_POST["qty"] . 
                      '&harga=' . $_POST["harga"] . 
                      '"
                  </script>';
                    } else {
                      echo '<script>alert("Ada Kesalahn, coba lagi")</script>';
                    }
                  } 
                  ?>            
            
              </div>
        </div>
    </div>
</div>
<!--script -->






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