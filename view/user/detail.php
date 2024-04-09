<!-- About Start -->
<div class="container-fluid">
    <div class="container wow Fadein">
        <div class="text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <nav class="mb-2" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-sa-simple">
                    <li class="breadcrumb-item"><a href="<?= URL ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?= ACT ?>san-pham">Sản phẩm</a></li>
                    <li class="breadcrumb-item"><a href="<?= ACT ?>san-pham">
                            <?= $nameCate['name'] ?>
                        </a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?= $name ?>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <img class="img-fluid pulse infinite" src="<?= URL ?>/uploads/product/<?= $image ?>">
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="text-dark mb-4">
                    <?= $name ?>
                </h1>
                <p class="mb-4 fw-bold">Tác giả: <span class="fw-normal">
                        <?= $tentacgia ?>
                    </span></p>
                <p class="mb-4 fw-bold">Nhà xuất bản: <span class="fw-normal">
                        <?= $nhaxuatban ?>
                    </span></p>
                <p class="mb-4 fw-bold">Ngày xuất bản: <span class="fw-normal">
                        <?= $datePublish ?>
                    </span></p>
                <p class="mb-4 fw-bold">Số lượng còn: <span class="fw-normal">
                        <?= $quantity ?>
                    </span></p>
                <p class="mb-4 fw-bold">Giá: <span class="fw-normal fs-5 text-danger">
                        <?= number_format($price) ?> vnđ
                        <?php if (isset($priceDel)) { ?>
                            <del class="small text-dark fs-6">
                                <?= number_format($priceDel) ?>
                            </del>
                        <?php } ?>
                    </span></p>
                <div class="row d-flex justify-content-lg-start justify-content-center">
                    <div class="col-6 col-md-4 col-lg-4">
                        <a class="btn btn-primary py-2 px-4" href="<?= ACT ?>gio-hang&add&id=<?= $id ?>&quantity=1">MUA
                            NGAY</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Feedback - Comment - Detail  -->
