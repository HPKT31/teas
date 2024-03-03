<?php
class UserModel extends CoreModel
{
    // protected $db;
    // public function __construct()
    // {
    //     $this->db = new Database();
    //     //phuong thuc chay dau tien
    // }
    // public function __destruct()
    // {
    //     unset($this->db);
    //     // ngat ket noi db 
    // }
    public function user()
    {
        $sql = "SELECT * FROM customer";
        return $this->db->pdo_query_one($sql);
    }
    public function userd($email)
    {
       
        return $this->db->pdo_query("SELECT * FROM customers where email =?",$email);
    }
    
    public function userlogin($email, $password)
    {
        return $this->db->pdo_query_one("SELECT * FROM customers where email=? AND pass=?",$email, $password);
    }

    public function userRegister($first,$last,$email, $password,$img)
    {
        return $this->db->pdo_query("INSERT INTO customers(`first_name`,`last_name`,`email`,`pass`,`img`) VALUES(?,?,?,?,?)",$first,$last, $email, $password,$img);
    }
    public function upprofile($first, $last, $email, $address, $img, $id){
        return $this->db->pdo_execute("UPDATE customers SET `first_name`= ?, `last_name`= ?, `email`= ?, `address`= ?, `img`= ? WHERE `customer_id` = ?", $first, $last, $email, $address, $img, $id);
    }
    public function getbyiduser($id){
        return  $this->db->pdo_query("SELECT * FROM customers WHERE customer_id  = ?",$id);

    }
    
    // public function isEmailInUse($email) {
    //     return $this->db->pdo_query("SELECT COUNT(*) FROM customers WHERE email = ".$email) ;
        
    // }
    // public function prepare($sql) {
    //     return $this->pdo->prepare($sql);
    // }
    public function checkmail($email){
        return $this->db->pdo_query_one("SELECT * FROM  customers WHERE email= ? ",$email);
    }
    public function genOTP($email){
        $OTP =rand(100000,999999);
        $now = new DateTime();
        $now->add(new DateInterval("PT5M"));
        $HanOTP = $now->format("Y-m-d H:i:s");
          $this->db->pdo_execute("UPDATE customers SET OTP=?, dateOTP=? WHERE email= ? ",$OTP,$HanOTP,$email );
        return $OTP;
    }
    public function restPass($pass,$OTP){
        $now =date("Y-m-d H:i:s");
        $kq= $this->db->pdo_query_one("SELECT * FROM  customers WHERE OTP=? AND dateOTP >=? ",$OTP,$now);
        if($kq){
            $this->db->pdo_execute("UPDATE customers SET  pass = ? WHERE OTP=?",$pass,$OTP);
            return true;
        }else{
            return false;
        }

    }
}