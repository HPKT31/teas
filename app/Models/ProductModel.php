<?php
class ProductModel extends CoreModel
{
    // protected $db;

    // public function __construct(){
    //     $this->$db = new Database();
    // }
 public function get_allPr(){
        $sql="SELECT * FROM teas WHERE 	category_id = 3";
        return $this->db->pdo_query($sql);
    }
    public function get_strore(){
        $sql="SELECT * FROM teas  ";
        return $this->db->pdo_query($sql);
    }

    // public function Pr_new(){
    //     $sql="SELECT * FROM sanpham ORDER BY Datesubmitted DESC limit 3";
    //     return  $this->db->pdo_query($sql);
    // }
    public function __destruct(){
        unset($this->db);
    }
    public function product_get_one($id){
        $sql = "SELECT * FROM teas WHERE tea_id=".$id;
        return $this->db->pdo_query($sql);
    }
    public function getCartNoAccount($cart) {
  
        $arrayId = array_column($cart,'Count');
        $arrayIdNew= implode(",",$arrayId);
        $ds = $this->db->pdo_query("SELECT * FROM teas WHERE tea_id IN ($arrayIdNew)");
        
      
        $voucher = array_map(function($dsItem, $cartItem) {
        $dsItem = is_array($dsItem) ? $dsItem : [];
        $cartItem = is_array($cartItem) ? $cartItem : [];
            return $dsItem + $cartItem;
        },  $ds, $cart);
      
        return $voucher;
    }
    

   
}