<div class="container py-5">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab-1" data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                role="tab" aria-controls="pills-home" aria-selected="false">Chi tiết</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab-2" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                role="tab" aria-controls="pills-profile" aria-selected="true">Đánh giá</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab-3" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button"
                role="tab" aria-controls="pills-contact" aria-selected="false">Bình luận</button>
        </li>
    </ul>
    <div class="tab-content px-lg-2 px-2" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="tab-1" tabindex="0">
            <?= $decribe ?>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="tab-2" tabindex="0">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="fs-4">
                        <?= round((9 * 5 + 3 * 4) / 12, 1) ?> / 5 Sao Đánh Giá
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col-11 progress bg-primary" role="progressbar" aria-label="Basic example"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-light" style="width: <?= ((12 - 9) / 12) * 100 ?>%"></div>
                        </div>
                        <div class="text-warning">5<i class="fas fa-star"></i></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col-11 progress bg-primary" role="progressbar" aria-label="Basic example"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-light" style="width: <?= ((12 - 3) / 12) * 100 ?>%"></div>
                        </div>
                        <div class="text-warning">4<i class="fas fa-star"></i></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col-11 progress bg-primary" role="progressbar" aria-label="Basic example"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-light" style="width: <?= ((12 - 0) / 12) * 100 ?>%"></div>
                        </div>
                        <div class="text-warning">3<i class="fas fa-star"></i></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col-11 progress bg-primary" role="progressbar" aria-label="Basic example"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-light" style="width: <?= ((12 - 0) / 12) * 100 ?>%"></div>
                        </div>
                        <div class="text-warning">2<i class="fas fa-star"></i></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col-11 progress bg-primary" role="progressbar" aria-label="Basic example"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-light" style="width: <?= ((12 - 0) / 12) * 100 ?>%"></div>
                        </div>
                        <div class="text-warning">1<i class="fas fa-star"></i></div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-8 position-relative d-flex justify-content-center">
                    <span style="z-index:3; width: 102%" class="position-absolute text-center top-50 d-flex justify-content-between">
                        <button class="btn btn-dark rounded-pill" data-bs-target="#carouselExampleFade" type="button" data-bs-slide="prev">
                            <i class="fas fa-angle-double-left"></i>
                        </button>
                        <button class="btn btn-dark rounded-pill" data-bs-target="#carouselExampleFade" type="button" data-bs-slide="next">
                            <i class="fas fa-angle-double-right"></i>
                        </button>
                    </span>

                    <div id="carouselExampleFade" class="carousel slide carousel-fade w-100">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <table style="min-height:400px" class="table table-primary">
                                <thead>
                                    <th colspan="12">12 đánh giá</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-end">
                                            <img width="45px" src="<?= URL ?>/uploads/user/avatar/user_default.jpg" alt="user" class="img">
                                        </td>
                                        <td>
                                            <div class="fw-bold fs-6">Name User 01</div>
                                            <div class="small fw-small">01/04/2024 12:12</div>
                                            <div class="text-warning">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <p class="py-2">Sản phẩm quá chất lượng, bao bì đóng gói kĩ càng , cảm ơn AD hehe</p>
                                            <img width="200px" src="<?= URL ?>/uploads/user/feedback/fb01-conan101.webp" alt="Đánh giá SP">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="carousel-item">
                            <table style="min-height:400px" class="table table-primary">
                                <thead>
                                    <th colspan="12">12 đánh giá</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-end">
                                            <img width="45px" src="<?= URL ?>/uploads/user/avatar/user_default.jpg" alt="user" class="img">
                                        </td>
                                        <td>
                                            <div class="fw-bold fs-6">Name User 02</div>
                                            <div class="small fw-small">01/04/2024 12:12</div>
                                            <div class="text-warning">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p class="py-2">Sản phẩm quá chất lượng, bao bì đóng gói kĩ càng , cảm ơn AD hehe</p>
                                            <!-- <img width="200px" src="<?= URL ?>/uploads/user/feedback/fb01-conan101.webp" alt="Đánh giá SP"> -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="carousel-item">
                            <table style="min-height:400px" class="table table-primary">
                                <thead>
                                    <th colspan="12">12 đánh giá</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-end">
                                            <img width="45px" src="<?= URL ?>/uploads/user/avatar/user_default.jpg" alt="user" class="img">
                                        </td>
                                        <td>
                                            <div class="fw-bold fs-6">Name User 03</div>
                                            <div class="small fw-small">01/04/2024 12:12</div>
                                            <div class="text-warning">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <p class="py-2">Sản phẩm quá chất lượng, bao bì đóng gói kĩ càng , cảm ơn AD hehe</p>
                                            <img width="200px" src="<?= URL ?>/uploads/user/feedback/fb01-conan101.webp" alt="Đánh giá SP">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="tab-3" tabindex="0">
        <!-- TAB BÌNH LUẬN -->
        <?php if(!empty($_SESSION['user'])){ ?>
            <form action="" method="post">
            <div class="row">
                <div class="col-2 col-md-2 col-lg-1 p-lg-0 text-center">
                    <div class="fw-sm"><small class="small <?=role_text($_SESSION['user']['role'])?>"><?=$_SESSION['user']['fullName']?></small></div>
                    <img width="45px" src="<?= URL ?>/uploads/user/avatar/<?=$_SESSION['user']['image']?>" alt="user" class="img">
                </div>
                <div class="col-10 col-md-10 col-lg-11">
                    <div class="form-floating">
                        <textarea name="message" class="form-control" id="floatingInput" placeholder="name@example.com"><?=$message?></textarea>
                        <label for="floatingInput">Nhập bình luận của bạn</label>
                    </div>
                    <div><?=showError($arr_error)?></div>
                    <button type="submit" name="comment" class="my-2 px-3 btn btn-sm btn-outline-primary">Gửi</button>
                </div>
            </div>
            </form>
        <?php }?>
        <!-- SHOW BÌNH LUẬN -->
        <?php $quantityCmt = count($listComment)?>
            <table class="table table-primary">
                <thead>
                    <th colspan="12">(<?=$quantityCmt?>) bình luận</th>
                </thead>
                <tbody>
                <?php if($quantityCmt != 0){ 
                    for ($i=0; $i < $quantityCmt; $i++) { 
                        extract($listComment[$i]);
                        $getUser = getOneFieldByID('accounts','fullName,image',$idUser,1);
                ?>
                    <tr>
                        <td class="text-start">
                            <img width="45px" src="<?=URL?>/uploads/user/avatar/<?=$getUser['image']?>" alt="user" class="img">
                        </td>
                        <td colspan="5">
                            <div class="fw-bold fs-6"><?=$getUser['fullName']?></div>
                            <div class="small fw-small"><?=formatTime($dateCreate,'DD/MM lúc hh:mm')?></div>
                        </td>
                        <td  colspan="7">
                        <p class="p-0"><?=$message?></p>
                        </td>
                    </tr>
                <?php }}else{?>
                    <tr>
                        <td>Chưa có bình luận nào</td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Product Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-start wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-primary mb-3"><span class="fw-light text-dark">Sách</span> Liên Quan & Tham Khảo</h1>
        </div>
        <div class="row">
            <?php
            for ($i = 0; $i < count($listProductHint); $i++) {
                $productHint = $listProductHint[$i];
                extract($productHint);
                ?>
                <div class="col-6 col-md-4 col-lg-3 py-2 wow fadeIn" data-wow-delay="0.1s">
                    <a href="./index.php?act=detail&id=<?= $id ?>">
                        <div class="product-item text-center border h-100 py-2">
                            <img class="img-fluid mb-4" src="<?= URL ?>/uploads/product/<?= $image ?>" alt="">
                            <div class="mb-2">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(99)</small>
                            </div>
                            <span class="h6 d-inline-block mb-2">
                                <?= $name ?>
                            </span>
                            <h5 class="text-primary mb-3">
                                <?= number_format($price) ?> <sup>đ</sup>
                            </h5>
                            <a href="" class="btn btn-outline-primary px-3">Thêm vào giỏ</a>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- Product End -->