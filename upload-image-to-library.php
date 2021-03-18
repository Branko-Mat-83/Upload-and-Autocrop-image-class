<?php
include 'classes/upload-image.class.php';
include 'includes/upload-image.inc.php';
include 'classes/upload-image-script.class.php';
include 'includes/upload-image-script.inc.php';
?>
<?php
// THIS IS CLASS WITH UPLOAD FULL SIZED IMAGE TO THE FOLDER --- START
$upload_image_class->UploadImageFn('upload_image_to_library_input',14680064,'JPG and PNG files');
// THIS IS CLASS WITH UPLOAD FULL SIZED IMAGE TO THE FOLDER --- END
if($image_exist=='TRUE'){
// THIS IS CLASS WITH CROPPING (WIDTH AND HEIGHT) AND UPLOAD FULL SIZED IMAGE TO THE  FOLDER --- START
$upload_image_class->CropImageFn($uploaded_image,256,256,80);
// THIS IS CLASS WITH CROPPING (WIDTH AND HEIGHT) AND UPLOAD FULL SIZED IMAGE TO THE  FOLDER --- END

// THIS IS CLASS WITH CROPPING (WIDTH AND AUTO HEIGHT) AND UPLOAD FULL SIZED IMAGE TO THE  FOLDER --- START
$upload_image_class->CropImageAutoFn($uploaded_image,480,80);
// THIS IS CLASS WITH CROPPING (WIDTH AND AUTO HEIGHT) AND UPLOAD FULL SIZED IMAGE TO THE  FOLDER --- END
}
?>	
<div class="one-third-column">
<h4>Original image</h4>
<div class="small-img-cont">
<div class="lds-cont">
<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>
<img src="img/<?php echo $filename_small;?>" />
</div>
<p style="text-align:center; margin-top:20px;"><a href="<?php echo $uploaded_image;?>" target="_blank" class="btn btn-primary btn-sm" />View Image</a></p>
</div>
<div class="one-third-column">
<h4>Resized image (auto height)</h4>
<div class="small-img-cont">
<div class="lds-cont">
<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>
<img src="img/<?php echo $filename_small;?>" />
</div>
<p style="text-align:center; margin-top:20px;"><a href="img/<?php echo $filename_resized;?>" target="_blank"  class="btn btn-primary btn-sm" />View Image</a></p>
</div>
<div class="one-third-column">
<h4>Resized image (custom)</h4>
<div class="small-img-cont">
<div class="lds-cont">
<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>
<img src="img/<?php echo $filename_small;?>" />
</div>
<p style="text-align:center; margin-top:20px;"><a href="img/<?php echo $filename_small;?>" target="_blank"  class="btn btn-primary btn-sm" />View Image</a></p>
</div>
<div class="clearfix"></div>
