<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
$setting_wheel = $db->fetch_assoc("SELECT * FROM `setting_wheel` LIMIT 1", 1);
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Chỉnh tỷ lệ random</h4>
                            </div>
                            <div class="content">
<form id="ratio_wheel"> 
<div class="row">
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="wheel_1"><?=info_wheel(1)['msg'];?>:</label>
            <input type="number" class="form-control border-input" id="wheel_1" name="wheel_1" placeholder="<?=$setting_wheel['1']; ?>" value="<?=$setting_wheel['1']; ?>">
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="wheel_2"><?=info_wheel(2)['msg'];?>:</label>
            <input type="number" class="form-control border-input" id="wheel_2" name="wheel_2" placeholder="<?=$setting_wheel['2']; ?>" value="<?=$setting_wheel['2']; ?>">
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="wheel_3"><?=info_wheel(3)['msg'];?>:</label>
            <input type="number" class="form-control border-input" id="wheel_3" name="wheel_3" placeholder="<?=$setting_wheel['3']; ?>" value="<?=$setting_wheel['3']; ?>">
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="wheel_4"><?=info_wheel(4)['msg'];?>:</label>
            <input type="number" class="form-control border-input" id="wheel_4" name="wheel_4" placeholder="<?=$setting_wheel['4']; ?>" value="<?=$setting_wheel['4']; ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="wheel_5"><?=info_wheel(5)['msg'];?>:</label>
            <input type="number" class="form-control border-input" id="wheel_5" name="wheel_5" placeholder="<?=$setting_wheel['5']; ?>" value="<?=$setting_wheel['5']; ?>">
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="wheel_6"><?=info_wheel(6)['msg'];?>:</label>
            <input type="number" class="form-control border-input" id="wheel_6" name="wheel_6" placeholder="<?=$setting_wheel['6']; ?>" value="<?=$setting_wheel['6']; ?>">
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="wheel_7"><?=info_wheel(7)['msg'];?>:</label>
            <input type="number" class="form-control border-input" id="wheel_7" name="wheel_7" placeholder="<?=$setting_wheel['7']; ?>" value="<?=$setting_wheel['7']; ?>">
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <div class="form-group">
            <label for="wheel_8"><?=info_wheel(8)['msg'];?>:</label>
            <input type="number" class="form-control border-input" id="wheel_8" name="wheel_8" placeholder="<?=$setting_wheel['8']; ?>" value="<?=$setting_wheel['8']; ?>">
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3 col-xs-6">
        <div class="form-group">
            <label for="huvang">Hũ vàng:</label>
            <input type="number" class="form-control border-input" id="huvang" name="huvang" placeholder="<?=$setting_wheel['huvang']; ?>" value="<?=$setting_wheel['huvang']; ?>">
        </div>
    </div>
    <div class="col-sm-3 col-xs-6">
        <div class="form-group">
            <label for="wheel_price">Giá Quay:</label>
            <input type="number" class="form-control border-input" id="wheel_price" name="wheel_price" placeholder="<?=$setting_wheel['wheel_price']; ?>" value="<?=$setting_wheel['wheel_price']; ?>">
        </div>
    </div>
    <div class="col-sm-3 col-xs-6">
        <div class="form-group">
            <label for="id_nohu">Username Nổ Hũ:</label>
            <input type="text" class="form-control border-input" id="id_nohu" name="id_nohu" placeholder="<?=$setting_wheel['id_nohu']; ?>" value="<?=$setting_wheel['id_nohu']; ?>">
        </div>
    </div>
    <div class="col-sm-3 col-xs-6">
        <div class="form-group">
            <label for="status">Trạng thái:</label>
            <select class="form-control border-input" id="status" name="status">
                <option value="0" <?=($setting_wheel['status']=='0') ? 'selected':''; ?>>Bảo trì</option>
                <option value="1" <?=($setting_wheel['status']=='1') ? 'selected':''; ?>>Hoạt động</option>
            </select> 
        </div>
    </div>
</div>
<div class="footer">
<hr>
  <button type="submit" class="btn btn-default">LƯU</button>
</div>
</form>
<blockquote class="blockquote">
  <p>* Tỉ lệ được tính theo phần trăm (%).</p>
  <p>* Tỉ lệ < 2% thì sẽ không bao giờ trúng.</p>
</blockquote>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>