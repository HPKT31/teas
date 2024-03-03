<?php 
class voucherModel extends CoreModel{
    public function checkVoucher($sale){
        $voucher = $this->db->pdo_query_one("SELECT * FROM discounts WHERE code = ?",$sale);
        if(!$voucher) return false;

        if($voucher['quality']<=0) return false;

        $now = new DateTime();
        if(!(new DateTime($voucher['start_date'])<= $now && $now <= new DateTime($voucher['end_date']))){
            return false;
        }
        return true;
         
    }
   
   
}