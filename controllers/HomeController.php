<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;

    public function __construct()
    {

        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();



    }
    public function home()
    {

        $listSanPham = $this->modelSanPham->getAllSanPham();

        require_once './views/home.php';
    }
    public function trangChu()
    {

    }

    public function chiTietSanPham()
    {
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

    public function formLogin()
    {
        require_once './views/auth/formLogin.php';

        deleteSessionError();
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            // var_dump($password);die;

            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if ($user == $email) {

                $_SESSION['user_client'] = $user;
                header("Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;

                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL . '?act=login');
                exit();
            }

        }
    }

    public function Logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);

            header("Location: " . BASE_URL . '?act=login');
        }

    }
    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }

                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                if (!is_array($chiTietGioHang)) {
                    $chiTietGioHang = []; // Đảm bảo nó là một mảng
                }

                foreach ($chiTietGioHang as $detail) {
                    if (isset($detail['san_pham_id']) && $detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }


                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }
                 header("Location: ". BASE_URL.'?act=gio-hang');
            } else {
                header("Location: ". BASE_URL. '?act=login');
            }
        }
    }
    public function gioHang(){
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/gioHang.php';
        } else {
            header("Location: ". BASE_URL. '?act=login');
        }
    }
    public function thanhToan(){
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/thanhToan.php';
        } else {
            header("Location: ". BASE_URL. '?act=login');
        }

    }
    public function postThanhToan(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
           $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
           $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
           $dia_chi_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
           $ghi_chu = $_POST['sdt_nguoi_nhan'];
           $tong_tien = $_POST['sdt_nguoi_nhan'];
           $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

           $ngay_dat = Date('Y-m-d');
           $trang_thai_id = 1;
            
           $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
           
           $tai_khoan_id = $user['id'];

           $ma_don_hang = 'DH' . rand(1000,9999);

           //Thêm thông tin vào db
           $this->modelDonHang->addDonHang(
                $tai_khoan_id, 
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $trang_thai_id,
                $ma_don_hang,
           );
           var_dump('Thêm thành công'); die;
        }
    }
}
