<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Youtuber THI FF VLOG          ║
║      Facebook: facebook.com/monkamtv        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/

$username = GET("username");
$sql_get = "SELECT * FROM accounts WHERE username = '$username'";
if ($db->num_rows($sql_get)) {
$data = $db->fetch_assoc($sql_get, 1); 
}else{
new Redirect("/admin/member"); 
}
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thông tin người dùng #<font color="red"><?php echo $username;?></font></h4>
                            </div>
                            <div class="content">
<form id="edit_member">
    <input type="hidden" name="username" value="<?php echo $data['username']; ?>"> 
<div class="row">
 <div class="col-sm-4">
  <div class="form-group">
    <label for="id">ID:</label>
    <input type="text" class="form-control border-input" name="id" placeholder="<?php echo $data['id']; ?>" value="<?php echo $data['id']; ?>" disabled>
  </div>
 </div>
 <div class="col-sm-4">
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control border-input" placeholder="<?php echo $data['username']; ?>" value="<?php echo $data['username']; ?>" disabled>
  </div>
 </div>
 <div class="col-sm-4">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control border-input" id="name" name="name" placeholder="<?php echo $data['name']; ?>" value="<?php echo $data['name']; ?>">
  </div>
 </div>
</div>
<div class="row">
 <div class="col-sm-4">
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control border-input" id="email" name="email" placeholder="<?php echo $data['email']; ?>" value="<?php echo $data['email']; ?>">
  </div>
 </div>
 <div class="col-sm-4">
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="text" class="form-control border-input" id="phone" name="phone" placeholder="<?php echo $data['phone']; ?>" value="<?php echo $data['phone']; ?>">
  </div>
 </div>
 <div class="col-sm-4">
  <div class="form-group">
    <label for="cash">Cash:</label>
    <input type="number" class="form-control border-input" id="cash" name="cash" placeholder="<?php echo $data['cash']; ?>" value="<?php echo $data['cash']; ?>">
  </div>
 </div>
</div>

<div class="row">
 <div class="col-sm-4">
  <div class="form-group">
    <label for="block">Trạng thái:</label>
    <select class="form-control border-input" id="block" name="block">
        <option value="0" <?php echo ($data['block']=='0') ? 'selected':''; ?>>Hoạt động</option>
        <option value="1" <?php echo ($data['block'] > '0') ? 'selected':''; ?>>Bị khóa</option>
    </select> 
  </div>
 </div>
 <div class="col-sm-4">
  <div class="form-group">
    <label for="days_block">Thời gian khóa:</label>
    <select class="form-control border-input" id="days_block" name="days_block">
        <option value="1" <?php echo ($data['days_block'] == '1') ? 'selected':''; ?>>1 ngày</option>
        <option value="3" <?php echo ($data['days_block'] == '3') ? 'selected':''; ?>>3 ngày</option>
        <option value="7" <?php echo ($data['days_block'] == '7') ? 'selected':''; ?>>7 ngày</option>
        <option value="15" <?php echo ($data['days_block'] == '15') ? 'selected':''; ?>>15 ngày</option>
        <option value="30" <?php echo ($data['days_block'] == '30') ? 'selected':''; ?>>30 ngày</option>
    </select> 
  </div>
 </div>
 <div class="col-sm-4">
  <div class="form-group">
    <label for="note">Lỗi vi phạm:</label>
        <input type="text" class="form-control border-input" id="note" name="note" placeholder="Lỗi vi phạm (nếu bị khóa)" value="<?php echo $data['note']; ?>">
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