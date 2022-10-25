<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player</title>
    <link rel="stylesheet" href="style/index.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2"></script>
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
        <p class="current_song"></p>
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
    
const play = document.querySelectorAll(".track");


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

function insert(path1,path2,path3,path4)
{
    document.querySelector(".current_img").innerHTML = '<img class="img" src="script/uploads/' + path1 + '">';
    document.querySelector(".current_song").innerHTML = 
    '<audio class="audio" controls><source src="script/uploads/' + path2 + '"></audio>';
    document.querySelector(".current_sname").innerHTML = path3;
    document.querySelector(".current_aname").innerHTML = path4;
}

play.forEach(el =>{
    el.addEventListener("click", ()=>{
        console.log(el.value);
        let play_song = el.value;
        let paths = path_split(play_song);
        let image_file = paths[0];
        let song_file = paths[1];
        let song_name = paths[2];
        let song_author = paths[3];
        console.log(paths);
        insert(paths[0],paths[1],paths[2],paths[3]);

    });
});

    

</script>

</body>
</html>