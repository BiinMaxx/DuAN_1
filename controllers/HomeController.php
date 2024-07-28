<?php 

class HomeController
{
    public $modelSanPham;
    public function __construct(){

        $this->modelSanPham = new SanPham();

    }
    public function home(){
        require_once './views/client/home.php';
    }
    public function trangChu(){

    }
    public function danhSachSanPham(){
        $listProduct = $this->modelSanPham->getAllProduct();

        require_once './views/listProduct.php';
    }
}