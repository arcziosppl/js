<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="/player/style/delete_track.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2"></script>

</head>
<body>
    <header>
        <div class="top">
            <a href="/player/index.php">Home</a>
        </div>
    </header>

    <main>
        <div class="delete">
        <?php
delete_track();
?>
        </div>
        <div class="tracks">
            <?php
            get_data();
            ?>
                    </div>
    </main>


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
            $id = $row['id'];
            echo '<div class="track-list">';
            echo '<img class="img_db" src="/player/script/uploads/'. $img.'" >';
            echo '<p>' . $row['songname'] . '</p>';
            echo '<p>' . $row['authorname'] . '</p>';
            echo '<button class="input" value="'.$id.'">DELETE</button>';
           // echo '<button><img class="img_play" src="img/play.png"></button>';
            echo '</div>';
        }
        
    }

    $conn->close();
}


function delete_track()
{
    $conn = new mysqli("127.0.0.1","root","","music");


    $song = $_COOKIE["dd"];

    if($conn->connect_error)
    {
        die("Error: ".$conn->connect_error);
    }

    $sql = "DELETE FROM song WHERE id='$song'";
    $result=$conn->query($sql);
    if($result != TRUE)
    {
        echo "Error";
    }
}

?>

<script src="/player/script/index.js"></script>
<script>
    
const check = document.querySelectorAll(".input");

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

check.forEach(el =>{
    el.addEventListener("click", (e)=>{
        console.log(el.value);
        setCookie("dd",el.value,1);
        location.reload();
    });
});
    

</script>
<script src="/player/script/index.js"></script>
</body>
</html>