<?php
class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang = new AdminDonHang();
        $this->modelSanPham = new AdminSanPham();
    }

    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);

        require_once './views/taikhoan/quantri/listQuanTri.php';
    }
    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';

        deleteSessionError();
    }
    public function postAddQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
        }
        $errors = [];
        if (empty($ho_ten)) {
            $errors['$ho_ten'] = 'Tên không được để trống';
        }
        if (empty($email)) {
            $errors['$email'] = 'Email không được để trống';
        }

        $_SESSION['error'] = $errors;

        if (empty($errors)) {
            # code...
            $password = password_hash('123123', PASSWORD_BCRYPT);

            $chuc_vu_id = 1;
            $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);

            header("location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        } else {
            $_SESSION['flash'] = true;
            header("location:" . BASE_URL_ADMIN . '?act=form-them-quan-tri');
            exit();
        }
    }

    public function formEditQuanTri()
    {
        $id_quan_tri = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);

        require_once './views/taikhoan/quantri/editQuanTri.php';

        deleteSessionError();
    }

    public function postEditQuanTri()
    {
        // Hiển thị xử lý dl
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu

            $quan_tri_id = $_POST['quan_tri_id'] ?? '';


            $email = $_POST['email'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';


            // $hinh_anh = $_FILES['hinh_anh'] ?? null;

            // //save hinh anh 
            // $file_thumb = uploadFile($hinh_anh,'./uploads/');

            // $img_array = $_FILES['img_array'];

            $errors = [];
            if (empty($ho_ten)) {
                $errors['$ho_ten'] = 'Tên người nhận không được để trống';
            }
            if (empty($email)) {
                $errors['$email'] = 'Email không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['$trang_thai'] = 'Trang thai không được để trống';
            }


            $_SESSION['error'] = $errors;

            if (empty($errors)) {

                $this->modelTaiKhoan->updateTaiKhoan($quan_tri_id, $ho_ten, $email, $so_dien_thoai, $trang_thai,);
                header("location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                // dat chi thi xoa session 
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quan_tri_id);
                exit();
            }
        }
    }
    public function resetPassword()
    {
        $tai_khoan_id = $_GET['id_quan_tri'];
        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);

        $password = password_hash('123123', PASSWORD_BCRYPT);

        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);

        if ($status && $tai_khoan['chuc_vu_id'] == 1) {
            header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit;
        } elseif ($status && $tai_khoan['chuc_vu_id'] == 2) {
            header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
            exit;
        } else {
            var_dump('Error while resetting password');
            die;
        }
    }

    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);

        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }
    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        require_once './views/taikhoan/khachhang/editKhachHang.php';

        deleteSessionError();
    }
    public function postEditKhachHang()
    {
        // Hiển thị xử lý dl
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu

            $khach_hang_id = $_POST['khach_hang_id'] ?? '';


            $email = $_POST['email'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';


            // $hinh_anh = $_FILES['hinh_anh'] ?? null;

            // //save hinh anh 
            // $file_thumb = uploadFile($hinh_anh,'./uploads/');

            // $img_array = $_FILES['img_array'];

            $errors = [];
            if (empty($ho_ten)) {
                $errors['$ho_ten'] = 'Tên người nhận không được để trống';
            }
            if (empty($email)) {
                $errors['$email'] = 'Email không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['$trang_thai'] = 'Trang thai không được để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['$trang_thai'] = 'Trang thai không được để trống';
            }
            if (empty($gioi_tinh)) {
                $errors['$trang_thai'] = 'Trang thai không được để trống';
            }
            if (empty($dia_chi)) {
                $errors['$trang_thai'] = 'Trang thai không được để trống';
            }


            $_SESSION['error'] = $errors;

            if (empty($errors)) {

                $this->modelTaiKhoan->updateKhachHang($khach_hang_id,$ho_ten,$email,$so_dien_thoai,$trang_thai,$ngay_sinh,$gioi_tinh,$dia_chi);
                header("location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            } else {
                // dat chi thi xoa session 
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khach_hang_id);
                exit();
            }
        }
    }
    public function detailKhachHang(){
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);

        require_once './views/taikhoan/khachhang/detailKhachHang.php';
    }

    public function formLogin(){
        require_once './views/auth/formLogin.php';

        deleteSessionError();
    }
    public function Login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy email và pass gửi lên form
            $email = $_POST['email'];
            $password = $_POST['password'];
 
            // var_dump($password);die;    

            $user = $this->modelTaiKhoan->checkLogin($email,$password);

            if ($user == $email) {
               $_SESSION['user_admin'] = $user;
               header("Location:" .BASE_URL_ADMIN);
               exit();
            }else {
                $_SESSION['erorr'] = $user;

                $_SESSION['flash'] = true;

                header("Location:". BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }
    public function Logout(){
        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);

            header("Location: " .BASE_URL_ADMIN .'?act=login-admin');
        }
    }

}
