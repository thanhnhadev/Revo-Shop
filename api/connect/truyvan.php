<?php 
function Danhsachsanpham()
{
      $sql = "SELECT p.id,p.name as name ,p.id_type as idType, t.name as nameType, p.price, p.color, p.material, p.description, GROUP_CONCAT(i.link) AS images FROM product p LEFT JOIN images i ON p.id = i.id_product inner join product_type t ON t.id = p.id_type group by p.id";
    return mysql_query($sql);

}
function ThemSanPham()
{
    
}
function Loaisanpham()
{
    $sql ="SELECT * FROM product_type";
    return mysql_query($sql);
}
 function Chitiettheloai($id)
 {
    $sql = "SELECT * FROM product_type
            WHERE id='$id'";
            $row= mysql_query($sql);
         return mysql_fetch_array($row);
 }

 // cập nhật thông tin liên hệ
 

?>