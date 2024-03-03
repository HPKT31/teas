<?php
class AdminModel extends CoreModel{
    public function getuser(){
        return $this->db->pdo_query("SELECT * FROM customers"); 
    }
    public function deteleadmin($id){
        return $this->db->pdo_execute("DELETE FROM `customers` Where customer_id = ? ",$id);
    }
    public function update($userName,$userEmail,$img,$taik,$userId){
        return $this->db->pdo_execute("UPDATE `customers` SET  first_name = ?,last_name = ?,email = ?,img= ? WHERE customer_id =?",$userName,$taik,$userEmail,$img,$userId);
    }
    public function GetProductAd($name)
    {
        return $this->db->pdo_query("SELECT * FROM customers WHERE email LIKE '%$name%' order by customer_id  desc");
        // var_dump($kq);exit;
    }
    public function allbill(){
        return $this->db->pdo_query("SELECT * FROM orders"); 
    }
    public function product(){
        return $this->db->pdo_query("SELECT * FROM teas"); 
    }
    public function getoderbyuser(){
        return $this->db->pdo_query("SELECT * FROM orders WHERE  statuses!='giohang'");
    }
    public function userd($email)
    {
       
        return $this->db->pdo_query("SELECT * FROM customers  where email =?",$email);
    }
    public function userRegister($fist,$last,$email,$pass,$img,$role,$address)
    {
        return $this->db->pdo_query("INSERT INTO customers(`first_name`,`last_name`,`email`,`pass`,`img`,`role`,`address`) VALUES(?,?,?,?,?,?,?)",$fist,$last, $email, $pass,$img,$role,$address );
    }
    public function deleteoderp($id){
        return $this->db->pdo_execute("UPDATE orders SET statuses='huydon' Where order_id = ? ",$id);
    }
    public function deteleproadmin($id){
        return $this->db->pdo_execute("DELETE FROM `teas` Where tea_id = ? ",$id);
    }
    public function cartelory(){
        return  $this->db->pdo_query("SELECT * FROM tea_categories");
    }
    public function addproduct($tenSanPham, $danhMuc, $giaBan,$mota,$soLuong,$target_file){
        return $this->db->pdo_execute("INSERT INTO teas ( `tea_name`, `tea_img`, `description`, `price`, `stock_quantity`, `category_id`)VALUES(?,?,?,?,?,?)",$tenSanPham,$target_file,$mota, $giaBan,$soLuong,$danhMuc);
    }
    public function updateproduct($tensp,$gia,$soLuong,$imgsp,$id){
        return $this->db->pdo_execute("UPDATE teas SET tea_name = ?, price = ?, stock_quantity = ?, tea_img = ? WHERE tea_id = ?", $tensp, $gia, $soLuong, $imgsp, $id);
    }
   
}

