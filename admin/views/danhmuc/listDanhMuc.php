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
          <h1>Quản lý danh mục</h1>
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
                  <div class="row">
                  <a href="<?= BASE_URL_ADMIN . '?act=form-them-danh-muc' ?>">
                    <button class="btn btn-success">Thêm mới danh mục</button>
                  </a>
                    <div class="col-sm-12">
                      <div id="example1_filter" class="dataTables_filter">
                        <label>Search:<input type="search"
                        class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Mô tả</th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($listDanhMuc as $key => $danhMuc): ?>
                            <tr>
                              <td><?= $key + 1 ?></td>
                              <td><?= $danhMuc['ten_danh_muc'] ?></td>
                              <td><?= $danhMuc['mo_ta'] ?></td>
                              <td>
                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-danh-muc&id_danh_muc='.$danhMuc['id'] ?>">
                                <button class="btn btn-warning">Sửa</button></a>
                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-danh-muc&id_danh_muc='.$danhMuc['id'] ?>"
                                onclick="return confirm('Bạn có đồng ý xóa không?')">
                                <button class="btn btn-danger">Xóa</button></a>
                              </td>
                            </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-5">
                      <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10
                        of 57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                      <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                          <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#"
                              aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                          <li class="paginate_button page-item active"><a href="#" aria-controls="example1"
                              data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                          <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2"
                              tabindex="0" class="page-link">2</a></li>
                          <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3"
                              tabindex="0" class="page-link">3</a></li>
                          <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4"
                              tabindex="0" class="page-link">4</a></li>
                          <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5"
                              tabindex="0" class="page-link">5</a></li>
                          <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6"
                              tabindex="0" class="page-link">6</a></li>
                          <li class="paginate_button page-item next" id="example1_next"><a href="#"
                              aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                        </ul>
                      </div>
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