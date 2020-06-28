<?php
require "../connect/DbCon.php";
require "../connect/truyvan.php";
?>

<?php
$id = $_GET['id'];
// ép kiểu về dạng sô
settype($id, "int" );
$row_product = Chitietsanpham($id);
?>
<?php
if( isset($_POST ['btncapnhat']) )
{
$delete =$_POST['xoa'];
  $sql ="UPDATE product SET      
        xoa ='$delete'
        WHERE id ='$id'
        ";
  mysql_query($sql);
  header('Location: index.php');
}
?>
<!-- chinh sua-->
<html>
<?php require "../blocks/head.php" ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
  <?php require "../blocks/slidebar.php" ?>


  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông sản phẩm</h3>
              </div>
              <!-- form up load du lieui  -->
              <form role="form"method="POST" enctype="multipart/form-data">
                <div class="card-body">
                <!--ten san pham-->
                <div>
                <label>Tên sản phẩm</label>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    
                      <i class="fa fa-tags"></i>
                    </span>
                  </div>
                  <input disabled type="text"name="nameprodct" value="<?php echo $row_product ['name']  ?>" id = "nameprodct" class="form-control">
                  <div class="input-group-append">
                  </div>
                  </div>
               
                <!--danh muc sản phẩm-->
                <div class="form-group">
                </br>
                  <label>Danh mục</label>             
                  <select disabled class="form-control select2 select2-hidden-accessible" id="id_type" name ="id_type"style="width: 100%;" tabindex="-1" aria-hidden="true">
                <?php
                  $Loaisanpham = AllDanhMucSanPham();
while ($row_Loaisanpham = mysql_fetch_array($Loaisanpham))
{
?>
                    <option <?php if($row_Loaisanpham["id"]==$row_product["id_type"]) echo "selected='selected'"; ?> selected="selected" value="<?php  echo $row_Loaisanpham ['id'];?>"><?php  echo $row_Loaisanpham ['name'];?></option>
<?php }?>
                  </select>
                </div>
               
                <input type="hidden"name="xoa" value="1" id = "xoa" class="form-control">
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" name="btncapnhat" id="btncapnhat"  class="btn btn-primary">Xóa</button>
                </div>
              </form>
            </div>
          

          </div>
         
          <div class="col-md-6">
        
           
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php require "../blocks/footer.php" ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
</body>
</html>