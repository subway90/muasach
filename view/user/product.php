<script src="<?=URL?>/assets/js/filter.js"></script>
<!-- Product Start -->

<div class="container-fluid pb-5">
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
                            <div class="col-6 col-md-6 col-lg-4 p-0 pe-2 mt-2 mt-lg-0">
                                <label for="inputAuthor" class="label h6">Tác giả</label>
                                <select  id="inputAuthor" onchange="filterProducts()" class="form-select" aria-label="Default select example">
                                    <option value="all" selected>Tất cả</option>
                                    <?php
                                    $cate = getAll('author', 1);
                                    for ($i = 0; $i < count($cate); $i++) {
                                        extract($cate[$i])
                                            ?>
                                        <option value="<?= $name ?>">
                                            <?= $name ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6 col-md-6 col-lg-4 p-0 pe-2 mt-2 mt-lg-0">
                                <label for="inputPrice" class="label h6">Giá tiền</label>
                                <input class="form-range w-100" type="range" id="inputPrice" min="1000" max="200000" step="1000" onchange="filterProducts()">
                                <span id="selectedPrice"></span>
                            </div>
                            <div class="col-6 col-md-6 col-lg-4 p-0 pe-2 mt-2 mt-lg-0">
                                <label for="inputName" class="label h6">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="inputName" onkeyup="filterProducts()" placeholder="Nhập tên sản phẩm">
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
                        extract(getOneFieldByID('author','name authorName',$idAuthor,1));
                        extract(getOneFieldByID('publishing','name publishingName',$idPublishing,1));
                        ?>
                        <div class="product col-6 col-md-4 col-lg-3 p-2 wow fadeIn p-0" data-wow-delay="0.1s">
                            <a href="<?= ACT ?>chi-tiet/<?= createSlug($name) ?>">
                                <div class="product-item text-center border h-100 p-0 py-3">
                                    <img class="img-fluid mb-4" src="<?= URL ?>/uploads/product/<?= $image ?>" alt="">
                                    <div class="author d-none"><?=$authorName?></div>
                                    <div class="publishing d-none"><?=$publishingName?></div>
                                    <!-- <div class="mb-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small>(99)</small>
                                    </div> -->
                                    <div class="name h6 d-inline-block mb-2">
                                        <?= $name ?>
                                    </div>
                                    <div class="row">
                                        <?php
                                        if ($priceSale == 0) { ?>
                                            <div class="col-12">
                                                <h5 class="text-primary mb-3">
                                                    <div class="price"><?= $price ?> <sup>đ</sup></div>
                                                </h5>
                                            </div>
                                            <?php
                                        } else { ?>
                                            <div class="col-8">
                                                <h5 class="text-primary mb-3">
                                                    <div class="price"><?= $priceSale ?> <sup>đ</sup></div>
                                                </h5>
                                            </div>
                                            <div class="col-3">
                                                <h5 class="text-secondar small mb-3"><del>
                                                        <?= $price ?>
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
                <!-- <div class="col-12 text-center mb-4">
                    <button class="btn border-1 btn-outline-primary disabled">&#10094;</button>
                    <button class="btn border-1 btn-outline-primary active">1</button>
                    <button class="btn border-1 btn-outline-primary">2</button>
                    <button class="btn border-1 btn-outline-primary">3</button>
                    <button class="btn border-1 btn-outline-primary">&#10095;</button>
                </div> -->

            </div>
        </div>
    </div>
</div>
<!-- Product End -->
<script>
var inputPrice = document.getElementById('inputPrice');
var selectedPrice = document.getElementById('selectedPrice');

inputPrice.oninput = function() {
    selectedPrice.textContent = inputPrice.value;
    filterProducts();
}
</script>