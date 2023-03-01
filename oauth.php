<?php

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/facebook-sdk-v5/autoload.php');

if (is_client()) {
  load_url('/'); // tải tới đường dẫn chỉ định
}

$fb = new Facebook\Facebook([
  'app_id' => '545936922642813',
  'app_secret' => '6186798b09a71859e3ae3c4abe2e4dfe',
  'default_graph_version' => 'v2.5',
]);


$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (!isset($accessToken)) {
    $permissions = array('public_profile','email'); // Optional permissions
    $loginUrl = $helper->getLoginUrl($_DOMAIN.'oauth.php', $permissions);
    header("Location: ".$loginUrl);  
}

try {
  // Returns a `Facebook\FacebookResponse` object
  $fields = array('id', 'name', 'email');
  $response = $fb->get('/me?fields='.implode(',', $fields).'', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Không thể lấy graph: ' . $e->getMessage();
  exit();
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook báo lỗi: ' . $e->getMessage();
  exit();
}

$user = $response->getGraphUser();
$_SESSION["user"] = $user["id"];
if($db->fetch_row("SELECT COUNT(*) FROM accounts WHERE username = '{$user['id']}'") == 0) {
    $db->query("INSERT INTO `accounts` (username,name,email,cash,datetime,fb) VALUES ('".$user['id']."','".$user['name']."','".$user['email']."','0','$date_current','1')");
}
load_url('/');
die("Hãy thử lại");
?>

