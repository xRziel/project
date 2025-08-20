<?php 
require '../connect.php';

$keywords = $_POST['keywords'] ?? ''; 

$keywords = $con->real_escape_string($keywords);

$sql = "SELECT * FROM products WHERE pro_id LIKE '%$keywords%' OR pro_name LIKE '%$keywords%'";
$result = $con->query($sql);
?>


<div class="app-content-header">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Row-->
    <div class="row">
      <div class="col-sm-3">
        <h3 class="mb-0">Product list</h3>
      </div>
      <div class="col-sm-6">
      <form class ="row" action="index.php?page=search_product" method="POST">
        <div class="col-sm-10">
          <input type="text" class="form-control" name="keywords" placeholder="Search products...">
          </div>
          <div class="col-sm-2">
            <button class="btn btn-primary"><i class="bi bi-search"></i></button>
        </div>
      </form>
      </div>  
      <div class="col-sm-3">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Products list</li>
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
                    <h3 class="card-title">Product</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">

              <div class="col-md-10">
                <form action="add_product_csv.php" method="POST" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="csvFile" class="col-sm-2 col-form-label">add product csv </label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="csv_file" id="csvFile" accept=".csv,.xlsx,.xls">
                    </div>
                    <div class="col-sm-2">
                      <input type="submit" class="btn btn-success w-100" value="อัปโหลด" name="upload">
                    </div>
                  </div>
                </form>
              </div>

              <div class="col-md-2">
                <a href="index.php?page=add_product" class="btn btn-success mb-4">
                  <i class="bi bi-person-add">add product
                </a></i>
              </div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>pro_id</th>
                          <th>pro_name</th>
                          <th>pro_price</th>
                          <th>pro_amount</th>
                          <th>Pro_status</th>
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
                                
                                <td><?php echo $row ['pro_id'] ?></td>
                                <td><?php echo $row ['pro_name'] ?></td>
                                <td><?php echo $row ['pro_price'] ?></td>
                                <td><?php echo $row ['pro_amount'] ?></td>
                                <td><?php echo $row ['pro_status'] ?></td>
                                <td>
                                  <img src="assets/product_img/<?php echo $row['image'] ?>" alt="" width="100px" height="100px">
                                </td>
                                <td>
                                  <a href="index.php?page=edit_product&pro_id=<?php echo $row['pro_id']?>" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i></a>
                                  <a href="index.php?page=del_product&pro_id=<?php echo $row['pro_id']?>" class="btn btn-danger" onclick="return confirm('⁕ Confirm on Delete Product?')">
                                    <i class="bi bi-x-circle"></i></a>
                                </td>
                            </tr>
                            <?php
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