<!-- Header  -->
<?php
require './views/layout/header.php';
?>
<!-- Navbar  -->
<?php
require './views/layout/navbar.php';
?>
<!-- Main Sidebar -->
<?php
require './views/layout/sidebar.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý Client</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div>
                <div class="card">
                    <div class="row my-3">
                        <div class="col-6">
                            <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" alt="" width="70%" onerror="this.onerror=null;this.src='https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png?20200919003010'">
                        </div>
                        <div class="col-6">
                            <div class="container ">
                                <table class="table table-border">
                                    <tbody>
                                        <tr>
                                            <th>Họ tên:</th>
                                            <td><?= $khachHang['ho_ten'] ?? '' ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ngày sinh:</th>
                                            <td><?= $khachHang['ngay_sinh'] ?? '' ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td><?= $khachHang['email'] ?? '' ?></td>
                                        </tr>
                                        <tr>
                                            <th>Số điện thoại:</th>
                                            <td><?= $khachHang['so_dien_thoai'] ?? '' ?></td>
                                        </tr>
                                        <tr>
                                            <th>Giới tính:</th>
                                            <td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ'; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Địa chỉ:</th>
                                            <td><?= $khachHang['dia_chi'] ?? '' ?></td>
                                        </tr>
                                        <tr>
                                            <th>Trạng thái:</th>
                                            <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <hr>
                    <h2>Lịch sử mua hàng</h2>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã đơn hàng</th>
                                <th>Tên người nhận</th>
                                <th>Số điện thoại</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listDonHang as $key => $donHang) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $donHang['ma_don_hang'] ?></td>
                                    <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                    <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                    <td><?= $donHang['ngay_dat'] ?></td>
                                    <td><?= $donHang['tong_tien'] ?></td>
                                    <td><?= $donHang['ten_trang_thai'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>">
                                                <button class="btn btn-primary">Xem</button></a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>">
                                                <button class="btn btn-warning">Sửa</button></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 mt-3">
                    <hr>
                    <h2>Lịch sử bình luận</h2>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản phẩm</th>
                                <th>Nôi dung</th>
                                <th>Ngày bình luận</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td> <a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham='.$binhLuan['san_pham_id'] ?>"><?= $binhLuan['ten_san_pham'] ?></a></td>
                                    <td><?= $binhLuan['noi_dung'] ?></td>
                                    <td><?= $binhLuan['ngay_dang'] ?></td>
                                    <td><?= $binhLuan['trang_thai']==1?'Hiển thị':'Bị ẩn' ?></td>
                                    <td>
                                        <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan'?>" method="post">
                                            <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id']?>">
                                            <input type="hidden" name="name_view" value="detail_khach">
                                            <button class="btn btn-danger" onclick="return confirm('Bạn có đồng ý ẩn bình luận này không?')"><?= $binhLuan['trang_thai']==2?'Hiển thị':'Ẩn' ?></button></a>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php
require './views/layout/footer.php';
?>
<!--End Footer -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });
    });
</script>
</body>

</html>