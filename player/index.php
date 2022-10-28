<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player</title>
    <link rel="stylesheet" href="style/index.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js" integrity="sha512-6+YN/9o9BWrk6wSfGxQGpt3EUK6XeHi6yeHV+TYD2GR0Sj/cggRpXr1BrAQf0as6XslxomMUxXp2vIl+fv0QRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <header>
        <div class="top">
            <a href="https://www.github.com/arcziosppl"><img src="img/git_logo.png" class="git_l"></a>
            <div class="right_menu">
                <a href="#"><img src="img/menu.png" class="right_menu_img"></a>
            </div>
        </div>
    </header>

    <main>
        <div class="menu">
        <a href="#"><img src="img/menu.png" class="right_menu_img2"></a>
            <p>About Me:</p>
            <p><a href="sites/addtrack.html" class="add_track">ADD TRACK</a></p>
            <p><a href="sites/delete_track.php" class="add_track">DELETE TRACK</a></p>
            <p class="actual_time"></p>
        </div>


        <div class="tracks">
<?php
get_data();
?>
        </div>

        <div class="single_track">
        <button class="btn_exit"><img class="img_exit" src="img/quit.png"></button>
        <p class="current_img"></p>
        <p class="current_sname"></p>
        <p class="current_aname"></p>
        <div class="current_song">
            <div class="controls_top">
            <button class="btn_play"><img class="btn" src="img/play.png"></button>
            <button class="btn_pause"><img class="btn" src="img/pause.png"></button>
            <img class="img_volume" src="img/volume.png">
            <input type="range" class="volume" max="1" min="0" value="1" step="0.1">
            </div>
        </div>
    <p class="current_seek"><a class="start">0:00</a><input type="range" class="seek" min="0" step="1"  value="0"><a class="end"></a></p>
    <p class="song"></p>
        </div>
        


    </main>
    


    <script src="script/index.js"></script>
    <?php

    function get_data()
    {
    $conn = new mysqli("127.0.0.1","root","","music");

    if($conn->connect_error)
    {
        die("Error: " . $conn->connect_error);
    }

    $sql = "SELECT id,image,file,songname,authorname FROM song";
    $result = $conn->query($sql);

    if($result->num_rows >= 1)
    {
        
        while($row=$result->fetch_assoc())
        {
            $img = $row['image'];
            $file = $row['file'];
            $sname = $row['songname'];
            $aname = $row['authorname'];
            $id = $row['id'];
            echo '<div class="track-list">';
            echo '<img class="img_db" src="script/uploads/'. $img.'" >';
            echo '<p>' . $row['songname'] . '</p>';
            echo '<p>' . $row['authorname'] . '</p>';
            echo '<button class="track" value="'.$img,"|",$file,"|",$sname,"|",$aname.'"><img src="img/play.png" class="play_btn"></button>';
           // echo '<button><img class="img_play" src="img/play.png"></button>';
            echo '</div>';
        }
        
    }

    $conn->close();

}
?>

<script>

/*
window.onload = ()=>{

class paths_play{



};

const player = new paths_play();

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

function end_print(str)
{
    //console.log(str/100);
    return (str/100);
}

function start_print(str)
{
    //console.log(str/10);
    return (str/100);
}

function max_print(str)
{
    return str/10;
}

function ctime_print(str)
{
    console.log(str);
    return str; 
}


play.forEach(el =>{
    el.addEventListener("click", ()=>{
        let play_song = el.value;
        let paths = path_split(play_song);
        insert(paths[0],paths[1],paths[2],paths[3]);
    });
}); 


function insert(path1,path2,path3,path4)
{

    document.querySelector(".current_img").innerHTML = '<img class="img" src="script/uploads/' + path1 + '">';
    const audio = new Audio("script/uploads/" + path2);
    audio.addEventListener("timeupdate", ()=>{
        let time = audio.currentTime;
        let dur = audio.duration;
        start_val.innerHTML = start_print(Math.round(time));
        end_val.innerHTML = end_print(Math.round(dur));
        seek.value = Math.round(time);
        console.log(audio.currentTime);
    });

  // let dur = audio.duration;
    max.max = (audio.duration)*(audio.currentTime)/10;
    console.log(Math.round(audio.duration));

    btn_play.addEventListener("click", ()=>{
        audio.play();
    });
    btn_pause.addEventListener("click", ()=>{
audio.pause()
    });
    vol.addEventListener("click", ()=>{
        audio.volume = vol.value;
    });
    document.querySelector(".current_sname").innerHTML = path3;
    document.querySelector(".current_aname").innerHTML = path4;
}


}*/
</script>

</body>
</html>