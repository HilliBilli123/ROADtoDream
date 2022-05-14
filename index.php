<?
include("inc/connect.php");
$citys = mysqli_query($connect, "SELECT * FROM `city`");
$orders = mysqli_query($connect, "SELECT * FROM `orders`");
$cars = mysqli_query($connect, "SELECT * FROM `cars`");
$cargos = mysqli_query($connect, "SELECT * FROM `cargo`");
$drivers = mysqli_query($connect, "SELECT * FROM `driver`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Админ панель</title>
</head>

<body>
    <header class="header">
        <div class="header__contein _contein">
            <div class="header__content">
                <div class="header__block">
                    <div class="header__link click active" data-down="main">Главная</div>
                </div>
                <div class="header__block">
                    <div class="header__link click" data-down="ground">Заказы</div>
                </div>
                <div class="header__block">
                    <div class="header__link click" data-down="geotextile">Оформленные заказы</div>
                </div>
                <div class="header__block">
                    <div class="header__link click" data-down="sand">Песок</div>
                </div>
                <div class="header__block">
                    <div class="header__link click" data-down="geogrid">Георешетка</div>
                </div>
                <div class="header__block">
                    <a class="header__link click" href="site/index.php">Выход</a>
                </div>
            </div>
        </div>
    </header>
    <div class="page__content">
        <div class="page__content__block active-block" id="main">
            <div class="content__block welcome _contein">
                Добро пожаловать в админ панель
            </div>
        </div>
        <div class="page__content__block" id="ground">
            <div class="ground">
                <div class="table__block table__header _contein">
                    <div class="table__link__header">Код</div>
                    <div class="table__link__header">Имя клиента</div>
                    <div class="table__link__header">Номер клиента</div>
                    <div class="table__link__header">Город</div>
                    <div class="table__link__header">Материал</div>
                    <div class="table__link__header">Оформить</div>
                </div>
                <?
                foreach ($orders as $order) {
                ?>
                    <div class="table__block table__links _contein">
                        <div class="table__link"><? echo $order["id"] ?></div>
                        <div class="table__link"><? echo $order["client"] ?></div>
                        <div class="table__link"><? echo $order["number"] ?></div>
                        <?
                        foreach ($citys as $city) {
                            if ($city["id"] == $order["cityId"]) {
                        ?>
                                <div class="table__link"><? echo $city["cityName"] ?></div>
                        <?
                            }
                        }
                        ?>

                        <div class="table__link"><? echo $order["cargoId"] ?></div>

                        <div class="table__link model__window__open">Оформить</div>
                        <div class="model__window">
                            <div class="model__window__content">
                                <div class="order__block">
                                    <form action="../inc/add.php" method="post">
                                        <div class="lable__text__lang">
                                            <label for="clientName">Имя клиента</label>
                                            <input disabled type="text" value="<? echo $order["client"] ?>" name="clientName">
                                        </div>
                                        <div class="lable__text__lang">
                                            <label for="clientName">Номер клиента</label>
                                            <input type="text" disabled value="<? echo $order["number"] ?>" name="number">
                                        </div>
                                        <label for="clientName">Город</label>
                                        <select disabled name="cityId" id="">
                                            <?
                                            foreach ($citys as $city) {
                                            ?>
                                                <option value="<? echo $city["id"] ?>"><? echo $city["cityName"] ?></option>
                                            <?
                                            }
                                            ?>
                                        </select>
                                        <label for="clientName">Выбрать водителя</label>
                                        <select name="carId" id="">
                                            <?
                                            foreach ($drivers as $driver) {
                                            ?>
                                                <option value="<? echo $driver["id"] ?>"><? echo $driver["name"] ?></option>
                                            <?
                                            }
                                            ?>
                                        </select>
                                        <label for="clientName">Выбрать водителя</label>
                                        <select name="carId" id="">
                                            <?
                                            foreach ($cars as $car) {
                                            ?>
                                                <option value="<? echo $car["id"] ?>"><? echo $car["name"] ?></option>
                                            <?
                                            }
                                            ?>
                                        </select>
                                        <div class="lable__text__lang">
                                            <label for="clientName">Груз</label>
                                            <input disabled type="text" value="<? echo $order["cargoId"] ?>" name="">
                                        </div>
                                        <button type="submit">Оформить заказ</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?
                }
                ?>
            </div>
        </div>
        <div class="page__content__block" id="geotextile">3</div>
        <div class="page__content__block" id="sand">4</div>
        <div class="page__content__block" id="geogrid">5</div>
        <div class="page__content__block" id="stone">6</div>
    </div>
    <script src="js/scrollLeft.js"></script>
    <script src="js/script.js"></script>
</body>

</html>