<?php 

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;

    public function __construct(){

        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();

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

            // if ($user == $email) {

            //     $_SESSION['user_client'] = $user;
            //     header("Location: " . BASE_URL);
            //     exit();
            // } else {
            //     $_SESSION['error'] = $user;

            //     $_SESSION['flash'] = true;

            //     header("Location: " . BASE_URL . '?act=login');
            //     exit();
            // }
            // Để hiển thị tên người đăng nhập
            
            if (is_array($user)) {
                $_SESSION['user_client'] = $user; // Lưu toàn bộ thông tin người dùng vào session
                header("Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;
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
}
