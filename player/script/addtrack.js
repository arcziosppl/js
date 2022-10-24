window.onload = () =>{
    $(function(){
        $(".song_name, .author_name").mouseenter(function(){
            $(this).animate({
                width: "360px"
            });
        }).mouseleave(function(){
            $(this).animate({
                width: "350px"
            });
        });

        $(".submit_song").mouseenter(function(){
            $(this).animate({
                width: "360px"
            });
        }).mouseleave(function(){
            $(this).animate({
                width: "350px"
            });
        });



    });



}