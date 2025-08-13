<?php
    require '../connect.php';
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $filename = $_FILES['image']['name'];
        if (empty($username) || empty($password) || empty($fullname) || empty($phone) || empty($email)) {
    echo  "<script>alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');history.back()</script>";
  } else {
    $old_data = $con->query("SELECT * FROM narak WHERE username= '$username' ");
    $old_num = mysqli_num_rows($old_data);
    if ($old_num == 1) {
      echo  "<script>alert('username นี้มีคนใช้แล้ว');history.back()</script>";
    } else {
      move_uploaded_file($_FILES['image']['tmp_name'], 'assets/user_img/' . $filename);
      $sql = "INSERT INTO narak VALUES('$username','$password','$fullname','$phone','$email', '$filename')";
      $result = $con->query($sql);
      if (!$result) {
        echo "<script>alert('บันทึกข้อมูลผิดพลาด');history.back()</script>";
      } else {
        echo "<script>window.location.href='index.php?page=user_list';</script>";
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
        <h3 class="mb-0">Add User Form</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add User Form</li>
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
      <div class="col-md-12">
        <!--begin::Quick Example-->
        <div class="card card-primary card-outline mb-4">
          <!--begin::Header-->
          <div class="card-header">
            <div class="card-title">Add New User</div>
          </div>
          <!--end::Header-->
          <!--begin::Form-->
          <form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "POST" enctype="multipart/form-data">
            <!--begin::Body-->
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" />
                
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">ชื่อ-นามสกุล</label>
                <input type="text" name="fullname" class="form-control" id="exampleInputPassword1" />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">เบอร์โทรศัพท์</label>
                <input type="text" name="phone" class="form-control" id="exampleInputPassword1" />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputPassword1" />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="exampleInputPassword1" />
              </div>
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="submit">บันทึกข้อมูล</button>
            </div>
            <!--end::Footer-->
          </form>
          <!--end::Form-->
        </div>
        <!--end::Quick Example-->
      </div>
      <!--end::Col-->
    </div>
    <!--end::Row-->
  </div>
  <!--end::Container-->
</div>
<!--end::App Content-->