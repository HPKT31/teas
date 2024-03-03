<?php

class PageControllers extends CoreControllers
{
    protected $product;
    public function __construct(){
        $this->product = $this->loadModel('Product');
}
    public function index(){
        $data['productList'] = $this->product->get_allPr();
        $stro['producStrore'] = $this->product->get_strore();
        $this->loadview('home',$data,$stro);

    }
    public function contact(){
        $this->loadview('contact');
    }
    public function error(){
        $this->loadview('404');
    }
    public function strore(){
        $data['productList'] = $this->product->get_allPr();
        $stro['producStrore'] = $this->product->get_strore();
        $this->loadview('strore',$data,$stro);
    }
    public function product(){
        $this->loadview('product');
    }
    public function about(){
        $this->loadview('about');
    }
    public function productdetail(){
        $this->loadview('productdetail');
    }
    

}