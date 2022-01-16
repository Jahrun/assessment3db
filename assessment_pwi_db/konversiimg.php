<?php
require "functions.php";

if(isset($_GET["NIM"])) 
{
    $ini = $_GET["NIM"];
    $masukan = ("SELECT * FROM member WHERE NIM= $ini");
    global $link;
    $query = mysqli_query($link,$masukan);

    $row = mysqli_fetch_array($query);
    header("Content-type: image/png");
    echo $row["FOTO"];
}
else
{
    
}


?>