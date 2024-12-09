<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>

<<body id="bg-login">
    <div class="box-login">
        <h2>Halaman Registrasi</h2>
        <form action="register.php" method="post">
            <label for="fullname">Nama Lengkap:</label>
            <input type="text" id="fullname" name="fullname" placeholder="Nama Lengkap" class="input-control" required><br><br>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username" class="input-control" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" class="input-control" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" class="input-control" required><br><br>

            <input type="submit" name="register_submit" value="Register" class="btn"><br>

            <!-- Tombol untuk mengarahkan ke halaman login -->
            <button type="button" onclick="window.location.href='login.php';" class="btn">Sudah Punya Akun</button>
        </form>
    </div>
    <?php
    require 'db.php';

    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "db_bukawarung";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['register_submit'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO tb_admin (admin_name, username, admin_email, password, is_admin) VALUES ('$fullname', '$username', '$email', '$password','$is_admin')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Register data berhasil")</script>';
            echo '<script>window.location="login.php"</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
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
}

.box-login h2 {
    margin-bottom: 20px;
    color: #c70039;
}

.form-group {
    margin-bottom: 20px;
    text-align: left;
}

.label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

.input-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
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
    margin-top: 10px;
}

.btn:hover {
    background-color: #ff5733;
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
