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
          <div class="col-12 mt-3">
                    <hr>
                    <h2>Lịch sử bình luận</h2>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Người bình luận</th>
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
                                    <td> <a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang='.$binhLuan['tai_khoan_id'] ?>"><?= $binhLuan['ho_ten'] ?></a></td>
                                    <td><?= $binhLuan['noi_dung'] ?></td>
                                    <td><?= $binhLuan['ngay_dang'] ?></td>
                                    <td><?= $binhLuan['trang_thai']==1?'Hiển thị':'Bị ẩn' ?></td>
                                    <td>
                                        <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan'?>" method="post">
                                            <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id']?>">
                                            <button class="btn btn-danger" onclick="return confirm('Bạn có đồng ý ẩn bình luận này không?')"><?= $binhLuan['trang_thai']==2?'Hiển thị':'Ẩn' ?></button></a>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
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