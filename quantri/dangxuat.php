<?php
session_start();
if(isset($_SESSION["email"])&& isset($_SESSION["mk"])){
    session_destroy();
    header("location:index.php");
    
}else{
    header("location:index.php");
}
?>
