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
    case "account":
        require_once("wheel/account.php");
        break;
    case "edit":
        require_once("wheel/edit.php");
        break;
    case "ratio":
        require_once("wheel/ratio.php");
        break;
    default:
        require_once("wheel/product.php");
        break;
}
?>