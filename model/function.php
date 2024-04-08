<?php
/**
 * @param $input thực thi hàm thông báo với nội dung đã truyền
 */
function alert($input) {
    echo '<script>alert("'.$input.'")</script>';
}
/**
 * Thực thi alert nếu có khai báo Session Alert, và xóa nội dung sau khi alert
 * @param $input nhập nội dung cần khai báo
 */
function show_alert($input){
    if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])){
        echo '<script>alert("'.$input.'")</script>';
        unset($_SESSION['alert']);
    }
}
/**
 * @param $table tên bảng
 * @param $status (int) 1/2/0
 * Hàm này để lấy tất cả dòng từ $table và điều kiện $status
 * nếu @param $status = 1 là trạng thái hiện / = 2 là trạng thái ẩn / = 0 là tất cả trạng thái
 */
function getAll($table,$status){
    if($status==1) $condition = "status = 1";
    if($status==2) $condition = "status = 2";
    if($status==0) $condition = "1";
    $sql = "SELECT *
    FROM ".$table." WHERE ".$condition;
    $result = pdo_query($sql);
    return $result;
}

/**
 * Hàm này để lấy một dòng từ $table và điều kiện $status
 * @param $table bảng cần thực thi
 * @param $id ID cần select
 * @param $status (1: hiện | 2: ẩn | 0: không điều kiện)
 */
function getOneByID($table,$id,$status){
    if($status==1) $status = "status = 1";
    if($status==2) $status = "status = 2";
    if($status==0) $status = "1";
    $sql = "SELECT *
    FROM ".$table." WHERE id =".$id." AND ".$status;
    $result = pdo_query_one($sql);
    return $result;
}
/**
 * Hàm này để lấy tất cả dòng từ $table và điều kiện $status
 * @param $table bảng cần thực thi
 * @param $id ID cần select
 * @param $status (1: hiện | 2: ẩn | 0: không điều kiện)
 */
function getAllByID($table,$id,$status){
    if($status==1) $status = "status = 1";
    if($status==2) $status = "status = 2";
    if($status==0) $status = "1";
    $sql = "SELECT *
    FROM ".$table." WHERE id =".$id." AND ".$status;
    $result = pdo_query($sql);
    return $result;
}

/**
 * Hàm này để lấy tất cả dòng từ $table và điều kiện $idUser và $status
 * @param $table bảng cần thực thi
 * @param $id IDUser cần select
 * @param $status (1: hiện | 2: ẩn | 0: không điều kiện)
 */
function getAllByIdUser($table,$idUser,$status){
    if($status==1) $status = "status = 1";
    if($status==2) $status = "status = 2";
    if($status==0) $status = "1";
    $sql = "SELECT * FROM ".$table." WHERE idUser = ".$idUser." AND ".$status;
    $list = pdo_query($sql);
    return $list;
}
/**
 * Hàm này để lấy một field từ $table và điều kiện $status
 * @param $table bảng cần thực thi
 * @param $field(CHAR) field cần lấy, muốn lấy nhiều thì thêm dấu phẩy, ví dụ: "id,name"
 * @param $id ID cần select
 * @param $status (1: hiện | 2: ẩn | 0: không điều kiện)
 */
function getOneFieldByID($table,$field,$id,$status){
    if($status==1) $status = "status = 1";
    if($status==2) $status = "status = 2";
    if($status==0) $status = "1";
    $sql = "SELECT ".$field."
    FROM ".$table." WHERE id =".$id." AND ".$status;
    $result = pdo_query_one($sql);
    return $result;
}
function getOneField($table,$field,$status){
    if($status==1) $status = "status = 1";
    if($status==2) $status = "status = 2";
    if($status==0) $status = "1";
    $sql = "SELECT ".$field."
    FROM ".$table." WHERE ".$status;
    $result = pdo_query_one($sql);
    return $result;
}

/**
 * Cập nhật trạng thái theo ID
 * @param $table tên bảng cần update
 * @param $id ID cần update
 * @param $type (int) trạng thái cần thay đổi
 */
function updateStatusById($table,$id,$status){
    $sql = "UPDATE ".$table." SET status ='".$status."' WHERE id=".$id;
    pdo_execute($sql);
}
/**
 * @param $input(int) số role để phối màu phân quyền nick
 */
function role_text($input){
    if($input == 1) return 'text-danger';   //admin
    if($input == 2) return 'text-primary';   //user
    if($input == 5) return 'text-warning';  //ceo
    if($input == 10) return 'text-success';  //smod

}
/**
 * @param $input Là kiểu chuỗi (CHAR).
 * Kiểm tra có phải SĐT hay không, hàm trả về TRUE hoặc FALSE
 * Yêu cầu SĐT: độ dài 10 số, bắt đầu từ 0, kiểu int
 */
function checkPhone($input){
    $arr_phone = mb_str_split($input);
    $word_diff = array_diff($arr_phone,[0,1,2,3,4,5,6,7,8,9]); //trả về mảng kí tự không trùng với mảng [0-9]
    if(count($word_diff)!=0 || count($arr_phone)!=10 || $arr_phone[0] !=0) return false; //nếu mảng không trùng có -> có kí tự chữ
    else return true;
}

