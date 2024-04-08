<?php
// function getAllCategory(){
//     $sql = "SELECT dm.*, count(dm.id) soluong_sp
//     FROM danhmuc dm
//     JOIN sanpham sp
//     ON dm.id = sp.id_danhmuc
//     GROUP BY dm.id";
//     $list = pdo_query($sql);
//     return $list;
// }
function addPublishing($name,$status){
    $sql = "INSERT INTO publishing(name,status,dateCreate) values('$name',$status,current_timestamp())";
    pdo_execute($sql);
    $_SESSION['alert']= "Thêm nhà xuất bản mới thành công !";
    header("Location:".ACT_ADMIN."publishing");
}
function editPublishing($id,$name,$status){
    $sql = "UPDATE publishing SET name = '".$name."',status =".$status." WHERE id = ".$id;
    pdo_query($sql);
    $_SESSION['alert']= "Sửa NXB thành công !";
    header("Location:".ACT_ADMIN."publishing-edit&id=".$id);

}