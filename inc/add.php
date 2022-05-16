<?
    include("connect.php");
    $clientName = $_POST["clientName"];
    $number = $_POST["number"];
    $cityId = $_POST["cityId"];
    mysqli_query($connect,"INSERT INTO `orders`(`client`, `number`, `cityId`) VALUES ('$clientName','$number','$cityId')");
    header("Location:../site/index.php");