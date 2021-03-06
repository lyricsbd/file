<?php 
define('MLive-Channel',true);
include("./includes/configurations.php");
include("./includes/ajax.php");
include("./includes/functions_user.php");
if(!$_SESSION["mlv_user_id"])  mss("Bạn chưa đăng nhập vui lòng đăng nhập để sử dụng chức năng này.","".SITE_LINK."");
?>
<!DOCTYPE html>
<html lang="vi">
    <head> <title>UPLOAD <?=WEB_NAME;?></title>
<link rel="alternate" media="only screen and (max-width: 640px)" href="">
<meta name="title" content="UPLOAD <?=WEB_NAME;?>" />
<meta name="description" content="<?=WEB_DES;?>" />
<meta name="keywords" content="<?=WEB_KEY;?>" />
<meta property="og:title" content="UPLOAD <?=WEB_NAME;?>" />                
<meta property="og:description" content="<?=WEB_DES;?>" />        
<meta property="og:image" content="<?php  echo SITE_LINK;?>theme/images/logo_600x600.png" />
<meta property="og:image:url" content="<?php  echo SITE_LINK;?>theme/images/logo_600x600.png" />
<meta property="og:url" content="<?=SITE_LINK;?>" />
<link rel="image_src" href="<?php  echo SITE_LINK;?>theme/images/logo_600x600.png" />
<?php  include("./theme/ip_java.php");?>
<script type="text/javascript" src="up_v1/swfupload.js"></script>
<script type="text/javascript" src="up_v1/fileprogress.js"></script>
<script type="text/javascript" src="up_v1/handlers.js"></script>
<link rel="stylesheet" href="up_v1/default.css" type="text/css" />
<script type="text/javascript">
		var swfu;

		window.onload = function () {
			swfu = new SWFUpload({
				// Backend settings
				upload_url: mainURL+"upload.php",
				file_post_name: "resume_file",

				// Flash file settings
				file_size_limit : "50 MB",
				file_types : "*.f4v;*.flv;*.mp4;*.mp3",
				file_types_description : "All Files",
				file_upload_limit : 0,
				file_queue_limit : 1,

				// Event handler settings
				swfupload_loaded_handler : swfUploadLoaded,
				
				file_dialog_start_handler: fileDialogStart,
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				
				//upload_start_handler : uploadStart
				swfupload_preload_handler : preLoad,
				swfupload_load_failed_handler : loadFailed,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,

				// Button Settings
				button_image_url : mainURL+"up_v1/upload.png",
				button_placeholder_id : "spanButtonPlaceholder",
				button_width: 61,
				button_height: 22,
				
				// Flash Settings
				flash_url : mainURL+"up_v1/swfupload.swf",
				flash9_url : mainURL+"up_v1/swfupload_fp9.swf",

				custom_settings : {
					progress_target : "fsUploadProgress",
					upload_successful : false
				},
				
				// Debug settings
				debug: false
			});

		};
	</script>
</head>
<body>

	<?php  include("./theme/ip_header.php");?>
	 <div class="wrapper-page"> <div class="wrap-body group  page-artist-genre container">
    <div class="wrap-2-col">
 <div class="wrap-content">

        <div id="previews" >
            <div id="tplUp" class="box-upload">
<form id="form1" action="thanks.php" enctype="multipart/form-data" method="post">
<ul class="tab-link list-inline">
     <li><a class="fn-showgenre" data-show=".fn-genre-vn" data-hide=".fn-genre" href="./upload.html">UPLOAD LINK</a></li>
  <li><a class="fn-showgenre active" data-show=".fn-genre-am" data-hide=".fn-genre" href="./upload-1.html">UPLOAD FILE</a></li>
