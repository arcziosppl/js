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
        <p class="current_song">
            <button class="btn_left"></button>
            <button class="btn_right"></button>
            <button class="btn_play"><img class="btn" src="img/play.png"></button>
            <button class="btn_pause"><img class="btn" src="img/pause.png"></button>
            <input type="range" class="volume" max="1" min="0" value="1" step="0.1" onchange="volume()">
    </p>
    </p>
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



class paths_play{

path1;
path2;
path3;
path4;
seek;

getsoundfile(soundfile)
{
    this.path2 = soundfile;
}

getsoundseek(soundseek)
{
    this.seek = soundseek;
}

sound_file()
{
    console.log(this.path2);
    return this.path2;
}

soundseek()
{
    return this.seek;
}

};

const player = new paths_play();

const play = document.querySelectorAll(".track");
const btn_left = document.querySelector(".btn_left");
const btn_right = document.querySelector(".btn_right");
const btn_play = document.querySelector(".btn_play");
const btn_pause = document.querySelector(".btn_pause");


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

function volume()
{
    let vol = document.querySelector(".volume").value;
    Howler.volume(vol);
    console.log(vol);
    console.log(player.soundseek());
}

function updateseek()
{
    console.log(player.soundseek());
}

play.forEach(el =>{
    el.addEventListener("click", ()=>{
        let play_song = el.value;
        let paths = path_split(play_song);
        player.getsoundfile(paths[1]);
        insert(paths[0],paths[1],paths[2],paths[3]);
    });
});


function insert(path1,path2,path3,path4)
{

    var sound = new Howl({
        src: ["script/uploads/" + player.sound_file()]
});

player.getsoundseek(sound._seek);
    document.querySelector(".current_img").innerHTML = '<img class="img" src="script/uploads/' + path1 + '">';
    btn_play.addEventListener("click", ()=>{
sound.play();
    });
    btn_pause.addEventListener("click", ()=>{
sound.pause();
    });
    volume();
    document.querySelector(".current_sname").innerHTML = path3;
    document.querySelector(".current_aname").innerHTML = path4;
}




</script>

</body>
</html>