<?php
session_start();
session_unset();
session_destroy();
echo '<script>
    alert("Akun Anda telah keluar.");
    window.location.href = "index.php";
</script>';
?>