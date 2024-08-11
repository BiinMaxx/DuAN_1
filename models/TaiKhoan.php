<?php
class TaiKhoan
{
    public $conn;

    public function __construct()
    {

        $this->conn = connectDB();
    }

    public function checkLogin($email, $mat_khau){
        try{
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['chuc_vu_id'] == 2 ) {
                    if ($user['trang_thai'] == 1) {
                        return $user;
                    }else {
                        return "Tài khoản bị cấm";  
                    }   
                }else{
                    return "Tài khoản không có quyền đăng nhập";
                }
            }else {
                return "Lỗi đăng nhập. Hãy nhập lại thông tin tài khoản và mật khẩu";
            }
        }catch (\Exception $e) {
                echo "lỗi" . $e->getMessage();
                return false;
        }
    }

    
}