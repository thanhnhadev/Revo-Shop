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
if(isset($_POST['btncapnhat']))
{
$nameprodct = $_POST['nameprodct'];
$id_type =$_POST['id_type'];
settype($id, "int");
 $price = $_POST['price'];
 settype($price , "float");
 $color = $_POST['color'];
 $material = $_POST['material'];
 settype($material, "int");
 $description = $_POST['description'];
 $new=$_POST['new'];
 settype($new , "int");
 $xoa =$_POST["xoa"];
 settype($xoa, "int");
 $inCollection= $_POST['inCollection'];
 settype($inCollection, "int");
 $name = $_FILES["fileUpload"]["name"];
 $type = $_FILES["fileUpload"]["type"];
 $size = $_FILES["fileUpload"]["size"];
if( $size <= 5*1024*1024 ) {
	move_uploaded_file(
		$_FILES["fileUpload"]["tmp_name"],"../../images/product/$name");
 $sql ="UPDATE product  SET
            name='$nameprodct',              
            id_type='$id_type',
            price='$price',
            color='$color',
            material='$material',
            description='$description',
            new='$new',
            inCollection='$inCollection',
            Imgs='$name',
            xoa='$xoa'
            where id='$id'
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
                  <input type="text"name="nameprodct" value="<?php echo $row_product ['name']  ?>" id = "nameprodct" class="form-control">
                  <div class="input-group-append">
                  </div>
                  </div>
               
                <!--danh muc sản phẩm-->
                <div class="form-group">
                </br>
                  <label>Danh mục</label>             
                  <select class="form-control select2 select2-hidden-accessible" id="id_type" name ="id_type"style="width: 100%;" tabindex="-1" aria-hidden="true">
                <?php
                  $Loaisanpham = AllDanhMucSanPham();
while ($row_Loaisanpham = mysql_fetch_array($Loaisanpham))
{
?>
                    <option <?php if($row_Loaisanpham["id"]==$row_product["id_type"]) echo "selected='selected'"; ?> selected="selected" value="<?php  echo $row_Loaisanpham ['id'];?>"><?php  echo $row_Loaisanpham ['name'];?></option>
<?php }?>
                  </select>
                </div>
                <!--gia ban-->
                <div>
                <label>Giá bán</label>

                <div class="input-group">
                
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    
                      <i class="fa fa-dollar"></i>
                    </span>
                  </div>
                  <input  value="<?php echo $row_product ['price']  ?>" name="price" id="price" type="text" class="form-control">
                  <div class="input-group-append">
                  </div>
                  </div>
                </div>
                <!--hình ảnh-->
                  <div class="form-group">
                  </br>
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
                  <!--màu sắc-->
                  <div>
                <label>Màu sắc</label>

                <div class="input-group">
                
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    
                      <i class="fa"></i>
                    </span>
                  </div>
                  <input type="text" name="color" id="color" value="<?php echo $row_product ['color']  ?>"  class="form-control">
                  <div class="input-group-append">
                  </div>
                  </div>
                </div>
                <!--chat lieu-->
                <div>
                </br>
                <label>Chất liệu</label>

                <div class="input-group">
                
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    
                      <i class="fa fa-cube"></i>
                    </span>
                  </div>
                  <input type="text"value="<?php echo $row_product ['material']  ?>"name="material"  id="material" class="form-control">
                  <div class="input-group-append">
                  </div>
                  </div>
                </div>
            
                  <!--Hien thi san pham mơi-->
                  <div class="form-group">
                  </br>
                  <label>Hiển thị sản phẩm mới</label>
                    <div class="form-check">
                      <input <?php if($row_product["new"]==1) echo "checked='checkbox'";?> class="form-check-input" type="radio" value="1">
                      <label class="form-check-label">Hiển hị</label>
                      </br>
                      <input <?php if($row_product["new"]==0) echo "checked='checkbox'";?> class="form-check-input" type="radio" value="0">                      <label class="form-check-label">Ẩn hiện</label>
                    </div>                 
                  </div>
                  <!-- hien thi san pham vao bo suu tap-->
                  <div class="form-group">
                 
                  <label>Hiển thị sản phẩm khuyến mãi</label>
                    <div class="form-check">
                    <input <?php if($row_product["new"]==1) echo "checked='checkbox'";?> class="form-check-input" type="radio" value="1">                      <label class="form-check-label">Hiển hị</label>
                      </br>
                      <input <?php if($row_product["inCollection"]==0) echo "checked='checkbox'";?> class="form-check-input" type="radio" value="0">                      <label class="form-check-label">Ẩn hiện</label>
                    </div>                 
                  </div>
                  <!-- noi dung chi tiet san pham-->
                  <div>
                <label>Nội dung chi tiết</label>
                <div class="input-group">                 
                <textarea class="form-control" name="description" id="editor1" rows="10" cols="80"><?php echo $row_product ['description']  ?></textarea>
                <script>    CKEDITOR.replace( 'editor1' );</script>

                  <div class="input-group-append">
                  </div>
                  </div>
                </div>


                 

                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" name="btncapnhat" id="btncapnhat"  class="btn btn-primary">Cập Nhật</button>
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