<?php
require "../connect/DbCon.php";
require "../connect/truyvan.php";
?>
<?php
$id = $_GET['id'];
// ép kiểu về dạng sô
settype($id, "int" );
$row_DonHang = Chitietdonhang($id);
?>
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
            <h1>Thông tin chi tiết đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thông tin chi tiết đơn hàng</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <div class="invoice p-3 mb-3">
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fa fa-globe"></i> Thông tin khách hàng.                  
                  </h4>
                </div>
              </div>
              <div class="row invoice-info">
              
                <div class="col-sm-4 invoice-col">
                 
                  <address>
                    <strong>Họ và tên:</strong><br>
                    <strong>Địa thoại:</strong><br>
                    <strong>Điện chỉ liên hệ:</strong><br>                  
                  </address>
                </div>
                <div class="col-sm-4 invoice-col">
               
                  <address>
                  <?php echo $row_DonHang ['TenKH']  ?><br>
                  <?php echo $row_DonHang ['Dienthoai']  ?><br>
                  <?php echo $row_DonHang ['DiaChi']  ?><br>
                  </address>
                </div>
               
              </div>

              <!-- Thong tin san pham -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên Sản phẩm</th>
                      <th>Chất liệu</th>
                      <th>Giá</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td><?php echo $row_DonHang ['TenSP']  ?></td>
                      <td><?php echo $row_DonHang ['Chatlieu']  ?></td>
                      <td><?php echo $row_DonHang ['Gia']  ?>$</td>
                                          </tr>
                
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <p class="lead">Phương thức thanh toán:</p>
                  <img src="../dist/img/credit/visa.png" alt="Visa">
                  <img src="../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../dist/img/credit/paypal2.png" alt="Paypal">

              
                </div>
                <div class="col-6">
                  <p class="lead"> <?php echo $row_DonHang ['Ngaythanhtoan']  ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Tạm tính:</th>
                        <td><?php echo $row_DonHang ['Gia']  ?>$</td>
                      </tr>
                      <tr>
                        <th>Thuế:</th>
                        <td>0%</td>
                      </tr>
                      <tr>
                        <th>Chi phí giao hàng:</th>
                        <td>0$</td>
                      </tr>
                      <tr>
                        <th>Tổng:</th>
                        <td><?php echo $row_DonHang ['Gia']  ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>           
            </div>
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
