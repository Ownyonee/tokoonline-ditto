<?php
session_start();
include 'db.php';  // Corrected to 'db.php' to match the typical filename for the database connection file

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
    <title>Data Product</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
    
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Bukawarung</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data_kategori.php">Data Kategori</a></li>
                <li><a href="data_produk.php">Data Produk</a></li>
                <li><a href="logout.php">Keluar</a></li>
            </ul>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Data Product</h3>
            <div class="box">
                <p><a href="tambah_produk.php">Tambah Produk</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
    <tr>
        <th width="60px" style="text-align: center; vertical-align: middle;">No</th>
        <th style="text-align: center; vertical-align: middle;">Kategori</th>
        <th style="text-align: center; vertical-align: middle;">Nama Product</th>
        <th style="text-align: center; vertical-align: middle;">Harga</th>
        <th style="text-align: center; vertical-align: middle;">Deskripsi</th>
        <th style="text-align: center; vertical-align: middle;">Gambar</th>
        <th style="text-align: center; vertical-align: middle;">Status</th>
        <th width="150px" style="text-align: center; vertical-align: middle;">Aksi</th>
    </tr>
</thead>

                    <tbody>
                    <?php
                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
                        if(mysqli_num_rows($produk) > 0){
                            while($row = mysqli_fetch_assoc($produk)){
                                // Pastikan kunci ada sebelum mengaksesnya
                                $category_name = $row['category_name'] ?? 'N/A';
                                $product_name = $row['product_name'] ?? 'N/A';
                                $product_price = $row['product_price'] ?? 'N/A';
                                $product_description = $row['product_description'] ?? 'N/A';
                                $product_image = $row['product_image'] ?? 'noimage.png';
                                $product_status = $row['product_status'] == 1 ? 'Aktif' : ($row['product_status'] == 0 ? 'Tidak Aktif' : 'N/A');
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo htmlspecialchars($category_name) ?></td>
                            <td><?php echo htmlspecialchars($product_name) ?></td>
                            <td style="text-align: center; vertical-align: middle;">Rp. <?php echo number_format($product_price, 0, ',', '.') ?></td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $product_description?></td>
                            <td style="text-align: center; vertical-align: middle;"><a href="uploads/<?php echo htmlspecialchars($product_image) ?>" target="_blank"><img src="uploads/<?php echo htmlspecialchars($product_image) ?>" alt="Product Image" style="width: 50px"></td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo htmlspecialchars($product_status) ?></td>
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="edit_product.php?id=<?php echo $row['product_id'] ?>">Edit</a> || 
                                <a href="hapus_kategori.php?idp=<?php echo $row['product_id']; ?>" onclick="return confirm('Apakah Anda Yakin ingin Menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php }} else { ?>
                        <tr>
                            <td colspan="8">Tidak ada data</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Bukawarung</small>
        </div>
    </footer>
    <style>
    * {
        padding: 0;
        margin: 0;
        font-family: sans-serif;
    }
    body {
        background-color: #f8f8f8;
    }
    a {
        color: inherit;
        text-decoration: none;
    }
    #bg-login {
        display: flex;
        height: 100vh;
        justify-content: center;
        align-items: center;
    }
    .box-login {
        width: 300px;
        min-height: 200px;
        border: 1px solid #ccc;
        background-color: #fff;
        padding: 15px;
        box-sizing: border-box;
    }
    .box-login h2 {
        text-align: center;
        margin-bottom: 15px;
    }
    .input-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
    }
    .btn {
        padding: 8px 15px;
        background-color: #c70039;
        color: #fff;
        border: none;
        cursor: pointer;
    }
    header {
        background-color: #c70039;
        color: #fff;
    }
    header h1 {
        float: left;
        padding: 10px;
    }
    header ul {
        float: right;
    }
    header ul li {
        display: inline-block;
    }
    header ul li a {
        padding: 20px 20px;
        display: inline-block;
    }
    footer {
        padding: 25px 0;
    }
    .container {
        width: 80%;
        margin: auto;
    }
    .container:after {
        content: "";
        display: block;
        clear: both;
    }
    .section {
        padding: 25px 0;
    }
    .box {
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 15px;
        box-sizing: border-box;
        margin: 10px 0 25px 0;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    .table th,
    .table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }
    .table th {
        background-color: #f4f4f4;
    }
    .table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .table a {
        color: #3498db;
        text-decoration: none;
    }
    .table a:hover {
        text-decoration: underline;
    }
    </style>
</body>
</html>
