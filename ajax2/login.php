<?php

class grzyby{
    public $success, $failed;
}


$grzybynew = new grzyby();

if($_POST["mail"] == "g@123.com" && $_POST["pass"] == "123")
{
    $grzybynew->success = "true";
    $grzybynew->failed = "false";
    $josn = json_encode($grzybynew);
    echo $josn;
}
else
{
    $grzybynew->success = "false";
    $grzybynew->failed = "true";
    $josn = json_encode($grzybynew);
    echo $josn;
}


?>