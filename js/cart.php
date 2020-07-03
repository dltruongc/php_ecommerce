<?php ob_start(); session_start(); ?>

<?php
header("Content-type: application/javascript"); ?>

$(".cartForm").submit(function(e){
    e.preventDefault();
    var form_data = $(this).serialize();
    var button_content = $(this).find('button[type=submit]');
    button_content.html('Đang thêm...');
    $.ajax({
        url: "cart_manager.php",
        type: "POST",
        dataType:"json",
        data: form_data
    }).done(function(data){
        $("#top-cart-counter").text(`${data.results}`);
        button_content.html('Thêm vào giỏ hàng');
    });
});
