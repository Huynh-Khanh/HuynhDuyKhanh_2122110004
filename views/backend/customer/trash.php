
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
<div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  <strong class="text-dark text-lg">THÙNG RÁC KHÁCH HÀNG</strong>
                  </div>
               </div>   
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header ">
                <div class="row">
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-6 text-right">
                  <a class="btn btn-sm btn-info" href="index.php?option=customer">
                <i class="fas fa-arrow-left"></i> Về danh sách
              </a>
                  </button>
                  </div>
                </div>
               </div>
               <div class="card-body">

               <?php require_once "../views/backend/message.php";?>

                  <div class="row">
                 
                     <div class="col-md-12">
                     <table class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th class="text-center" >Họ tên</th>
                                 <th class="text-center" >Điện thoại </th>
                                 <th class="text-center" >Email  </th>
                                 <th class="text-center" style="width:170px">Chức năng</th>
                                 <th class="text-center" style="width:30px">ID</th>
                              </tr>
                           </thead>
                           <tbody>
                        
                              <tr class="datarow">  
                                 <td>
                                    <input type="checkbox">
                                 </td>
                               
                                 <td class="text-center">
                                         
                                 </td>
                                 <td class="text-center">
                                         
                                         </td>
                                         <td class="text-center">
                                         
                                         </td>
                                 <td class="text-center">  </td>
                                 <td class="text-center">
                                 <a href="index.php?option=customer&cat=destroy&id=" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                                 <a href="index.php?option=customer&cat=restore&id=" class="btn btn-sm btn-info">
                                    <i class="fas fa-undo"></i>
                                 </a>
                                 </td>
                                 <td class="text-center" ></td>
                              </tr>
                        
                           </tbody> 
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>

      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>