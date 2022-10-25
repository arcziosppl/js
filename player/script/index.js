document.ready = ()=>{

    $(function(){
        $(".git_l").mouseenter(function(){
            $(this).animate({
                width: "45px",
                height: "45px"
            });
        }).mouseleave(function(){
            $(this).animate({
                width: "40px",
                height: "40px"
            });
        });

        $(".right_menu_img, .right_menu_img2").mouseenter(function() {
            $(this).animate({
                width: "50px"
            });
        }).mouseleave(function () {
            $(this).animate({
                width: "40px"
            });
        });

        $(".right_menu_img, .right_menu_img2").click(function () {
            if($(".menu").is(":hidden")) 
            {
                $(".menu").slideDown("slow");
            }
            else
            {
                $(".menu").slideUp("slow");
            }
        });

        $(".img_play,.img_exit").mouseenter(function(){
            $(this).animate({
                width: "50px",
                height: "50px"
            });
        }).mouseleave(function(){
            $(this).animate({
                width: "40px",
                height: "40px"
            });
        });

        $("button").click(function(){
            if($(".single_track").is(":hidden"))
            {
                $(".single_track").slideDown("slow");
            }
        $(".btn_exit").click(function(){
            if($(".single_track").is(":visible"))
            {
                $(".single_track").slideUp("slow");
            }
        });
        });

        $(".input").mouseenter(function(){
            $(this).animate({
                width: "105px",
                height: "35px"
            });
        }).mouseleave(function(){
            $(this).animate({
                width: "100px",
                height: "30px"
            });
        });


    

        });
}