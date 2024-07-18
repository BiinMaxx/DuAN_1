<?php
    class AdminSanPham {
        public $conn;
        
        public function __construct(){

            $this->conn = connectDB();

        }
        public function getAllSanPham(){
            try{
                $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
                FROM san_phams 
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id'
                ;

                $stmt=  $this ->conn->prepare($sql);

                $stmt->execute();

                return $stmt->fetchAll();
                
            }catch(Exception $e){
                echo "Lỗi" . $e->getMessage();
            }
        }
        public function insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $danh_muc_id, $ngay_nhap, $trang_thai,$mo_ta,$hinh_anh){
            try{
                $sql = 'INSERT INTO san_phams (ten_san_pham, gia_san_pham, gia_khuyen_mai, so_luong, danh_muc_id, ngay_nhap, trang_thai,mo_ta)
                        VALUE (:ten_san_pham, :gia_san_pham, :gia_khuyen_mai, :so_luong, :danh_muc_id, :ngay_nhap, :trang_thai,:mo_ta)';

                $stmt=  $this ->conn->prepare($sql);

                $stmt->execute([
                    ':ten_san_pham'=> $ten_san_pham,
                    ':gia_san_pham'=> $gia_san_pham,
                    ':gia_khuyen_mai'=> $gia_khuyen_mai,
                    ':so_luong'=> $so_luong,
                    ':danh_muc_id'=> $danh_muc_id,
                    ':ngay_nhap'=> $ngay_nhap,
                    ':trang_thai'=> $trang_thai,
                    ':mo_ta'=> $mo_ta,
                ]
                    
                );

                return true;
                
            }catch(Exception $e){
                echo "Lỗi" . $e->getMessage();
            }
        }
        // public function getOneDanhMuc($id){
        //     try{
        //         $sql = 'SELECT * FROM danh_mucs WHERE id = :id';

        //         $stmt=  $this ->conn->prepare($sql);

        //         $stmt->execute([
        //             ':id'   => $id
        //         ]
                    
        //         );
        //         return $stmt->fetch();
        //     }catch(Exception $e){
        //         echo "Lỗi" . $e->getMessage();
        //     }
        // }
        // public function updateDanhMuc($id, $ten_danh_muc, $mo_ta){
        //     try{
        //         $sql = 'UPDATE danh_mucs 
        //         SET ten_danh_muc = :ten_danh_muc,
        //             mo_ta        = :mo_ta
        //             WHERE id= :id';

        //         $stmt=  $this ->conn->prepare($sql);

        //         $stmt->execute([
        //             ':ten_danh_muc'=> $ten_danh_muc,
        //             ':mo_ta'       => $mo_ta,
        //             ':id' => $id
        //         ]
                    
        //         );
        //         return true;
        //     }catch(Exception $e){
        //         echo "Lỗi" . $e->getMessage();
        //     }
        // }
        // public function destroyDanhMuc($id){
        //     try{
        //         $sql = 'DELETE FROM danh_mucs  
        //             WHERE id= :id';

        //         $stmt=  $this ->conn->prepare($sql);

        //         $stmt->execute([
        //             ':id' => $id
        //         ]
                    
        //         );
        //         return true;
        //     }catch(Exception $e){
        //         echo "Lỗi" . $e->getMessage();
        //     }
        // }
    }