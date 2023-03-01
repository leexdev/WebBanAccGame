<?php
// Require database  
require_once '../core/init.php';  

if(!is_admin()){load_url("/");}
if(is_admin()){
    $widget = GET("widget");
    if (!$widget) {
        $widget = "main";
        $active = "main";
    }else{
        if($widget == "topup" || $widget == "buy"){
        $active = "main";
        }else{
        $active = $widget;            
        }
    }
require_once("widget/header.php");
    if (file_exists("widget/".$widget.".php")) {
        require_once("widget/".$widget.".php");
    } else {
        require_once("widget/main.php");
    }

// Require footer
require_once 'widget/footer.php';
}else{
    include 'login/index.php';
}
?>