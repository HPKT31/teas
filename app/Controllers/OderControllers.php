<?php
class OderControllers extends CoreControllers{
    public function __construct(){
      $this->oder = $this->loadModel('Oder');
    }
    
    public function addVoucher(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $oder = $this->loadModel('Oder');
            $voucher = $this->loadModel('voucher');
        
           if($voucher->checkVoucher($_POST['voucher'])){
            $oder->addVouchers($_POST['MaDH'],$_POST['voucher']);
           }else {
                error('mã giảm giá không đủ điều kiện', 'danger');
            }
        }
        header('location:'.APP_URL.'product/Cart');

    }
    public function addOrder(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $oder = $this->loadModel('Oder');
            if($_POST['TongTien']>0){
                $oder->addOrder($_POST['order_id'], $_POST['TongTien'], $_POST['Count']);
                error("Đặt hàng thành công","success");
                header('Location: '.APP_URL.'');
            }else{
                error('vui lòng mua hàng gia ko âm','danger');
            }
           
        }
    }
    public function tracking(){
        $oder= $this->loadModel('oder');
        $id = $_SESSION['user']['customer_id'];
        $data['list'] = $oder->getoderbyuser($id);
       
        $this->loadView('flowproduct',$data);
        
    }
    public function deleteoder($id)
    {
        if ($id) {
            $this->oder->deleteoderp($id);
            $this->tracking();
        }
    }
}