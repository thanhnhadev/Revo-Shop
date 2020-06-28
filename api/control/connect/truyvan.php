<?php 
function Danhsachsanpham()
{
      $sql = "SELECT p.id,p.name as name ,p.id_type as idType, t.name as nameType, p.price, p.color, p.material, p.description,p.Imgs, GROUP_CONCAT(i.link) AS images FROM product p LEFT JOIN images i ON p.id = i.id_product inner join product_type t ON t.id = p.id_type where p.xoa = 0 group by p.id";
    return mysql_query($sql);

}
// hien thi chi tiet san pham
function Chitietsanpham($id)
{
   $sql = "SELECT * FROM product
           WHERE id='$id'";
           $row= mysql_query($sql);
        return mysql_fetch_array($row);
}
// hien thi danh muc san pham
function DanhMucSanPham()
{
  $sql="select * from product_type WHERE product_type.xoa = 0";
  return mysql_query($sql);
}
function AllDanhMucSanPham()
{
        $sql="select * from product_type";
        return mysql_query($sql);
}
//hien tiet danh muc san pham
function Chitiettheloai($id)
 {
    $sql = "SELECT * FROM product_type
            WHERE id='$id'";
            $row= mysql_query($sql);
         return mysql_fetch_array($row);
 }

 // hiển thị danh sách khách hàng
 function Danhsachkhachhang()
 {
   $sql="select * from users";
   return mysql_query($sql);
 }
 // chi tiet thong tin khach hang
 function Chitietkhachhang($id)
 {
        
        $sql = "
        SELECT * FROM users
        WHERE id='$id'
        ";
        $row= mysql_query($sql);
     return mysql_fetch_array($row);
 }
 
 // hien thi don hang
 function Danhsachdonhang()
 {
        $sql="SELECT p.id as MaDH,p.id_customer as Makh,p.date_order as Ngaydathang,p.total as Tongtien,p.status as Tinhtrang ,i.name as TenKH FROM bill p LEFT JOIN users i on p.id_customer = i.id
        ";
        return mysql_query($sql);
 }
 // chi tiet don hang
 function Chitietdonhang($MaDH)
 {
        $sql = "SELECT b.id as MaDH, user.name as TenKH, user.phone as Dienthoai, user.address as DiaChi, b.id as Mabill, products.name as TenSP, products.description as Chatlieu, products.price as Gia, b.date_order as Ngaythanhtoan from users user JOIN bill_detail bd JOIN bill b JOIN product products on bd.id_bill = b.id and bd.id_product = products.id and user.id=b.id_customer WHERE b.id ='$MaDH'";
          $row= mysql_query($sql);
           return mysql_fetch_array($row);
 }
?>


