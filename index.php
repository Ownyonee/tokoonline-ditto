<?php
include 'db.php';
session_start();
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

if (!isset($_SESSION['a_global'])) {
  $_SESSION['a_global'] = (object) [
      'admin_name' => ''
  ];
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bukawarung</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
<body>

<?php include('header.php')?>


<div class="box">
      <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?> Di Toko Kami</h4>
</div>

<div class="search">
  <div class="container">
    <form action="produk.php" method="GET">
      <input type="text" name="search" placeholder="Cari Produk" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8') : '' ?>" >
      <input type="submit" name="cari" value="Cari Produk">
    </form>
  </div>
</div>

<!-- category -->

<div class="section">
  <div class="container">
    <h3>Kategori</h3>
    <div class="box">
      <?php
        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
        if(mysqli_num_rows($kategori) > 0){
          while($k = mysqli_fetch_array($kategori)){
      ?>
        <a href="produk.php?kat=<?php echo $k['category_id'] ?>">
          <div class="col-5">
            <p><?php echo $k['category_name']?> </p>
          </div>
        </a>
      <?php }}else{?>
        <p>Kategori tidak ada</p>
      <?php } ?>
      </div>
    </div>
 </div>

 <!-- new product -->

<div class="section">
  <div class="container">
    <h3>Produk Terbaru</h3>
    <div class="box">
      <?php
          $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC");
          if(mysqli_num_rows($produk) > 0){
            while($p = mysqli_fetch_array($produk)){
      ?>
      <a href="detail_produk.php?id=<?php echo $p['product_id']?>">
        <div class="col-4">
          <img src="uploads/<?php echo $p['product_image'] ?>">
          <p class="nama"><?php echo $p['product_name']?></p>
          <p class="harga">Rp.<?php echo number_format($p['product_price'], 0, ',', '.') ?></p>
        </div>
      </a>
      <?php }}else{ ?>
        <p>Produk Tidak Ada</p>
        <?php } ?>

    </div>
  </div>
</div>

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