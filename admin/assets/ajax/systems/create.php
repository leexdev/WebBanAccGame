<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$path = $root."/assets/files/";
if(!is_admin()){die();}
if($_POST){
    if(is_admin()){
    // ghép post skin
    if(!empty($_POST["skin"])){
    $skin = '';
        foreach($_POST["skin"] as $row){
            $skin .= $row . ', ';
        }     
    $_POST["skins"] = substr($skin, 0, -2);
    }else{
    $_POST["skins"] = "";    
    }
    
    // ghép post champ
    if(!empty($_POST["champ"])){    
    $champ = '';
        foreach($_POST["champ"] as $row){
            $champ .= $row . ', ';
        }     
    $_POST["champs"] = substr($champ, 0, -2); 
    }else{
    $_POST["champs"] = "";    
    }
    
    $type_account = addslashes(htmlspecialchars($_POST['type_account']));
    $total_gem = count($_FILES['gem']['name']);
    $total_champs = count($_FILES['champs']['name']);
    $total_info = count($_FILES['info']['name']);
    $thumb = count($_FILES['thumb']['name']);
    $username = addslashes(htmlspecialchars($_POST['username']));
    $password = addslashes(htmlspecialchars($_POST['password']));
    $price = addslashes(htmlspecialchars($_POST['price']));
    $gem_count = addslashes(htmlspecialchars($_POST['gem_count']));
    $skins_count = addslashes(htmlspecialchars($_POST['skins_count']));
    $skins = addslashes(htmlspecialchars($_POST['skins']));
    $champs_count = addslashes(htmlspecialchars($_POST['champs_count']));
    $champs = addslashes(htmlspecialchars($_POST['champs']));
    $rank = addslashes(htmlspecialchars($_POST['rank']));
    $note = addslashes(htmlspecialchars($_POST['note']));
    $sdt = addslashes(htmlspecialchars($_POST['sdt']));
    $cmnd = addslashes(htmlspecialchars($_POST['cmnd']));
    $email = addslashes(htmlspecialchars($_POST['email']));

    $db->query("INSERT INTO `products` (username,password,price,gem_count,skins_count,skins,champs_count,champs,rank,note,type_post,type_account,date_posted,status,sdt,cmnd,email) VALUES 
        ('$username','$password','$price','$gem_count','$skins_count','$skins','$champs_count','$champs','$rank','$note','0','$type_account','$date_current','0','$sdt','$cmnd','$email')");
    $id_new = $db->insert_id();
        
        // ảnh bảng ngọc
        for ($i = 0; $i < $total_gem; $i++) {
          if ($_FILES["gem"]["error"][$i] == 0) {
             $arr = explode(".", $_FILES["gem"]["name"][$i]);
             move_uploaded_file($_FILES["gem"]["tmp_name"][$i], $path."gem/".$id_new."-".($i + 1).".".end($arr));
          }
       }

        // ảnh tướng
        for ($i = 0; $i < $total_champs; $i++) {
          if ($_FILES["champs"]["error"][$i] == 0) {
             $arr = explode(".", $_FILES["champs"]["name"][$i]);
             move_uploaded_file($_FILES["champs"]["tmp_name"][$i], $path."post/".$id_new."-".($i + 1).".".end($arr));
          }
       }
       // ảnh thumb
        if ($_FILES["thumb"]["error"] == 0) {
            $arr = explode(".", $_FILES["thumb"]["name"]);
            move_uploaded_file($_FILES["thumb"]["tmp_name"], $path."thumb/".$id_new.".".end($arr));
        }
?>

<script type="text/javascript">
        $(document).ready(function(){
            $.notify({
              message: "Upload ID #<?php echo "$id_new $type_account";?> thành công !"
            },{
                type: 'success',
                timer: 4000
            });

      });
</script>    
<?php }else{?>
<script type="text/javascript">
        $(document).ready(function(){
            $.notify({
              message: "Bạn chưa đăng nhập hoặc không phải admin"
            },{
                type: 'warning',
                timer: 4000
            });
        setTimeout(function () {
            window.location.href = "/";}, 2000);
      });
</script>
<?php }}?>