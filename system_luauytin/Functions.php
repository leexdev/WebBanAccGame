<?php
 
// Hàm điều hướng trang
class Redirect {
    public function __construct($url = null) {
        if ($url)
        {
            echo '<script>location.href="'.$url.'";</script>';
        }
    }
}
function time_ago($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'Bây giờ';
}


function time_stamp($time){
    $periods = array("giây", "phút", "giờ", "ngày", "tuần", "tháng", "năm", "thập kỉ");
    $lengths = array("60","60","24","7","4.35","12","10");
    $now = time();
    $difference = $now - $time;
    $tense = "trước";
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
    }
   $difference = round($difference);
   return "cách đây $difference $periods[$j]";
}


// func time ago
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );
    
    
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'vừa xong';
}
// time left

function time_left($from, $to = '') {
if (empty($to))
$to = time();
$diff = (int) abs($to - $from);
if ($diff <= 60) {
$since = sprintf('Còn vài giây');
} elseif ($diff <= 3600) {
$mins = round($diff / 60);
if ($mins <= 1) {
$mins = 1;
}
/* translators: min=minute */
$since = sprintf('Còn %s phút', $mins);
} else if (($diff <= 86400) && ($diff > 3600)) {
$hours = round($diff / 3600);
if ($hours <= 1) {
$hours = 1;
}
$since = sprintf('Còn %s giờ', $hours);
} elseif ($diff >= 86400) {
$days = round($diff / 86400);
if ($days <= 1) {
$days = 1;
}
$since = sprintf('Còn %s ngày', $days);
}
return $since;
}

