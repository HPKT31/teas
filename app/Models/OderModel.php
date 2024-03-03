<?php
class OderModel extends CoreModel{
    public function getCartbyUser($MATK){
        return $this->db->pdo_query_one("SELECT * FROM orders WHERE customer_id= ? AND statuses ='giohang'",$MATK);
    }
    public function addCart($MATK){
        return $this->db->pdo_execute("INSERT INTO orders(`customer_id`) VALUE (?)",$MATK);
    }

    public function addProduct($cart, $tea_id){
        $hasCart = $this->hasCart($cart, $tea_id);
        if($hasCart){
            return $this->db->pdo_execute("UPDATE order_details SET quantity = quantity + 1 WHERE order_id=? AND tea_id =?", $cart, $tea_id);
        }else{
            return $this->db->pdo_execute("INSERT INTO order_details(`order_id`,`tea_id`) VALUES(?, ?)", $cart, $tea_id);
        }
    }

    public function hasCart($cart, $tea_id){
        return $this->db->pdo_query_one("SELECT * FROM order_details WHERE 	order_id=? AND tea_id=?", $cart, $tea_id);
    }

    public function getProductInCart($idAccount) {
        return $this->db->pdo_query("SELECT o.order_id,t.tea_id,t.tea_name,t.tea_img,t.price,de.quantity,t.stock_quantity,o.code AS Inventario  FROM orders o INNER JOIN order_details de ON de.order_id = o.order_id INNER JOIN teas t on t.tea_id = de.tea_id
         WHERE o.customer_id = ? AND o.statuses='giohang'",$idAccount);
    }
   public function increItem($MaDH,$MaSP){
    return $this->db->pdo_execute("UPDATE order_details SET quantity = quantity + 1 WHERE order_id=? AND tea_id=?",$MaDH,$MaSP);
   }
   public function decreItem($MaDH,$MaSP){
    return $this->db->pdo_execute("UPDATE order_details SET quantity = quantity - 1 WHERE order_id=? AND tea_id=?",$MaDH,$MaSP);
   }
   public function addVouchers($MaDH,$voucher){
    return $this->db->pdo_execute("UPDATE orders SET code = ? WHERE order_id = ?",$voucher,$MaDH);

   }
   public function getbyid($voucher){
    return $this->db->pdo_query("SELECT * FROM discounts WHERE 	code = ?",$voucher);
   }
   public function addOrder($order_id, $TongTien, $Count){
    $this->db->pdo_execute("UPDATE orders SET quantity=?, total_amount=?, order_date=?, statuses ='suly' WHERE order_id =?", $Count,$TongTien, date('y-m-d h:i:s'), $order_id);
    $this->db->pdo_execute("UPDATE order_details dt SET subtotal = (SELECT price FROM teas t WHERE dt.tea_id = t.tea_id) WHERE order_id=? ",$order_id);
}
    public function getoderbyuser($id){
        return $this->db->pdo_query("SELECT * FROM orders WHERE customer_id = ? AND statuses!='giohang'",$id);
    }
    public function delete($MaDH,$MaSP){
        return $this->db->pdo_execute("DELETE FROM `order_details` WHERE order_id=? AND tea_id=?",$MaDH,$MaSP);
    }
    public function deleteoderp($id){
        return $this->db->pdo_execute("UPDATE orders SET statuses='huydon' Where order_id = ? ",$id);
    }

  
}


