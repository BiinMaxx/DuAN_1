<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= BASE_URL ?>" class="nav-link">Website</a>

      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <!-- Nút fullscreen -->
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>

    <!-- Thông tin người dùng và đăng xuất -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="pe-7s-user" style="font-size: 25px;">
                <?php if (isset($_SESSION['user_admin']) && is_array($_SESSION['user_admin'])): ?>
                    <?php echo htmlspecialchars($_SESSION['user_admin']['ho_ten']); ?>
                <?php else: ?>
                    <!-- Không có người dùng đăng nhập -->
                <?php endif; ?>
            </i>
        </a>
    </li>

    <!-- Đăng xuất -->
    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL_ADMIN. '?act=logout-admin' ?>" onclick="return confirm('Bạn muốn đăng xuất?')">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </li>
</ul>

  </nav>
  <!-- /.navbar -->
 