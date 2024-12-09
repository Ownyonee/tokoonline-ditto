<!-- header -->
<div class="header">
    <h3><a href="index.php">Bukawarung</a></h3>
  <div class="header-right">
    <a href="index.php">Beranda</a>
    <a href="kontak.php">Kontak</a>
    <a href="produk.php">Produk</a>
    <?php
    if(isset($_SESSION['status_login'])){
        if ($_SESSION['status_login'] != true ) {
            echo ' <a href="login.php">Masuk</a>';
        }else{
            
            echo ' <a href="daftar_pembelian.php">Pembelian</a>';
            echo ' <a href="logout.php">Keluar</a>';
        }
    }else{
        echo ' <a href="login.php">Masuk</a>';
    }
    ?>
  </div>
</div>