<?php

use App\Libaries\MyClass;
use App\Libraries\MyClass as LibrariesMyClass;
use App\Models\Post;

$id = $_REQUEST['id'];
$Post=Post::find($id);
if ($Post == NULL) {
    LibrariesMyClass::set_flash('message',['type'=>'danger','msg'=>'Mẫu tin không tồn tại! ']);
    header("location:index.php?option=Post");
}
$Post->status = ($Post->status == 1) ? 2 : 1;
$Post->updated_at = date('Y-m-d H:i:s');
$Post->updated_by = (isset($_SESSION['Post_id'])) ? $_SESSION['Post_id'] : 1;
$Post->save();

LibrariesMyClass::set_flash('message',['type'=>'success','msg'=>'Thay đổi trạng thái thành công :>']);
    header("location:index.php?option=Post");