<?php

use App\Models\User;

$customer = User::where([['status', '=', 1], ['id', '=', $_SESSION['user_id']]])->first();
if (isset($_POST["CHANEGPASSWORD"])) {
   $password = $_POST['password_old'];
   $args = [
      ['password', '=', $password],

      ['status', '=', 1],
   ];
   $user = User::where($args)->first();
   if ($user !== null) {
      //Thanh cong
      $customer->password = $_POST['password'];
      $customer->updated_at = date('Y-m-d h:i:s');
      $customer->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
   
      $customer->save();
      header("location:index.php?option=customer&logout=true");
   } else {
      //that bai
      $error = "Mật khẩu không hợp lệ";
   }
}
?>
<?php require_once "views/frontend/header.php"; ?>
<form action="index.php?option=profile_changepassword" method="post">
   <section class="bg-light">
      <div class="container">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
               <li class="breadcrumb-item">
                  <a class="text-main" href="index.html">Trang chủ</a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="hdl-maincontent py-2">
      <div class="container">
         <div class="row">
            <div class="call-login--register border-bottom">
               <ul class="nav nav-fills py-0 my-0">
                  <li class="nav-item">
                     <a class="nav-link">
                        <i class="fa fa-phone-square" aria-hidden="true"></i>
                        <?= $customer->phone; ?>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index.php?option=customer&login=true">Đăng nhập</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index.php?option=customer&register=true">Đăng ký</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index.php?option=profile"><?= $customer->name; ?></a>
                  </li>
               </ul>
            </div>
            <div class="col-md-9 order-1 order-md-2">
               <h1 class="fs-2 text-main">Thông tin tài khoản</h1>
               <table class="table table-borderless">
                  <tr>
                     <td style="width:20%;">Mật khẩu cũ</td>
                     <td>
                        <input type="password" name="password_old" class="form-control" />
                     </td>
                  </tr>
                  <tr>
                     <td>Mật khẩu mới</td>
                     <td>
                        <input type="password" name="password" class="form-control" />
                     </td>
                  </tr>

                  <tr>
                     <td></td>
                     <td>
                        <button class="btn btn-main" type="submit" name="CHANEGPASSWORD">
                           Đổi mật khẩu
                        </button>
                        <?php echo $error??"";?>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </section>
   <?php require_once "views/frontend/footer.php"; ?>