</ul>
<div class="tab-menu group"></div>
                    <div class="edit-media-box fn-edit-box">
                       <!-- <div class="upload-heading">
                            <span class="fn-size">
                                <s class="fn-uploaded">0</s>MB/<s class="fn-total">0</s>MB</span>
                            <i class="close fn-cancel">
                            </i>
                            <div class="clearfix">
                            </div>
                            <div class="process fn-progress">
                                <div class="state-upload-bar fn-progress-bar" style="width:0%">
                                </div>
                            </div>
                        </div>-->
                        <div class="upload-form row mb0">
                            <div class="zthumb col-3">
                                <img class="fn-thumb" src="<?php echo $avatar = check_img(get_data("user","avatar","userid = '".$_SESSION["mlv_user_id"]."'"));?>" alt="item name">
                                    <i class="icon-edit">
                                    </i>
                            </div>
                            <div class="upload-body col-9">
                                <div class="row mb0">
                                    <input name="filename" type="hidden" value=""/>
                                    <input name="duration" type="hidden" value="0"/>
                                    <div class="form-control col-12">
                                        <label for="name">Tên bài hát</label>
                                        <input name="song_name" id="song_name" type="text" class="frm-textbox"/>
										<span style="color:red;"><i>Tên chủ đề bài hát, clip, phim dạng tiếng Việt có dấu. </i></span>
                                    </div>
                                    <div class="form-control col-12">
                                        <label for="artist">Ca sĩ, diễn viên trình diễn:<select class="upload_tgt" style="width: 150px;" name="singer_type" class="user">
										<option value="1">Ca Sĩ Việt Nam</option>
										<option value="2">Ca Sĩ Âu Mỹ</option>
										<option value="2">Ca Sĩ Châu Á</option>
										</select></label>
                                        <input name="singer_new" id="singer_new" type="text" class="frm-textbox"/>
                                        <input name="artist_id" id="artist_id" type="hidden" class="frm-textbox"/>
										
                                    </div>
									   <div class="form-control col-12">
                                        <label for="name">Thể loại <?php  echo acp_cat(1);?></label>
                                       
                    <span style="color:red;"><i>Thể loại chính của ca khúc. Nếu không biết thì chọn là "Thể loại khác" </i></span>
                                    </div>

									<tr>
					<td valign="top" align="right"><label for="txtFileName">File Upload: </label></td>
					<td>
						<div>
							<div>
								<input type="text" id="txtFileName" disabled="true" style="border: solid 1px; background-color: #FFFFFF;" />
								<span id="spanButtonPlaceholder"></span>
							</div>
							<div class="flash" id="fsUploadProgress">
								<!-- This is where the file progress gets shown.  SWFUpload doesn't update the UI directly.
											The Handlers (in handlers.js) process the upload events and make the UI updates -->
							</div>
							<input type="hidden" name="hidFileID" id="hidFileID" value="" />
							<!-- This is where the file ID is stored after SWFUpload uploads the file and gets the ID back from upload.php -->
						</div>
                        <div><i>File upload không quá 50 Mb, có dạng MP3, FLV, MPEG, MPG, MP4</i></div>

					</td>
				</tr>
									   <div class="form-control col-12">
                                        <label for="name">Định Dạng MEDIA  
		<select  name="type" id="type">".
		<option value="1">MP3</option>
		<option value="2">VIDEO</option>
	</select></label>
                                     
                                    </div>
									
									   <div class="form-control col-12">
                                        <label for="name">IMG THUMB <input type="file" name="img" size=50> </label>
										
					<input type="checkbox" name="grab_img">
                        GRAD IMG (Youtube, Zing Video) <br/>
                                        <input name="img" id="img" type="text" placeholder="Nhập Link Ảnh VIDEO" class="frm-textbox"/>
										
					
                                    </div>
									  
                                    <div class="form-control col-12">
                                        <label for="lyrics">Lời bài hát</label>
                                        <textarea name="lyric" id="lyric" cols="30" rows="7" class="frm-textarea"></textarea>
                                    </div>
                                  
                                    <div class="form-control col-12 mt20">

										<input  value="Lưu" class="button btn-dark-blue pull-right fn-save" type="submit" id="btnSubmit" />
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
        <!--2-->
		 <div class="wrap-sidebar">
        <div class="widget widget-text">
            <h4>Nội dung cấm upload:</h4>
            <ul>
                <li>- Nội dung liên quan đến chính trị, trái thuần phong mỹ tục</li>
                <li>- Nội dung đã thuộc sở hữu của bên thứ ba, được quy định rõ ở đây.</li>
                <li>- Nội dung đã được phát hành trên Zing MP3.</li>
            </ul>
        </div>
        <div class="widget widget-text">
            <h4>Quy định upload:</h4>
            <ul>
                <li>- Kích thước file nhạc tối đa là 60MB.</li>
                <li>- Mỗi tài khoản thường được phép upload tối đa 200 bài hát (không giới hạn đối với tài khoản VIP).</li>
                <li>- Tính năng upload sẽ bị khóa (tạm thời) nếu bạn cố tình vi phạm nhiều lần các quy định về nội dung cấm (đã nêu ở trên)</li>
            </ul>
        </div>
    </div>
</div>
</div>        
    </div>
            
        </div>

    </div>
	
    <?php  include("./theme/ip_footer.php");?>
</body>
</html>
<?php  
//}
//$cache->close();
?>