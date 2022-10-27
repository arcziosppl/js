document.ready = ()=>{

    $(function(){
        $(".git_l").mouseenter(function(){
            $(this).animate({
                width: "45px",
            });
        }).mouseleave(function(){
            $(this).animate({
                width: "40px",
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


        class paths_play{
            path1; //img
            path2; //file
            path3; //sname
            path4; //aname

            getpaths(p1,p2,p3,p4)
            {
                this.path1 = p1;
                this.path2 = p2;
                this.path3 = p3;
                this.path4 = p4;
            }

        };
        
        const player = new paths_play();
        const audio = new Audio();
        
        const play = document.querySelectorAll(".track");
        const btn_left = document.querySelector(".btn_left");
        const btn_right = document.querySelector(".btn_right");
        const btn_play = document.querySelector(".btn_play");
        const btn_pause = document.querySelector(".btn_pause");
        const vol = document.querySelector(".volume");
        const start_val = document.querySelector(".start");
        const end_val = document.querySelector(".end");
        const seek = document.querySelector(".seek");
        var max = document.querySelector(".seek");
        
        
        function setCookie(cname, cvalue, exdays) {
          const d = new Date();
          d.setTime(d.getTime() + (exdays*24*60*60*1000));
          let expires = "expires="+ d.toUTCString();
          document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
        
        function path_split(str)
        {
        return str.split("|");
        }
        
    
        play.forEach(el =>{
            el.addEventListener("click", ()=>{
                let play_song = el.value;
                let paths = path_split(play_song);
                player.getpaths(paths[0],paths[1],paths[2],paths[3]);

                document.querySelector(".current_img").innerHTML = '<img class="img" src="script/uploads/' + player.path1 + '">';
                audio.src = "/player/script/uploads/" + player.path2;
                document.querySelector(".current_sname").innerHTML = player.path3;
                document.querySelector(".current_aname").innerHTML = player.path4;
            });
        }); 
        
        btn_play.addEventListener("click", ()=>{
            audio.play();
        });
        btn_pause.addEventListener("click", ()=>{
            audio.pause();
        });
     
}