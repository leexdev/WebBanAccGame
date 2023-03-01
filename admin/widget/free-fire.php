<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Youtuber THI FF VLOG          ║
║      Facebook: facebook.com/ytbThiFF        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/
$patch = GET("patch");
switch ($patch) {
    case "create":
        require_once("free-fire/create.php");
        break;
    case "edit":
        require_once("free-fire/edit.php");
        break;  
    default:
        require_once("free-fire/product.php");
        break;
}
?>