<?php
require '../connect.php';
if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if (empty($username) || empty($password) || empty($fullname) || empty($phone) || empty($email)) {
        echo "<script>alert('Please enter all data');history.back();</script>";
    } else {
        $exit_username = mysqli_fetch_array($con->query("SELECT * FROM narak"));
        if ($username == $exit_username['username']) {
            echo "<script>alert('This username already exists'); history.back();</script>";
        } else {
            $sql = "INSERT INTO narak(username,password,fullname,phone,email) 
                    VALUES('$username', '$password', '$fullname', '$phone', '$email')";
            $result = $con->query($sql);
            if (!$result) {
                echo "<script>alert('Error saving data'); history.back();</script>";
            } else {
                echo"<script>window.lacation.href='index.php?page=user'</script>";
            }
        }
    }
}
?>
<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Add User</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">General Form</li>
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

            <!--begin::Col-->
            <div class="col-md-12">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Quick Example</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input
                                    type="text"
                                    name="username"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp" />
                                <div id="emailHelp" class="form-text">
                                    User ต้องไม่ซ้ำกับคนอื่น
                                </div>
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
                                <label for="exampleInputPassword1" class="form-label">email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputPassword1" />
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                <label class="form-check-label" for="exampleCheck1">check again</label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="save" class="btn btn-primary">บันทึกข้อมูล</button>
                        </div>

                    </form>

                </div>

            </div>


        </div>

    </div>

    </div>

</main>