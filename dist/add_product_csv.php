<?php
require '../connect.php';

function alert_and_back($msg) {
    echo "<script>alert('$msg'); window.history.back();</script>";
    exit;
}

if (!isset($_FILES['csv_file']) || $_FILES['csv_file']['error'] != 0) {
    alert_and_back('❌ ไม่พบไฟล์ CSV');
}

$filename = basename($_FILES['csv_file']['name']);
$target   = 'assets/product_csv/' . $filename;

if (!move_uploaded_file($_FILES['csv_file']['tmp_name'], $target)) {
    alert_and_back("❌ ไม่สามารถอัปโหลดไฟล์ได้");
}

$csv = fopen($target, "r");
if (!$csv) {
    alert_and_back("❌ เปิดไฟล์ไม่สำเร็จ");
}

$rows = 0;


$con->query("ALTER TABLE products AUTO_INCREMENT = 1");


while (($csvArr = fgetcsv($csv, 1000, ',')) !== false) {
    if (count($csvArr) < 4) continue;

    $pro_name   = $con->real_escape_string($csvArr[0]);
    $pro_price  = (float) $csvArr[1];
    $pro_amount = (int) $csvArr[2];
    $pro_status = $con->real_escape_string($csvArr[3]);

   
    $sql = "INSERT INTO products (pro_name, pro_price, pro_amount, pro_status, image) 
            VALUES ('$pro_name','$pro_price','$pro_amount','$pro_status','')";
    
    $result = $con->query($sql);
    if (!$result) {
        die("❌ INSERT ERROR: " . $con->error . "<br>SQL: " . $sql);
    }

    $rows++;
}

fclose($csv);

echo "<script>alert('✅ เพิ่มข้อมูลสำเร็จทั้งหมด $rows แถว'); window.location.href='index.php?page=product'</script>";
?>
