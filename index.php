<?php
session_start();
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false){
    echo "Entrou no sistema";
}else{
    header("Location: login.php");
}
?>