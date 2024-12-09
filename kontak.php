<?php
include 'db.php';

// Ambil kontak admin dari database
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles.css">
  <title>Contact</title>
</head>
<body>
<div class="navbar">
<header>
    <h1>Contact Person Bukawarung</h1>
    <nav>
      <ul>
      <a href="index.php"  name="beli_produk" value="Halaman Utama">Halaman Utama</a>
      </ul>
    </nav>
  </header>

  <!-- Beranda -->
  <section id="home">
  <div class="contact">
        <p><b>Contact Person</b></p>
        <a href="https://wa.me/+628998186613" target="_blank" class="fa fa-whatsapp"></a>
        <a href="https://www.instagram.com/dittorahmann/" target="_blank" class="fa fa-instagram"></a>
        <a href="https://www.facebook.com/dittorahmann/" target="_blank" class="fa fa-facebook"></a>
        <a href="https://t.me/Ownyone" target="_blank" class="fa fa-telegram"></a>
        <a href="https://github.com/Ownyonee" target="_blank" class="fa fa-github"></a>
      </div>
      <div class="profile-desc">

      <!-- Kontak -->
      
        <!--profile-desc-->
    <script src="script.js"></script>
  
    <!-- footer -->
<footer>
        <div class="container">
          <h1>Alamat</h1>
          <p><?php echo $a->admin_address ?></p><br>

          <h1>Email</h1>
          <p><?php echo $a->admin_email ?></p><br>

          <h1>No. HP</h1>
          <p><?php echo $a->admin_telp ?></p><br>
          
            <h1><small>Copyright &copy; 2024 - Bukawarung</small></h1>
        </div>
    </footer>


</div>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,400;0,500;0,600;0,800;1,700&display=swap");
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Exo 2", sans-serif;
    }
    
    body {
      background: linear-gradient(
        315deg,
        rgb(54, 12, 105) 3%,
        rgba(60, 132, 206, 1) 38%,
        rgb(43, 32, 113) 68%
      );
      animation: gradient 15s ease infinite;
      background-size: 400% 400%;
      background-attachment: fixed;
      height: 100vh;
      padding: 20px;
    }
    
    @keyframes gradient {
      0% {
        background-position: 0% 0%;
      }
      50% {
        background-position: 100% 100%;
      }
      100% {
        background-position: 0% 0%;
      }
    }
    
    .navbar {
      padding: 15px 20px;
    }
    
    /* Header Styling */
    header {
      padding: 10px;
      text-align: right;
    }
    
    header h1 {
      font-size: 1.7rem;
      text-align: left;
      flex-wrap: nowrap;
      color: white;
      height: 0;
    }
    
    nav ul {
      list-style: none;
      margin-top: 10px;
    }
    
    nav ul li {
      display: inline;
      margin: 0 10px;
    }
    
    nav ul li a {
      color: white;
      text-decoration: none;
    }
    nav a {
      color: white;
      text-decoration: none;
    }
    /* Beranda Styling */
    #home {
      padding: 200px 0;
      text-align: center;
    }
    
    #home h1 {
      font-size: 2rem;
      margin-bottom: 10px;
      color: white;
    }
    
    #home h1 span {
      text-decoration: underline;
      color: rgb(255, 172, 7);
    }
    #home p {
      text-align: center;
      font-size: 1rem;
      color: white;
      margin: 10px;
    }
    
    /* Profile Style */
    .profile-info {
      /*display: flex;
      flex-wrap: nowrap;*/
      align-items: center;
      justify-content: center;
    }
    
    .profile-pic {
      flex: 0 0 150px; /* Lebar foto profil */
      padding: 50px;
      margin: 0;
      filter: drop-shadow(0 0 5px white);
    }
    
    .profile-pic img {
      width: 300px;
      height: 300px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid white;
      filter: drop-shadow(0 0 5px white);
    }
    
    /* Style all font awesome icons */
    .contact {
      padding: 100px;
    }
    
    .contact p {
      padding: 10px;
      text-decoration: underline;
    }
    
    .fa {
      border: 1px solid whitesmoke;
      color: whitesmoke;
      border-radius: 20%;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      margin: 0 9px;
      padding: 25px;
      font-size: 30px;
      width: 40px;
      height: 40px;
      text-decoration: none;
    }
    
    .fa:hover {
      opacity: 0.7;
    }
/* Gaya untuk link Halaman Utama */
a[name="beli_produk"][value="Halaman Utama"] {
    display: inline-block;
    padding: 10px 20px;
    background-color: #c70039; /* Warna latar belakang */
    color: white; /* Warna teks */
    text-decoration: none; /* Hilangkan garis bawah */
    border-radius: 5px; /* Sudut melengkung */
    font-size: 16px; /* Ukuran font */
    text-align: center; /* Teks berada di tengah */
    transition: background-color 0.3s; /* Efek transisi */
}

a[name="beli_produk"][value="Halaman Utama"]:hover {
    background-color: #191970; /* Warna latar belakang saat dihover */
}

    </style>
</body>
</html>