function auto_get($url){
    $data = curl_init();
    curl_setopt($data, CURLOPT_HEADER, false);
    curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($data, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($data, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($data, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($data, CURLOPT_TIMEOUT, 3);
    curl_setopt($data, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($data, CURLOPT_URL, $url);
    $res = curl_exec($data);
    curl_close($data);
    return $res;
}

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}
function text($string, $separator = ', '){
    $vals = explode($separator, $string);
    foreach($vals as $key => $val) {
        $vals[$key] = strtolower(trim($val));
    }
    return array_diff($vals, array(""));
}

// Anti Xss 
function anti_xss($text) {
    return htmlentities(strip_tags($text), ENT_QUOTES, 'UTF-8');
}

// $_GET 
function GET($key) {
    return isset($_GET[$key]) ? htmlentities(strip_tags($_GET[$key]), ENT_QUOTES, 'UTF-8') : false; 
}
// $_POST
function POST($key) {
    return isset($_POST[$key]) ? htmlentities(strip_tags($_POST[$key]), ENT_QUOTES, 'UTF-8') : false; 
}
// gọn hơn :v
function load_url($url = "") {
    header("Location: ".$url);
    exit();
}
// xác nhận người dùng
function is_client() {
    $username = isset($_SESSION["user"]) ? $_SESSION["user"] : false;
    if ($username) {
        return true;
    }
    return false;
}

function is_admin() {
    if (is_client()) {
        $id_admin = 'tuanoriit';   //Điền tên đăng nhập admin tại đây
        $id_mod = 'session';
        $id_mod_1 = 'location';
        if ($_SESSION["user"] == $id_admin || $_SESSION["user"] == $id_mod || $_SESSION["user"] == $id_mod_1) {
            return true;
        }
        return false;
    }
    return false;
}
// xác nhận đang nhập admin
function otp_admin() {
    if (is_admin()) {
        $otp_admin = ($_SESSION["otp_admin"] ==  $_SESSION["check_otp_admin"]) ? $_SESSION["otp_admin"] : false;
        if ($otp_admin) {
            return true;
        }
    }
    return false;
}
//check card
function luauytin($type,$seri,$pin) {
    if($type == 1 && strlen($seri) == 11 && strlen($pin) == 13){return true;}
    if($type == 1 && strlen($seri) == 14 && strlen($pin) == 15){return true;}
    if($type == 2 && strlen($seri) == 15 && strlen($pin) == 12){return true;}
    if($type == 3 && strlen($seri) == 14 && strlen($pin) == 12){return true;}
    if($type == 3 && strlen($seri) == 14 && strlen($pin) == 14){return true;}
    return false;
}
//check vòng quay may mắn
function check_wheel($percent){
    if ($percent < 2) return false;
    if ($percent >= 100) return true;
    $array_number = array();
    //tạo mảng
        for ($i=0; $i < 100 ; $i++) { 
            array_push($array_number, $i);
        }
    //lấy ra $percent số ngẫu nhiên
    $random_array = array_rand($array_number,$percent);
    //check
    if (in_array(rand(0,99), $random_array)) return true;
    else return false;
    return false;
}

//info wheel
function info_wheel($type) {
    $wheel = array();
    switch ($type) {
        case 1:
            $wheel['msg']  = 'Random 12KC';
            $wheel['angles']   = 12;
            break;
        case 2:
            $wheel['msg']  = '3.999KC';
            $wheel['angles']   = 3999;
            break;
        case 3:
            $wheel['msg']  = '7.999KC';
            $wheel['angles']   = 7999;
            break;
        case 4:
            $wheel['msg']  = '333KC';
            $wheel['angles']   = 333;
            break;
        case 5:
            $wheel['msg']  = 'CÁC BẠN TỰ LÀM THÊM NHÉ! ';
            $wheel['angles']   = 582;
            break;
        case 6:
            $wheel['msg']  = 'CÁC BẠN TỰ LÀM THÊM NHÉ! ';
            $wheel['angles']   = 494;
            break;
        case 7:
            $wheel['msg']  = 'CÁC BẠN TỰ LÀM THÊM NHÉ! ';
            $wheel['angles']   = 540;
            break;
        case 8:
            $wheel['msg']  = 'CÁC BẠN TỰ LÀM THÊM NHÉ! ';
            $wheel['angles']   = 627;
            break;
        default:
            $wheel['msg']  = 'CÁC BẠN TỰ LÀM THÊM NHÉ! ';
            $wheel['angles']   = 670;
            break;
    }
    return $wheel;
}



// Chống xss
class Anti_xss {
      public function clean_up($text) {
      return htmlentities(strip_tags($text), ENT_QUOTES, 'UTF-8');
      }
} 

// Truyền vào
class Input {
    public function input_get($key) {
    return isset($_GET[$key]) ? $_GET[$key] : false; 
    }
    public function input_post($key) {
    return isset($_POST[$key]) ? $_POST[$key] : false; 
    }

}
function sendMail($title, $subject, $content, $nTo, $mTo){
		$fields = array(
			'title' => $title,
			'subject' => $subject,
			'content' => $content,
			'nto' => $nTo,
			'mto' => $mTo,
			'nre' => '',
			'mre' => ''
		);
		$ch = curl_init("https://mail.k.com/sendmail.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$result = curl_exec($ch);
		$result = json_decode($result);
	return $result;
}


// lấy thông tin rank và khung 
class Info {

        public function nice_number($n) {
            // first strip any formatting;
            $n = (0+str_replace(",", "", $n));
    
            // is this a number?
            if (!is_numeric($n)) return false;
    
            // now filter it;
            if ($n > 1000000000000) return round(($n/1000000000000), 2).' nghìn tỉ';
            elseif ($n > 1000000000) return round(($n/1000000000), 2).' tỉ';
            elseif ($n > 1000000) return round(($n/1000000), 2).' triệu';
            elseif ($n > 1000) return round(($n/1000), 2).' nghìn';
    
            return number_format($n);
        }
    
        public function get_post($id) {
            $post = glob($_SERVER["DOCUMENT_ROOT"]."/assets/files/post/".$id.".*");
            if ($avatar) {
                $arr = explode("/", $post[0]);
                $last = array_pop($arr);
                return "assets/files/post/".$last;
            } else {
                return get_thumb($id);
            }
        }
    
        public function get_thumb($id) {
        $index = glob($_SERVER["DOCUMENT_ROOT"]."/assets/files/thumb/".$id.".*");
        $_DOMAIN = "https://".$_SERVER["SERVER_NAME"]."/";
        if ($index) {
            $arr = explode("/", $index[0]);
            $last = array_pop($arr);
            return $_DOMAIN."assets/files/thumb/".$last;
        } else {
                return $_DOMAIN."/assets/images/banner.jpg";
        }
        }
    
      public function get_string_frame($frame) {
      switch ($frame) {
        case 0:
            $str = "Không Khung";
            break;
        case 1:
            $str = "Khung Bạc";
            break;
        case 2:
            $str = "Khung Vàng";
            break;
        case 3:
            $str = "Khung Bạch Kim";
            break;
        case 4:
            $str = "Khung Kim Cương";
            break;
        case 5:
            $str = "Khung Cao Thủ";
            break;
        case 6:
            $str = "Khung Thách Đấu";
            break;
        default:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}

    public function get_icon_rank($rank)
    {
    switch ($rank) {
        case 0:
            $name = "0.png";
            break;
        case 1:
            $name = "1.png";
            break;
        case 2:
            $name = "2.png";
            break;
        case 3:
            $name = "3.png";
            break;
        case 4:
            $name = "4.png";
            break;
        case 5:
            $name = "5.png";
            break;
        case 6:
            $name = "6.png";
            break;
        case 7:
            $name = "7.png";
            break;
        case 8:
            $name = "8.png";
            break;
        case 9:
            $name = "9.png";
            break;
        case 10:
            $name = "10.png";
            break;
        case 11:
            $name = "11.png";
            break;
        case 12:
            $name = "12.png";
            break;
        case 13:
            $name = "13.png";
            break;
        case 14:
            $name = "14.png";
            break;
        case 15:
            $name = "15.png";
            break;
        case 16:
            $name = "16.png";
            break;
        case 17:
            $name = "17.png";
            break;
        case 18:
            $name = "18.png";
            break;
        case 19:
            $name = "19.png";
            break;
        case 20:
            $name = "20.png";
            break;
        case 21:
            $name = "21.png";
            break;
        case 22:
            $name = "22.png";
            break;
        case 23:
            $name = "23.png";
            break;
        case 24:
            $name = "24.png";
            break;
        case 25:
            $name = "25.png";
            break;
        case 26:
            $name = "26.png";
            break;
        case 27:
            $name = "27.png";
            break;
        case 28:
            $name = "28.png";
            break;
        defaut:
            $name = "0.png";
            break;
        
    }
    $link = "/assets/images/rank/";
    return $link.$name;
}

      public function get_string_rank($rank) {
      switch ($rank) {
        case 1:
            $str = "Chưa xác định";
            break;
        case 0:
            $str = "Chưa Rank";
            break;
        case 2:
            $str = "Đồng V";
            break;
        case 3:
            $str = "Đồng IV";
            break;
        case 4:
            $str = "Đồng III";
            break;
        case 5:
            $str = "Đồng II";
            break;
        case 6:
            $str = "Đồng I";
            break;
        case 7:
            $str = "Bạc V";
            break;
        case 8:
            $str = "Bạc IV";
            break;
        case 9:
            $str = "Bạc III";
            break;
        case 10:
            $str = "Bạc II";
            break;
        case 11:
            $str = "Bạc I";
            break;
        case 12:
            $str = "Vàng V";
            break;
        case 13:
            $str = "Vàng IV";
            break;
        case 14:
            $str = "Vàng III";
            break;
        case 15:
            $str = "Vàng II";
            break;
        case 16:
            $str = "Vàng I";
            break;
        case 17:
            $str = "Bạch Kim V";
            break;
        case 18:
            $str = "Bạch Kim IV";
            break;
        case 19:
            $str = "Bạch Kim III";
            break;
        case 20:
            $str = "Bạch Kim II";
            break;
        case 21:
            $str = "Bạch Kim I";
            break;
        case 22:
            $str = "Kim Cương V";
            break;
        case 23:
            $str = "Kim Cương IV";
            break;
        case 24:
            $str = "Kim Cương III";
            break;
        case 25:
            $str = "Kim Cương II";
            break;
        case 26:
            $str = "Kim Cương I";
            break;
        case 27:
            $str = "Cao Thủ";
            break;
        case 28:
            $str = "Thách Đấu";
            break;
        defaut:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}
public function get_string_server($sv) {
      switch ($sv) {
        case 1:
            $str = "Miền Bắc";
            break;
        case 2:
            $str = "Miền Bắc 2";
            break;
        case 3:
            $str = "Miền Trung";
            break;
        case 4:
            $str = "Miền Nam";
            break;
        case 5:
            $str = "Miền Nam 2";
            break;
        case 6:
            $str = "Server CF";
            break;
        defaut:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}
public function type_account($sv) {
      switch ($sv) {
        case 'lien-quan':
            $str = "Liên Quân Mobile";
            break;
        case 'free-fire':
            $str = "Free Fire";
            break;
        case 'pubg-mobile':
            $str = "PUBG Mobile";
            break;
        default:
            $str = '';
            break;
    }
    return $str;
}

public function notify_account($sv) {
      switch ($sv) {
        case 'lien-quan':
            $str = "100% acc trắng thông tin hầu hết acc đều có đá quý và ngọc 90";
            break;
        case 'free-fire':
            $str = "100% ACC Đăng Nhập Facebook . Khi mua acc song liên hệ fanpage để được hỗ trợ đổi thông tin hoặc bị xác minh . Nếu tự ý làm phát sinh lỗi shop sẽ ko chịu trách nhiệm";
            break;
        case 'pubg-mobile':
            $str = "";
            break;
        default:
            $str = '';
            break;
    }
    return $str;
}


public function random_level($sv) {
      switch ($sv) {
        case 1:
            $str = "Liên Quân";
            break;
        case 2:
            $str = "Liên Quân";
            break;
        case 3:
            $str = "Liên Quân";
            break;
        case 4:
            $str = "Liên Quân";
            break;
        case 5:
            $str = "Liên Quân";
            break;
        case 6:
            $str = "Free Fire";
            break;
        case 7:
            $str = "Free Fire";
            break;
        case 8:
            $str = "Free Fire";
            break;
        case 9:
            $str = "Free Fire";
            break;
        case 10:
            $str = "Kim Cương Free Fire";
            break;
        case 11:
            $str = "Kim Cương Free Fire";
            break;
        case 12:
            $str = "";
            break;
        case 13:
            $str = "";
            break;
        case 14:
            $str = "";
            break;
        case 15:
            $str = "";
            break;
        default:
            $str = '';
            break;
    }
    return $str;
}
public function random_notify($sv) {
      switch ($sv) {
        case 1:
            $str = "Thử Vận May 7k Bạn Phải Chấp Nhận Hên Xui, 50% Tài Khoản Đều Đúng, 30% Acc Sai Pass Hoặc Tài Khoản,60% ACC Vip Hoặc Cùi Trắng Thông Tin Đổi Pass Được,40% Acc Vip Hoặc Cùi Có Thông Tin Không Đổi Pass Được,AE ĐỌC KĨ TRƯỚC KHI MUA TRÁNH NHỮNG HIỂU LẦM KHÔNG ĐÁNG CÓ";
            break;
        case 2:
            $str = "Acc 100% trắng thông tin. 50% acc trên 10 tướng. 40% acc 20-40 tướng . 10% acc trên 70 trang phục";
            break;
        case 3:
            $str = "100% trắng thông tin - 30% acc vip trên 100 skin";
            break;
        case 4:
            $str = "acc 100% trắng thông tin . 10% acc trên 15 tướng. 70% acc trên 20 tướng. 20% acc khủng nhiều skin";
            break;
        case 5:
            $str = "acc 100% trắng thông tin. 10% acc trên 20 tướng. 50% acc trên 30 tướng . 30% acc full tướng và skin";
            break;
        case 6:
            $str = "Bạn Phải Chấp Nhận Hên Xui Không Thắc Mắc ADMIN Về Thử Vận May Này : 60% acc sai mật khẩu acc bị xác minh acc bị khóa , 40% acc đúng . được acc đúng các bạn vào fanpage xem hướng dẫn đổi thông tin";
            break;
        case 7:
            $str = "ACC ĐĂNG NHẬP FACEBOOK .100% ACC ĐÚNG ,40% ACC NGON NHIỀU SKIN , 45% ACC Đủ Chơi , 10% ACC CÙI, 5% acc bị xác minh ( Chú Ý : chỉ đăng nhập bằng 3g 4g để tránh xác minh ) Shop ko hỗ trợ xác minh cho thử vận may này, AE cân nhắc trước khi mua!";
            break;
        case 8:
            $str = "ACC ĐĂNG NHẬP FACEBOOK. 100% ACC ĐÚNG ,60% ACC NGON NHIỀU SKIN , 35% ACC ĐỦ CHƠI, 5% ACC CÙI (Chú Ý :chỉ đăng nhập bằng 3G 4G để tránh xác minh )hỗ trợ xác minh hình ảnh bạn bè 1 lần";
            break;
        case 9:
            $str = "Acc đăng nhập Facebook 50% là đúng mk tài khoản ( xin lưu ý khi mua nick các bạn đăng nhập trực tiếp vào game nếu làm sai shop sẽ không chịu trách nhiệm";
            break;
        case 10:
            $str = "70% nhận được kim cương :60 % nhận gói kim cương bất kỳ,10% nhận gói 2000kc , 30% còn lại nhận được nick ff ngẫu nhiên :nhưng lưu ý nhận nick đăng nhập trực tiếp trong game để tránh mất nick, làm sai shop không chịu trách nhiệm!";
            break;
        case 11:
            $str = "100% nhận đã kim cương , 30% nhận đc gói 2000kc ,70% còn lại nhận gói kim cương bất kỳ";
            break;
        case 12:
            $str = "ACC đăng nhập facebook  100% đúng MK , Chắc chắn nhận acc có đồ cam hoặc skin vũ khí và có cơ hội sở hữu acc vip  ( Lưu Ý: Đăng nhập bằng 3g 4g ) hỗ trợ xác minh hình ảnh bạn bè 1 lần";
            break;
        case 13:
            $str = "CÁC BẠN ĐỌC KỸ TRƯỚC KỸ MUA THỬ VẬN MAY NÀY TRÁNH THẮC MẮC AD : 40% tỉ lệ acc sai mật khẩu, 30%  ACC THƯỜNG , 10% nhận ACC NGON NHIỀU SKIN, 20% nhận được acc 999UC";
            break;
        case 14:
            $str = "30% Nhận Phiếu May Mắn , 30% Nhận Gói UC Bất Kỳ , 20% Nhận 500 UC, 20% Nhận ACC có 1000 UC";
            break;
        case 15:
            $str = "100% Nhận được UC :40% Nhận 1000 UC, 40% Nhận Gói UC Bất Kì, 20% Nhận 3000 UC";
            break;
        default:
            $str = 'null';
            break;
    }
    return $str;
}
public function get_string_card($card) {
      switch ($card) {
        case 1:
            $str = "Viettel";
            break;
        case 2:
            $str = "Mobifone";
            break;
        case 3:
            $str = "Vinaphone";
            break;
        case 4:
            $str = "Gate";
            break;
        case 5:
            $str = "Vcoin";
            break;
        case 6:
            $str = "Vietnammobile";
            break;
        case 7:
            $str = "Zing";
            break;
        case 8:
            $str = "BIT";
            break;
        case 9:
            $str = "MegaCard";
            break;
        case 10:
            $str = "Oncash";
            break;
        default:
            $str = "null";
            break;
    }
    return $str;
}
public function int_card($card) {
      switch ($card) {
        case viettel:
            $str = 1;
            break;
        case mobi:
            $str = 2;
            break;
        case vina:
            $str = 3;
            break;
        default:
            $str = $card;
            break;
    }
    return $str;
}
public function string_card_tichhop247($card) {
      switch ($card) {
        case 1:
            $str = 'viettel';
            break;
        case 2:
            $str = 'mobi';
            break;
        case 3:
            $str = 'vina';
            break;
        default:
            $str = $card;
            break;
    }
    return $str;
}

public function get_string_status_card($frame) {
      switch ($frame) {
        case 0:
            $str = "Chờ duyệt...";
            break;
        case 1:
            $str = "Thành công";
            break;
        case 2:
            $str = "Thẻ sai hoặc đã sử dụng";
            break;
        case 3:
            $str = "Chọn sai mệnh giá";
            break;
        case 4:
            $str = "Bảo trì. Vui lòng nạp lại sau";
            break;
        case 5:
            $str = "Sai ID Ingame";
            break;
        default:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}

public function color_status($cl) {
      switch ($cl) {
        case 0:
            $str = "blue";
            break;
        case 1:
            $str = "green";
            break;
        case 2:
            $str = "red";
            break;
        case 3:
            $str = "white";
            break;
        case 4:
            $str = "#FDB603";
            break;
        default:
            $str = "red";
            break;
    }
    return $str;
}    


public function get_percent($pc) {
      switch ($pc) {
        case 1:
            $str = 10;
            break;
        case 3:
            $str = 15;
            break;
        case 5:
            $str = 20;
            break;
        case 7:
            $str = 30;
            break;
        case 10:
            $str = 40;
            break;
        case 14:
            $str = 50;
            break;
        default:
            $str = 100;
            break;
    }
    return $str;
}

public function day_to_seconds($sc) {
      switch ($sc) {
        case 1:
            $str = 86400;
            break;
        case 3:
            $str = 259200;
            break;
        case 5:
            $str = 432000;
            break;
        case 7:
            $str = 604800;
            break;
        case 10:
            $str = 864000;
            break;
        case 14:
            $str = 1209600;
            break;
        default:
            $str = 0;
            break;
    }
    return $str;
}
public function status_pre_order($sc) {
      switch ($sc) {
        case 0:
            $str = "Chờ thanh toán";
            break;
        case 1:
            $str = "Hoàn thành";
            break;
        case 2:
            $str = "Hết hạn trả góp";
            break;
        default:
            $str = "Không xác định";
            break;
    }
    return $str;
}
    
    
}
?>