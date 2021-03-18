<?php	
class UploadImageClass{
	public function HiddenUploadForm($upload_image_form_id_fn,$upload_image_ajax_link_fn,$upload_image_input_id_fn){
    echo '<div style="height:0px;overflow:hidden">
     <form id="'.$upload_image_form_id_fn.'" action="'.$upload_image_ajax_link_fn.'" method="post" enctype="multipart/form-data">
     <input type="file" name="'.$upload_image_input_id_fn.'" id="'.$upload_image_input_id_fn.'" accept="image/x-png, image/jpeg" />
    </form>
    </div>';		
	}	
		
public function UploadImageFn($upload_image_input_id_fn,$upload_image_max_size_fn,$upload_image_allowed_types_fn){	
    $filename = $_FILES[$upload_image_input_id_fn]['name'];	 
    $safe_path='img/';    
   if($upload_image_allowed_types_fn=='JPG and PNG files'){
	$upload_image_allowed_types_ext=array('.jpg', '.jpeg','.JPG','.JPEG','.png','.PNG');   
   }
   else if($upload_image_allowed_types_fn=='JPG files'){
	$upload_image_allowed_types_ext=array('.jpg', '.jpeg','.JPG','.JPEG');   	   
   }
 
    $allowed_filetypes = $upload_image_allowed_types_ext;
    $max_filesize = $upload_image_max_size_fn;
    $upload_path = $safe_path;
	global $uploaded_image;
	global $image_exist;
	$uploaded_image = $upload_path . $filename;
    $ext = substr($filename, strpos($filename, '.'), strlen($filename) - 1);
     if (!in_array($ext, $allowed_filetypes)){	 
     echo '';	
    }


   if (filesize($_FILES[$upload_image_input_id_fn]['tmp_name']) > $max_filesize){
			echo '';		
     }
    if (!is_writable($upload_path)){
    echo '';			
     }	 
 if (!@getimagesize($_FILES[$upload_image_input_id_fn]['tmp_name'])){
echo '';			
	}
    if (in_array($ext, $allowed_filetypes)){
	if (@getimagesize($_FILES[$upload_image_input_id_fn]['tmp_name'])){
	if (filesize($_FILES[$upload_image_input_id_fn]['tmp_name']) <= $max_filesize){	
    if (is_writable($upload_path)){	
    if (move_uploaded_file($_FILES[$upload_image_input_id_fn]['tmp_name'], $upload_path . $filename)) { 
	$image_exist = 'TRUE';
}
else{
$image_exist = 'FALSE';	
}
}
}
}
}
}
	
public function CropImageFn($full_image_link_fn,$thumb_width_fn,$thumb_height_fn,$thumb_quality){
$full_ses_image=$full_image_link_fn;
if(strpos($full_image_link_fn, '.png') !== false){
$imagecreatefrom_ext= imagecreatefrompng;
}
else{
$imagecreatefrom_ext= imagecreatefromjpeg;	
}	
$new_image_name_fn=rand(1,100000000);
$image = $imagecreatefrom_ext($full_ses_image);
global $filename_small;
$filename_small = $new_image_name_fn . '-resized-wh.jpg';
$upfilename = 'img/' . $filename_small;
$thumb_width = $thumb_width_fn;
$thumb_height = $thumb_height_fn;
$width = imagesx($image);
$height = imagesy($image);

$original_aspect = $width / $height;
$thumb_aspect = $thumb_width / $thumb_height;

if ( $original_aspect >= $thumb_aspect )
{
   // If image is wider than thumbnail (in aspect ratio sense)
   $new_height = $thumb_height;
   $new_width = $width / ($height / $thumb_height);
}
else
{
   // If the thumbnail is wider than the image
   $new_width = $thumb_width;
   $new_height = $height / ($width / $thumb_width);
}

$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

// Resize and crop
imagecopyresampled($thumb,
                   $image,
                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                   0, // Center the image vertically
                   0, 0,
                   $new_width, $new_height,
                   $width, $height);
imagejpeg($thumb, $upfilename, $thumb_quality);
}	


public function CropImageAutoFn($full_image_link_fn,$thumb_width_fn,$thumb_quality){
$full_ses_image=$full_image_link_fn;
if(strpos($full_image_link_fn, '.png') !== false){
$imagecreatefrom_ext= imagecreatefrompng;
}
else{
$imagecreatefrom_ext= imagecreatefromjpeg;	
}
$new_image_name_fn=rand(1,100000000);
$image = $imagecreatefrom_ext($full_ses_image);
global $filename_resized;
$filename_resized = $new_image_name_fn . '-resized-auto.jpg';
$upfilename = 'img/' . $filename_resized;
$thumb_width = $thumb_width_fn;
$width = imagesx($image);
$height = imagesy($image);
$thumb_height = $height/$width*$thumb_width;

$original_aspect = $width / $height;
$thumb_aspect = $thumb_width / $thumb_height;

if ( $original_aspect >= $thumb_aspect )
{
   // If image is wider than thumbnail (in aspect ratio sense)
   $new_height = $thumb_height;
   $new_width = $width / ($height / $thumb_height);
}
else
{
   // If the thumbnail is wider than the image
   $new_width = $thumb_width;
   $new_height = $height / ($width / $thumb_width);
}

$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

// Resize and crop
imagecopyresampled($thumb,
                   $image,
                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                   0, // Center the image vertically
                   0, 0,
                   $new_width, $new_height,
                   $width, $height);
imagejpeg($thumb, $upfilename, $thumb_quality);
}

public function CropImageBigFn($full_image_new_name_fn,$full_image_link_fn,$thumb_width_fn,$thumb_height_fn,$thumb_quality){
$full_ses_image=$full_image_link_fn;
if(strpos($full_image_link_fn, '.png') !== false){
$imagecreatefrom_ext= imagecreatefrompng;
}
else{
$imagecreatefrom_ext= imagecreatefromjpeg;	
}
$image = $imagecreatefrom_ext($full_ses_image);
global $filename_big;
$filename_big = $full_image_new_name_fn;
$upfilename = 'img/' . $filename_big;
$thumb_width = $thumb_width_fn;
$thumb_height = $thumb_height_fn;
$width = imagesx($image);
$height = imagesy($image);

$original_aspect = $width / $height;
$thumb_aspect = $thumb_width / $thumb_height;

if ( $original_aspect >= $thumb_aspect )
{
   // If image is wider than thumbnail (in aspect ratio sense)
   $new_height = $thumb_height;
   $new_width = $width / ($height / $thumb_height);
}
else
{
   // If the thumbnail is wider than the image
   $new_width = $thumb_width;
   $new_height = $height / ($width / $thumb_width);
}

$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

// Resize and crop
imagecopyresampled($thumb,
                   $image,
                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                   0, // Center the image vertically
                   0, 0,
                   $new_width, $new_height,
                   $width, $height);
imagejpeg($thumb, $upfilename, $thumb_quality);
}	

}
?>