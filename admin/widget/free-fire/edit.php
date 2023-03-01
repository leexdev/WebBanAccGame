<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
$select = new Info;
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/assets/ajax/systems/edit.php');
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php    
	                    $arr_info = glob($root."/assets/files/post/".$id."-*");
    					if($arr_info){
    					?>
		                <div class="col-md-12"><div class="card">
	                            <div class="header">
	                                <h4 class="title">Ảnh thông tin ID #<?php echo $id; ?></h4>
	                            </div>
		                <div class="content"><div class="row">
		                	<?php foreach ($arr_info as $inf) { 
		                	$img = str_replace($root,"",$inf);		
    	                	$name = str_replace($root."/assets/files/post/","",$inf);		
		                	?>
    	                	<div class="col-sm-4 col-xs-6"><img src="<?php echo $img; ?>" class="img-responsive img-thumbnail" onclick="del_img('<?php echo $name; ?>','<?php echo $img; ?>');" style="height:240px;width:480px;"></div>
		                	<?php } ?>
		                </div></div></div></div>
		                <?php } ?>
		                
		                
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit ID <b>#<?php echo $id;?></b> <?php echo $products['type_account']?></h4> </h4>
                            </div>
                            <div class="content">                                
                            <form id="form_create" action="" enctype ="multipart/form-data" method="POST">
                            <input type="hidden" name="type_account" value="<?php echo $products['type_account']?>">
                            <div class="row">
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="username">Tên đăng nhập:</label>
                                <input type="text" class="form-control border-input" id="username" name="username" placeholder="<?php echo $products['username']?>" value="<?php echo $products['username']?>">
                              </div></div>
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="password">Mật khẩu:</label>
                                <input type="text" class="form-control border-input" name="password" placeholder="<?php echo $products['password']?>" value="<?php echo $products['password']?>">
                              </div></div>
                             <div class="col-sm-4">
                              <div class="form-group">
                                <label for="price">Giá tiền:</label>
                                <input type="number" class="form-control border-input" id="price" name="price" placeholder="<?php echo $products['price']?>" value="<?php echo $products['price']?>">
                              </div></div>
                            </div>
                            <div class="row">
                              <div class="col-sm-3">
                              <div class="form-group">
                                <label for="champs_count">Số Skin Súng:</label>
                               <input type="number" class="form-control border-input" name="champs_count" placeholder="<?php echo $products['champs_count']?>" value="<?php echo $products['champs_count']?>">
                              </div></div>
                             <div class="col-sm-3">
                              <div class="form-group">
                                <label for="skins_count">Số trang phục:</label>
                               <input type="number" class="form-control border-input" name="skins_count" placeholder="<?php echo $products['skins_count']?>" value="<?php echo $products['skins_count']?>">
                              </div></div>
                             <div class="col-sm-3">
                              <div class="form-group">
                                <label for="gem_count">Số Pet:</label>
                               <input type="number" class="form-control border-input" name="gem_count" placeholder="<?php echo $products['gem_count']?>" value="<?php echo $products['gem_count']?>">
                              </div></div>
                             <div class="col-sm-3">
                              <div class="form-group">
                                <label for="rank">Hạng:</label>
                                 <select class="form-control border-input" name="rank">
                                    <?php
                                        for ($i = 0; $i < 29; $i++){
                                        if($i == $products['rank']):
                                            echo '<option value="'.$i.'" selected>'.$select->get_string_rank($i).'</option>';
                                        else:
                                            echo '<option value="'.$i.'">'.$select->get_string_rank($i).'</option>';
                                        endif;        
                                    }?>
                                 </select>
                                </div></div>                            
                            </div>                          
                            <div class="row">  
                             <div class="col-sm-6">
                              <div class="form-group">
                                <label for="thumb">Ảnh mô tả:</label>
                                <input type="file" id="thumb" name="thumb" class="form-control border-input" />
                              </div></div>
                             <div class="col-sm-6">
                              <div class="form-group">
                                <label for="champs">Ảnh thoong tin:</label>
                                <input type="file" id="champs" name="champs[]" class="form-control border-input" multiple />
                              </div></div>
                             </div>
                            <div class="form-group">
                                <label for="password">Ghi chú:</label>
                                <input type="text" class="form-control border-input" name="note" placeholder="<?php echo $products['note']?>" value="<?php echo $products['note']?>">
                            </div>



                                                                <div class="footer">
                                                                <hr>
                              <button type="submit" class="btn btn-default">CẬP NHẬT</button>

                                                            </div>
                            </form>

                                </div>
                                <blockquote class="blockquote">
                                  <p>* Giữ ctrl để chọn được nhiều ảnh một lần</p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>

            </div>