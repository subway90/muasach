<?php if($previewBill === true) {?>
<div class="container deal bg-primary py-5 d-flex justify-content-center">
    <div class="col-12 col-md-12 col-lg-4 py-5 ">
        <label for="token">Nhập mã TOKEN</label>
        <form method="post">
            <div class="input-group">
                <input type="text" name="token" id="token" class="form-control" value="<?=$token?>">
                <button type="submit" class="btn btn-outline-light">Tìm kiếm</button>
            </div>
        </form>
    </div>
</div>
<?php }else{?>
<div class="container my-5 wow fadeIn">
    <nav class="mb-2" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-sa-simple">
            <li class="breadcrumb-item"><a href="<?= URL ?>">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="<?= ACT ?>lich-su-mua-hang">Lịch sử mua hàng</a></li>
            <li class="breadcrumb-item">Chi tiết</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12 mb-4">
            <?php
            if($typePay == 1) echo'<span class="mb-2 me-2 btn btn-sm btn-outline-success">Thanh toán tiền mặt (COD)</span>';
            if($typePay == 2) echo'<span class="mb-2 me-2 btn btn-sm btn-outline-info">Thanh toán ebanking</span>';

            if($statusPay == 1) echo'<span class="mb-2 me-2 btn btn-sm btn-outline-danger">Chưa thanh toán</span>';
            if($statusPay == 2) echo'<span class="mb-2 me-2 btn btn-sm btn-outline-success">Đã thanh toán</span>';

            if($statusDelivery == 1) echo'<span class="mb-2 btn btn-sm btn-outline-secondary">Chưa giao hàng</span>';
            if($statusDelivery == 2) echo'<span class="mb-2 btn btn-sm btn-outline-warning">Đang giao hàng</span>';
            if($statusDelivery == 3) echo'<span class="mb-2 btn btn-sm btn-outline-success">Đã giao hàng</span>';
            ?>
        <span class="ms-2">Ngày tạo: <?=$dateCreate?></span>
        </div>
        <div class="col-12 col-md-12 col-lg-4 mb-3">
            <div class="h6">Trạng thái đơn:</div>
            <?=notifyBill($status)?>
        </div>
        <div class="col-12 col-md-12 col-lg-8">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="text-start">STT</th>
                        <th class="text-start">Sản phẩm</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-end">Thành tiền</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    if(count($listDetail)==0){ ?>
                    <tr>
                        <td colspan="7" class="text-center py-3">Bạn chưa có hóa đơn nào.</td>
                    </tr>
                    <?php }
                    else{
                    for ($i=0; $i < count($listDetail); $i++){ 
                        extract($listDetail[$i]) ;
                        $product = getOneFieldByID('products','image,name,slug',$idProduct,0);
                    ?>
                    <tr>
                        <th class="text-start"><?=$i+1?></th>
                        <td class="text-start">
                            <img width="40px" src="<?=URL?>/uploads/product/<?=$product['image']?>" alt="PRODUCT IMAGE">
                            <span><a href="<?=ACT?>chi-tiet/<?=$product['slug']?>"><?=$product['name']?></a></span>
                        </td>
                        <td class="text-center"><?=number_format($price)?> đ</td>
                        <td class="text-center"><?=$quantity?></td>
                        <td class="text-end"><?=number_format($price*$quantity)?> đ</td>
                    </tr>
                    <?php }}?>
                </tbody>
                <tfoot>
                    <tr class="text-end">
                        <td class="py-2 h6" colspan="5">Tổng : <?=number_format($total)?> đ</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php }?>