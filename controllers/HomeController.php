<?php 

class HomeController
{
    public $modelSanPham;
    public function __construct(){

        $this->modelSanPham = new SanPham();

    }
    public function home(){
        echo "Đây là Home";
    }
    public function trangChu(){

    }
    public function danhSachSanPham(){
        $listProduct = $this->modelSanPham->getAllProduct();

        require_once './views/listProduct.php';
    }
}