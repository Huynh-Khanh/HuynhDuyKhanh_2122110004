<?php

use App\Models\Menu;
use App\Libaries\MyClass;
use App\Libraries\MyClass as LibrariesMyClass;

$id = $_REQUEST["id"];
$list = Menu::where([['status', '!=', '0'], ['id', '!=', $id]])->get();
$menu = Menu::find($id);
if ($menu == null) {
    LibrariesMyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
    header("location: index.php?option=menu");
}
$str_parent_id = "";
$str_sort_order = "";
foreach ($list as $item) {
    if ($item->id != $id) {
        if ($menu->parentid == $item->id) {
            $str_parent_id .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
        } else {
            $str_parent_id .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
        }
        if ($menu->sort_order - 1 == $item->sort_order) {
            $str_sort_order .= "<option selected value='" . $item->sort_order . "'>Sau: " . $item->name . "</option>";
        } else {
            $str_sort_order .= "<option value='" . $item->sort_order . "'>Sau: " . $item->name . "</option>";
        }
    }
}
?>
<?php require_once '../views/backend/header.php'; ?>
<form action="index.php?option=menu&cat=process"method="post" enctype="multipart/form-data">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <strong class="text-dark text-lg">CẬP NHẬT DANH MỤC</strong>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Cập nhật thương hiệu</li>
            </ol>
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
            <div class="col md-12 text-right">
              <button name="CAPNHAT" type="submit" class="btn btn-sm btn-success">
                <i class="fas fa-save"></i> Lưu[Cập nhật]
              </button>
              <a class="btn btn-sm btn-info" href="index.php?option=menu">
                <i class="fas fa-arrow-left"></i> Quay về danh sách
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
                <?php require_once('../views/backend/menu/process.php') ?>
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="name">TÊN MENU</label>
                            <input name="name" id="name" type="text" class="form-control" required placeholder=""value="<?= $menu->name ?>">
                        </div>
                        <div class="mb-3">
                            <label for="link">LINK</label>
                            <textarea name="link" id="link" class="form-control" required placeholder=""></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="type">LOẠI</label>
                            <textarea name="type" id="type" class="form-control" required placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="parent_id">CHỦ ĐỀ CHA</label>
                            <select id="parent_id" name="parent_id" class="form-control" required>
                                <option value="0">--chọn cấp cha--</option>
                                <?= $str_parent_id ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status">TRẠNG THÁI</label>
                            <select id="status" name="status" class="form-control">
                                <option value="2">Chưa xuất bản</option>
                                <option value="1">Xuất bản</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a><button name="THEM" type="submit" class="btn btn-sm btn-primary">
                                <i class="nav-icon fas fa-save">
                                    Lưu[thêm] </i>
                            </button>
                        </a>
                        <a class="btn btn-sm btn-success" href="index.php?option=menu">
                            <i class="fas fa-arrow-left"></i> Quay lại danh mục
                        </a>

                    </div>
                </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

  </form>