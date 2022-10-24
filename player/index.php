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
            <a href="sites/addtrack.html" class="add_track">ADD TRACK</a>
            <a href="sites/delete_track.php" class="add_track">DELETE TRACK</a>
            <div class="right_menu">
                <a href="#"><img src="img/menu.png" class="right_menu_img"></a>
            </div>
        </div>
    </header>

    <main>
        <div class="menu">
            <p>About Me</p>
        </div>


        <div class="tracks">
<?php
get_data();
?>
        </div>

        <div class="single_track">
        <button class="btn_exit"><img class="img_exit" src="img/quit.png"></button>
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
            $id = $row['id'];
            echo '<div class="track-list">';
            echo '<img class="img_db" src="script/uploads/'. $img.'" >';
            echo '<p>' . $row['songname'] . '</p>';
            echo '<p>' . $row['authorname'] . '</p>';
            echo '<audio controls>';
            echo '<source src="script/uploads/'. $file.'" >';
            echo '</audio>';
           // echo '<button><img class="img_play" src="img/play.png"></button>';
            echo '</div>';
        }
        
    }

    $conn->close();

}
?>

</body>
</html>