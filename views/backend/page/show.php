<?php
use App\Models\Post;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM brand wher status!=0 and id=1 order by created_at desc
$id = $_REQUEST['id'];
$Post = Post::find($id);
if($Post==null){
    header("location:index.php?option=Post");
}

$list = Post::where('status','=',0)->orderBy('Created_at','DESC')->get();
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=Post&cat=process" method="Post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  <strong class="text-dark text-lg">CHI TIẾT BÀI VIẾT</strong>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a class="btn btn-sm btn-info" href="index.php?option=Post">
                            <i class="fas fa-arrow-left"></i> Về danh sách
                        </a>
                    </div>
                </div>
            </div>
               <div class="card-body p-2">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           
                           <th>Tên trường</th>
                           <th>Giá trị</th>
                        </tr>
                     </thead>
                     <tbody>
                     <tr>
                         <td>ID</td>
                         <td><?= $Post->id;?></td>
                     </tr>
                     <tr>
                         <td>topic_id</td>
                         <td><?= $Post->topic_id;?></td>
                     </tr>
                     <tr>
                         <td>title</td>
                         <td><?= $Post->title;?></td>
                     </tr>
                     <tr>
                         <td>slug</td>
                         <td><?= $Post->slug;?></td>
                     </tr>
                     <tr>
                         <td>detail</td>
                         <td><?= $Post->detail;?></td>
                     </tr>
                     <tr>
                                 <td>image</td>
                                 <td><img class="img-fluid" src="../public/images/Post/<?=$Post->image;?>" alt="<?=$Post->image;?>"></td>
                              </tr>
                           <tr>
                     <tr>
                         <td>type</td>
                         <td><?= $Post->type;?></td>
                     </tr>
                     <tr>
                         <td>description</td>
                         <td><?= $Post->description;?></td>
                     </tr>
                     <tr>
                         <td>created_at</td>
                         <td><?= $Post->created_at;?></td>
                     </tr>
                     <tr>
                         <td>created_by</td>
                         <td><?= $Post->created_by;?></td>
                     </tr>
                     <tr>
                         <td>updated_at</td>
                         <td><?= $Post->updated_at	;?></td>
                     </tr>
                     <tr>
                         <td>updated_by</td>
                         <td><?= $Post->updated_by;?></td>
                     </tr>
                     <tr>
                         <td>status</td>
                         <td><?= $Post->status;?></td>
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