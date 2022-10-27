<?php

$conn = new mysqli("127.0.0.1","root","","music");

function file_upload()
{
        $foldername="uploads";
        if(!is_dir($foldername)) mkdir($foldername);
                move_uploaded_file($_FILES['file1']['tmp_name'], $foldername."/".$_FILES['file1']['name']);
                move_uploaded_file($_FILES['file2']['tmp_name'], $foldername."/".$_FILES['file2']['name']);

        echo $_FILES['file1']['name'];
        echo $_FILES['file2']['name'];

        return TRUE;
}

$file1_db = $_FILES['file1']['name'];
$file2_db = $_FILES['file2']['name'];
$songname = $_POST['songname'];
$authorname = $_POST['authorname'];

if($conn->connect_error)
{
    die("Error: ") . $conn->connect_error;
}

$sql = "INSERT INTO song (image,file,songname,authorname) VALUES ('$file1_db','$file2_db','$songname','$authorname')";
if($conn->query($sql) === TRUE && file_upload() === TRUE)
{
    header("Location: /player/sites/upload_success.html");
}    
else
{
 echo "Error: " . $sql . " " . $conn->connect_error;
}
            

?>