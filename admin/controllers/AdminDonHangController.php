<?php

    class AdminDonHangController {

        public $modelDonHang;

        public function __construct(){

            $this->modelDonHang = new AdminDonHang();

        }
        public function danhSachDonHang(){

            $listDonHang = $this->modelDonHang->getAllDonHang();

            require_once './views/donhang/listDonHang.php';
        }
        public function detailDonHang()
        {
            $don_hang_id = $_GET['id_don_hang'];

            // Lấy thông tin đơn hàng ở bản don_hangs

            $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
            
            // Lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng chi_tiet_don_hangs

            $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);

            $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
            
            require_once './views/donhang/detailDonHang.php';

        }
        public function formEditDonHang()
        {

            $id = $_GET['id_don_hang'];
            $donHang = $this->modelDonHang->getDetailDonHang($id);
            $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
            if ($donHang) {
                require_once './views/donhang/editDonHang.php';
                deleteSessionError();
            } else {
                header("Location:" .BASE_URL_ADMIN, '?act-don-hang');
                exit();
            }
            }
        


        public function postEditDonHang(){
            // Hiển thị xử lý dl
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Lấy ra dữ liệu

                $don_hang_id = $_POST['don_hang_id'] ?? '';
                $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
                $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
                $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
                $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
                $ghi_chu = $_POST['ghi_chu'] ?? '';
                $trang_thai_id = $_POST['trang_thai_id'] ?? '';

                // $hinh_anh = $_FILES['hinh_anh'] ?? null;

                // //save hinh anh 
                // $file_thumb = uploadFile($hinh_anh,'./uploads/');

                // $img_array = $_FILES['img_array'];
            
            $errors = [];
            if (empty($ten_nguoi_nhan)) {
                $errors['$ten_nguoi_nhan'] = 'Tên người nhận không được để trống';
            }
            if (empty($sdt_nguoi_nhan)) {
                $errors['$sdt_nguoi_nhan'] = 'SDT người nhận không được để trống';
            }
            if (empty($email_nguoi_nhan)) {
                $erros['$email_nguoi_nhan'] = 'Email người nhận không được để trống';
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $errors['$dia_chi_nguoi_nhan'] = 'Địa chỉ người nhận không được để trống';
            }
            if (empty($trang_thai_id)) {
                $errors['$trang_thai_id'] = 'Trạng thái đơn hàng';
            }

            $_SESSION['error'] = $errors;
            // var_dump(error);die;
            // Nếu ko có lỗi thì tiến hành sửa
            if (empty($errors)) {
                
                $this->modelDonHang->updateDonHang($don_hang_id,$ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id,);
                header("location:".BASE_URL_ADMIN. '?act=don-hang');
                exit();
            }else{
                // dat chi thi xoa session 
                $_SESSION['flash']= true;
                header("Location: " .BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
                exit();
            }
        }
    }
        // public function formEditDanhMuc(){
        //     // Hiển thị form
        //     $id = $_GET['id_danh_muc'];
        //     $danhMuc = $this->modelDanhMuc->getOneDanhMuc($id);
        //     if($danhMuc){
        //         require_once './views/danhmuc/editDanhMuc.php';
        //     }else{
        //         header("location:".BASE_URL_ADMIN. '?act=danh-muc');
        //         exit();
        //     }
        // }
        // public function postEditDanhMuc(){
        //     // Hiển thị xử lý dl
        //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //         $id = $_POST['id'];
        //         $ten_danh_muc = $_POST['ten_danh_muc'];
        //         $mo_ta = $_POST['mo_ta'];

        //     }
        //     $error = [];
        //     if (empty($ten_danh_muc)) {
        //         $error['$ten_danh_muc'] = 'Tên danh mục không được để trống';
        //     }
        //     if (empty($error)) {
        //         # code...
        //         $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
        //         header("location:".BASE_URL_ADMIN. '?act=danh-muc');
        //         exit();
        //     }else{
        //         $danhMuc = ['id ' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
        //         require_once './views/danhmuc/editDanhMuc.php';
        //     }
        // }
        // public function DeleteDanhMuc(){
        //     $id = $_GET['id_danh_muc'];

        //     $danhMuc = $this->modelDanhMuc->getOneDanhMuc($id);

        //     if($danhMuc){
        //         $this->modelDanhMuc->destroyDanhMuc($id);
        //     }
        //         header("location:".BASE_URL_ADMIN. '?act=danh-muc');
        //         exit();
            
        // }
    
}