<?php
$pro_id = $_GET['pro_id'];
require '../connect.php';
$sql = "DELETE FROM products WHERE pro_id='$pro_id'";
$result = $con->query($sql);
if ($result) {
    echo "<script>alert('Products successfully deleted ✅'); window.location.href='index.php?page=product';</script>";
} else {
    echo "<script>alert('Delete failed ❌'); window.location.href='index.php?page=product';</script>";
}
?>
