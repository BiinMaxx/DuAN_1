<?php
require_once 'layout/header.php';
?>
<!-- Navbar  -->
<?php
require_once 'layout/menu.php';
?>
<!-- Detail  -->
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="shop.html">Sản phẩm</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <?php foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                                        <div class="pro-large-img img-zoom">
                                            <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>"
                                                alt="product-details" />
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <?php foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                                        <div class="pro-nav-thumb">
                                            <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>"
                                                alt="product-details" />
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="#"><?= $sanPham['ten_danh_muc'] ?></a>
                                    </div>
                                    <h3 class="product-name"><?= $sanPham['ten_san_pham'] ?></h3>
                                    <div class="ratings d-flex">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <div class="pro-review">
                                            <?php $countComment = count($listBinhLuan); ?>
                                            <span><?= $countComment . 'Bình luận' ?></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                            <span
                                                class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . '.Vnđ' ?></span>
                                            <span
                                                class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . '.Vnđ' ?></del></span>
                                        <?php } else { ?>
                                            <span
                                                class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . '.Vnđ' ?></span>
                                        <?php } ?>
                                    </div>

                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span><?= $sanPham['so_luong'] . 'trong cửa hàng' ?></span>
                                    </div>
                                    <p class="pro-desc"><?= $sanPham['mo_ta'] ?></p>
                                    <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post">
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">Số lượng:</h6>
                                        <div class="quantity">
                                            <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'];?>">
                                            <div class="pro-qty"><input type="text" value="1" name="so_luong"></div>
                                        </div>
                                        <div class="action_link">
                                            <button class="btn btn-cart2" href="">Thêm giỏ hàng</button>
                                        </div>
                                    </div>
                                    </form>
                                    <div class="useful-links">
                                        <a href="#" data-bs-toggle="tooltip" title="Compare"><i
                                                class="pe-7s-refresh-2"></i>compare</a>
                                        <a href="#" data-bs-toggle="tooltip" title="Wishlist"><i
                                                class="pe-7s-like"></i>wishlist</a>
                                    </div>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews section-padding pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">
                                        <li>
                                            <a class="active" data-bs-toggle="tab" href="#tab_one">Mô tả</a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tab" href="#tab_three">Bình luận
                                                (<?= $countComment ?>)</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content reviews-tab">
                                        <div class="tab-pane fade show active" id="tab_one">
                                            <div class="tab-one">
                                                <?= $sanPham['mo_ta'] ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="tab_three">
                                            <?php foreach ($listBinhLuan as $binhLuan): ?>
                                                <div class="total-reviews">
                                                    <div class="rev-avatar">
                                                        <img src="<?= $binhLuan['anh_dai_dien'] ?>" alt="">
                                                    </div>
                                                    <div class="review-box">
                                                        <div class="ratings">
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                        </div>
                                                        <div class="post-author">
                                                            <p><span>Khách hàng</span><?= $binhLuan['ngay_dang'] ?></p>
                                                        </div>
                                                        <p><?= $binhLuan['noi_dung'] ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                            <form action="#" class="review-form">
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Nội dung bình luận</label>
                                                        <textarea class="form-control" required></textarea>

                                                    </div>
                                                </div>
                                                <div class="buttons">
                                                    <button class="btn btn-sqr" type="submit">Bình luận</button>
                                                </div>
                                            </form> <!-- end of review-form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm liên quan</h2>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                        <!-- product item start -->
                        <?php foreach ($listSanPhamCungDanhMuc as $key => $sanPham): ?>
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                </a>
                                <div class="product-badge">
                                    <?php
                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                    $ngayHienTai = new DateTime();
                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);

                                    if ($tinhNgay->days <= 7) {
                                        ?>
                                        <div class="product-label new">
                                            <span>Mới</span>
                                        </div>
                                        <?php
                                    } ?>
                                    <!-- Khuyến mại  -->
                                    <?php
                                    if ($sanPham['gia_khuyen_mai']) {
                                        ?>
                                        <div class="product-label discount">
                                            <span>Giảm giá</span>
                                        </div>
                                        <?php
                                    } ?>
                                </div>

                                <div class="cart-hover">
                                    <button class="btn btn-cart"><a
                                            href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">Xem
                                            chi tiết</a> </button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <h6 class="product-name">
                                    <a
                                        href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                </h6>
                                <div class="price-box">
                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                        <span
                                            class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . '.Vnđ' ?></span>
                                        <span
                                            class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . '.Vnđ' ?></del></span>
                                    <?php } else { ?>
                                        <span
                                            class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . '.Vnđ' ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <!-- product item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related products area end -->
</main>
<!-- End--Detail -->
<?php require_once 'layout/miniCart.php'; ?>

<?php require_once 'layout/footer.php'; ?>