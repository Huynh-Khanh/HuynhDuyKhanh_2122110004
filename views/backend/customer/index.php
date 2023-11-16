<?php

//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM brand wher status!=0 and id=1 order by created_at desc


?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=customer&cat=process" method="post" enctype="multipart/form-data">

      <div class="content-wrapper">
  <!-- Content Header (customer header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <strong class="text-dark text-lg">TẤT CẢ  KHÁCH HÀNG</strong>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- Main content -->
  <section class="content">


    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-6">
            <a href="index.php?option=customer&cat=trash" class="btn btn-danger btn-sm">
              <i class="fas fa-trash"></i> Thùng rác</a>
          </div>
          <div class="col-sm-6 text-right">
            <a href="index.php?option=customer&cat=create" class="btn btn-sm btn-primary">Thêm trang đơn</a>
          </div>
        </div>
      </div>
               <div class="card-body">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th>Họ tên</th>
                           <th>Điện thoại</th>
                           <th>Email</th>
                        </tr>
                     </thead>
                     <tbody>
             
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                           <img src="../public/images/logo.png>" class="img-fluid" alt="hinhanh">
                           </td>
                           <td>
                              <div class="name">
                              Huỳnh Duy Khánh
                              </div>
                              <div class="text-center">
                                 <a href="#">Hiện</a> |
                                 <a href="#">Chỉnh sửa</a> |
                                 <a href="customer_show.html">Chi tiết</a> |
                                 <a href="#">Xoá</a>
                              </div>
                           </td>
                           <td>0847747701</td>
                           <td>huynhkhanh@gmail.com</td>
                        </tr>
         
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
</div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>