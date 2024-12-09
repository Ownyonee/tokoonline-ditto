<?php

include 'db.php';

function deleteCategory($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM tb_category WHERE category_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: data_kategori.php");
        exit();
    } else {
        echo "Gagal menghapus kategori.";
    }

    $stmt->close();
}

function deleteProduct($conn, $id) {
    $product = mysqli_query($conn, "SELECT product_image FROM tb_product WHERE product_id = '$id'");
    $p = mysqli_fetch_object($product);

    if ($p && file_exists('./uploads/'.$p->product_image)) {
        unlink('./uploads/'.$p->product_image);
    }

    $stmt = $conn->prepare("DELETE FROM tb_product WHERE product_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo '<script>window.location="data_produk.php"</script>';
    } else {
        echo "Gagal menghapus produk.";
    }

    $stmt->close();
}

if (isset($_GET['idk']) && !empty($_GET['idk'])) {
    $id = $_GET['idk'];
    deleteCategory($conn, $id);
} elseif (isset($_GET['idp']) && !empty($_GET['idp'])) {
    $id = $_GET['idp'];
    deleteProduct($conn, $id);
} else {
    header("Location: data_kategori.php");
    exit();
}

$conn->close();
?>
