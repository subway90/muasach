<?php
// function getAllCategory(){
//     $sql = "SELECT dm.*, count(dm.id) soluong_sp
//     FROM category dm
//     JOIN products sp
//     ON dm.id = sp.idCategory
//     GROUP BY dm.id";
//     $list = pdo_query($sql);
//     return $list;
// }
function addCategory($ten_danhmuc,$trangthai){
    $sql = "INSERT INTO category(name,status,dateCreate) values('$ten_danhmuc',$trangthai,current_timestamp())";
    pdo_execute($sql);
    $_SESSION['alert']= "Tạo danh mục thành công !";
    header("Location:".ACT_ADMIN."category");
}
function getAllCateByJoinIdCate($table,$idCate,$status){
    if($status==1) $status = "status = 1";
    if($status==2) $status = "status = 2";
    if($status==0) $status = "1";
    $sql = "SELECT *
    FROM ".$table." WHERE idCate =".$idCate." AND ".$status;
    $result = pdo_query($sql);
    return $result;
}
function editCate($id,$name,$status){
    $sql = "UPDATE category SET name = '".$name."',status =".$status." WHERE id = ".$id;
    pdo_query($sql);
    $_SESSION['alert']= "Sửa danh mục thành công !";
    header("Location:".ACT_ADMIN."category-edit&id=".$id);

}