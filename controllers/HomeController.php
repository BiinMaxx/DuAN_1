<?php 

class HomeController
{
    public $modelSanPham;
    public function __construct(){

        $this->modelSanPham = new SanPham();

    }
    public function home(){

        $listSanPham = $this->modelSanPham->getAllSanPham();

        require_once './views/home.php';
    }
    public function trangChu(){

    }

    public function chiTietSanPham(){
            // Hiển thị form
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamCungDanhMuc($sanPham['danh_muc_id']);
        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("location:" . BASE_URL);
            exit();
        }
    }
}
