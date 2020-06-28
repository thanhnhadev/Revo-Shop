<?php
session_start();
ob_start();
require "../connect/DbCon.php";
require "../connect/truyvan.php";
?>

<?php
$id = $_GET['id'];
// ép kiểu về dạng sô
settype($id, "int" );
$row_product_type = Chitiettheloai($id);
?>
<?php
if(isset($_POST['btnsua']))
{
$nameprodct = $_POST['nameprodct'];
$name = $_FILES["fileUpload"]["name"];
$type = $_FILES["fileUpload"]["type"];
$size = $_FILES["fileUpload"]["size"];

if( $size <= 5*1024*1024 ) {
	move_uploaded_file(
		$_FILES["fileUpload"]["tmp_name"],"../../images/type/$name");
        $sql ="UPDATE product_type SET 
        name ='$nameprodct',
        image = '$name'
        WHERE id ='$id'
        ";
         mysql_query($sql);
         header('Location: index.php');
 
}else{
	echo "FIle cua ban phai nho hon 5M";	
}
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
            <h1>Quản lý danh Mục Sản Phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            
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
                <h3 class="card-title">Thông tin danh mục</h3>
              </div>            
              <!-- form up load du lieui  -->
              <form role="form"method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                  <?php
                      if(isset($error['fileUpload']))
                        {
                  ?>
                  <p class="thongbao"><?php  echo $error['fileUpload']?></p>
                  <?php
                        }
                    ?>
                    <br>
                    <label for="exampleInputEmail1">Tên Danh Mục</label>
                    <input type="text" name="nameprodct" value="<?php echo $row_product_type ['name']  ?>" id = "nameprodct" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputFile">Hình Ảnh</label>
                    <div class="input-group">
                      <div class="custom-file">                 
                     <input type="file" class="custom-file-input" name="fileUpload" >
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Chọn Hình</span>
                      </div>
                    </div>
                  </div>
                  
                  </div>
                </div>
           

                <div class="card-footer">
                  <button type="submit" name="btnsua" id="btnsua"  class="btn btn-primary">Cập Nhật</button>
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