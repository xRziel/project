<?php
    $username = $_GET["username"]; 
    require '../connect.php'; 
    $sql = "DELETE FROM narak WHERE username='$username'";
    $result = $con->query($sql);
    if (!$result) {
        echo "<script>alert('ไม่สามารถลบข้อมูลได้')</script>";
    }else{
        echo "<script>window.location.href='index.php?page=user_list'</script>";
    }
    ?>