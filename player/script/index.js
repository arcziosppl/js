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

        $(".right_menu_img").mouseenter(function() {
            $(this).animate({
                width: "50px"
            });
        }).mouseleave(function () {
            $(this).animate({
                width: "40px"
            });
        });

        $(".right_menu_img").click(function () {
            if($(".menu").is(":hidden")) 
            {
                $(".menu").slideDown("slow");
            }
            else
            {
                $(".menu").slideUp("slow");
            }
        });

        $(".track-list").mouseenter(function(){
            $(this).animate({
                width: "330px",
                height: "330px"
            });
        }).mouseleave(function(){
            $(this).animate({
                width: "320px",
                height: "320px"
            });
        });

        });
}