<!-- Product Start -->
<div class="container-fluid">
    <div class="container">
        <div class="text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <nav class="mb-2" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-sa-simple">
                    <li class="breadcrumb-item"><a href="<?= URL ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 pe-2 ">
                <!-- LỌC TÌM KIẾM -->
                <div class="row">
                            <div class="col-6 col-md-6 col-lg-2 p-0 pe-2 mt-2 mt-lg-0">
                                <label for="price" class="label h6">Loại sách</label>
                                <select id="price" class="form-select" aria-label="Default select example">
                                    <option value="0" selected>Tất cả</option>
                                    <?php
                                    $cate = getAll('category', 1);
                                    for ($i = 0; $i < count($cate); $i++) {
                                        extract($cate[$i])
                                            ?>
                                        <option value="<?= $id ?>">
                                            <?= $name ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6 col-md-6 col-lg-2 p-0 pe-2 mt-2 mt-lg-0">
                                <label for="price" class="label h6">Tác giả</label>
                                <select id="price" class="form-select" aria-label="Default select example">
                                    <option value="0" selected>Tất cả</option>
                                    <?php
                                    $cate = getAll('author', 1);
                                    for ($i = 0; $i < count($cate); $i++) {
                                        extract($cate[$i])
                                            ?>
                                        <option value="<?= $id ?>">
                                            <?= $name ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6 col-md-6 col-lg-2 p-0 pe-2 mt-2 mt-lg-0">
                                <label for="price" class="label h6">Nhà xuất bản</label>
                                <select id="price" class="form-select" aria-label="Default select example">
                                    <option value="0" selected>Tất cả</option>
                                    <?php
                                    $cate = getAll('publishing', 1);
                                    for ($i = 0; $i < count($cate); $i++) {
                                        extract($cate[$i])
                                            ?>
                                        <option value="<?= $id ?>">
                                            <?= $name ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6 col-md-6 col-lg-2 p-0 pe-2 mt-2 mt-lg-0">
                                <label for="price" class="label h6">Giá tiền</label>
                                <select id="price" class="form-select" aria-label="Default select example">
                                    <option value="0" selected>Tất cả</option>
                                    <option value="1">Dưới 50K</option>
                                    <option value="2">50K &rarr; 100KK</option>
                                    <option value="3">100K &rarr; 200K</option>
                                    <option value="4">200K &rarr; 400K</option>
                                    <option value="5">400K &rarr; 600K</option>
                                    <option value="6">600K &rarr; 1 Triệu</option>
                                    <option value="7">Trên 1 Triệu</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-6 col-lg-3 p-0 pe-2 mt-2 mt-lg-0">
                                <label for="price" class="label h6">Sắp xếp</label>
                                <select id="price" class="form-select" aria-label="Default select example">
                                    <option value="0">Tên A &rarr; Z</option>
                                    <option value="1">Tên Z &rarr; A</option>
                                    <option selected value="2">Giá Thấp &rarr; Cao</option>
                                    <option value="3">Giá Cao &rarr; Thấp</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-6 col-lg-1 p-0 pe-2 pt-4 mt-3 mt-lg-1">
                                <button class="btn btn-primary w-100">Lọc</button>
                            </div>
                </div>
            </div>
            <div class="col-12 col md-12 col-lg-12 pe-2 mt-2 mt-lg-0">
                <div class="row ps-2">
                    <!-- [SẢN PHẨM] -->
                    <?php
                    $product = getAll('products', 1);
                    for ($i = 0; $i < count($product); $i++) {
                        extract($product[$i]);
                        ?>
                        <div class="col-6 col-md-4 col-lg-3 p-2 wow fadeIn p-0" data-wow-delay="0.1s">
                            <a href="<?= ACT ?>chi-tiet/<?= createSlug($name) ?>">
                                <div class="product-item text-center border h-100 p-0 py-3">
                                    <img class="img-fluid mb-4" src="<?= URL ?>/uploads/product/<?= $image ?>" alt="">
                                    <div class="mb-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small>(99)</small>
                                    </div>
                                    <div class="h6 d-inline-block mb-2">
                                        <?= $name ?>
                                    </div>
                                    <div class="row">
                                        <?php
                                        if ($priceSale == 0) { ?>
                                            <div class="col-12">
                                                <h5 class="text-primary mb-3">
                                                    <?= $price ?> <sup>đ</sup>
                                                </h5>
                                            </div>
                                            <?php
                                        } else { ?>
                                            <div class="col-8">
                                                <h5 class="text-primary mb-3">
                                                    <?= $price ?> <sup>đ</sup>
                                                </h5>
                                            </div>
                                            <div class="col-3">
                                                <h5 class="text-secondar small mb-3"><del>
                                                        <?= $priceSale ?>
                                                    </del></h5>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php if ($priceSale != 0)
                                        $price = $priceSale ?>
                                        <a href="<?= ACT ?>san-pham&add&id=<?= $id ?>&quantity=1"
                                        class="btn btn-outline-primary px-3">Thêm vào giỏ</a>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <!-- [PHÂN TRANG] -->
                <div class="col-12 text-center mb-4">
                    <button class="btn border-1 btn-outline-primary disabled">&#10094;</button>
                    <button class="btn border-1 btn-outline-primary active">1</button>
                    <button class="btn border-1 btn-outline-primary">2</button>
                    <button class="btn border-1 btn-outline-primary">3</button>
                    <button class="btn border-1 btn-outline-primary">&#10095;</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product End -->