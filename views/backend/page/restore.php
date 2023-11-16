<?php

use App\Models\Post;

use App\Libraries\MyClass as LibrariesMyClass;

$id = $_REQUEST['id'];
$Post = Post::find($id);

if ($Post == null) {
    LibrariesMyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
    header('location: index.php?option=Post');
    
}

$Post->status = 2;
$Post->updated_at = date('Y-m-d H:i:s');
$Post->updated_by = 1;

$Post->save();

LibrariesMyClass::set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục thành công >']);

header('location: index.php?option=Post');

