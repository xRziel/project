<?php
require '../connect.php';

if (isset($_POST['submit'])) {
  // สมมุติว่าเป็นข้อมูลของสินค้า ไม่ใช่ผู้ใช้
  $pro_id = $_POST['pro_id'];
  $pro_name = $_POST['pro_name'];
  $pro_price = $_POST['pro_price'];
  $pro_amount = $_POST['pro_amount'];
  $pro_status = $_POST['pro_status'];

  // ตรวจสอบค่าว่าง
  if (empty($pro_id) || empty($pro_name) || empty($pro_price) || empty($pro_amount) || empty($pro_status)) {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน');history.back();</script>";
  } else {
    // ตรวจสอบว่า product id ซ้ำหรือไม่
    $result = $con->query("SELECT pro_id FROM products WHERE pro_id = '$pro_id'");
    $exist_pro_id = mysqli_fetch_array($result);

    if ($exist_pro_id) {
      echo "<script>alert('รหัสสินค้าซ้ำ กรุณาเปลี่ยนรหัสสินค้า');history.back();</script>";
    } else {
      // เพิ่มข้อมูลสินค้าใหม่
      $sql = "INSERT INTO products (pro_id, pro_name, pro_price, pro_amount, pro_status)
              VALUES ('$pro_id', '$pro_name', '$pro_price', '$pro_amount', '$pro_status')";

      if ($con->query($sql)) {
        echo "<script>window.location.href='index.php?page=product';</script>";
      } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');history.back();</script>";
      }
    }
  }
}
?>

<!--begin::App Content Header-->
<div class="app-content-header">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Add Product</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">add_pro</li>
        </ol>
      </div>
    </div>
    <!--end::Row-->
  </div>
  <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Row-->
    <div class="row g-4">
      <!--begin::Col-->
      <div class="col-md-6">
        <!--begin::Quick Example-->
        <div class="card card-primary card-outline mb-4">
          <!--begin::Header-->
          <div class="card-header">
            <div class="card-title">Add Product</div>
          </div>
          <!--end::Header-->
          <!--begin::Form-->
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <!--begin::Body-->
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product ID</label>
                <input type="text" class="form-control" name="pro_id" id="exampleInputEmail1" aria-describedby="emailHelp" />
                <div id="emailHelp" class="form-text">
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product Name</label>
                <input type="text" name="pro_name" class="form-control" id="exampleInputPassword1" />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product Price</label>
                <input type="text" name="pro_price" class="form-control" id="exampleInputPassword1" />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Products Amount</label>
                <input type="number" name="pro_amount" class="form-control" id="exampleInputPassword1" />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Products Status</label>
                <input type="text" name="pro_status" class="form-control" id="exampleInputPassword1" />
              </div>
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer">
              <button type="submit" class="btn btn-success" name="submit">บันทึกข้อมูล</button>
            </div>
            <!--end::Footer-->
          </form>
          <!--end::Form-->
        </div>
        <!--end::Quick Example-->
      </div>
    </div>
    <!--end::Row-->
  </div>
  <!--end::Container-->
</div>
<!--end::App Content-->
