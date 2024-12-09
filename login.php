<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Bukawarung</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control" required>
            <input type="password" name="pass" placeholder="Password" class="input-control" required>
            <input type="submit" name="submit" value="Login" class="btn">
            
        </form>
        
        <a href="register.php" class="btn-register">Register</a>
  
        <?php
        if(isset($_POST['submit'])){
            session_start();
            include 'db.php';

            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");
            if(mysqli_num_rows($cek) > 0){
                $d = mysqli_fetch_object($cek);
                $_SESSION['status_login'] = true;
                $_SESSION['a_global'] = $d;
                $_SESSION['id'] = $d->admin_id;
                $_SESSION['is_admin'] = $d->is_admin;
                $_SESSION['nama_admin'] = $d->admin_name;
                if($_SESSION['is_admin']=='Y'){
                    echo '<script>window.location="dashboard.php"</script>';
                }else{
                    echo '<script>window.location="index.php"</script>';
                }
            }else{
                echo '<script>alert("Username atau password Anda Salah!")</script>';
            }
        }
        ?>
</div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}

body {
    background: linear-gradient(135deg, #f06, #ffcc00);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}

a {
    color: inherit;
    text-decoration: none;
}

#bg-login {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.box-login {
    width: 350px;
    padding: 40px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.box-login h2 {
    margin-bottom: 20px;
    color: #c70039;
}

.input-control {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s;
}

.input-control:focus {
    border-color: #c70039;
    outline: none;
}

.btn {
    width: 100%;
    padding: 15px;
    background-color: #c70039;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #ff5733;
}

.btn-register {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 15px;
    background-color: #c70039;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-register:hover {
    background-color: #555;
}

header {
    background-color: #c70039;
    color: #fff;
    padding: 15px 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

header h1 {
    display: inline-block;
    margin-left: 20px;
}

header ul {
    float: right;
    margin-right: 20px;
}

header ul li {
    display: inline-block;
    margin-left: 20px;
}

header ul li a {
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

header ul li a:hover {
    background-color: #ff5733;
}

footer {
    padding: 25px 0;
    background-color: #333;
    color: #fff;
    text-align: center;
}

.container {
    width: 80%;
    margin: auto;
}

.section {
    padding: 25px 0;
}

.box {
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 10px 0 25px 0;
}

</style>
</body>
</html>