<?php
session_start();
require "../connect/DbCon.php";
require "../connect/truyvan.php";
$sp1trang = 20;
if( isset($_GET["trang"]) ){
	$trang = $_GET["trang"];
	settype($trang, "int");
}else{
	$trang = 1;	
}
?>
<html>
<?php require "../blocks/head.php" ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul> 
  </nav>
  <?php require "../blocks/slidebar.php" ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý sản phẩm</h1>
          </div>
        
        </div>
      </div>
    </section>

    <!-- hien thi danh sach -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách sản phẩm </h3>
<button class="btn btn-info btn-flat" onclick="window.location.href='../sanpham/Create.php'">Thêm mới</button>
            </div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
              
             
                  <th>Hình Ảnh</th>
                  <th>Tên sản phẩm</th>
                  <th>Danh mục</th>
                  <th>giá bán</th>
                  <th>Tác vụ</th>
     
                             
                  <?php
	$from = ($trang -1 ) * $sp1trang;
	if($from<0) $from=0;
	
 $qr = Danhsachsanpham();	
	while($Loaisanpham = mysql_fetch_array($qr)){
	?>
                <tbody>
                <tr>
                  
                  <td><img class="hinhanhproduct" src="../../images/product/<?php  echo $Loaisanpham ['Imgs'];?>" /></td>
                  <td><?php  echo $Loaisanpham ['name'];?></td>
                  <td><?php  echo $Loaisanpham ['nameType'];?>   </td>
                  <td><?php  echo $Loaisanpham ['price'];?></td>       

                 <td>
                 <a href="Edit.php?id=<?php  echo $Loaisanpham ['id'];?>">Chỉnh sửa</a>|
                  <a href="Delete.php?id=<?php  echo $Loaisanpham ['id'];?>">Xóa</a>
                 </td>

                </tbody>
<?php }?>
                <tfoot>
                
                </tfoot>             
              </table>
        </div>
        
      </div>
      <!--phan trang-->
   <div class="pagination">
<?php

// 2 dong quan trong nhat nha
$x = mysql_query("SELECT id FROM product");
$tongsosp = mysql_num_rows($x);
$sotrang = ceil($tongsosp / $sp1trang);
for($t=1; $t<=$sotrang; $t++){
  echo "<a  href='index.php?trang=$t'>Trang $t</a> - ";
}
?>
</div>
  </div>

    </section>
    
  </div>

  <!--hien thi footer-->
  <?php require "../blocks/footer.php" ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
