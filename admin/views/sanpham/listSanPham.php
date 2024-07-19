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
          <h1>Quản lý Sản Phẩm</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row mb-2">
                  <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham' ?>">
                    <button class="btn btn-success">Thêm mới Sản Phẩm</button>
                  </a>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Danh mục sản phẩm</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($listSanPham as $key => $sanPham): ?>
                            <tr>
                              <td><?= $key + 1 ?></td>
                              <td><?= $sanPham['ten_san_pham'] ?></td>
                              <td><img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" width="100px" onerror="this.onerror=null;this.src='https://picsum.photos/110/130'"></td>
                              <td><?= $sanPham['gia_san_pham'] ?></td>
                              <td><?= $sanPham['so_luong'] ?></td>
                              <td><?= $sanPham['ten_danh_muc'] ?></td>
                              <td><?= $sanPham['trang_thai']== 1 ? 'Còn bán' :'Hết hàng' ?></td>
                              <td>
                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham='.$sanPham['id'] ?>">
                                <button class="btn btn-warning">Sửa</button></a>
                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_san_pham='.$sanPham['id'] ?>"
                                onclick="return confirm('Bạn có đồng ý xóa không?')">
                                <button class="btn btn-danger">Xóa</button></a>
                              </td>
                            </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
          </div>
          <!-- /.card -->
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

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Code injected by live-server -->
</body>

</html>