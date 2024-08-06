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
    <!-- Main content -->
    <div class="container">
    <h1 class="pt-3">Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
          <div class="text-center">
              <img src="<?= BASE_URL_ADMIN.['anh_dai_dien']?>" style="width: 100px;" class="avatar img-circle" alt="avatar"  onerror="this.onerror=null;this.src='https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png?20200919003010'">
          <h6 class="mt-2">Họ tên: <?= $thongTin['ho_ten']?></h6>
          <h6 class="mt-2">Chức vụ: <?= $thongTin['chuc_vu_id']?></h6>
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
          <form action="<?= BASE_URL_ADMIN.'?act=sua-thong-tin-ca-nhan-quan-tri'?>" class="form-horizontal" role="form">
        <h3>Thông tin cá nhân</h3>
        
          <div class="form-group">
            <label class="col-lg-3 control-label">Họ tên:</label>
            <div class="col-lg-12">
              <input class="form-control" type="text" value="Jane" name="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-12">
              <input class="form-control" type="text" value="Bishop">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Company:</label>
            <div class="col-lg-12">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-12">
              <input class="form-control" type="text" value="janesemail@gmail.com">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Time Zone:</label>
            <div class="col-lg-12">
              <div class="ui-select">
                <select id="user_time_zone" class="form-control">
                  <option value="Hawaii">(GMT-10:00) Hawaii</option>
                  <option value="Alaska">(GMT-09:00) Alaska</option>
                  <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                  <option value="Arizona">(GMT-07:00) Arizona</option>
                  <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                  <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                  <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                  <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-12 control-label"></label>
            <div class="col-md-12">
              <input type="button" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>

          <hr>
          <h3>Đổi mật khẩu</h3>
          <?php
            if(isset($_SESSION['success'])) {?>
            <div class="alert alert-info alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <i class="fa fa-coffee"></i>
              <?= $_SESSION['success']?>
            </div>
            <?php } ?>
          <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-ca-nhan-quan-tri'?>">
              <div class="form-group">
                <label class="col-md-12 control-label">Mật khẩu cũ:</label>
                <div class="col-md-12">
                  <input class="form-control" type="password" name="old_pass" value="">
                  <?php if(isset($_SESSION['error']['old_pass'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['old_pass']?></p>
                    <?php }?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label">Mật khẩu mới:</label>
                <div class="col-md-12">
                  <input class="form-control" type="password" name="new_pass" value="">
                  <?php if(isset($_SESSION['error']['new_pass'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['new_pass']?></p>
                    <?php }?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label">Nhập lại mật khẩu mới:</label>
                <div class="col-md-12">
                  <input class="form-control" type="password" name="confirm_pass" value="">
                  <?php if(isset($_SESSION['error']['confirm_pass'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['confirm_pass']?></p>
                    <?php }?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label"></label>
                <div class="col-md-12">
                  <input type="submit" class="btn btn-primary" value="Save Changes">
                </div>
              </div>
          </form>
      </div>
  </div>
</div>
<hr>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php
require './views/layout/footer.php';
?>
<!--End Footer -->
</body>

</html>