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
        $(".cart-container").html(JSON.stringify(data));
        console.log(data);
        button_content.html('Add to Cart');
    });

});