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

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="col-12">
                <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="product-image" alt="Product Image" style="width: 500px;height:500px; object-fit:cover">
              </div>
              <div class="col-12 product-image-thumbs">
              <div class="product-image-thumb" ><img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="Product Image"></div>
                <?php foreach($listAnhSanPham as $key=>$anhSP): ?>
                <div class="product-image-thumb <?= $anhSP[$key] ==0 ? 'active' : '' ?>"><img src="<?= BASE_URL . $anhSP['link_hinh_anh']?>" alt="Product Image"></div>
                <?php endforeach?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Tên sản phẩm: <?= $sanPham['ten_san_pham']?></h3>
              <hr>
              <h4 class="mt-3">Giá tiền:  <small><?= $sanPham['gia_san_pham']?></small></h4>
              <h4 class="mt-3">Giá Khuyễn mãi:  <small><?= $sanPham['gia_khuyen_mai']?></small></h4>
              <h4 class="mt-3">Số Lượng:  <small><?= $sanPham['so_luong']?></small></h4>
              <h4 class="mt-3">Danh mục:  <small><?= $sanPham['ten_danh_muc']?></small></h4>
              <h4 class="mt-3">Ngày nhập:  <small><?= $sanPham['ngay_nhap']?></small></h4>
              <h4 class="mt-3">Trạng thái:  <small><?= $sanPham['trang_thai'] == 1 ?'Còn bán' : 'Hết hàng'?></small></h4>
              <h4 class="mt-3">Mô tả:  <small><?= $sanPham['mo_ta']?></small></h4>
            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#binh-luan" role="tab" aria-controls="product-desc" aria-selected="true">Bình luận của sản phẩm</a>
              </div>
            </nav>
            <div class="tab-content p-3 col-md-12" id="nav-tabContent">
              <div class="tab-pane fade show active" id="binh-luan" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="container-fluid">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Người bình luận</th>
                        <th>Nội dung</th>
                        <th>Ngày đăng</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>ABC</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>22/7//2024</td>
                        <td>
                          <div class="btn-group">
                            <a href=""><button class="btn btn-warning">Ẩn</button></a>
                            <a href=""><button class="btn btn-danger">Xóa</button></a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>ABC</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>22/7//2024</td>
                        <td>
                          <div class="btn-group">
                            <a href=""><button class="btn btn-warning">Ẩn</button></a>
                            <a href=""><button class="btn btn-danger">Xóa</button></a>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
<!-- Code injected by live-server -->
</body>

</html>