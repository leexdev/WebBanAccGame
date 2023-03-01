<?php 




    session_start();

   
    require('../system/config.php');
   

  


    if(isset($_POST['id']) && is_numeric($_POST['id']))
    {
    $id = addslashes($_POST['id']); // lấy id
    }else{exit;}
    

    # mấy cái biến vớ vẫn blablabla

    $not = mysql_result(mysql_query("SELECT COUNT(*) FROM `homff` WHERE `id` = '$id'"), 0);
    $query = mysql_fetch_array(mysql_query("SELECT * FROM `homff` WHERE `id` = '$id'"));

    # phần điều kiện mua acc

    if (!isset($uid)){
    $arr = array('error' => 1, 'msg' => 'Đăng Nhập Đi Cậu.', 'link' => '/login');
    }elseif($query['trangthai']=='off'){
    $arr = array('error' => 1, 'msg' => 'Hết Tài Khoản Rùi , Quay Lại Sau Nhé :(', 'link' => '/mohom/uc');  
    }elseif($data['ban'] > 0){
    $arr = array('error' => 1, 'msg' => 'Tài khoản của bạn đã bị cấm trên hệ thống', 'link' => '');      
    }elseif($not==0){
    $arr = array('error' => 1, 'msg' => 'Tài khoản này không tồn tại', 'link' => '/');       
    }elseif($data['cash'] < $query['gia']){
    $arr = array('error' => 1, 'msg' => 'Bạn không đủ lượt quay trong tài khoản, hãy nạp thêm.', 'link' => '/napthe.html');      
    }else{
    
    $datamsg = "Mở Thành Công ! Bạn Trúng ".$query['kimcuong']." Kim Cương <br>";


    $arr = array('error' => 0, 'msg' => $datamsg, 'link' => '/'); 

    # Thêm vào data
    mysql_query("INSERT INTO lichsumohom (uid,loainick,idacc,name,text,quanhuy,price,date,day,month,week,year) VALUES ('".$uid."','".$query['loai']."','".$id."','".addslashes($data['hovaten'])."','".$query['text']."','".$query['quanhuy']."','".$query['gia']."','".date("H:i Y-m-d")."','".$now['mday']."','".$now['mon']."','".date('W')."','".$now['year']."')");

    # Thay đổi trạng thái và trừ tiền
    mysql_query("UPDATE `nguoidung` SET `cash` = `cash` - '".$query['gia']."' where `uid`='".$uid."'");
     mysql_query("UPDATE `nguoidung` SET `kimcuong` = `kimcuong` + '".$query['kimcuong']."' where `uid`='".$uid."'");
    mysql_query("UPDATE `homff` SET `trangthai` = 'off' where `id`='".$id."'");   
    }
    echo json_encode($arr);

?>
