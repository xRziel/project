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
$target   = 'assets/user_csv/' . $filename;

if (!move_uploaded_file($_FILES['csv_file']['tmp_name'], $target)) {
    alert_and_back("❌ ไม่สามารถอัปโหลดไฟล์ได้");
}

$csv = fopen($target, "r");
if (!$csv) {
    alert_and_back("❌ เปิดไฟล์ไม่สำเร็จ");
}

$rows = 0;

while (($csvArr = fgetcsv($csv, 1000, ',')) !== false) {
    
    if ($rows === 0 && $csvArr[0] === 'username') {
        $rows++;
        continue;
    }

    $username = $con->real_escape_string($csvArr[0]);
    $password = $con->real_escape_string($csvArr[1]);
    $fullname = $con->real_escape_string($csvArr[2]);
    $phone    = $con->real_escape_string($csvArr[3]);
    $email    = $con->real_escape_string($csvArr[4]);

    $sql = "INSERT INTO narak (username,password,fullname,phone,email) 
            VALUES('$username','$password','$fullname','$phone','$email')";
    $result = $con->query($sql);

    if (!$result) {
        alert_and_back("❌ INSERT ERROR: " . $con->error);
    }

    $rows++;
}

fclose($csv);

echo "<script>alert('✅ เพิ่มข้อมูลสำเร็จทั้งหมด " . ($rows) . " แถว'); window.location.href='index.php?page=user_list'</script>";
?>
