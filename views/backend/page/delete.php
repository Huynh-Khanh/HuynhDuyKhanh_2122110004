<?php
use App\Models\Post;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$Post=Post:: find($id);
if($Post == null){
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Mẫu tin không tồn tại']);
            header('location: index.php?option=Post');
}
$Post->status = 0;
$Post->updated_at = date('Y-m-d H:i:s');
$Post->updated_by =1;
$Post->save();
MyClass::set_flash('message',['type'=>'success','msg'=>'Xóa thành công :>']);

header('location: index.php?option=Post');

