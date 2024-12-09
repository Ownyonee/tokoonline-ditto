<?php
session_start();
include 'db.php';
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah data Produk</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
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
                <li><a href="logout.php" class="btn-logout">Keluar</a></li>
            </ul>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Tambah data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">--Pilih--</option>
                        <?php 
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            while($r = mysqli_fetch_array($kategori)){
                        ?>
                        <option value="<?php echo $r['category_id']; ?>"><?php echo $r['category_name']; ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <input type="number" name="harga" class="input-control" placeholder="Harga" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
                    <select class="input-control" name="status" required>
                        <option value="">--Pilih--</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Tambah Produk" class="btn">
                </form>
                <?php 
                    if(isset($_POST['submit'])) {
                        // menampung inputan dari form
                        $kategori = $_POST['kategori'];
                        $nama = $_POST['nama'];
                        $harga = $_POST['harga'];
                        $deskripsi = $_POST['deskripsi'];
                        $status = $_POST['status'];

                        // menampung data file yang di upload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];
                        $file_size = $_FILES['gambar']['size'];
                        
                        // Memisahkan nama file dan ekstensi
                        $type1 = explode('.', $filename);
                        $type2 = strtolower(end($type1));

                        //menampung data format file yang di izinkan
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                        // Validasi format file
                        if(!in_array($type2, $tipe_diizinkan)){
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                        } else {
                            // Validasi ukuran file (misalnya maksimal 2MB)
                            if($file_size > 2097152){
                                echo '<script>alert("Ukuran file terlalu besar (maksimal 2MB)")</script>';
                            } else {
                                // Proses upload file dan insert ke database
                                $newfilename = 'produk'.time().'.'.$type2;
                                $path = 'uploads/'.$newfilename;

                                // Buat direktori uploads jika belum ada
                                if (!is_dir('uploads')) {
                                    mkdir('uploads', 0755, true);
                                }

                                // Proses upload
                                if(move_uploaded_file($tmp_name, $path)){
                                    $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                                        null,
                                        '".$kategori."',
                                        '".$nama."',
                                        '".$harga."',
                                        '".$deskripsi."',
                                        '".$newfilename."',
                                        '".$status."',
                                        null
                                        )");
                                    if($insert){
                                        echo '<script>alert("Tambah data berhasil")</script>';
                                        echo '<script>window.location="data_produk.php"</script>';
                                    } else {
                                        echo 'Gagal '.mysqli_error($conn);
                                    }
                                } else {
                                    echo '<script>alert("Gagal mengunggah file")</script>';
                                }
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Bukawarung</small>
        </div>
    </footer>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
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