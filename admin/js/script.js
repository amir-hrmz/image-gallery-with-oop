$(document).ready(function () {

    $(".avatar").click(function () {
        $(".navProfileDropdown").fadeToggle(350);
    })
    // Codes menu right
    $(document).ready(function () {
        $('.menu li.active').addClass('open').children('ul').show();

        $(".menu li.has-sub> a").on('click', function () {
            $(this).removeAttr('href');
            var e = $(this).parent('li');
            if (e.hasClass('open')) {
                e.removeClass('open');
                e.find('li').removeClass('open');
                e.find('ul').slideUp(400);

            } else {
                e.addClass('open');
                e.children('ul').slideDown(400);
                e.siblings('li').children('ul').slideUp(400);
                e.siblings('li').removeClass('open');
                e.siblings('li').find('li').removeClass('oepn');
                e.siblings('li').find('ul').slideUp(200);
            }
        });
    });// end codes menu right

    // code tab-box

    $(".tab li").click(function () {
        $(".tab li").removeClass("active")
        $(this).addClass("active");
        var index = $(this).index();
        $(".tab-content .section").hide();
        $(".tab-content .section").eq(index).fadeIn(200);
    });

    $(".modal-img").click(function () {
        $("#update_image").prop('disabled',false);
        var photo_id = $(this).attr('data');
        image_href = $(this).prop("src");
        image_href_splitted =image_href.split("/");
        image_name=image_href_splitted[image_href_splitted.length - 1];

        $.ajax({
            url : "../includes/ajax_code.php",
            data : {photo_id},
            type:"POST",
            success:function (data) {
              //  alert(data);
                $('.modal-left').html(data);
            }
        });
    });

    $("#update_image").click(function () {
        var id = $("#id").val();

        $.ajax({
            url : '../includes/ajax_code.php',
            data : {image_name : image_name,id : id},
            type : 'POST',
            success:function(data)
            {
                location.reload(true);
            }


        });
    });


});

var myImg = document.getElementById('myImg');
var myMoadl = document.getElementById('myModal');
var span = document.getElementsByClassName("close")[0];

myImg.onclick = function () {
    myMoadl.style.display = 'block';
}

span.onclick = function() {
    myMoadl.style.display = "none";
}





