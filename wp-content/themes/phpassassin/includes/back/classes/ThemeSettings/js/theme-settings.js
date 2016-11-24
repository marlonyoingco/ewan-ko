jQuery(document).ready(function($) {
    $(document).on("click",".upload_image",function(){
        var input_id = $(this).attr("id").split("_")[1];
        tb_show('Upload an image', 'media-upload.php?referer=wptuts-settings&type=image&TB_iframe=true&post_id=0', false);

        window.send_to_editor = function(html) {
            var image_url = $(html).attr('src');

            $("#"+input_id).val(image_url);
            $("#image_"+input_id).attr("src",image_url);
            tb_remove();
        }
        return false;
    });
});