<?
include("connect.php");
$id = $_GET["id"];
$ref = $_GET["ref"];
if($ref == "del"){
    mysqli_query($connect,"DELETE FROM `longorder` WHERE `orderId` = '$id'");
    mysqli_query($connect,"DELETE FROM `orders` WHERE `id` = '$id'");
}

header("Location:../index.php");
