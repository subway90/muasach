    <!-- Courosel Start -->
    <div class="container wow fadeIn position-relative d-flex">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="4000">
                <img src="<?=URL?>/uploads/system/carousel/Saigonbooks_Gold_Ver2_MainBanner_1920x700.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                <img src="<?=URL?>/uploads/system/carousel/Saigonbooks_Gold_Ver2_MainBanner_1920x700.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                <img src="<?=URL?>/uploads/system/carousel/Saigonbooks_Gold_Ver2_MainBanner_1920x700.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <span class="position-absolute top-50 d-flex mx-auto justify-content-between w-100">
                <div class="btn btn sm btn-primary rounded-pill mx-1" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <i class="mt-1 fa-2x fas fa-angle-double-left"></i>
                </div>
                <div class="btn btn sm btn-primary rounded-pill mx-1" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <i class="mt-1 fa-2x fas fa-angle-double-right"></i>
                </div>
            </span>
            <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> -->
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Feature Start -->
    <div class="container-fluid py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature-item position-relative bg-primary text-center p-3">
                        <div class="border py-3 px-3">
                            <i class="fas fa-truck fa-3x mb-4 text-muted"></i>
                            <h6  class="text-white mb-0">
                                <div class=" animated pulse infinite">Miễn phí giao hàng</div>
                                <div class="small text-dark mt-lg-2">với đơn từ 200K</div>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature-item position-relative bg-primary text-center p-3">
                        <div class="border py-3 px-3">
                            <i class="fas fa-sync-alt fa-3x mb-4 text-muted"></i>
                            <h6 class="text-white mb-0">
                                <div class=" animated pulse infinite">Miễn phí đổi, trả</div>
                                <div class="small text-dark mt-lg-2">trong 30 ngày</div>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature-item position-relative bg-primary text-center p-3">
                        <div class="border py-3 px-3">
                            <i class="fas fa-check-square fa-3x mb-4 text-muted"></i>
                            <h6 class="text-white mb-0">
                                <div class=" animated pulse infinite">Chất lượng cao</div>
                                <div class="small text-dark mt-lg-2">Hàng nhập có nguồn gốc</div>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature-item position-relative bg-primary text-center p-3">
                        <div class="border py-3 px-3">
                            <i class="fas fa-phone fa-3x mb-4 text-muted"></i>
                            <h6 class="text-white mb-0">
                                <div class=" animated pulse infinite">Hỗ trợ 24/7</div>
                                <div class="small text-dark mt-lg-2">Hotline: 0979 651 651</div>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Special Product Start -->
    <?php
    $getProductSpecial = getOneFieldByCondition('products','*','special = 1 AND status = 1');
    if(!empty($getProductSpecial)) {
        extract($getProductSpecial);
        extract(getOneFieldByID('author','name nameAuthor',$idAuthor,0));
        extract(getOneFieldByID('publishing','name namePublishing',$idPublishing,0));
        if($priceSale){
            $priceGoc = $price;
            $price = $priceSale;
        }
    ?>
    <div class="container-fluid deal bg-primary my-5 py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid animated pulse infinite" src="<?=URL?>/uploads/product/image_196418.jpg">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white text-center p-4">
                        <div class="border p-4">
                            <p class="mb-2"><?=$namePublishing?></p>
                            <h2 class="fw-bold text-uppercase mb-4"><?=$name?></h2>
                            <?php if(isset($priceGoc)) echo '<h5 class="text-danger"><del>'.number_format($priceGoc).' đ</del></h5>' ?>
                            <h1 class="display-4 text-primary mb-4"><?=number_format($price)?> đ</h1>
                            <h5>Số lượng còn: <?=$quantity?> quyển</h5>
                            <p class="mb-4">Tác giả: Thích Nhất Hạnh</p>
                            <div class="text-danger text-start"><i>Thời gian KM còn:</i></div>
                            <div class="row g-0 mb-4 bg-dark text-light rounded-3 p-2 fs-5">
                                <span id="time"></span>
                            </div>
                            <?php 
                            if($quantity) echo  '<a class="btn btn-primary py-2 px-4" href="'.ACT.'gio-hang&addnow=1&id='.$id.'&quantity=1">Mua ngay</a>';
                            else echo           '<a disabaled class="btn btn-primary py-2 px-4" href="#">Hết hàng</a>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- Special Product End -->
    
    <!-- Product News Start-->
   
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-start wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-light text-dark">Sách</span> "Mới ra lò"</h1>
                <p class="mb-5">Sản phẩm vừa được đăng bán mới nhất</p>
            </div>
            <div class="row">
               <?php
               $listProductNews = getProductNews(4);
               for ($i=0; $i < count($listProductNews); $i++) { 
                $san_pham = $listProductNews[$i];
                extract($san_pham);
                if($priceSale){
                    $priceGoc = $price;
                    $price = $priceSale;
                }
                ?>
                 <div class="img-hide col-6 col-md-4 col-lg-3 py-2 wow fadeIn" data-wow-delay="0.1s">
                    <a href="<?=ACT?>chi-tiet/<?=$slug?>">
                    <div class="product-item text-center border h-100 py-2 position-relative">
                        <img class="img-fluid mb-4" src="<?=URL?>/uploads/product/<?=$image?>" alt="">
                    <?php if(1==2){ ?> <!-- MẶT SAU PRODUCT [TEST]-->
                        <span class="img-back position-absolute start-0"><img class="img-fluid mb-4" src="<?=URL?>/uploads/product/conan_sau_tap_102.jpg" alt=""></span>
                    <?php }?>
                        <div class="mb-2">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(99)</small>
                        </div>
                        <span class="h6 d-inline-block mb-2"><?=$name?></span>
                        <h5 class="text-primary mb-3">
                            <?=number_format($price)?> <sup>đ</sup>
                            <?php if(isset($priceGoc)) echo'<span class="text-danger fs-6 small"><del>'.number_format($priceGoc).' đ</del></span>'; ?>
                        </h5>
                        <a href="<?=ACT?>trang-chu&add&id=<?=$id?>&quantity=1" class="btn btn-outline-primary px-3">Thêm vào giỏ</a>
                    </div>
                    </a>
                </div>
                <?php
               }
               ?>
            </div>
        </div>
    </div>
    <!-- Product News End -->



    <!-- [EVENT] Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="text-primary mb-3"><span class="fw-semi text-muted">chương trình</span> Mừng khai giảng</h1>
                <p class="mb-5">Mua <strong>combo Chân Trời Sáng Tạo</strong>, nhận ưu đãi khủng và quà tặng</p>
            </div>
            <div class="row g-4 align-items-start">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="row g-5">

                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-box fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Trọn bộ SGK</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Cả Học kì 1 và Học kì 2</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-stamp fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Mới mẻ, sáng tạo</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Được tinh gọn trong gói kính trắng, xuất bản năm 2023</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-grin-stars fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Chất lượng cao</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Được khách hàng đánh giá cao trong năm vừa qua</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn p-5 p-lg-0" data-wow-delay="0.1s">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="1500">
                                <a href="<?=ACT?>/san-pham"><img class="img-fluid animated pulse infinite" src="<?=URL?>/uploads/product/combo-ctst-lop-1.jpg"></a>
                            </div>
                            <div class="carousel-item" data-bs-interval="1500">
                                <a href="<?=ACT?>/san-pham"><img class="img-fluid animated pulse infinite" src="<?=URL?>/uploads/product/combo-ctst-lop-2.jpg"></a>
                            </div>
                            <div class="carousel-item" data-bs-interval="1500">
                                <a href="<?=ACT?>/san-pham"><img class="img-fluid animated pulse infinite" src="<?=URL?>/uploads/product/combo-ctst-lop-3.jpg"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-bolt fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Giảm giá giờ vàng</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Siêu sale đến 20%</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-gift fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Quà tặng</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Bộ bao bì sách / Thước kẻ / Hộp bút</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-ticket-alt fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Tặng voucher</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>May mắn nhận voucher 50%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [EVENT] End -->


    <!-- [NEWSLETTER] Start -->
    <div class="container-fluid newsletter bg-primary py-5 my-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-white mb-3"><span class="fs-4 text-muted">Đăng kí nhận</span> Tin Tức Khuyến Mãi</h1>
                <p class="text-white mb-4">Đảm bảo việc tin tức Chất lượng, không SPAM để quý khách</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 wow fadeIn" data-wow-delay="0.5s">
                    <div class="position-relative w-100 mt-3 mb-2">
                    <form action="" method="post">
                        <input class="form-control w-100 py-4 ps-4 pe-5" type="text" placeholder="Nhập email của bạn" style="height: 48px;">
                        <button  onclick="alert('Đang bảo trì')" type="submit" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2">
                            <i class="fa fa-paper-plane text-white fs-4"></i>
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [NEWSLETTER] End -->

    <!-- [BLOG] Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-semi text-dark">Bài viết liên quan</h1>
                <p class="mb-5">Cập nhật thông tin, tin tức sự kiện, chương trình khuyến mãi.</p>
            </div>
            <div class="row g-4">

                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="blog-item border h-100 p-4">
                        <img class="img-fluid mb-4" src="img/blog-1.jpg" alt="">
                        <a href="" class="h5 lh-base d-inline-block">chương trình Mừng Khai Giảng, ngàn Ưu đãi</a>
                        <div class="d-flex text-black-50 mb-2">
                            <div class="pe-3">
                                <small class="fa fa-eye me-1"></small>
                                <small>1,255</small>
                            </div>
                            <div class="pe-3">
                                <small class="fa fa-comments me-1"></small>
                                <small>12</small>
                            </div>
                        </div>
                        <p class="mb-4">
                            Chương trình bắt đầu từ 12/08/2023 đến hết 20/08/2023, tặng mã voucher 50%, bộ dụng cụ học tập...
                        </p>
                        <a href="" class="btn border-1 btn-outline-primary px-3">Đọc tiếp</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- [BLOG] End -->

    <!-- [FEEDBACK] Start -->
    <div class="container-fluid testimonial bg-primary my-5 py-5">
        <div class="container text-white py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-white mb-3">Bình luận từ khách hàng</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.1s">
                        <div class="testimonial-item text-center" data-dot="1">
                            <img class="img-fluid border p-2" src="<?=URL?>/uploads/user/avatar/user_default.jpg" alt="">
                            <h5 class="fw-semi lh-base text-white">Cửa hàng cung cấp đủ các loại sách, tôi rất hài lòng khi mua ở đây.</h5>
                            <h5 class="mb-1">Lê Bá Loan</h5>
                            <h6 class="fw-light text-white fst-italic mb-0">Khách hàng <span class="fw-bold text-dark">VIP 1</span></h6>
                        </div>
                        <div class="testimonial-item text-center" data-dot="2">
                            <img class="img-fluid border p-2" src="<?=URL?>/uploads/user/avatar/user_default.jpg" alt="">
                            <h5 class="fw-semi lh-base text-white">Ngoài bán sách ra còn có cả bán dụng cụ học tập, thật tuyệt vời.</h5>
                            <h5 class="mb-1">Minh Nguyệt Đặng</h5>
                            <h6 class="fw-light text-white fst-italic mb-0">Khách hàng <span class="fw-bold text-danger">VIP 5</span></h6>
                        </div>
                        <div class="testimonial-item text-center" data-dot="3">
                            <img class="img-fluid border p-2" src="<?=URL?>/uploads/user/avatar/user_default.jpg" alt="">
                            <h5 class="fw-semi lh-base text-white">Tôi yêu muasach.net bởi vì ở đây có muôn vàn cuốn sách để lựa chọn, thật tuyệt vời.</h5>
                            <h5 class="mb-1">Chi Nguyễn</h5>
                            <h6 class="fw-light text-white fst-italic mb-0">Khách hàng <span class="fw-bold text-danger">VIP 4</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [FEEDBACK] End -->



