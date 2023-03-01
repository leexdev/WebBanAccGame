<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Youtuber THI FF VLOG          ║
║      Facebook: facebook.com/ytbThiFF        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/

$auto_card_1 = $db->fetch_assoc("SELECT * FROM auto_card WHERE id = '1'", 1);
$auto_card_2 = $db->fetch_assoc("SELECT * FROM auto_card WHERE id = '2'", 1);
$ck_card_1 = $db->fetch_assoc("SELECT * FROM ck_card WHERE id = '1'", 1);
$ck_card_2 = $db->fetch_assoc("SELECT * FROM ck_card WHERE id = '2'", 1);
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="content">
<form id="setting_other">
<h4 class="title" style="font-weight:bold;">Trạng thái gạch tự động</h4>
<div class="row">
 <div class="col-sm-4 col-xs-6">
  <div class="form-group">
    <label for="ac_1">Viettel</label>
    <select class="form-control border-input" id="ac_1" name="ac_1">
        <option value="off" <?php echo ($auto_card_1['1'] != "on") ? 'selected':''; ?>>Bảo trì</option>
        <option value="on" <?php echo ($auto_card_1['1'] == "on") ? 'selected':''; ?>>Hoạt động</option>
    </select>
  </div>
 </div>
 <div class="col-sm-4 col-xs-6">
  <div class="form-group">
    <label for="ac_2">Mobifone</label>
    <select class="form-control border-input" id="ac_2" name="ac_2">
        <option value="off" <?php echo ($auto_card_1['2'] != "on") ? 'selected':''; ?>>Bảo trì</option>
        <option value="on" <?php echo ($auto_card_1['2'] == "on") ? 'selected':''; ?>>Hoạt động</option>
    </select>
  </div>
 </div>
 <div class="col-sm-4 col-xs-6">
  <div class="form-group">
    <label for="ac_3">Vinaphone</label>
    <select class="form-control border-input" id="ac_3" name="ac_3">
        <option value="off" <?php echo ($auto_card_1['3'] != "on") ? 'selected':''; ?>>Bảo trì</option>
        <option value="on" <?php echo ($auto_card_1['3'] == "on") ? 'selected':''; ?>>Hoạt động</option>
    </select>
  </div>
 </div>
</div>
<h4 class="title" style="font-weight:bold;">Chiết khấu gạch tự động</h4>
<div class="row">
 <div class="col-sm-4 col-xs-6">
  <div class="form-group">
    <label for="ck1">Viettel (%)</label>
    <input type="number" class="form-control border-input" id="ck1" name="ck1" placeholder="<?php echo 100-$ck_card_1['1']; ?>" value="<?php echo 100-$ck_card_1['1']; ?>">
  </div>
 </div>
 <div class="col-sm-4 col-xs-6">
  <div class="form-group">
    <label for="ck2">Mobifone (%)</label>
    <input type="number" class="form-control border-input" id="ck2" name="ck2" placeholder="<?php echo 100-$ck_card_1['2']; ?>" value="<?php echo 100-$ck_card_1['2']; ?>">
  </div>
 </div>
 <div class="col-sm-4 col-xs-6">
  <div class="form-group">
    <label for="ck3">Vinaphone (%)</label>
    <input type="number" class="form-control border-input" id="ck3" name="ck3" placeholder="<?php echo 100-$ck_card_1['3']; ?>" value="<?php echo 100-$ck_card_1['3']; ?>">
  </div>
 </div>
</div>

<hr>

<h4 class="title" style="font-weight:bold;">Trạng thái gạch chậm</h4>
<div class="row">
 <div class="col-sm-4 col-xs-6">
  <div class="form-group">
    <label for="acc_1">Viettel</label>
    <select class="form-control border-input" id="acc_1" name="acc_1">
        <option value="off" <?php echo ($auto_card_2['1'] != "on") ? 'selected':''; ?>>Bảo trì</option>
        <option value="on" <?php echo ($auto_card_2['1'] == "on") ? 'selected':''; ?>>Hoạt động</option>
    </select>
  </div>
 </div>
 <div class="col-sm-4 col-xs-6">
  <div class="form-group">
    <label for="acc_2">Mobifone</label>
    <select class="form-control border-input" id="acc_2" name="acc_2">
        <option value="off" <?php echo ($auto_card_2['2'] != "on") ? 'selected':''; ?>>Bảo trì</option>
        <option value="on" <?php echo ($auto_card_2['2'] == "on") ? 'selected':''; ?>>Hoạt động</option>
    </select>
  </div>
 </div>
 <div class="col-sm-4 col-xs-6">
  <div class="form-group">
    <label for="acc_3">Vinaphone</label>
    <select class="form-control border-input" id="acc_3" name="acc_3">
        <option value="off" <?php echo ($auto_card_2['3'] != "on") ? 'selected':''; ?>>Bảo trì</option>
        <option value="on" <?php echo ($auto_card_2['3'] == "on") ? 'selected':''; ?>>Hoạt động</option>
    </select>
  </div>
 </div>
</div>
<h4 class="title" style="font-weight:bold;">Chiết khấu gạch chậm</h4>
<div class="row">
 <div class="col-sm-4 col-xs-6">
  <div class="form-group">
    <label for="ckc1">Viettel (%)</label>
    <input type="number" class="form-control border-input" id="ckc1" name="ckc1" placeholder="<?php echo 100-$ck_card_2['1']; ?>" value="<?php echo 100-$ck_card_2['1']; ?>">
  </div>
 </div>
 <div class="col-sm-4 col-xs-6">
  <div class="form-group">
    <label for="ckc2">Mobifone (%)</label>
    <input type="number" class="form-control border-input" id="ckc2" name="ckc2" placeholder="<?php echo 100-$ck_card_2['2']; ?>" value="<?php echo 100-$ck_card_2['2']; ?>">
  </div>
 </div>
 <div class="col-sm-4 col-xs-6">
  <div class="form-group">
    <label for="ckc3">Vinaphone (%)</label>
    <input type="number" class="form-control border-input" id="ckc3" name="ckc3" placeholder="<?php echo 100-$ck_card_2['3']; ?>" value="<?php echo 100-$ck_card_2['3']; ?>">
  </div>
 </div>
</div>

<div class="footer">
<hr>
  <button type="submit" class="btn btn-default">LƯU</button>
</div>
</form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>