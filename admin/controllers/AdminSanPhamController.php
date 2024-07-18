<?php
    class AdminSanPhamController {
        public $modelDanhMuc;
        public $modelSanPham;

        public function __construct(){
            $this->modelSanPham = new AdminSanPham();
            $this->modelDanhMuc = new AdminDanhMuc();
        }
        public function danhSachSanPham(){

            $listSanPham = $this->modelSanPham->getAllSanPham();

            require_once './views/sanpham/listSanPham.php';
        }
        public function formAddSanPham(){
            // Hiển thị form
            $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
            require_once './views/sanpham/addSanPham.php';

            deleteSessionError();

        }
        public function postAddSanPham(){
            // Hiển thị xử lý dl
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $ten_san_pham = $_POST['ten_san_pham'] ?? '';
                $gia_san_pham = $_POST['gia_san_pham'] ?? '';
                $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
                $so_luong = $_POST['so_luong'] ?? '';
                $danh_muc_id = $_POST['danh_muc_id'] ?? '';
                $trang_thai = $_POST['trang_thai'] ?? '';
                $ngay_nhap = $_POST['ngay_nhap'] ?? '';
                $mo_ta = $_POST['mo_ta'] ?? '';

                $hinh_anh = $_FILES['hinh_anh'] ?? null;

                //save hinh anh 
                $file_thumb = uploadFile($hinh_anh,'./uploads/');

                $img_array = $_FILES['img_array'];
            }
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['$ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['$gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $erros['$gia_khuyen_mai'] = 'Giá km sản phẩm không được để trống';
            }
            if (empty($so_luong)) {
                $errors['$so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['$danh_muc_id'] = 'Danh mục sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['$ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['$trang_thai'] = 'Trạng thái sản phẩm không được để trống';
            }
            if ($hinh_anh['error'] !== 0) {
                $errors['$hinh_anh'] = 'Chọn ảnh';
            }

            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                # code...
                $this->modelSanPham->insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $danh_muc_id, $ngay_nhap, $trang_thai,$mo_ta,$file_thumb);
                header("location:".BASE_URL_ADMIN. '?act=san-pham');
                exit();
            }else{
                // dat chi thi xoa session 
                $_SESSION['flash']= true;
                header("Location: " .BASE_URL . '?act=form-them-san-pham');
                exit();
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
    //     public function postEditDanhMuc(){
    //         // Hiển thị xử lý dl
    //         if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //             $id = $_POST['id'];
    //             $ten_danh_muc = $_POST['ten_danh_muc'];
    //             $mo_ta = $_POST['mo_ta'];

    //         }
    //         $error = [];
    //         if (empty($ten_danh_muc)) {
    //             $error['$ten_danh_muc'] = 'Tên danh mục không được để trống';
    //         }
    //         if (empty($error)) {
    //             # code...
    //             $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
    //             header("location:".BASE_URL_ADMIN. '?act=danh-muc');
    //             exit();
    //         }else{
    //             $danhMuc = ['id ' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
    //             require_once './views/danhmuc/editDanhMuc.php';
    //         }
    //     }
    //     public function DeleteDanhMuc(){
    //         $id = $_GET['id_danh_muc'];

    //         $danhMuc = $this->modelDanhMuc->getOneDanhMuc($id);

    //         if($danhMuc){
    //             $this->modelDanhMuc->destroyDanhMuc($id);
    //         }
    //             header("location:".BASE_URL_ADMIN. '?act=danh-muc');
    //             exit();
            
    //     }
    }