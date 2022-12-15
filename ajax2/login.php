<?php

class grzyby{
    public $success, $failed;
}


$grzybynew = new grzyby();

if($_POST["foo"] == "bar")
{
    $grzybynew->succsess = "OK";
    $josn = json_encode($grzybynew);
    echo $josn;
}


?>