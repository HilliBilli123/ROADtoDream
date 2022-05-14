<?
    include("connect.php");
    $clientName = $_POST["clientName"];
    $number = $_POST["number"];
    $cityId = $_POST["cityId"];
    $cargos = $_POST["cargo"];
    // $text = "";
    foreach($cargos as $cargo){
        if(!$text){
            $text="$cargo";
        }else{
            $text="$text,$cargo"; 
        }
    }
    mysqli_query($connect,"INSERT INTO `orders`(`client`, `number`, `cityId`,`cargoId`) VALUES ('$clientName','$number','$cityId','$text')");
    header("Location:../site/index.php");