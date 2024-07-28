<?php
    class AdminDanhMucController {
        public $modelDanhMuc;

        public function __construct(){
            $this->modelDanhMuc = new AdminDanhMuc();
        }
        public function danhSachDanhMuc(){

            $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

            require_once './views/danhmuc/listDanhMuc.php';
        }
        public function formAddDanhMuc(){
            // Hiển thị form
            require_once './views/danhmuc/addDanhMuc.php';

        }
        public function postAddDanhMuc(){
            // Hiển thị xử lý dl
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $mo_ta = $_POST['mo_ta'];

            }
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['$ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            if (empty($errors)) {
                # code...
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header("location:".BASE_URL_ADMIN. '?act=danh-muc');
                exit();
            }else{
                require_once './views/danhmuc/addDanhMuc.php';
            }
        }
        public function formEditDanhMuc(){
            // Hiển thị form
            $id = $_GET['id_danh_muc'];
            $danhMuc = $this->modelDanhMuc->getOneDanhMuc($id);
            if($danhMuc){
                require_once './views/danhmuc/editDanhMuc.php';
            }else{
                header("location:".BASE_URL_ADMIN. '?act=danh-muc');
                exit();
            }
           
            

        }
        public function postEditDanhMuc(){
            // Hiển thị xử lý dl
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id = $_POST['id'];
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $mo_ta = $_POST['mo_ta'];

            }
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['$ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
            if (empty($errors)) {
                # code...
                $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
                header("location:".BASE_URL_ADMIN. '?act=danh-muc');
                exit();
            }else{
                $danhMuc = ['id ' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once './views/danhmuc/editDanhMuc.php';
            }
        }
        public function DeleteDanhMuc(){
            $id = $_GET['id_danh_muc'];

            $danhMuc = $this->modelDanhMuc->getOneDanhMuc($id);

            if($danhMuc){
                $this->modelDanhMuc->destroyDanhMuc($id);
            }
                header("location:".BASE_URL_ADMIN. '?act=danh-muc');
                exit();
            
        }
    }