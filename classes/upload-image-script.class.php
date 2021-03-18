<?php	
class UploadImageScriptClass{
	public function UploadImageClickFn($upload_image_btn_id_fn,$upload_image_input_id_fn){
    echo '<script>
   function '.$upload_image_btn_id_fn.'() {
      document.getElementById("'.$upload_image_input_id_fn.'").click();
   }
</script>';		
	}		
    public function UploadImageAjaxFn($upload_reload_ajax_type_fn,$upload_reload_id_fn,$upload_image_form_id_fn,$upload_image_input_id_fn,$upload_image_max_size_mb_fn,$upload_image_allowed_types_fn){
   if($upload_image_allowed_types_fn=='JPG and PNG files'){
	$upload_image_allowed_types_arr='"jpg", "jpeg", "JPG", "JPEG", "png", "PNG"';   
   }
   else if($upload_image_allowed_types_fn=='JPG files'){
	$upload_image_allowed_types_arr='"jpg", "jpeg", "JPG", "JPEG"'; 
   }	
	if($upload_reload_ajax_type_fn=='html_return'){
	$ajax_return='location.reload();';
	}	
    echo '<script type="text/javascript"> 
$(function() {
    $(document).on("submit" , "#'.$upload_image_form_id_fn.'",function (e){		
	$(".lds-cont").show(); 
        e.preventDefault();	
        var formData = new FormData(this);	 			
        $.ajax({			
            type:"POST",
            url: $(this).attr("action"),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){			
            $("#show-images").html(data);			
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });	
    });	
});
$(function(){	
var _URL = window.URL || window.webkitURL;
$(document).on("change" , "#'.$upload_image_input_id_fn.'" ,function (e) {	
 var fileExtension = ['.$upload_image_allowed_types_arr.'];
        if ($.inArray($(this).val().split(".").pop().toLowerCase(), fileExtension) == -1) {
        setTimeout(function(){$("#image-wrong-file").modal("show");},500);  
        }
		else{
if(Math.round(this.files[0].size/(1024*1024)) > '.$upload_image_max_size_mb_fn.') {
        setTimeout(function(){$("#big-image-size").modal("show");},500); 
        }else{
        $("#'.$upload_image_form_id_fn.'").submit();
        }
		}
    });	
    });	
</script>';	
	}	
}
?>

