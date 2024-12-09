<?php
include 'db.php';

$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>

</head>
<body>

<!-- header -->

<?php include('header.php')?>

<!-- search -->

<div class="search">
  <div class="container">
    <form action="produk.php" method="GET">
      <input type="text" name="search" placeholder="Cari Produk" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8') : '' ?>" >
      <input type="submit" name="cari" value="Cari Produk">
    </form>
  </div>
</div>

 <!-- new product -->

 <div class="section">
  <div class="container">
    <h3>Produk</h3>
    <div class="box">
      <?php
$where = ""; // Default value if no search term is provided

// Periksa apakah ada parameter search atau kat yang diberikan
if ((isset($_GET['search']) && $_GET['search'] != '') || (isset($_GET['kat']) && $_GET['kat'] != '')) {
    if (isset($_GET['search']) && $_GET['search'] != '') {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $where .= "AND product_name LIKE '%$search%' ";
    }
    if (isset($_GET['kat']) && $_GET['kat'] != '') {
        $kat = mysqli_real_escape_string($conn, $_GET['kat']);
        $where .= "AND category_id = '$kat' ";
    }
}

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");

if (mysqli_num_rows($produk) > 0) {
    while ($p = mysqli_fetch_array($produk)) {
?>
    <a href="detail_produk.php?id=<?php echo $p['product_id'] ?>">
        <div class="col-4">
            <img src="uploads/<?php echo $p['product_image'] ?>" alt="<?php echo $p['product_name'] ?>">
            <p class="nama"><?php echo $p['product_name'] ?></p>
            <p class="harga">Rp. <?php echo number_format($p['product_price'], 0, ',', '.') ?></p>
        </div>
    </a>
<?php
    }
} else {
?>
    <p>Produk Tidak Ada</p>
<?php
}
?>

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
</div>
</body>
</html>