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
    <title>Data Kategori</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
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
            <h3>Data Kategori</h3>
            <div class="box">
                <p><a href="tambah_kategori.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                        if(mysqli_num_rows($kategori) > 0){
                            while($row = mysqli_fetch_assoc($kategori)){
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo htmlspecialchars($row['category_name']) ?></td>
                            <td>
                                <a href="edit_kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> || 
                                <a href="hapus_kategori.php?idk=<?php echo $row['category_id']; ?>" onclick="return confirm('Apakah Anda Yakin ingin Menghapus?')">Hapus</a>

                            </td>
                        </tr>
                    <?php }} else { ?>
                        <tr>
                            <td colspan="3">Tidak ada data</td>
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
