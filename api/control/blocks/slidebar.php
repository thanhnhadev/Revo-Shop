<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Quản trị App</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Xin chào:<?php echo $_SESSION["Name"]; ?></a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>          
          </li>

       <!--quan lý sản phẩm-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tag"></i>
              <p>
                Quản lý sản phẩm
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../danhmuc/index.php" class="nav-link">
                  <i class="fa fa-archive"></i>
                  <p>Quản lý danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../sanpham/index.php" class="nav-link">
                  <i class="fa fa-tag"></i>
                  <p>Quản lý sản phẩm</p>
                </a>
              </li>
           
            </ul>
          </li>
         <!--// quan ly san pham-->

         <!--quan ly don hang-->
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-barcode"></i>
              <p>
                Quản lý đơn hàng
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../donhang/index.php" class="nav-link">
                  <i class="fa fa-archive"></i>
                  <p>Đơn đặt hàng</p>
                </a>
              </li>
           
            </ul>
          </li>

          
         <!--// quan ly don hang-->

         <!--quan ly khach hang-->

          <li class="nav-item">
                <a href="../khachhang/index.php" class="nav-link">
                  <i class="fa fa-user"></i>
                  <p>Quản lý khách hàng</p>
                </a>
              </li>
<!--// quan ly khach hang-->
      
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>