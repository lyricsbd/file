<?php if($mode == 'edit') 		$id	  =	del_id($id);		$arrz = $mlivedb->query(" * ","album"," album_id = '$id'");		$action			= "index.php?act=topic-album&mode=edit&id=".en_id($id);		if(isset($_POST['submit'])) {			if($_POST['submit']) {				mss ("Chưa nhập đầy đủ thông tin ");			}			else {					$topic		 = implode(',',$_POST['topic']);					$topic		 = ",".$topic.",";					@mysqli_query($link_music,"UPDATE table_album SET						album_topic			=	'".$topic."' WHERE album_id = '".$id."'");				mss ("Update Album Chủ Đề thành công ","index.php?act=list-album&mode=list-album");			}		}	?>		 <section class="content">          <div class="row">            <div class="col-md-6">           <div class="box box-danger">                              <div class="box-header">                  <h3 class="box-title">Sửa<small>/Album Media</small></h3>                  <!-- tools box -->                  <div class="pull-right box-tools">                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>                  </div><!-- /. tools -->                </div><!-- /.box-header -->                <div class="box-body pad">
                <form action="<?=$action;?>" method="post" enctype="multipart/form-data"><div class="input-group">                    <div class="input-group-btn">                        <button type="button" class="btn btn-info"><i class="fa fa-youtube-play"> Album</i> <?php  echo $arrz[0][1];?> </button>                    </div><!-- /btn-group -->                  </div><!-- /input-group -->				  <br/>
<div class="form-group has-success">                      <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Đưa Vào Chủ Đề</label><br/>				<?=acp_topic($arrz[0][15]);?>                  </div><br/><br/> <br/> <br/> <br/> <br/> 
<div class="box-footer">                    <button type="submit" name="submit" class="btn btn-primary">ĐỒNG Ý</button>					<button type="submit" type="reset" class="btn btn-default">Nhập Lại</button>                  </div>				  </form>				   </div> <!-- /box-body -->				   </div> <!-- /box box-danger -->				   </div></div></div></section>