<?
include("connect.php");
$clientName = $_POST["clientName"];
$number = $_POST["number"];
$cityId = $_POST["cityId"];
$driverId = $_POST["driverId"];
$carId = $_POST["carId"];
$vid = $_POST["vid"];
$cargo = $_POST["cargo"];
$tonn = $_POST["tonn"];
$price = $_POST["price"];
$id = $_POST["id"];
mysqli_query($connect,"UPDATE `cars` SET `driver`='$driverId',`free`='1',`date`=CURRENT_DATE() WHERE `id` = '$carId'");
mysqli_query($connect,"UPDATE `driver` SET `free`='1' WHERE `id` = '$driverId'");
mysqli_query($connect,"UPDATE `orders` SET `free`='1' WHERE `id` = '$id'");
mysqli_query($connect,"
INSERT INTO `longorder`(`clientName`, `number`, `cityId`, `driverId`, `carId`, `vid`, `cargo`, `tonn`, `price`, `orderId`) VALUES ('$clientName','$number','$cityId','$driverId','$carId','$vid','$cargo','$tonn','$price','$id')
");
header("Location:../index.php");