<?
    include("connect.php");
    $clientName = $_POST["clientName"];
    $number = $_POST["number"];
    $cityId = $_POST["cityId"];
    $cargo = $_POST["cargo"];
    mysqli_query($connect,"INSERT INTO `orders`(`client`, `number`, `cityId`,`cargoId`) VALUES ('$clientName','$number','$cityId','$cargo')");
    header("Location:../site/index.php");