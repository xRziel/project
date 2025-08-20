<?php 
require '../connect.php';
$keyword = $_POST['keyword'];

$keyword = $con->real_escape_string($keyword);

$sql = "SELECT * FROM narak WHERE username LIKE '%$keyword%' OR fullname LIKE '%$keyword%' OR email LIKE '%$keyword%'";
$result = $con->query($sql);


?>

<!--begin::App Content Header-->
<div class="app-content-header">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
      <div class="col-sm-3">
        <h3 class="mb-0">User list</h3>
      </div>
      <div class="col-sm-6">
      <form class ="row" action="index.php?page=search_user" method="POST">
        <div class="col-sm-10">
          <input type="text" class="form-control" name="keyword" placeholder="Search users...">
          </div>
          <div class="col-sm-2">
            <button class="btn btn-primary"><i class="bi bi-search"></i></button>
        </div>
      </form>
      </div>  
      <div class="col-sm-3">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">User list</li>
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
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">
            <h3 class="card-title">Users</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

              <div class="col-md-2">
                <a href="index.php?page=add_user" class="btn btn-success mb-4">
                  <i class="bi bi-person-add">add user</i> 
                </a>
              </div>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Fullname</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  while ($row = mysqli_fetch_array($result)) {
                  ?>
                    <tr class="align-middle">
                      <td><?php echo $i ?></td>
                      <td><?php echo $row['username'] ?></td>
                      <td><?php echo $row['password'] ?></td>
                      <td><?php echo $row['fullname'] ?></td>
                      <td><?php echo $row['phone'] ?></td>
                      <td><?php echo $row['email'] ?></td>
                      <!-- New -->
                      <td>
                        <img src="assets/user_img/<?php echo $row['image'] ?>" alt="" width="100px" height="100px">
                      </td>
                      <td>
                        <a href="index.php?page=edit_user&username=<?php echo $row['username'] ?>" class="btn btn-warning">
                          <i class="bi bi-pencil-square"></i></a>
                        <a href="index.php?page=del_user&username=<?php echo $row['username'] ?>" class="btn btn-danger" onclick="return confirm('⁕ Confirm on Deleted (っ °Д °;)っ')">
                          <i class="bi bi-x-circle"></i></a>
                      </td>
                    </tr>
                  <?php
                    $i++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-end">
                <li class="page-item">
                  <a class="page-link" href="#">&laquo;</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">&raquo;</a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content-->