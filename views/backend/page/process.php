<?php

use App\Models\Post;
use App\Libraries\MyClass;

if(isset($_Post['THEM']))
{
    $Post=new Post();
    //lấy từ form
    $Post->slug =(strlen($_Post['slug'])>0) ? $_Post['slug']: MyClass::str_slug($_Post['title']);
    $Post->title = $_Post['title'];
    $Post->topic_id = $_Post['topic_id'];
    $Post->status = $_Post['status'];
    $Post->detail = $_Post['detail'];
    $Post->description = $_Post['description'];
    $Post->type = $_Post['type'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/Post/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$Post->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $Post->image =$filename;
        }
    }
    //tư sinh ra
    $Post->created_at = date('Y-m-d-H:i:s');
    $Post->created_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($Post);
    //luu vao csdl
    //ínet
    $Post->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);

    //
    header("location:index.php?option=Post");
}



if(isset($_Post['CAPNHAT']))
{
    $id= $_Post['id'];
    $Post=Post::find($id);
    if($Post == null){
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

        header("location:index.php?option=Post");
    }
    $Post->slug =(strlen($_Post['slug'])>0) ? $_Post['slug']: MyClass::str_slug($_Post['title']);
    $Post->title = $_Post['title'];
    $Post->topic_id = $_Post['topic_id'];
    $Post->status = $_Post['status'];
    $Post->detail = $_Post['detail'];
    $Post->description = $_Post['description'];
    $Post->type = $_Post['type'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){

        //xóa hình cũ

        //thêm hình mới
        $target_dir = "../public/images/Post/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$Post->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $Post->image =$filename;
        }
    }
    //tư sinh ra
    $Post->updated_at = date('Y-m-d-H:i:s');
    $Post->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($Post);
    //luu vao csdl
    //ínet
    $Post->save();
    //
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Cật Nhật thành công']);

    header("location:index.php?option=Post");
}

