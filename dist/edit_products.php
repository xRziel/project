<?php
require '../connect.php';

// ใช้ GET ก่อน ถ้าไม่มีใช้ POST แทน
$pro_id = $_GET['pro_id'] ?? $_POST['pro_id'] ?? '';

// ถ้ามี pro_id → ดึงข้อมูลจาก DB
if (!empty($pro_id)) {
    $sql = "SELECT * FROM products WHERE pro_id = '$pro_id'";
    $result = $con->query($sql);
    $row = mysqli_fetch_array($result);
}

// เมื่อมีการ submit form
if (isset($_POST['submit'])) {
    $pro_id     = $_POST['pro_id'];
    $pro_name   = $_POST['pro_name'];
    $pro_price  = $_POST['pro_price'];
    $pro_amount = $_POST['pro_amount'];
    $pro_status = $_POST['pro_status'];

    // เก็บชื่อรูปเดิมจากฐานข้อมูล
    $old_image = $_POST['old_image'] ?? '';

    // ตรวจสอบการอัปโหลดไฟล์ใหม่
    if (!empty($_FILES['image']['name'])) {
        $filename = time() . '_' . basename($_FILES['image']['name']); // กันชื่อซ้ำ
        $target_dir = "assets/user_img/";
        $target_file = $target_dir . $filename;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            echo "<script>alert('อัปโหลดรูปภาพไม่สำเร็จ ❌'); history.back();</script>";
            exit;
        }
    } else {
        // ถ้าไม่มีการอัปโหลด ใช้ชื่อรูปเดิม
        $filename = $old_image;
    }

    // ตรวจสอบค่าว่าง
    if (empty($pro_id) || empty($pro_name) || empty($pro_price) || empty($pro_amount) || empty($pro_status)) {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน'); history.back();</script>";
        exit;
    }

    // อัปเดตข้อมูล
    $sql = "UPDATE products
            SET pro_name='$pro_name',
                pro_price='$pro_price',
                pro_amount='$pro_amount',
                pro_status='$pro_status',
                image='$filename'
            WHERE pro_id='$pro_id'";

    if ($con->query($sql)) {
        echo "<script>alert('อัปเดตข้อมูลสินค้าสำเร็จ ✅'); window.location.href='index.php?page=product';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล ❌'); history.back();</script>";
    }
}
?>


<!--begin::App Content Header--><!--begin::App Content Header-->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Edit Product</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">edit_pro</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--end::App Content Header-->

<!--begin::App Content-->
<div class="app-content">
  <div class="container-fluid">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card card-primary card-outline mb-4">
          <div class="card-header">
            <div class="card-title">แก้ไขข้อมูลสินค้า 🖋</div>
          </div>

          <form action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">

              <div class="mb-3">
                <label class="form-label"> Products ID (ไม่สามารถแก้ไขได้) 🔒</label>
                <input type="text" class="form-control" name="pro_id" value="<?php echo $row['pro_id'] ; ?>" readonly />
                <div class="form-text">รหัสสินค้าจะต้องไม่ซ้ำกัน (Products ID must be unique.)</div>
              </div>

              <div class="mb-3">
                <label class="form-label">Products Name</label>
                <input type="text" name="pro_name" class="form-control" value="<?php echo $row['pro_name'] ; ?>" />
              </div>

              <div class="mb-3">
                <label class="form-label">Products Price</label>
                <input type="text" name="pro_price" class="form-control" value="<?php echo $row['pro_price'] ; ?>" />
              </div>

              <div class="mb-3">
                <label class="form-label">Products Amount</label>
                <input type="number" name="pro_amount" class="form-control" value="<?php echo $row['pro_amount'] ; ?>" />
              </div>

              <div class="mb-3">
                <label class="form-label">Products Status</label>
                <input type="text" name="pro_status" class="form-control" value="<?php echo $row['pro_status'] ; ?>" />
              </div>

               <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="exampleInputPassword1" />
              </div>

            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-success" name="submit">บันทึกข้อมูล</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<!--end::App Content-->