/**
 * Hàm tạo token ngẫu nhiên theo độ dài tùy ý
 * @param $length độ dài mã token (0-100)*/ 
function createTokenChar($length){
    if($length <= 0) return "[ERROR] length not valid";
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($permitted_chars), 0, $length); //hàm str_shuffle :Trả về cho một chuỗi xáo trộn ngẫu nhiên
}

/**
 * Kiểm tra xem email có hợp lệ hay không
 * Điều kiện: cho phép kí tự a còng [@](1),dấu chấm [.](nhiều) và [a-z][0-9]
 * @param $input nhập email cần kiểm tra. Nếu hợp lệ thì trả về TRUE, ngược lại là FALSE
 */
function checkEmail($input){
    $arr_email = explode('@',str_replace(".","",$input));
    if(count($arr_email) != 2) return false;
    else {
        $arr_input = mb_str_split(strtolower($arr_email[0].$arr_email[1]));
        // var_dump($arr_input); exit;
        $word_diff = array_diff($arr_input,[0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z']);
        if(count($word_diff) == 0) return true;
        else return false; 
    }
}
/**
 * Loại bỏ các kí tự khác chữ cái và số
 * @param $input Nhập chuỗi cần bỏ các kí tự khác [a-zA-Z0-9]
 */
function moveCharSpecial($input){
    $input = str_replace(["<",">","=","`","~","'",'"','!','@','#','$','%','^','&','*','(',')','{','}','/',],"",$input);
    return $input;
}
/**
 * Tạo đường dẫ theo kiểu SEO
 */
function createSlug($input)
{
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#', #1
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',#2
        '#(ì|í|ị|ỉ|ĩ)#',#3
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',#4
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',#5
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',#6
        '#(đ)#',#7
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',#8
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',#9
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',#10
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',#11
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',#12
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',#13
        '#(Đ)#',#14
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array(
        'a',#1
        'e',#2
        'i',#3
        'o',#4
        'u',#5
        'y',#6
        'd',#7
        'A',#8
        'E',#9
        'I',#10
        'O',#11
        'U',#12
        'Y',#13
        'D',#14
        '-',#15
    );
    $input = preg_replace($search, $replace, $input);
    $input = preg_replace('/(-)+/', '-', $input);
    $input = strtolower($input);
    return $input;
}

/**
 * @param $type ["on"/"off"]
 * on: trả về dạng URL -
 * off: trả về chuỗi bình thường
 */
function Slug($type,$input){
    if($type == "on")  return str_replace(" ","-",$input);
    elseif($type == "off") return str_replace("-"," ",$input);
    else return "ERROR";
}

/**
 * SHOW LỖI CỦA VALIDATE
 * @param $array Mảng lỗi cần show 
 * Hiển thị: Chữ đỏ, có icon, xuống dòng
 */
function showError($array){
    $result = "";
    if(count($array) !=0){
        for ($i=0; $i < count($array); $i++) { 
            $result .= '
            <div class="text-danger small mb-2">
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                '.$array[$i].'
            </div>';
        }
    }
    return $result;
}

/**
 * @param $image Truyền FILE img theo cú pháp $_FILES[tên file]
 * @param $size Dung lượng cho phép (MB) [Khuyến khích: từ 5MB trở xuống]
 * Điều kiện: Ảnh dạng jpeg/jpg/png/gif/webp, dung lượng từ $size(MB) trở xuống
 * Nếu hợp lệ, hàm trả TRUE, nếu sai sẽ trả chuỗi (thông tin sai)
 */
function checkImage($image,$size){
    if(in_array($image['type'],['image/jpeg','image/jpg', 'image/png','image/gif','image/webp']) === true){ //cho phép đuôi jpeg,jpg,png,gif,webp | hàm in_array: kiểm tra input có trùng với phần tử nào trong mảng hay không, nếu trùng sẽ trả TRUE
        if($image['size'] <= ($size*1024*1024)){  //so sánh dung lượng cho phép (Byte)
            return true;
        } else return 'Kích thước file không được trên 2MB.';
    }else return 'Đuôi tệp không hợp lệ.';
}

/**
 * Định dạng lại thời gian
 * @param $input Nhập thời gian cần FORMAT, [YYYY-MM-DD hh:mm:ss]
 * @param $format Nhập biểu thức muốn hiển thị
 * Ví dụ 'hh:mm ngày DD/MM/YYYY'
 */
function formatTime($input,$format){
    if(strtotime($input) !== false && similar_text($input,'- - : :') == 5){ #kiểm tra $input nhập vào có hợp lệ không | hàm strtotime: trả về số giây(int) đếm được kể từ ngày 1/1/1976 -> thời gian input
        $arr = explode(' ',$input); #YYYY-MM-DD hh:mm:ss -> [0] YYYY-MM-DD [1] hh:mm:ss
        $arr_time = explode('-',$arr[0]); //arr_time[0] YYYY [1] MM [2] DD
        $arr_day = explode(':',$arr[1]);  //arr_day[0] hh [1] mm [2] ss
        return str_replace(['hh','mm','ss','YYYY','MM','DD'],[$arr_day[0],$arr_day[1],$arr_day[2],$arr_time[0],$arr_time[1],$arr_time[2]],$format);
    }else return 'Thời gian nhập vào chưa đúng form YYYY-MM-DD hh:mm:ss';
}