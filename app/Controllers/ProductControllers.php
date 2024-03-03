
<?php
class ProductControllers extends PageControllers{
    // protected $product;

    public function __construct(){
            $this->product = $this->loadModel('Product');
    }

    public function product(){
        $data['productList'] = $this->product->get_allPr();
        $this->loadView('product',$data);
    }
    public function details($id){
        $data['productdetail'] = $this->product->product_get_one($id);
        // $data['NewPR'] = $this->product->get_strore();
        $this->loadView('productdetail',$data);
    }
    public function oder(){
        $this->loadView('oder_product');
    }
    public function tocare($tea_id){
        // echo 'da them ma'.$tea_id;
        if(isset($_SESSION['user'])){
            $MATK = $_SESSION['user']['customer_id'];
            $Oder = $this->loadModel('Oder');
            $cart = $Oder->getCartbyUser($MATK);
            if(!$cart){
                $Oder->addcart($MATK);
                $cart= $Oder->getCartbyUser($MATK);
            }
            $Oder->addProduct($cart['order_id'],$tea_id);
        }else{
            //chua co gio hang
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart']=[];
            }
                $searchPr =false;
                $i=0;
                foreach($_SESSION['cart'] as $Pr){
                    if($Pr['tea_id'] == $tea_id){
                        $_SESSION['cart'][$i]['Count']++;
                        $searchPr = true;
                        break;
                    }
                    $i++;
                }
                //co gio hang
                if(!$searchPr){
                    array_push($_SESSION['cart'],["
                    tea_id"=>$tea_id, "Count"=>1]);
                }
            
        }
       header('location:'.APP_URL);
    

    }
    // public function Cart(){
    //     $order = $this->loadModel('Oder');
    //     $cart = [];
    //     if(isset($_SESSION['user'])){
    //         $cart = $order->getProductInCart($_SESSION['user']['customer_id']);
    //     }
    //     $data['cart'] = $cart;
    //     $this->loadView('oder_product',$data);
    // }
    public function Cart() {
        // print_r($_SESSION['cart'][0]['MaSP']);
        $cart = [];
        $order = $this->loadModel('Oder');
        // da dang nhap -> load cart tu database
        if(isset($_SESSION['user'])) {
            $data['cart'] = $order->getProductInCart($_SESSION['user']['customer_id']);
            $cart =  $data['cart'];
            // var_dump($cart[0]['Inventario']);
            if(isset($cart[0]['Inventario'])){
                $data['voucher'] = $order->getbyid($cart[0]['Inventario']);
            }
        }else {
            if(empty($_SESSION['cart'])){
                $data['cart'] = [];
            }else {
                $data['cart'] = $this->product->getCartNoAccount($_SESSION['cart']);
            }
        }
        // chua dang nhap -> load cart tu session va database
        $this->loadView('oder_product', $data);
    }
    public function cartItem($MaDH,$MaSP,$loai){
        $oder=$this->loadModel('Oder');
        if($loai == 'more'){
            $oder->increItem($MaDH,$MaSP);

        }elseif($loai=='delete'){
            $oder->delete($MaDH,$MaSP);
        }
        else{
            $oder->decreItem($MaDH,$MaSP);
        }
       header("location:".APP_URL.'/product/Cart');
    }
   
    // public function cartItemnoacout($id, $action) {
    //     // Lấy thông tin sản phẩm từ $tea_id
        

    //     $product = $this->product->product_get_one($id);
    
       
    
    //     // Lấy giỏ hàng từ session hoặc database
    //     $cart = $_SESSION['cart'];
    
    //     // Xử lý logic tăng số lượng sản phẩm bằng ss
    //     if ($action == 'increase') {
    //         // Kiểm tra xem số lượng đã đạt đến giới hạn chưa
    //         if ($product['Count'] < $product['stock_quantity']) {
    //             // Tăng số lượng sản phẩm
    //             $product['Count']++;
    //             // Cập nhật lại giỏ hàng
    //             $this->updateCart($product);
    //         }
    //     } else {
    //         // Xử lý logic thêm và giảm số lượng sản phẩm như cũ
    //         if ($action == 'more') {
    //             // Thêm số lượng sản phẩm
    //             $product['Count']++;
    //         } elseif ($action == 'less' && $product['Count'] > 1) {
    //             // Giảm số lượng sản phẩm, nhưng không dưới 1
    //             $product['Count']--;
    //         }
    //         // Cập nhật lại giỏ hàng
    //         $this->updateCart($product);
    //     }
    
    //     // Chuyển hướng hoặc cập nhật giỏ hàng
    //     header("Location: " . APP_URL . "/product/Cart");
    // }
    
  

}