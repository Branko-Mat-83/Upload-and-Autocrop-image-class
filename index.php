<?php
include 'classes/upload-image.class.php';
include 'includes/upload-image.inc.php';
include 'classes/upload-image-script.class.php';
include 'includes/upload-image-script.inc.php';
?>
<html>
	<head>
		<link
			rel="stylesheet"
			href="css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"
		/>
		<script src="js/jquery-3.5.1.js"></script>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
			crossorigin="anonymous"
		/>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
			crossorigin="anonymous"
		></script>
	</head>
	<body>
		<?php 
// THIS IS CLASS WITH HIDDEN IMAGE FORM --- START
$upload_image_class->HiddenUploadForm('upload_image_to_library_form','upload-image-to-library.php','upload_image_to_library_input');
		// THIS IS CLASS WITH HIDDEN IMAGE FORM --- END ?>
		<div class="wrapper">
			<img
				src="img/upload.png"
				id="upload_to_library"
				onclick="upload_to_library();"
			/>
		</div>

		<br /><br /><br />
		<div id="show-images">
			<div class="one-third-column">
				<h4>Original image</h4>
				<div class="small-img-cont">
					<div class="lds-cont">
						<div class="lds-roller"
							><div></div><div></div><div></div><div></div><div></div><div></div
							><div></div><div></div
						></div>
					</div>
				</div>
			</div>
			<div class="one-third-column">
				<h4>Resized image (auto height)</h4>
				<div class="small-img-cont">
					<div class="lds-cont">
						<div class="lds-roller"
							><div></div><div></div><div></div><div></div><div></div><div></div
							><div></div><div></div
						></div>
					</div>
				</div>
			</div>
			<div class="one-third-column">
				<h4>Resized image (custom)</h4>
				<div class="small-img-cont">
					<div class="lds-cont">
						<div class="lds-roller"
							><div></div><div></div><div></div><div></div><div></div><div></div
							><div></div><div></div
						></div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php 
// THIS IS CLASS WITH AJAX SUBMIT ORIGINAL AND CROPPED IMAGE TO THE FOLDER --- START
        $upload_image_script_class->UploadImageClickFn('upload_to_library','upload_image_to_library_input');
		$upload_image_script_class->UploadImageAjaxFn('html_return','library-content-ajax','upload_image_to_library_form','upload_image_to_library_input',14,'JPG
		and PNG files'); // THIS IS CLASS WITH AJAX SUBMIT ORIGINAL AND CROPPED
		IMAGE TO THE FOLDER --- END ?>
	</body>
</html>