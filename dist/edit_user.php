    <?php
        $username = $_GET['username']; 
        require '../connect.php'; 
        $sql = "SELECT * FROM narak WHERE username = '$username'"; 
        $result = $con->query(($sql));
        $row = mysqli_fetch_array($result);
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $sql2 = "UPDATE narak SET password='$password', fullname='$fullname', phone='$phone', email='$email' WHERE username = '$username'";
            $result2 = $con->query($sql2);
            if(!$result2) {
                echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');history.back();</script>";
            }else{
                echo "<script>window.location.href='index.php?page=user_list';</script>";
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
            <h3 class="mb-0">Edit User From</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                <div class="card-title">Edit User</div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "POST">
                <!--begin::Body-->
                <div class="card-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" 
                    aria-describedby="emailHelp" value="<?php echo $row['username'] ?>" readonly />
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    value="<?php echo $row['password'] ?>" />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">ชื่อ-นามสกุล</label>
                    <input type="text" name="fullname" class="form-control" id="exampleInputPassword1"
                    value="<?php echo $row['fullname'] ?>" />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputPassword1"
                    value="<?php echo $row['phone'] ?>" />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputPassword1"
                    value="<?php echo $row['email'] ?>" />
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