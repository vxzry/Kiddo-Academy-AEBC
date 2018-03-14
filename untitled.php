<?php
echo '<script type="text/javascript">
jQuery(document).ready(function($){
    $("a").each(function(){
        if( $(this).attr("href") && 0 != $(this).attr("href").indexOf("outputAmissionNotice.php") ) {
            $(this).attr("target", "_blank");
        }
    });
});'
?>