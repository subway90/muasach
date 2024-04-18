    <!-- Cart Start -->
    <div class="container wow fadeIn">
        <div class="text-center" data-wow-delay="0.1s" style="max-width: 600px;">
            <nav class="mb-2" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-sa-simple">
                    <li class="breadcrumb-item"><a href="<?=URL?>">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?=ACT?>san-pham">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                </ol>
            </nav>
        </div>
        <div class="row my-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-border border-3 table-striped text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-start ps-4" colspan="4">Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                            if(empty($_SESSION['user'])){ // Trường hợp: Chưa đăng nhập (GUEST)
                                if(!empty($_SESSION['cart'])){ //Nếu CART có SP
                                    for ($i=0; $i < count($_SESSION['cart']); $i++) {
                                        $product = getOneFieldByID('products','image,name,quantity quantityMax,price,priceSale',$_SESSION['cart'][$i]['id'],1);// select SP theo ID
                                        if(empty($product)) continue; //Nếu SP không tồn tại (status = 2)
                                        else{
                                            extract($_SESSION['cart'][$i]);
                                            extract($product);
                                            if($priceSale!=0) $price = $priceSale;
                                        }
                        ?>
                        <tr>
                            <td colspan="3" class="align-middle"><img src="<?=URL?>/uploads/product/<?=$image?>" alt="ẢNH SP ID:" style="width: 50px;"></td>
                            <td class="align-middle"><div class="text-start h6"><?=$name?></div></td>
                            <td class="align-middle"><?=number_format($price)?> đ</td>
                            <td class="align-middle">
                                <form method="post">
                                <div class="input-group ms-lg-5">
                                    <button name="quantity" value="<?=$quantity-1?>" class="btn btn-sm btn-primary <?php if($quantity==1) echo'disabled'?>">-</button>
                                    <input type="hidden" name="idCart" value="<?=$i?>">
                                    <span class="btn btn-sm btn-outline-primary"><?=$_SESSION['cart'][$i]['quantity']?></span>
                                    <button name="quantity" value="<?=$quantity+1?>"  class="btn btn-sm btn-primary <?php if($quantity==$quantityMax) echo'disabled'?>">+</button>
                                </div>
                                </form>
                            </td>
                            <td><?=number_format($price*$_SESSION['cart'][$i]['quantity'])?> đ</td>
                            <td class="align-middle">
                                <a class="btn border-1 btn-sm btn-outline-danger" href="<?=ACT?>gio-hang&delete=<?=$i+1?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php 
                                    }
                                }else{ ?>
                        <tr>
                            <td colspan="9" class="align-middle">Chưa có sản phẩm</td>
                        </tr>
                        <?php
                                }
                            }else{  //Trường hợp: Đã đăng nhập (USER)
                                if(empty($cart)){ ?>
                        <tr>
                            <td colspan="9" class="align-middle">Chưa có sản phẩm</td>
                        </tr>
                        <?php }else{
                                for ($i=0; $i < count($cart); $i++) { 
                                    $product = getOneFieldByID('products','image,name,price,priceSale,quantity quantityMax',$cart[$i]['idProduct'],1);
                                    if(empty($product)) continue; //Nếu SP không tồn tại (status = 2)
                                    else{
                                        extract($product);
                                        extract($cart[$i]);
                                        if($priceSale!=0) $price = $priceSale;
                                        $max = getOneFieldByID('products','quantity',$idProduct,0);
                                    }
                        ?>
                        <tr>
                            <td colspan="3" class="align-middle">
                                <img src="<?=URL?>/uploads/product/<?=$image?>" alt="ẢNH SP ID:" style="width: 50px;">
                            </td>
                            <td class="align-middle">
                                <div class="text-start h6"><?=$name?></div>
                            </td>
                            <td class="align-middle">
                                <?=$price?>
                            </td>
                            <td class="align-middle text-center">
                                <form method="post">
                                <div class="input-group ms-lg-5">
                                    <button name="quantity" value="<?=$quantity-1?>" class="btn btn-sm btn-primary <?php if($quantity==1) echo'disabled'?>">-</button>
                                    <input type="hidden" name="idCart" value="<?=$id?>">
                                    <span class="btn btn-sm btn-outline-primary"><?=$quantity?></span>
                                    <button name="quantity" value="<?=$quantity+1?>"  class="btn btn-sm btn-primary <?php if($quantity==$quantityMax) echo'disabled'?>">+</button>
                                </div>
                                </form>
                            </td>
                            <td class="align-middle">
                                <?=number_format($price*$quantity)?> đ
                            </td>
                            <td class="align-middle">
                                <a class="btn btn-sm border-1 btn-outline-danger" href="<?=ACT?>gio-hang&delete=<?=$cart[$i]['id']?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php
                                    }
                                }
                            } ?>
                        
                    </tbody>
                </table>
                <div class="w-100 mt-2">
                <?php
                if(!empty($_SESSION['cart']) || count($cart) != 0){ ?>
                <a href="#" class="float-end btn border-1 btn-sm btn-outline-danger me-2"  data-bs-toggle="modal" data-bs-target="#delcart">Xóa tất cả</a>
                <?php }?>
                    <!-- [MODAL] -->
                    <div class="modal fade" id="delcart" tabindex="-1" aria-labelledby="delcartLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="delcartLabel">Xóa tất cả sản phẩm trong GIỎ HÀNG</h1>
                        </div>
                        <div class="modal-body">
                            Bạn chắc chắn chứ, sẽ không khôi phục sau khi xóa !
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <a href="<?=ACT?>gio-hang&close" class="btn btn-primary">Chắc chắn</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0">
                <div class="card-body p-0">
                    <h5 class="card-title mt-3">Giỏ hàng</h5>
                    <?php
                    if($total!=0){
                        if(empty($_SESSION['user'])){ //Chưa đăng nhập
                            for ($i=0; $i < count($_SESSION['cart']); $i++) {
                                $result = getOneByID('products',$_SESSION['cart'][$i]['id'],1);
                                if(empty($result)) continue; //Nếu SP không tồn tại (status = 2)
                                else {
                                    extract($result);
                                    if($priceSale != 0) $price = $priceSale;
                                }
                        ?>
                        <div class="d-flex mb-2">
                            <div class="col-9 text-start"><?=$name?></div>
                            <div class="col-3 text-end"><?=number_format($price*$_SESSION['cart'][$i]['quantity'])?> đ</div>
                        </div>
                        <?php }
                        }else{
                            for ($i=0; $i < count($cart); $i++) {
                                $result = getOneByID('products',$cart[$i]['idProduct'],1);
                                if(empty($result)) continue; //Nếu SP không tồn tại (status = 2)
                                else {
                                    extract($result);
                                    if($priceSale != 0) $price = $priceSale;
                                }
                    ?>
                    <div class="d-flex">
                        <div class="col-9 text-start"><?=$name?></div>
                        <div class="col-3 text-end"><?=number_format($price*$cart[$i]['quantity'])?> đ</div>
                    </div>
                    <?php   } 
                        }
                    }else{ ?>
                    <div class="d-flex">
                        <div class="col-12 text-center">Chưa có sản phẩm</div>
                    </div>
                    <?php 
                    }
                    if($total!=0){ ?>
                    <h5 class="card-title mt-3">Tổng thanh toán</h5>
                    <div class="d-flex">
                        <div class="col-6 text-start">Sản phẩm</div>
                        <div class="col-6 text-end"><?=number_format($total)?> đ</div>
                    </div>
                    <hr class="border border-primary">
                    <div class="text-end text-primary fs-5 fw-bold">
                        <?=number_format($total)?> đ
                    </div>
                    <div class="text-center mt-2">
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#<?=$activeModal?>">Thanh toán</button>
                    </div>
                    <?php }?>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [PAY - MODAL] -->
    <div class="container-fluid">
        <div class="modal fade" id="<?=$activeModal?>" tabindex="-1" aria-labelledby="<?=$activeModal?>" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="<?=$activeModal?>">Thanh Toán</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <?php include "bill.php" ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Chưa muốn thanh toán</button>
                        <!-- <button type="button" class="btn btn-primary">Tiếp tục</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->