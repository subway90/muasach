<div class="container wow fadeIn py-5">
    <nav class="mb-2" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-sa-simple">
            <li class="breadcrumb-item"><a href="<?= URL ?>">Trang chủ</a></li>
            <li class="breadcrumb-item">Thông tin cá nhân</li>
        </ol>
    </nav>
    <div class="row bg-primary deal p-5">
        <div class="col-12 col-lg-3 text-center">
            <div class="py-2">
                <img id="image" class="w-100" src="<?=urlPath().$_SESSION['user']['image']?>" alt="USER IMG">
            </div>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <label class="w-50 input-group-text border-0" for="imageFile">Chọn ảnh</label>
                <input type="file" class="form-control d-none" id="imageFile" name="image" onchange="chooseFile(this)" class="form-control" accept="image/jpeg, image/png, image/gif">
                <button type="submit" name="img" class="w-50 btn btn-sm btn-outline-light border-1">Thay ảnh</button>
            </div>
        </form>
        <a href="#" class="position-relative w-100 btn btn-sm btn-light my-3 mb-lg-0 border-1 text-danger">Đổi mật khẩu</a>
        </div>
        <div class="col-12 col-lg-9 mt-2">
        <!-- [SHOW LỖI] -->
        <div><?=showError($arr_error)?></div>
        <form action="" method="post">
            <div class="form-floating mb-3">
                <input name="fullName" type="text" class="form-control" id="name" value="<?=$fullName?>" placeholder="Hide">
                <label for="name">Họ và tên</label>
            </div>
            <div class="form-floating mb-3">
                <input name="email" type="text" class="form-control" id="e" value="<?=$email?>" placeholder="Hide">
                <label for="e">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input name="phone" type="text" class="form-control" id="s" value="<?=$phone?>" placeholder="Hide">
                <label for="s">Số điện thoại</label>
            </div>
            <div class="form-floating mb-3">
                <input name="address" type="text" class="form-control" id="d" value="<?=$address?>" placeholder="Hide">
                <label for="d">Địa chỉ</label>
            </div>
            <div class="text-center text-lg-start mt-4">
            <button name="info" type="submit" class="position-relative btn btn-light">Cập nhật</button>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
    function chooseFile(fileInput)
    {
        if(fileInput.files && fileInput.files[0])
        {
            var reader = new FileReader();
            reader.onload =function (e)
            {
                $('#image').attr('src',e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0])
        }
    }
</script>