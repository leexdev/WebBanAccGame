<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Youtuber THI FF VLOG          ║
║      Facebook: facebook.com/monkamtv        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/
$patch = GET("patch");
switch ($patch) {
    case "create":
        require_once("lien-quan/create.php");
        break;
    case "edit":
        require_once("lien-quan/edit.php");
        break;
    case "champion":
        require_once("lien-quan/champion.php");
        break; 
    case "skin":
        require_once("lien-quan/skin.php");
        break; 
    case "del_upload_champion":
        require_once("lien-quan/del_upload_champion.php");
        break;
    case "del_upload_skin":
        require_once("lien-quan/del_upload_skin.php");
        break;     
    default:
        require_once("lien-quan/product.php");
        break;
}
?>