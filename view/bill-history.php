<div class="container my-5 wow fadeIn">
    <nav class="mb-2" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-sa-simple">
            <li class="breadcrumb-item"><a href="<?= URL ?>">Trang chủ</a></li>
            <li class="breadcrumb-item">Lịch sử mua hàng</li>
        </ol>
    </nav>
    <table class="table table-sm">
        <thead>
            <tr>
                <th class="text-start">STT</th>
                <th class="text-center">Mã Token</th>
                <th class="text-center">Tổng</th>
                <th class="text-center">Thanh toán</th>
                <th class="text-center">Giao hàng</th>
                <th class="text-center">Ngày tạo</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="align-middle">
            <?php
            if(count($listBill)==0){ ?>
            <tr>
                <td colspan="7" class="text-center py-3">Bạn chưa có hóa đơn nào.</td>
            </tr>
            <?php }
            else{
            for ($i=0; $i < count($listBill); $i++) { extract($listBill[$i]) ?>
            <tr>
                <th class="text-start"><?=$i+1?></th>
                <td class="text-center"><?=$token?></td>
                <td class="text-center"><?=$total?></td>
                <td class="text-center">
                    <?php
                    if($statusPay == 1) echo'<span class="btn btn-sm btn-outline-danger">Chưa</span>';
                    if($statusPay == 2) echo'<span class="btn btn-sm btn-outline-success">Xong</span>';
                    ?>
                </td>
                <td class="text-center">
                    <?php
                    if($statusDelivery == 1) echo'<span class="btn btn-sm btn-outline-secondary">Chưa</span>';
                    if($statusDelivery == 2) echo'<span class="btn btn-sm btn-outline-warning">Đang</span>';
                    if($statusDelivery == 3) echo'<span class="btn btn-sm btn-outline-success">Xong</span>';
                    ?>
                </td>
                <td class="text-center"><?=$dateCreate?></td>
                <td class="text-end">
                    <a href="<?=ACT?>lich-su-mua-hang/<?=$token?>" class="btn btn-sm btn-outline-success"><i class="fas fa-eye"></i> Chi tiết</a>
                </td>
            </tr>
            <?php }}?>
        </tbody>
    </table>
</div>